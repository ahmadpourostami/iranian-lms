<?php

declare(strict_types=1);

namespace IranLMS\Infrastructure\Database;

use InvalidArgumentException;
use IranLMS\Contracts\DatabaseMigrationInterface;

final class MigrationRunner
{
    /**
     * @param DatabaseMigrationInterface[] $migrations
     */
    public function __construct(
        private DatabaseManager $database,
        private array $migrations = []
    ) {
    }

    public function add(DatabaseMigrationInterface $migration): void
    {
        $this->migrations[] = $migration;
    }

    public function migrate(): void
    {
        usort(
            $this->migrations,
            static fn (DatabaseMigrationInterface $a, DatabaseMigrationInterface $b): int =>
                $a->get_version() <=> $b->get_version()
        );

        $current = $this->database->get_db_version();

        foreach ($this->migrations as $migration) {
            if ($migration->get_version() <= $current) {
                continue;
            }

            $migration->up();
            $this->database->set_db_version($migration->get_version());
            $current = $migration->get_version();
        }
    }

    public function rollback(int $target_version): void
    {
        if ($target_version < 0) {
            throw new InvalidArgumentException('Target database version cannot be negative.');
        }

        usort(
            $this->migrations,
            static fn (DatabaseMigrationInterface $a, DatabaseMigrationInterface $b): int =>
                $b->get_version() <=> $a->get_version()
        );

        $current = $this->database->get_db_version();

        if ($target_version >= $current) {
            return;
        }

        foreach ($this->migrations as $migration) {
            $version = $migration->get_version();

            if ($version > $current || $version <= $target_version) {
                continue;
            }

            $migration->down();
        }

        $this->database->set_db_version($target_version);
    }
}
