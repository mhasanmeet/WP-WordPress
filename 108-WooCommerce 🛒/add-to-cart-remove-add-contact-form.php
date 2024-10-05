<?php 
/**
 * @snippet   Single product remove add to cart and add contact from instead for product inquiry
 * @author    Mahmudul Hasan   
 */

// Disable add to cart button for a specific product ID
add_action('woocommerce_single_product_summary', 'disable_add_to_cart_button', 1);

function disable_add_to_cart_button() {
    global $product;
    
    // Replace with your product ID
    $product_id = 123;

    if ($product->get_id() == $product_id) {
        // Remove the add to cart button
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
    }
}
