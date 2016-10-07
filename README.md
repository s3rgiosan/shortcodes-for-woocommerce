# Shortcodes for WooCommerce #
**Contributors:** s3rgiosan, vint3    
**Tags:** woocommerce, shortcode, featured, product, category    
**Requires at least:** 4.0    
**Tested up to:** 4.6    
**Stable tag:** 1.2.0    
**License:** GPLv2 or later    
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html    

Useful shortcodes for WooCommerce.  

## Description ##

Shortcodes included:  

* Featured products by category  
* List subcategories from category  


[Bug report](https://github.com/vint3creative/shortcodes-for-woocommerce/issues)  
[Source](https://github.com/vint3creative/shortcodes-for-woocommerce)  

## Frequently Asked Questions ##

### How can I use shortcodes in WooCommerce? ###

Visit [Shortcodes included with WooCommerce](https://docs.woothemes.com/document/woocommerce-shortcodes/) for additional information.  

### How can I use the "featured products by category" shortcode? ###

`[featured_products_by_category category="CATEGORY_SLUG"]`  

Args:   

    'per_page' => '12',  
    'columns'  => '3',  
    'orderby'  => 'title',  
    'order'    => 'desc',  
    'category' => '',  // required  
    'operator' => 'IN',  
    'taxonomy' => 'product_cat'  
  


### How can I use the "list subcategories from category" shortcode? ###

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
  

## Installation ##

### Uploading in WordPress Dashboard ###

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `shortcodes-for-woocommerce.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

### Using FTP ###

1. Download `shortcodes-for-woocommerce.zip`
2. Extract the `shortcodes-for-woocommerce` directory to your computer
3. Upload the `shortcodes-for-woocommerce` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard

### Usage ###

See the [FAQ](https://wordpress.org/plugins/shortcodes-for-woocommerce/faq/) for more details.  

## Changelog ##

### 1.2.0 ###
* Transfered the project ownership to Vint3. 
* Changed the class namespace. 
* Some other minor changes. 

### 1.1.3 ###
* Minor changes.  
* Added language file. 

### 1.1.2 ###
* Fix PSR-4 loader conflict with older implementation.  

### 1.1.1 ###
* Added GitHub Updater support.  
* Added Update supported WordPress version.   

### 1.1.0 ###
* [subcategories_from_category] shortcode.  

### 1.0.0 ###
* [featured_products_by_category] shortcode.  
* Initial release.  

## Upgrade Notice ##

### 1.0 ###
Initial release.  
