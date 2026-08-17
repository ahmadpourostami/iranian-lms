<?php

declare(strict_types=1);

namespace IranLMS\Modules\Auth;

use IranLMS\Contracts\ModuleInterface;
use IranLMS\Contracts\TokenServiceInterface;
use IranLMS\Core\Container;
use IranLMS\Infrastructure\Database\DatabaseManager;
use IranLMS\Modules\Auth\Service\IdentityService;
use IranLMS\Modules\Auth\Service\JwtTokenService;
use IranLMS\Modules\Auth\Service\PasswordService;
use IranLMS\Modules\Auth\Service\RefreshTokenService;
use IranLMS\Modules\Auth\Service\SessionService;
use IranLMS\Modules\Auth\Service\TokenManager;

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

        $container->singleton(
            SessionService::class,
            static fn (Container $container): SessionService => new SessionService(
                $container->get(DatabaseManager::class)
            )
        );

        $container->singleton(
            RefreshTokenService::class,
            static fn (Container $container): RefreshTokenService => new RefreshTokenService(
                $container->get(DatabaseManager::class)
            )
        );

        $container->singleton(
            TokenServiceInterface::class,
            static fn (): TokenServiceInterface => new JwtTokenService()
        );

        $container->singleton(
            TokenManager::class,
            static fn (Container $container): TokenManager => new TokenManager(
                $container->get(TokenServiceInterface::class),
                $container->get(SessionService::class)
            )
        );
    }
}
