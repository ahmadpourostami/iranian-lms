<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

use RuntimeException;

final class RefreshTokenService
{
    private const TTL = 2592000;

    public function issue(int $user_id, string $session_id): string
    {
        $token = wp_generate_password(96, false, false);
        $hash = hash('sha256', $token);
        $expires_at = time() + self::TTL;

        $this->store($hash, $user_id, $session_id, $expires_at);

        return $token;
    }

    public function rotate(string $token): string
    {
        $record = $this->find(hash('sha256', $token));

        if ($record === null || (int) $record['expires_at'] <= time() || !empty($record['revoked_at'])) {
            throw new RuntimeException('AUTH_REFRESH_EXPIRED');
        }

        $this->revoke($record['hash']);

        return $this->issue((int) $record['user_id'], (string) $record['session_id']);
    }

    public function revoke(string $token_hash): void
    {
        // Persistence is intentionally isolated until the refresh-token schema is finalized.
    }

    private function store(string $hash, int $user_id, string $session_id, int $expires_at): void
    {
        // Persistence is intentionally isolated until the refresh-token schema is finalized.
    }

    private function find(string $hash): ?array
    {
        return null;
    }
}
