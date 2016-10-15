<?php
/**
 * Shortcodes for WooCommerce
 *
 * Useful shortcodes for WooCommerce.
 *
 * @link    http://vint3.com
 * @since   1.0.0
 *
 * @package WooCommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Shortcodes for WooCommerce
 * Plugin URI:        https://github.com/vint3creative/shortcodes-for-woocommerce/
 * Description:       Useful shortcodes for WooCommerce.
 * Version:           1.2.3
 * Author:            Vint3
 * Author URI:        http://vint3.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       shortcodes-for-woocommerce
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/vint3creative/shortcodes-for-woocommerce
 * GitHub Branch:     master
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

use Vint3\WooCommerce\Shortcodes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Begins execution of the plugin.
 *
 * @since 1.0.0
 */
\add_action( 'plugins_loaded', function () {
	$plugin = new Shortcodes\Plugin( 'shortcodes-for-woocommerce', '1.2.3' );
	$plugin->run();
} );
