<?php

declare(strict_types=1);

namespace IranLMS\Contracts;

interface DatabaseMigrationInterface
{
    public function get_version(): int;

    public function up(): void;

    public function down(): void;
}
