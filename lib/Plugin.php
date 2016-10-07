<?php
/**
 * The file that defines the core plugin class
 *
 * @link       http://vint3.com
 * @since      1.0.0
 *
 * @package    WooCommerce
 * @subpackage Shortcodes/lib
 */

namespace Vint3\WooCommerce\Shortcodes;

/**
 * The core plugin class.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    WooCommerce
 * @subpackage Shortcodes/lib
 * @author     Vint3 <hello@vint3.com>
 */
class Plugin {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $name;

	/**
	 * The current version of the plugin.
	 *
	 * @since  1.0.0
	 * @access protected
	 * @var    string
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * @since 1.0.0
	 * @param string $name    Plugin name.
	 * @param string $version Plugin version.
	 */
	public function __construct( $name, $version ) {
		$this->name    = $name;
		$this->version = $version;
	}

	/**
	 * Load the dependencies, define the locale, and set the hooks for the Dashboard and
	 * the public-facing side of the site.
	 *
	 * @since 1.0.0
	 */
	public function run() {
		$this->define_shortcodes();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since  1.0.0
	 * @return string The name of the plugin.
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since  1.0.0
	 * @return string The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Register all of the shortcodes.
	 *
	 * @since  1.1.0 [subcategories_from_category].
	 * @since  1.0.0 [featured_products_by_category].
	 * @access private
	 */
	private function define_shortcodes() {
		$shortcode = new Shortcode( $this );

		// Featured products by category
		\add_shortcode( 'featured_products_by_category', array( $shortcode, 'featured_products_by_category' ) );

		// List subcategories from category
		\add_shortcode( 'subcategories_from_category', array( $shortcode, 'subcategories_from_category' ) );
	}
}
