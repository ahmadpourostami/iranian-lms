<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

use IranLMS\Contracts\TokenServiceInterface;
use RuntimeException;

final class JwtTokenService implements TokenServiceInterface
{
    public function issue_access_token(int $user_id, array $claims = []): string
    {
        $header = $this->base64url_encode((string) wp_json_encode([
            'typ' => 'JWT',
            'alg' => 'HS256',
        ]));

        $payload = $this->base64url_encode((string) wp_json_encode(array_merge([
            'sub' => $user_id,
            'iat' => time(),
            'exp' => time() + 3600,
        ], $claims)));

        $signature = $this->sign($header . '.' . $payload);

        return $header . '.' . $payload . '.' . $signature;
    }

    public function verify_access_token(string $token): array
    {
        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            throw new RuntimeException('AUTH_TOKEN_INVALID');
        }

        [$header, $payload, $signature] = $parts;

        if (!hash_equals($this->sign($header . '.' . $payload), $signature)) {
            throw new RuntimeException('AUTH_TOKEN_INVALID');
        }

        $data = json_decode($this->base64url_decode($payload), true);

        if (!is_array($data) || empty($data['sub'])) {
            throw new RuntimeException('AUTH_TOKEN_INVALID');
        }

        if (isset($data['exp']) && time() >= (int) $data['exp']) {
            throw new RuntimeException('AUTH_TOKEN_EXPIRED');
        }

        return $data;
    }

    public function revoke_access_token(string $token): void
    {
        // Revocation persistence will be implemented by the token/session store.
    }

    private function sign(string $data): string
    {
        $secret = defined('AUTH_KEY') ? AUTH_KEY : '';

        if ($secret === '') {
            throw new RuntimeException('JWT signing secret is not configured.');
        }

        return $this->base64url_encode(hash_hmac('sha256', $data, $secret, true));
    }

    private function base64url_encode(string $data): string
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    private function base64url_decode(string $data): string
    {
        return (string) base64_decode(strtr($data, '-_', '+/'));
    }
}
