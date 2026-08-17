<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth\Database\Migrations;

use IranLMS\Contracts\DatabaseMigrationInterface;
use IranLMS\Infrastructure\Database\DatabaseManager;

final class Version1100CreateAuthTables implements DatabaseMigrationInterface
{
    public function __construct(private DatabaseManager $database) {}

    public function get_version(): int { return 1100; }

    public function up(): void
    {
        $wpdb = $this->database->get_wpdb();
        $prefix = $this->database->get_table_prefix();
        $collate = $wpdb->get_charset_collate();
        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta("CREATE TABLE {$prefix}auth_sessions (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            session_uuid CHAR(36) NOT NULL,
            user_id BIGINT UNSIGNED NOT NULL,
            device VARCHAR(100) NULL,
            browser VARCHAR(100) NULL,
            operating_system VARCHAR(100) NULL,
            ip_address VARCHAR(45) NULL,
            country VARCHAR(100) NULL,
            created_at DATETIME NOT NULL,
            last_activity_at DATETIME NOT NULL,
            expires_at DATETIME NOT NULL,
            revoked_at DATETIME NULL,
            PRIMARY KEY (id),
            UNIQUE KEY session_uuid (session_uuid),
            KEY user_id (user_id),
            KEY expires_at (expires_at),
            KEY revoked_at (revoked_at)
        ) {$collate};");

        dbDelta("CREATE TABLE {$prefix}auth_refresh_tokens (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            token_hash CHAR(64) NOT NULL,
            user_id BIGINT UNSIGNED NOT NULL,
            session_id BIGINT UNSIGNED NOT NULL,
            expires_at DATETIME NOT NULL,
            created_at DATETIME NOT NULL,
            used_at DATETIME NULL,
            revoked_at DATETIME NULL,
            replaced_by BIGINT UNSIGNED NULL,
            PRIMARY KEY (id),
            UNIQUE KEY token_hash (token_hash),
            KEY user_id (user_id),
            KEY session_id (session_id),
            KEY expires_at (expires_at),
            KEY revoked_at (revoked_at)
        ) {$collate};");
    }

    public function down(): void
    {
        $prefix = $this->database->get_table_prefix();
        $this->database->query("DROP TABLE IF EXISTS {$prefix}auth_refresh_tokens");
        $this->database->query("DROP TABLE IF EXISTS {$prefix}auth_sessions");
    }
}
