# Frequently Asked Questions #

## How can I use shortcodes in WooCommerce? ##

Visit [Shortcodes included with WooCommerce](https://docs.woothemes.com/document/woocommerce-shortcodes/) for additional information.  

## How can I use the "featured products by category" shortcode? ##

`[featured_products_by_category category="CATEGORY_SLUG"]`  

Args:   

    'per_page' => '12',  
    'columns'  => '3',  
    'orderby'  => 'title',  
    'order'    => 'desc',  
    'category' => '',  // required
    'operator' => 'IN',  
    'taxonomy' => 'product_cat',
