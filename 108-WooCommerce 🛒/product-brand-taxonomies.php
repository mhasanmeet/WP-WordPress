<?php 

/**
 * @snippet     Function to create and register a custom taxonomy for product name as brand (or any taxonomies)
 * @author      Mahmudul Hasan
 * @Compatible  >WooCommerce 5
 * @requires    Need "permalink" settings as "post name"
 */
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
 * @snippet       Functions of getting brand taxonomies as link and display in single product page
 * @author        Mahmudul Hasan
 * @compatible    >WooCommerce 5
 * @return        void
 */
function wxs_show_brand_single_product() {
    global $product;

    // get products id & brands (as it is a term just like tag & categories)
    $terms = wp_get_post_terms( $product->get_id(), 'product_brands' );

    if (!empty($terms) && !is_wp_error($terms)) {
        // Initiate empty array to hold brand links
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
        echo "<p> Brands: " . implode(', ', $brand_links ) . "</p>";
    }
}

add_action('woocommerce_single_product_summary', 'wxs_show_brand_single_product', 12);



/**
 * @snippet       Display "Brands" in shop / archive page
 * @author        Mahmudul Hasan
 * @compatible    >WooCommerce 5
 */
function wxs_show_brand_in_shop() {
    global $post;

    // get post id & brands (as it is a term just like tag & categories)
    $terms = wp_get_post_terms( $post->ID, 'product_brands' );

    if (!empty($terms) && !is_wp_error($terms)) {
        // Initiate empty array to hold brand links
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
        echo "<p>" . implode(', ', $brand_links ) . "</p>";
    }
}

add_action( 'woocommerce_after_shop_loop_item_title', 'wxs_show_brand_in_shop', 13 );