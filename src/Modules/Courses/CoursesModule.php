<?php

declare(strict_types=1);

namespace IranLMS\Modules\Courses;

use IranLMS\Contracts\CourseRepositoryInterface;
use IranLMS\Contracts\ModuleInterface;
use IranLMS\Modules\Courses\Repository\CourseRepository;

final class CoursesModule implements ModuleInterface
{
    public function get_name(): string
    {
        return 'courses';
    }

    public function get_version(): string
    {
        return '1.0.0';
    }

    public function register(): void
    {
        if (function_exists('add_filter')) {
            add_filter('iran_lms/container_bindings', [$this, 'register_bindings']);
        }
    }

    public function boot(): void
    {
        // Course domain hooks and API routes are registered in their dedicated layers.
    }

    public function register_bindings(array $bindings): array
    {
        $bindings[CourseRepositoryInterface::class] = static fn ($container) => new CourseRepository(
            $container->get(\IranLMS\Infrastructure\Database\DatabaseManager::class)
        );

        return $bindings;
    }
}
