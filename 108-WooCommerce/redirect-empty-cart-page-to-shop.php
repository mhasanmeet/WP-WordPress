<?php 

/**
 * @snippet       Redirect Empty WooCommerce Cart Page
 * @author        Mahmudul Hasan
 */
 
add_action( 'template_redirect', 'wxs_redirect_empty_cart', 9999 );
function wxs_redirect_empty_cart() {

    // check if current page is cart page & WooCommerce cart is empty
    if ( is_cart() && WC()->cart->is_empty() ) {

        // if true then redirect to shop page
        wp_safe_redirect( wc_get_page_permalink( 'shop' ) );
        // OR wp_safe_redirect( 'https://example.com' );
        exit;
    }
}
 