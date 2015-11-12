<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link       https://github.com/s3rgiosan/shortcodes-for-woocommerce/
 * @since      1.0.0
 *
 * @package    WooCommerce
 * @subpackage Shortcodes/lib
 */

namespace s3rgiosan\WooCommerce\Shortcodes;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    WooCommerce
 * @subpackage Shortcodes/lib
 * @author     Sérgio Santos <me@s3rgiosan.com>
 */
class Plugin {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string    $pluginname    The string used to uniquely identify this plugin.
	 */
	protected $pluginname = 'shortcodes-for-woocommerce';

	/**
	 * The current version of the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string    $version    The current version of the plugin.
	 */
	protected $version = '1.0.0';

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
	}

	/**
	 * Register all of the shortcodes.
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function define_shortcodes() {
		$shortcode = new Shortcode( $this );
		\add_shortcode( 'featured_products_by_category', array( $shortcode, 'featured_products_by_category' ) );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->define_shortcodes();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->pluginname;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
