<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth;

use IranLMS\Contracts\ModuleInterface;
use IranLMS\Core\Container;
use IranLMS\Modules\Auth\Service\IdentityService;
use IranLMS\Modules\Auth\Service\PasswordService;

final class AuthModule implements ModuleInterface
{
    public function get_name(): string
    {
        return 'auth';
    }

    public function get_version(): string
    {
        return '1.0.0';
    }

    public function register(): void
    {
        // Auth services are registered by the module bootstrap.
    }

    public function boot(): void
    {
        // API authentication middleware and routes will be added in the API layer.
    }

    public function register_services(Container $container): void
    {
        $container->singleton(IdentityService::class, static fn () => new IdentityService());
        $container->singleton(PasswordService::class, static fn () => new PasswordService());
    }
}
