<?php

declare(strict_types=1);

namespace IranLMS\Modules\Courses;

use IranLMS\Contracts\ModuleInterface;
use IranLMS\Core\Container;
use IranLMS\Infrastructure\Database\DatabaseManager;
use IranLMS\Modules\Courses\Repository\CourseRepository;
use IranLMS\Modules\Courses\Service\CourseService;

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
        add_action('iran_lms/register_services', [$this, 'register_services']);
    }

    public function boot(): void
    {
        // Transport adapters and domain event subscribers are registered in their own layers.
    }

    public function register_services(Container $container): void
    {
        $container->singleton(
            CourseRepository::class,
            static fn (Container $container): CourseRepository => new CourseRepository(
                $container->get(DatabaseManager::class)
            )
        );

        $container->singleton(
            CourseService::class,
            static fn (Container $container): CourseService => new CourseService(
                $container->get(CourseRepository::class)
            )
        );
    }
}
