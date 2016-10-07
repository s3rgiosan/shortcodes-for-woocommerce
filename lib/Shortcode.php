<?php
/**
 * The shortcode functionality of the plugin.
 *
 * @link       http://vint3.com
 * @since      1.0.0
 *
 * @package    WooCommerce
 * @subpackage Shortcodes/lib
 */

namespace Vint3\WooCommerce\Shortcodes;

/**
 * The shortcode functionality of the plugin.
 *
 * @since      1.0.0
 * @package    WooCommerce
 * @subpackage Shortcodes/lib
 * @author     Vint3 <hello@vint3.com>
 */
class Shortcode {

	/**
	 * The plugin's instance.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    Plugin
	 */
	private $plugin;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 1.0.0
	 * @param Plugin $plugin This plugin's instance.
	 */
	public function __construct( Plugin $plugin ) {
		$this->plugin = $plugin;
	}

	/**
	 * Display featured products by category.
	 *
	 * @since  1.0.0
	 * @param  array $atts User defined attributes in shortcode tag.
	 * @return string      Shortcode markup.
	 */
	public function featured_products_by_category( $atts ) {

		if ( ! $this->is_woocommerce_active() ) {
			return;
		}

		$atts = \shortcode_atts(
			array(
				'per_page'      => '12',
				'category'      => '',
				'orderby'       => 'title',
				'order'         => 'desc',
				'ignore_sticky' => 1,
				'operator'      => 'IN',
				'taxonomy'      => 'product_cat',
				'columns'       => '3'
			),
			$atts
		);

		$per_page      = \sanitize_key( $atts['per_page'] );
		$category      = \sanitize_title( $atts['category'] );
		$orderby       = \sanitize_key( $atts['orderby'] );
		$order         = \sanitize_key( $atts['order'] );
		$ignore_sticky = \sanitize_key( $atts['ignore_sticky'] );
		$operator      = \sanitize_key( $atts['operator'] );
		$taxonomy      = \sanitize_text_field( $atts['taxonomy'] );

		if ( empty( $category ) ) {
			return '';
		}

		// Query args
		$query_args = array(
			'posts_per_page'      => $per_page,
			'orderby'             => $orderby,
			'order'               => $order,
			'post_type'           => array( 'product' ),
			'post_status'         => 'publish',
			'ignore_sticky_posts' => $ignore_sticky,
			'tax_query'           => array(
				array(
					'taxonomy' => $taxonomy,
					'terms'    => $category,
					'field'    => 'slug',
					'operator' => $operator
				)
			),
			'meta_query' => array(
				array(
					'key'     => '_visibility',
					'value'   => array( 'catalog', 'visible' ),
					'compare' => 'IN'
				),
				array(
					'key'     => '_featured',
					'value'   => 'yes'
				)
			)
		);

		// Force 'product' custom post type...just in case :-)
		if ( ! in_array( 'product', $query_args['post_type'] ) ) {
			$query_args['post_type'][] = 'product';
		}

		return $this->get_products( $query_args, $atts );
	}

	/**
	 * List subcategories from category.
	 *
	 * @since  1.1.0
	 * @param  array $atts User defined attributes in shortcode tag.
	 * @return string      Shortcode markup.
	 */
	public function subcategories_from_category( $atts ) {

		if ( ! $this->is_woocommerce_active() ) {
			return;
		}

		$atts = \shortcode_atts(
			array(
				'category'     => '',
				'orderby'      => 'name',
				'order'        => 'asc',
				'style'        => 'list',
				'show_count'   => 0,
				'hide_empty'   => 0,
				'hierarchical' => 0,
				'taxonomy'     => 'product_cat',
				'show_title'   => 1,
				'css_class'    => 'subcategories-from-category'
			),
			$atts
		);

		$category     = \sanitize_title( $atts['category'] );
		$orderby      = \sanitize_key( $atts['orderby'] );
		$order        = \sanitize_key( $atts['order'] );
		$style        = \sanitize_key( $atts['style'] );
		$show_count   = \sanitize_key( $atts['show_count'] );
		$hide_empty   = \sanitize_key( $atts['hide_empty'] );
		$hierarchical = \sanitize_key( $atts['hierarchical'] );
		$taxonomy     = \sanitize_text_field( $atts['taxonomy'] );
		$show_title   = \sanitize_key( $atts['show_title'] );
		$css_class    = \sanitize_text_field( $atts['css_class'] );

		if ( empty( $category ) ) {
			return '';
		}

		$term = \get_term_by( 'slug', $category, $taxonomy );

		if ( ! $term ) {
			return '';
		}

		// Query args
		$args = array(
			'orderby'      => $orderby,
			'order'        => $order,
			'style'        => $style,
			'show_count'   => $show_count,
			'hide_empty'   => $hide_empty,
			'child_of'     => $term->term_id,
			'hierarchical' => $hierarchical,
			'title_li'     => $show_title ? $term->name : '',
			'echo'         => 0,
			'taxonomy'     => $taxonomy,
			'walker'       => \apply_filters( 'woocommerce_shortcode_subcategories_from_category_walker', new \Walker_Category, $atts )
		);

		// Get categories
		$categories = \wp_list_categories( $args );

		return sprintf(
			'<ul class="%s">%s</ul>',
			esc_attr( $css_class ),
			\apply_filters( 'woocommerce_shortcode_subcategories_from_category', $categories )
		);
	}

	/**
	 * Check if WooCommerce is active.
	 *
	 * @since 1.0.0
	 */
	private function is_woocommerce_active() {
		return in_array( 'woocommerce/woocommerce.php', \apply_filters( 'active_plugins', \get_option( 'active_plugins' ) ) );
	}

	/**
	 * Loop over found products.
	 *
	 * @since  1.0.0
	 * @param  array $query_args \WP_Query arguments.
	 * @param  array $atts       User defined attributes in shortcode tag.
	 * @return string            Current buffer contents.
	 */
	private function get_products( $query_args, $atts ) {
		global $woocommerce_loop;

		$category = \sanitize_title( $atts['category'] );
		$taxonomy = \sanitize_text_field( $atts['taxonomy'] );
		$columns  = absint( $atts['columns'] );

		$woocommerce_loop['columns'] = $columns;

		$products = new \WP_Query( $query_args );

		ob_start();

		if ( $products->have_posts() ) {

			\do_action( 'woocommerce_shortcode_before_featured_products_by_category', $category, $taxonomy );

			\woocommerce_product_loop_start();

			while ( $products->have_posts() ) {
				$products->the_post();
				\wc_get_template_part( 'content', 'product' );
			}

			\woocommerce_product_loop_end();

			\do_action( 'woocommerce_shortcode_after_featured_products_by_category', $category, $taxonomy );

		}

		\woocommerce_reset_loop();
		\wp_reset_postdata();

		return '<div class="woocommerce columns-' . $columns . '">' . ob_get_clean() . '</div>';
	}
}
