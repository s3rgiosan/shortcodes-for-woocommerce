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
    'taxonomy' => 'product_cat'  
  


## How can I use the "list subcategories from category" shortcode? ##

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
