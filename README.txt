=== Shortcodes for WooCommerce ===
Contributors: s3rgiosan, vint3  
Tags: woocommerce, shortcode, featured, product, category  
Requires at least: 4.0  
Tested up to: 4.6  
Stable tag: 1.2.3  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html  

Useful shortcodes for WooCommerce.  

== Description ==

A collection of useful shortcodes for WooCommerce.  

Shortcodes included:  

* Featured products by category  
* List subcategories from category  

== Installation ==

= Dashboard =

1. Go to the 'Plugins' menu, and choose 'Add New'.
2. Search for 'shortcodes-for-woocommerce', and then click 'Install Now'.
2. Click 'Activate'.

= FTP =

1. Download and extract the .zip file.
2. Upload the unzipped folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu.

= Composer =

`composer require vint3/shortcodes-for-woocommerce`

== Frequently Asked Questions ==

= Where can I report bugs? =

Bugs can be reported on the [GitHub repository](https://github.com/vint3creative/shortcodes-for-woocommerce/issues).

= How can I contribute? =

Join in on our [GitHub repository](https://github.com/vint3creative/shortcodes-for-woocommerce) and read our [contribution](https://github.com/vint3creative/shortcodes-for-woocommerce/blob/master/CONTRIBUTING.md) guidelines.

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
    'taxonomy' => 'product_cat'  
  


= How can I use the "list subcategories from category" shortcode? =  

`[subcategories_from_category category="CATEGORY_SLUG"]`  

Args:   

    'category'     => '',  // required  
    'orderby'      => 'name',  
    'order'        => 'asc',  
    'style'        => 'list',  
    'show_count'   => 0,  
    'hide_empty'   => 0,  
    'hierarchical' => 0,  
    'taxonomy'     => 'product_cat',  
    'show_title'   => 1,  
    'css_class'    => 'subcategories-from-category'  
  
== Changelog ==

= 1.2.3 =
* Added Code Climate integration.  
* Added moar badges (yes I am a badge poser).
* Added contribution guidelines.  
* Updated README. 

= 1.2.2 =
* Updated Codacy badge url. 

= 1.2.1 =
* Added Codacy (a tool for automated code review) badge.  

= 1.2.0 =
* Transfered the project ownership to Vint3. 
* Changed the class namespace. 
* Some other minor changes. 

= 1.1.3 =
* Minor changes.  
* Added language file. 

= 1.1.2 =
* Fix PSR-4 loader conflict with older implementation.  

= 1.1.1 =
* Added GitHub Updater support.  
* Added Update supported WordPress version.   

= 1.1.0 =
* [subcategories_from_category] shortcode.  

= 1.0.0 =
* [featured_products_by_category] shortcode.  
* Initial release.  

== Upgrade Notice ==

= 1.0 =  
Initial release.  
