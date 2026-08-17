<?php

declare(strict_types=1);

namespace IranLMS\API\Controllers;

use IranLMS\API\Http\ApiResponse;
use IranLMS\Modules\Auth\Service\IdentityService;
use IranLMS\Modules\Auth\Service\PasswordService;
use IranLMS\Modules\Auth\Service\SessionService;
use IranLMS\Modules\Auth\Service\TokenManager;
use WP_REST_Request;

final class AuthController
{
    public function __construct(
        private IdentityService $identity,
        private PasswordService $passwords,
        private SessionService $sessions,
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

        $access_token = $this->tokens->issue_access_token((int) $user->ID, [
            'sid' => $session_id,
        ]);

        return ApiResponse::success([
            'access_token' => $access_token,
            'token_type' => 'Bearer',
            'expires_in' => 3600,
            'user_id' => (int) $user->ID,
            'session_id' => $session_id,
        ]);
    }
}
