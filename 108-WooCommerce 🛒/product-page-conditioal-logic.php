<?php 

/**
 * WooCommerce Page Conditional Logics
 * @author Mahmudul Hasan
 * @source Business Bloomers
 */

// Print some text top of single product for specific product
function wxs_echo_text() {
    global $product;

    $product_id = 116;
    
    if ( $product_id === $product->get_id() ) {
        echo 'SOME TEXT';
   }
}

add_action( 'woocommerce_before_single_product', 'wxs_echo_text' );



// Do something on single product page only
function wxs_single_product_pages() {
    
    // if it is single product page then execute your code otherwise not
    if ( is_product() ) {
        echo 'Something';
    } else {
        echo 'Something else';
    }
}

add_action( 'woocommerce_before_main_content', 'wxs_single_product_pages' );



// Do something on products category
function wxs_single_category_slug() {
    if ( has_term( 'chairs', 'product_cat' ) ) {
        echo 'Something';
    } elseif ( has_term( 'tables', 'product_cat' ) ) {
        echo 'Something else';
    }
}

add_action( 'woocommerce_after_single_product_summary', 'wxs_single_category_slug' );



// Do something on products tag
function wxs_single_tag_slug() {
    
    if ( has_term( 'blue', 'product_tag' ) ) {
        echo 'Something';
    } elseif ( has_term( 'red', 'product_tag' ) ) {
        echo 'Something else';
    }
}

add_action( 'woocommerce_after_single_product_summary', 'wxs_single_tag_slug' );




// Do something if products on sale
function wxs_single_on_sale() {
    global $product;

    if ( $product->is_on_sale() ) {
        // do something
    }
}

add_action( 'woocommerce_after_single_product_summary', 'wxs_single_on_sale' );





// Do something if product type is simple, variable, external, grouped, virtual, downloadable
function wxs_single_product_type() {
    global $product;

    if( $product->is_type( 'simple' ) ){
        // do something
    } elseif( $product->is_type( 'variable' ) ){
    // do something
    } elseif( $product->is_type( 'external' ) ){
        // do something
    } elseif( $product->is_type( 'grouped' ) ){
        // do something
    } else if ($product->is_virtual()){
        // do something
    } else if ($product->is_downloadable()){
        // do something
    }
}

add_action( 'woocommerce_after_single_product_summary', 'wxs_single_product_type' );




// Do something on cart & checkout pages
function wxs_cart_checkout() {
    if ( is_cart() ) {
        echo 'This will show on the Cart sidebar';
    } elseif ( is_checkout() ) {
        echo 'This will show on the Checkout sidebar';
    }
}

add_action( 'woocommerce_sidebar', 'wxs_cart_checkout' );




// Do something on Checkout Order Pay page
function wxs_orderpay() {
   if ( is_checkout_pay_page() ) {
      echo 'This will show on Order Pay page';
   } else {
      echo 'This will show on all other pages';
    }
}

add_action( 'hook', 'wxs_orderpay' );




// Do something if on My Account pages
function wxs_myaccount() {
    if ( is_account_page() ) {
        echo 'This will show on My Account pages';
    } else {
        echo 'This will show on pages different than My Account';
    }
}

add_action( 'hook', 'wxs_myaccount' );




// Do something if on Thank You Page
function wxs_run_function_thankyou_page() {
    // whatever
}

add_action( 'woocommerce_thankyou', 'wxs_run_function_thankyou_page' );
