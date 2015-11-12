<?php

/**
 * Shortcodes for WooCommerce
 *
 * Useful shortcodes for WooCommerce.
 *
 * @link              http://s3rgiosan.com/
 * @since             1.0.0
 * @package           WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Shortcodes for WooCommerce
 * Plugin URI:        https://github.com/s3rgiosan/shortcodes-for-woocommerce/
 * Description:       Useful shortcodes for WooCommerce.
 * Version:           1.0.0
 * Author:            Sérgio Santos
 * Author URI:        http://s3rgiosan.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       shortcodes-for-woocommerce
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use s3rgiosan\WooCommerce\Shortcodes;

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
\add_action( 'plugins_loaded', function () {
    $plugin = new Shortcodes\Plugin();
    $plugin->run();
} );
