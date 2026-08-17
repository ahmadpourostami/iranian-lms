<?php

declare(strict_types=1);

namespace IranLMS\API;

use IranLMS\API\Controllers\AuthController;
use IranLMS\API\Routes\AuthRoutes;
use IranLMS\Core\Container;
use IranLMS\Modules\Auth\Service\IdentityService;
use IranLMS\Modules\Auth\Service\PasswordService;
use IranLMS\Modules\Auth\Service\SessionService;
use IranLMS\Modules\Auth\Service\TokenManager;

final class ApiRegistrar
{
    public function __construct(private Container $container) {}

    public function register(): void
    {
        $controller = new AuthController(
            $this->container->get(IdentityService::class),
            $this->container->get(PasswordService::class),
            $this->container->get(SessionService::class),
            $this->container->get(TokenManager::class)
        );

        (new AuthRoutes($controller))->register();
    }
}
