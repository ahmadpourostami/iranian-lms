<?php

declare(strict_types=1);

namespace IranLMS\Infrastructure\Database;

use RuntimeException;

final class DatabaseManager
{
    private const OPTION_KEY = 'iran_lms_db_version';

    /** @var object */
    private object $wpdb;

    public function __construct(object $wpdb)
    {
        $this->wpdb = $wpdb;
    }

    public function get_table_prefix(): string
    {
        if (!isset($this->wpdb->prefix) || !is_string($this->wpdb->prefix)) {
            throw new RuntimeException('WordPress database prefix is unavailable.');
        }

        return $this->wpdb->prefix . 'ilms_';
    }

    public function get_db_version(): int
    {
        if (!function_exists('get_option')) {
            return 0;
        }

        return (int) get_option(self::OPTION_KEY, 0);
    }

    public function set_db_version(int $version): void
    {
        if (!function_exists('update_option')) {
            throw new RuntimeException('WordPress options API is unavailable.');
        }

        update_option(self::OPTION_KEY, $version, false);
    }

    public function query(string $sql): void
    {
        $result = $this->wpdb->query($sql);

        if ($result === false) {
            $error = isset($this->wpdb->last_error) ? (string) $this->wpdb->last_error : 'Unknown database error.';
            throw new RuntimeException($error);
        }
    }

    public function get_wpdb(): object
    {
        return $this->wpdb;
    }
}
