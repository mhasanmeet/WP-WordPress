<?php

/**
 * WooCommerce admin products list: remove Product Type, Stock Status, and Brand filters;
 * add "Search by featured products" filter instead.
 * 
 * Put the code into theme (or child theme's) functions.php
 */
add_filter( 'woocommerce_products_admin_list_table_filters', 'woodmart_child_admin_product_filters', 20 );
function woodmart_child_admin_product_filters( $filters ) {
	// Remove the three filters.
	unset( $filters['product_type'] );
	unset( $filters['stock_status'] );
	unset( $filters['product_brand'] );
	// Add featured products filter.
	$filters['featured'] = 'woodmart_child_render_featured_products_filter';
	return $filters;
}

add_filter( 'manage_edit-product_columns', 'woodmart_child_remove_product_columns', 20 );
function woodmart_child_remove_product_columns( $columns ) {
	unset( $columns['product_cat'], $columns['product_tag'], $columns['product_brand'], $columns['product_brands'] );
	return $columns;
}

/**
 * Render the "Filter by featured products" dropdown on Products list screen.
 */
function woodmart_child_render_featured_products_filter() {
	$current = isset( $_REQUEST['featured_products'] ) ? wc_clean( wp_unslash( $_REQUEST['featured_products'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	?>
	<select name="featured_products" id="dropdown_featured_products">
		<option value=""><?php esc_html_e( 'Filter by featured', 'woodmart' ); ?></option>
		<option value="yes" <?php selected( $current, 'yes' ); ?>><?php esc_html_e( 'Featured products', 'woodmart' ); ?></option>
		<option value="no" <?php selected( $current, 'no' ); ?>><?php esc_html_e( 'Non-featured', 'woodmart' ); ?></option>
	</select>
	<?php
}

/**
 * Apply featured filter to the products list query in admin.
 */
add_filter( 'request', 'woodmart_child_admin_featured_products_request', 11 );
function woodmart_child_admin_featured_products_request( $query_vars ) {
	global $pagenow, $typenow;

	if ( 'edit.php' !== $pagenow || 'product' !== $typenow ) {
		return $query_vars;
	}

	$featured = isset( $_REQUEST['featured_products'] ) ? wc_clean( wp_unslash( $_REQUEST['featured_products'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( '' === $featured ) {
		return $query_vars;
	}

	if ( ! isset( $query_vars['tax_query'] ) || ! is_array( $query_vars['tax_query'] ) ) {
		$query_vars['tax_query'] = array();
	}

	$query_vars['tax_query'][] = array(
		'taxonomy' => 'product_visibility',
		'field'    => 'name',
		'terms'    => array( 'featured' ),
		'operator' => 'yes' === $featured ? 'IN' : 'NOT IN',
	);

	return $query_vars;
}