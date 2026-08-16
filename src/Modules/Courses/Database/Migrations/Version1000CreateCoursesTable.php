<?php

declare(strict_types=1);

namespace IranLMS\Modules\Courses\Database\Migrations;

use IranLMS\Contracts\DatabaseMigrationInterface;
use IranLMS\Infrastructure\Database\DatabaseManager;

final class Version1000CreateCoursesTable implements DatabaseMigrationInterface
{
    public function __construct(private DatabaseManager $database)
    {
    }

    public function get_version(): int
    {
        return 1000;
    }

    public function up(): void
    {
        $wpdb = $this->database->get_wpdb();
        $table = $this->database->get_table_prefix() . 'courses';
        $charset_collate = method_exists($wpdb, 'get_charset_collate')
            ? $wpdb->get_charset_collate()
            : '';

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';

        dbDelta("CREATE TABLE {$table} (
            id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
            uuid CHAR(36) NOT NULL,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(200) NOT NULL,
            description LONGTEXT NULL,
            excerpt TEXT NULL,
            thumbnail BIGINT UNSIGNED NULL,
            cover_image BIGINT UNSIGNED NULL,
            instructor_id BIGINT UNSIGNED NOT NULL,
            primary_category BIGINT UNSIGNED NULL,
            language VARCHAR(20) NULL,
            difficulty VARCHAR(50) NULL,
            duration INT UNSIGNED NULL,
            status VARCHAR(30) NOT NULL DEFAULT 'draft',
            visibility VARCHAR(30) NOT NULL DEFAULT 'public',
            created_at DATETIME NOT NULL,
            updated_at DATETIME NOT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY uuid (uuid),
            UNIQUE KEY slug (slug),
            KEY instructor_id (instructor_id),
            KEY primary_category (primary_category),
            KEY status (status),
            KEY visibility (visibility)
        ) {$charset_collate};");
    }

    public function down(): void
    {
        $table = $this->database->get_table_prefix() . 'courses';
        $this->database->query("DROP TABLE IF EXISTS {$table}");
    }
}
