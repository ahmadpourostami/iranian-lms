<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use IranLMS\Contracts\TokenServiceInterface;
use RuntimeException;
use UnexpectedValueException;

final class JwtTokenService implements TokenServiceInterface
{
    private const ALGORITHM = 'HS256';
    private const ACCESS_TOKEN_TTL = 3600;

    public function issue_access_token(int $user_id, array $claims = []): string
    {
        $now = time();

        $payload = array_merge([
            'iss' => $this->issuer(),
            'sub' => $user_id,
            'iat' => $now,
            'exp' => $now + self::ACCESS_TOKEN_TTL,
            'jti' => wp_generate_uuid4(),
        ], $claims);

        return JWT::encode($payload, $this->secret(), self::ALGORITHM);
    }

    public function verify_access_token(string $token): array
    {
        try {
            $decoded = JWT::decode($token, new Key($this->secret(), self::ALGORITHM));
            $claims = (array) $decoded;
        } catch (UnexpectedValueException $exception) {
            throw new RuntimeException('AUTH_TOKEN_INVALID', 0, $exception);
        } catch (\DomainException $exception) {
            throw new RuntimeException('AUTH_TOKEN_INVALID', 0, $exception);
        }

        if (($claims['iss'] ?? null) !== $this->issuer()) {
            throw new RuntimeException('AUTH_TOKEN_INVALID');
        }

        if (empty($claims['sub']) || empty($claims['jti'])) {
            throw new RuntimeException('AUTH_TOKEN_INVALID');
        }

        return $claims;
    }

    public function revoke_access_token(string $token): void
    {
        // Access-token revocation is enforced through the associated session.
    }

    private function secret(): string
    {
        $auth_key = defined('AUTH_KEY') ? (string) AUTH_KEY : '';
        $auth_salt = defined('AUTH_SALT') ? (string) AUTH_SALT : '';
        $secret = hash('sha256', $auth_key . '|' . $auth_salt, true);

        if ($auth_key === '' || $auth_salt === '') {
            throw new RuntimeException('JWT signing secret is not configured.');
        }

        return $secret;
    }

    private function issuer(): string
    {
        if (function_exists('home_url')) {
            return home_url('/');
        }

        return 'iran-lms';
    }
}
