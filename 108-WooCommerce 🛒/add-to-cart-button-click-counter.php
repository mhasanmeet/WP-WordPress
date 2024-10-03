<?php 

/**
 * @snippet       Add Cart Button Click Counter in WooCommerce Single Product Page
 * @author        Mahmudul Hasan
 * @compatible    WooCommerce 9
 */
 
add_action( 'woocommerce_before_single_product', 'wxs_add_to_cart_button_click_counter' );
 
// "add to cart" button click counter by JS
function wxs_add_to_cart_button_click_counter() {

    // wc_enqueue_js() is a WooCommerce utility function used to enqueue custom JavaScript 
    wc_enqueue_js( "
        $('.single_add_to_cart_button').click(function(e){
            $.post( '" . '/wp-admin/admin-ajax.php' . "', { action: 'add_cart_clicked', pid: $(this).attr('value') } );       
        });
    " );
}
  
add_action( 'wp_ajax_add_cart_clicked', 'wxs_add_cart_clicked' );
add_action( 'wp_ajax_nopriv_add_cart_clicked', 'wxs_add_cart_clicked' );
   
function wxs_add_cart_clicked() { 
    $pid = $_POST['pid'];
    $times_added_to_cart = (int) get_post_meta( $pid, 'add_cart_clicks', true ) ?? 0;
    update_post_meta( $pid, 'add_cart_clicks', $times_added_to_cart + 1 );     
    wp_die();
}


/**
 * @snippet       Add Cart Button Click Stats @ WooCommerce Product Admin
 * @author        Mahmudul Hasan
 * @compatible    WooCommerce 9
 */
 
add_action( 'add_meta_boxes', 'wxs_product_meta_box_add_cart_clicks' );
  
function wxs_product_meta_box_add_cart_clicks() {
    add_meta_box( 'add_cart_stats', 'Add to Cart Stats', 'wxs_display_add_cart_stats', 'product', 'advanced', 'high' );
}
   
function wxs_display_add_cart_stats() {
    global $post;
    $product = wc_get_product( $post->ID );
    $units_sold = $product->get_total_sales();
    $times_added_to_cart = (int) get_post_meta( $post->ID, 'add_cart_clicks', true );
        if ( ! $times_added_to_cart ) {
            echo '<p>No data available</p>';
            return;
        }
    $conversion = 100 * $units_sold / $times_added_to_cart;
    echo '<p>Times added to cart: ' . $times_added_to_cart . '</p>';
    echo '<p>Sales: ' . $units_sold . '</p>'; 
    echo '<p>Conversion rate: ' . number_format( $conversion, 2 ) . '%</p>';
}
 
 