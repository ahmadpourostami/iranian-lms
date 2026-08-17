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
        $public = ['permission_callback' => '__return_true'];
        register_rest_route('iran-lms/v1', '/auth/login', [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => [$this->controller, 'login'],
            ...$public,
        ]);
        register_rest_route('iran-lms/v1', '/auth/refresh', [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => [$this->controller, 'refresh'],
            ...$public,
        ]);
        register_rest_route('iran-lms/v1', '/auth/logout', [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => [$this->controller, 'logout'],
            ...$public,
        ]);
        register_rest_route('iran-lms/v1', '/auth/logout-all', [
            'methods' => WP_REST_Server::CREATABLE,
            'callback' => [$this->controller, 'logout_all'],
            ...$public,
        ]);
    }
}
