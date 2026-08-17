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
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';

        if ($wpdb->insert($table, [
            'token_hash' => $hash,
            'user_id' => $user_id,
            'session_id' => $session_id,
            'expires_at' => gmdate('Y-m-d H:i:s', time() + self::TTL),
            'created_at' => gmdate('Y-m-d H:i:s'),
        ]) === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }

        return $token;
    }

    public function rotate(string $token): string
    {
        $record = $this->find(hash('sha256', $token));

        if ($record === null || !empty($record['revoked_at']) || !empty($record['used_at']) || strtotime((string) $record['expires_at']) <= time()) {
            throw new RuntimeException('AUTH_REFRESH_EXPIRED');
        }

        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';
        $now = gmdate('Y-m-d H:i:s');
        $new_token = wp_generate_password(96, false, false);
        $new_hash = hash('sha256', $new_token);

        $wpdb->query('START TRANSACTION');

        try {
            $claimed = $wpdb->query($wpdb->prepare(
                "UPDATE {$table} SET used_at = %s, revoked_at = %s WHERE id = %d AND used_at IS NULL AND revoked_at IS NULL AND expires_at > UTC_TIMESTAMP()",
                $now,
                $now,
                (int) $record['id']
            ));

            if ($claimed !== 1) {
                $wpdb->query('ROLLBACK');
                throw new RuntimeException('AUTH_REFRESH_EXPIRED');
            }

            $inserted = $wpdb->insert($table, [
                'token_hash' => $new_hash,
                'user_id' => (int) $record['user_id'],
                'session_id' => (int) $record['session_id'],
                'expires_at' => gmdate('Y-m-d H:i:s', time() + self::TTL),
                'created_at' => $now,
            ]);

            if ($inserted === false) {
                throw new RuntimeException('DATABASE_ERROR');
            }

            $new_id = (int) $wpdb->insert_id;
            if ($wpdb->update($table, ['replaced_by' => $new_id], ['id' => (int) $record['id']], ['%d'], ['%d']) === false) {
                throw new RuntimeException('DATABASE_ERROR');
            }

            $wpdb->query('COMMIT');
            return $new_token;
        } catch (\Throwable $exception) {
            $wpdb->query('ROLLBACK');
            throw $exception;
        }
    }

    public function revoke(string $token): void
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';

        if ($wpdb->update($table, ['revoked_at' => gmdate('Y-m-d H:i:s')], ['token_hash' => hash('sha256', $token)], ['%s'], ['%s']) === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }
    }

    public function revoke_session(int $session_id): void
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';

        if ($wpdb->query($wpdb->prepare("UPDATE {$table} SET revoked_at = UTC_TIMESTAMP() WHERE session_id = %d AND revoked_at IS NULL", $session_id)) === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }
    }

    private function find(string $hash): ?array
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_refresh_tokens';
        $row = $wpdb->get_row($wpdb->prepare("SELECT * FROM {$table} WHERE token_hash = %s LIMIT 1", $hash), ARRAY_A);

        return is_array($row) ? $row : null;
    }
}
