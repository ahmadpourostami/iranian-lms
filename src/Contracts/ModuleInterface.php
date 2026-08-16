<?php

declare(strict_types=1);

namespace IranLMS\Contracts;

interface ModuleInterface
{
    public function get_name(): string;

    public function get_version(): string;

    public function register(): void;

    public function boot(): void;
}
