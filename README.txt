=== Shortcodes for WooCommerce ===
Contributors: s3rgiosan  
Tags: woocommerce, shortcode, featured, product, category  
Requires at least: 4.0  
Tested up to: 4.2.2  
Stable tag: trunk  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  

Useful shortcodes for WooCommerce.  

== Description ==

Shortcodes included:  

* Featured products by category.


[Bug report](https://github.com/s3rgiosan/shortcodes-for-woocommerce/issues)  
[Source](https://github.com/s3rgiosan/shortcodes-for-woocommerce)  

== Frequently Asked Questions ==  

= How can I use shortcodes in WooCommerce? =  

Visit [Shortcodes included with WooCommerce](https://docs.woothemes.com/document/woocommerce-shortcodes/) for additional information.  

= How can I use the "featured products by category" shortcode? =  

`[featured_products_by_category category="CATEGORY_SLUG"]`  

Args:   

    'per_page' => '12',  
    'columns'  => '3',  
    'orderby'  => 'title',  
    'order'    => 'desc',  
    'category' => '',  // required
    'operator' => 'IN',  
    'taxonomy' => 'product_cat',  
  

== Installation ==

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `shortcodes-for-woocommerce.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `shortcodes-for-woocommerce.zip`
2. Extract the `shortcodes-for-woocommerce` directory to your computer
3. Upload the `shortcodes-for-woocommerce` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard

= Usage =

See the [FAQ](https://wordpress.org/plugins/shortcodes-for-woocommerce/faq/) for more details.  

== Changelog ==

= 1.0.0 =
* Initial release.  

== Upgrade Notice ==

= 1.0 =  
Initial release.  
