<?php
/**
 * Plugin Name: Iran LMS
 * Plugin URI: https://github.com/ahmadpourostami/iranian-lms
 * Description: A modular, API-first Learning Management System for WordPress.
 * Version: 0.1.0
 * Requires at least: 6.0
 * Requires PHP: 8.1
 * Author: Ahmad Pourostami
 * Author URI: https://github.com/ahmadpourostami
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: iran-lms
 * Domain Path: /languages
 *
 * @package IranLMS
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'IRAN_LMS_VERSION', '0.1.0' );
define( 'IRAN_LMS_FILE', __FILE__ );
define( 'IRAN_LMS_DIR', plugin_dir_path( __FILE__ ) );
define( 'IRAN_LMS_URL', plugin_dir_url( __FILE__ ) );

/**
 * Start the Iran LMS application.
 *
 * The bootstrap is intentionally kept free of business logic. Application
 * services and modules are initialized by the Core layer.
 *
 * @return void
 */
function iran_lms_bootstrap(): void {
    $autoload = IRAN_LMS_DIR . 'vendor/autoload.php';

    if ( ! file_exists( $autoload ) ) {
        add_action(
            'admin_notices',
            static function (): void {
                if ( ! current_user_can( 'activate_plugins' ) ) {
                    return;
                }

                echo '<div class="notice notice-error"><p>';
                echo esc_html__(
                    'Iran LMS cannot start because its dependencies are not installed.',
                    'iran-lms'
                );
                echo '</p></div>';
            }
        );

        return;
    }

    require_once $autoload;

    if ( class_exists( '\IranLMS\Core\Plugin' ) ) {
        \IranLMS\Core\Plugin::instance()->boot();
    }
}

add_action( 'plugins_loaded', 'iran_lms_bootstrap' );
