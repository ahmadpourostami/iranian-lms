<?php
/**
 * Iran LMS Core Plugin.
 *
 * @package IranLMS\Core
 */

declare(strict_types=1);

namespace IranLMS\Core;

final class Plugin {
    private static ?self $instance = null;

    private bool $booted = false;

    private function __construct() {}

    public static function instance(): self {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function boot(): void {
        if ( $this->booted ) {
            return;
        }

        $this->booted = true;

        // Core services and modules will be registered here as their
        // implementation contracts are introduced.
    }
}
