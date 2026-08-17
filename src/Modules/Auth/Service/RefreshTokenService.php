<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

use IranLMS\Infrastructure\Database\DatabaseManager;
use RuntimeException;

final class RefreshTokenService
{
    private const TTL = 2592000;

    public function __construct(private DatabaseManager $database)
    {
    }

    public function issue(int $user_id, int $session_id): string
    {
        $token = wp_generate_password(96, false, false);
        $hash = hash('sha256', $token);
        $expires_at = time() + self::TTL;
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';

        $result = $wpdb->insert($table, [
            'token_hash' => $hash,
            'user_id' => $user_id,
            'session_id' => $session_id,
            'expires_at' => gmdate('Y-m-d H:i:s', $expires_at),
            'created_at' => gmdate('Y-m-d H:i:s'),
        ]);

        if ($result === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }

        return $token;
    }

    public function rotate(string $token): string
    {
        $record = $this->find(hash('sha256', $token));

        if ($record === null) {
            throw new RuntimeException('AUTH_REFRESH_EXPIRED');
        }

        if (!empty($record['revoked_at']) || !empty($record['used_at']) || strtotime((string) $record['expires_at']) <= time()) {
            throw new RuntimeException('AUTH_REFRESH_EXPIRED');
        }

        $new_token = wp_generate_password(96, false, false);
        $new_hash = hash('sha256', $new_token);
        $new_expires = gmdate('Y-m-d H:i:s', time() + self::TTL);
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';

        $inserted = $wpdb->insert($table, [
            'token_hash' => $new_hash,
            'user_id' => (int) $record['user_id'],
            'session_id' => (int) $record['session_id'],
            'expires_at' => $new_expires,
            'created_at' => gmdate('Y-m-d H:i:s'),
        ]);

        if ($inserted === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }

        $new_id = (int) $wpdb->insert_id;
        $updated = $wpdb->update(
            $table,
            [
                'used_at' => gmdate('Y-m-d H:i:s'),
                'revoked_at' => gmdate('Y-m-d H:i:s'),
                'replaced_by' => $new_id,
            ],
            ['id' => (int) $record['id']],
            ['%s', '%s', '%d'],
            ['%d']
        );

        if ($updated === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }

        return $new_token;
    }

    public function revoke(string $token): void
    {
        $hash = hash('sha256', $token);
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';
        $result = $wpdb->update(
            $table,
            ['revoked_at' => gmdate('Y-m-d H:i:s')],
            ['token_hash' => $hash],
            ['%s'],
            ['%s']
        );

        if ($result === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }
    }

    public function revoke_session(int $session_id): void
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';
        $result = $wpdb->query($wpdb->prepare("UPDATE {$table} SET revoked_at = UTC_TIMESTAMP() WHERE session_id = %d AND revoked_at IS NULL", $session_id));

        if ($result === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }
    }

    private function find(string $hash): ?array
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT * FROM {$table} WHERE token_hash = %s LIMIT 1", $hash),
            ARRAY_A
        );

        return is_array($row) ? $row : null;
    }
}
