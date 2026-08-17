<?php

declare(strict_types=1);

namespace IranLMS\API\Routes;

use IranLMS\API\Controllers\AuthController;
use WP_REST_Server;

final class AuthRoutes
{
    public function __construct(private AuthController $controller) {}

    public function register(): void
    {
        register_rest_route('iran-lms/v1', '/auth/login', [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => [$this->controller, 'login'],
            'permission_callback' => '__return_true',
        ]);
    }
}
