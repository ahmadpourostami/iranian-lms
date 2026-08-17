<?php

declare(strict_types=1);

namespace IranLMS\API\Controllers;

use IranLMS\API\Http\ApiResponse;
use IranLMS\Modules\Auth\Service\IdentityService;
use IranLMS\Modules\Auth\Service\PasswordService;
use IranLMS\Modules\Auth\Service\RefreshTokenService;
use IranLMS\Modules\Auth\Service\SessionService;
use IranLMS\Modules\Auth\Service\TokenManager;
use WP_REST_Request;

final class AuthController
{
    public function __construct(
        private IdentityService $identity,
        private PasswordService $passwords,
        private SessionService $sessions,
        private RefreshTokenService $refresh_tokens,
        private TokenManager $tokens
    ) {}

    public function login(WP_REST_Request $request): array
    {
        $login = trim((string) $request->get_param('login'));
        $password = (string) $request->get_param('password');
        if ($login === '' || $password === '') {
            return ApiResponse::error('VALIDATION_ERROR', 'Login and password are required.', [], 422);
        }

        $user = $this->identity->find_user($login);
        if (!$this->passwords->verify($password, (string) $user->user_pass)) {
            return ApiResponse::error('INVALID_CREDENTIALS', 'Invalid credentials.', [], 401);
        }

        $session_id = $this->sessions->create((int) $user->ID, [
            'device' => (string) $request->get_header('x-device-name'),
            'browser' => (string) $request->get_header('user-agent'),
            'ip_address' => (string) $request->get_header('x-forwarded-for'),
        ]);

        $access_token = $this->tokens->issue_access_token((int) $user->ID, ['sid' => $session_id]);
        $refresh_token = $this->refresh_tokens->issue((int) $user->ID, $session_id);

        return ApiResponse::success([
            'access_token' => $access_token,
            'refresh_token' => $refresh_token,
            'token_type' => 'Bearer',
            'expires_in' => 3600,
            'refresh_expires_in' => 2592000,
            'user_id' => (int) $user->ID,
            'session_id' => $session_id,
        ]);
    }

    public function refresh(WP_REST_Request $request): array
    {
        $token = trim((string) $request->get_param('refresh_token'));
        if ($token === '') {
            return ApiResponse::error('VALIDATION_ERROR', 'Refresh token is required.', [], 422);
        }

        $rotated = $this->refresh_tokens->rotate($token);
        if (!$this->sessions->is_active($rotated['session_id'])) {
            return ApiResponse::error('AUTH_SESSION_INVALID', 'Session is no longer active.', [], 401);
        }

        $access_token = $this->tokens->issue_access_token($rotated['user_id'], ['sid' => $rotated['session_id']]);

        return ApiResponse::success([
            'access_token' => $access_token,
            'refresh_token' => $rotated['token'],
            'token_type' => 'Bearer',
            'expires_in' => 3600,
            'refresh_expires_in' => 2592000,
            'user_id' => $rotated['user_id'],
            'session_id' => $rotated['session_id'],
        ]);
    }

    public function logout(WP_REST_Request $request): array
    {
        $refresh = trim((string) $request->get_param('refresh_token'));
        $session_id = (int) $request->get_param('session_id');
        if ($refresh !== '') {
            $this->refresh_tokens->revoke($refresh);
        }
        if ($session_id > 0) {
            $this->refresh_tokens->revoke_session($session_id);
            $this->sessions->revoke($session_id);
        }
        return ApiResponse::success(['logged_out' => true]);
    }

    public function logout_all(WP_REST_Request $request): array
    {
        $user_id = (int) $request->get_param('user_id');
        if ($user_id <= 0) {
            return ApiResponse::error('VALIDATION_ERROR', 'User ID is required.', [], 422);
        }
        $this->sessions->revoke_all($user_id);
        return ApiResponse::success(['logged_out' => true, 'all_sessions' => true]);
    }
}
