<?php 

/**
 * @snippet       Show Total Sales @ WooCommerce Single Product
 * @author        Mahmudul Hasan
 * @compatible    >Woo 4.5
 */
  
 function wxs_product_sold_count() {
    global $product;
    $units_sold = $product->get_total_sales();
    if ( $units_sold ) echo '<p>' . sprintf( __( 'Units Sold: %s', 'woocommerce' ), $units_sold ) . '</p>';
}

add_action( 'woocommerce_single_product_summary', 'wxs_product_sold_count', 11 );