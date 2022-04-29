<?php
/**
 * Plugin Name:       Sophi Debug Bar
 * Plugin URI:        https://github.com/10up/sophi-debug-bar
 * Description:       Sophi Debug Bar.
 * Version:           0.1.0
 * Requires at least: 5.6
 * Requires PHP:      7.4
 * Author:            10up
 * Author URI:        https://10up.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sophi-debug-bar
 *
 * @package           SophiDebugBar
 */

// Useful global constants.
define( 'SOPHI_DEBUG_BAR_VERSION', '0.1.0' );
define( 'SOPHI_DEBUG_BAR_URL', plugin_dir_url( __FILE__ ) );
define( 'SOPHI_DEBUG_BAR_PATH', plugin_dir_path( __FILE__ ) );
define( 'SOPHI_DEBUG_BAR_INC', SOPHI_DEBUG_BAR_PATH . 'includes/' );

if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
	TenUpToolkit\set_dist_url_path( basename( __DIR__ ), SOPHI_DEBUG_BAR_URL . 'dist/', SOPHI_DEBUG_BAR_PATH . 'dist/' );
}

// Require Composer autoloader if it exists.
if ( file_exists( SOPHI_DEBUG_BAR_PATH . 'vendor/autoload.php' ) ) {

	require_once SOPHI_DEBUG_BAR_PATH . 'vendor/autoload.php';
}

// Include files.
require_once SOPHI_DEBUG_BAR_INC . '/utility.php';
require_once SOPHI_DEBUG_BAR_INC . '/core.php';

// Activation/Deactivation.
register_activation_hook( __FILE__, '\SophiDebugBar\Core\activate' );
register_deactivation_hook( __FILE__, '\SophiDebugBar\Core\deactivate' );

// Bootstrap.
SophiDebugBar\Core\setup();
