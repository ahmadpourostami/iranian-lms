<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Service;

use IranLMS\Infrastructure\Database\DatabaseManager;
use RuntimeException;

final class SessionService
{
    private const TTL = 2592000;

    public function __construct(private DatabaseManager $database)
    {
    }

    public function create(int $user_id, array $context): int
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_sessions';
        $now = time();

        $result = $wpdb->insert($table, [
            'session_uuid' => wp_generate_uuid4(),
            'user_id' => $user_id,
            'device' => $context['device'] ?? null,
            'browser' => $context['browser'] ?? null,
            'operating_system' => $context['operating_system'] ?? null,
            'ip_address' => $context['ip_address'] ?? null,
            'country' => $context['country'] ?? null,
            'created_at' => gmdate('Y-m-d H:i:s', $now),
            'last_activity_at' => gmdate('Y-m-d H:i:s', $now),
            'expires_at' => gmdate('Y-m-d H:i:s', $now + self::TTL),
        ]);

        if ($result === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }

        return (int) $wpdb->insert_id;
    }

    public function is_active(int $session_id): bool
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_sessions';
        $row = $wpdb->get_row(
            $wpdb->prepare("SELECT id FROM {$table} WHERE id = %d AND revoked_at IS NULL AND expires_at > UTC_TIMESTAMP() LIMIT 1", $session_id),
            ARRAY_A
        );

        return is_array($row);
    }

    public function revoke(int $session_id): void
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_sessions';
        $result = $wpdb->update($table, ['revoked_at' => gmdate('Y-m-d H:i:s')], ['id' => $session_id], ['%s'], ['%d']);

        if ($result === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }
    }

    public function revoke_all(int $user_id): void
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'auth_sessions';
        $result = $wpdb->query($wpdb->prepare("UPDATE {$table} SET revoked_at = UTC_TIMESTAMP() WHERE user_id = %d AND revoked_at IS NULL", $user_id));

        if ($result === false) {
            throw new RuntimeException('DATABASE_ERROR');
        }
    }
}
