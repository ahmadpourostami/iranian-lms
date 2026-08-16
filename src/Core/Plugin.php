<?php
/**
 * Iran LMS Core Plugin.
 *
 * @package IranLMS\Core
 */

declare(strict_types=1);

namespace IranLMS\Core;

use IranLMS\Infrastructure\Database\DatabaseManager;
use RuntimeException;

final class Plugin
{
    private static ?self $instance = null;
    private bool $booted = false;
    private Container $container;
    private ModuleRegistry $modules;

    private function __construct()
    {
        $this->container = new Container();
        $this->modules = new ModuleRegistry();
        $this->container->instance(Container::class, $this->container);
        $this->container->instance(ModuleRegistry::class, $this->modules);
    }

    public static function instance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function boot(): void
    {
        if ($this->booted) {
            return;
        }

        $this->register_core_services();
        $this->register_modules();
        $this->register_module_services();
        $this->modules->boot_all();
        $this->booted = true;

        do_action('iran_lms/booted', $this);
    }

    public function container(): Container
    {
        return $this->container;
    }

    public function modules(): ModuleRegistry
    {
        return $this->modules;
    }

    private function register_core_services(): void
    {
        global $wpdb;

        if (!is_object($wpdb)) {
            throw new RuntimeException('WordPress database connection is unavailable.');
        }

        $this->container->singleton(
            DatabaseManager::class,
            static fn (): DatabaseManager => new DatabaseManager($wpdb)
        );
    }

    private function register_modules(): void
    {
        do_action('iran_lms/register_modules', $this->modules);
    }

    private function register_module_services(): void
    {
        do_action('iran_lms/register_services', $this->container);
    }
}
