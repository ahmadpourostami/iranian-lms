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
        add_action('iran_lms/register_services', [$this, 'register_services']);
    }

    public function boot(): void
    {
        // API authentication middleware and routes belong to the API layer.
    }

    public function register_services(Container $container): void
    {
        $container->singleton(
            IdentityService::class,
            static fn (): IdentityService => new IdentityService()
        );

        $container->singleton(
            PasswordService::class,
            static fn (): PasswordService => new PasswordService()
        );
    }
}
