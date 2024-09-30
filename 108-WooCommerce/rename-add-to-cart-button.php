<?php 

/**
 * @snippet       Change "Add to cart" Button text @ Woo Shop / Single
 * @compatible    WooCommerce 8
 */

/* 
    "add_filter" is a core WordPress function, use to modify the behavior of existing function by 
    attaching a custom function to a filter hook. 
    
    And "9999" is a priority number in function hooks. While default priority number is 10, and a higher 
    priority number means the function will execute later. Here using "9999" ensures that function is 
    last to modify and override most other modification. 
*/
add_filter( 'woocommerce_product_single_add_to_cart_text', 'wxs_custom_add_cart_button', 9999 ); 
add_filter( 'woocommerce_product_add_to_cart_text', 'wxs_custom_add_cart_button', 9999 );

function wxs_custom_add_cart_button() {
    return 'Order Now';
}
 
