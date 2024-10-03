<?php 

/**
 * @snippet     Display Products brands WooCommerce shop and archive pages
 * @author      Mahmudul Hasan
 * @Compatible  WooCommerce 5
 * @requires    Need "permalink" settings as "post name"
 */

// Function to create and register a custom taxonomy for product brand
function create_brand_taxonomy() {
    // Labels for the taxonomy
    $labels = array(
        'name'              => _x('Brands', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Brand', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Brands', 'textdomain'),
        'all_items'         => __('All Brands', 'textdomain'),
        'parent_item'       => __('Parent Brand', 'textdomain'),
        'parent_item_colon' => __('Parent Brand:', 'textdomain'),
        'edit_item'         => __('Edit Brand', 'textdomain'),
        'update_item'       => __('Update Brand', 'textdomain'),
        'add_new_item'      => __('Add New Brand', 'textdomain'),
        'new_item_name'     => __('New Brand Name', 'textdomain'),
        'menu_name'         => __('Brands', 'textdomain'),
    );

    // Register the taxonomy with WooCommerce products
    register_taxonomy('product_brands', 'product', array(
        'hierarchical'      => true, // Make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'brand'),
    ));
}

// Hook the function into the 'init' action
add_action('init', 'create_brand_taxonomy', 0);


/**
 * Functions of getting brand taxonomies as link and display in single product page
 * @return void
 */
function wc_brand_add_brand_name() {
    global $product;

    $terms = wp_get_post_terms( $product->get_id(), 'product_brands' );

    if (!empty($terms) && !is_wp_error($terms)) {
        $brand_links = array();

        // Loop through each brand terms and create an array 
        foreach ($terms as $term) {
            $term_link = get_term_link($term);

            if(!is_wp_error($term_link)){
                $brand_links[] = '<a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a>';
            }
        }
    }

    if(!empty($brand_links)){
        echo "<p> Brand: " . implode(', ', $brand_links ) . "</p>";
    }
}

add_action('woocommerce_single_product_summary', 'wc_brand_add_brand_name', 12);