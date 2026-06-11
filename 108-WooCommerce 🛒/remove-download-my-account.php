<?php

// remove "downloads" section from My Account
add_filter( 'woocommerce_account_menu_items', function( $items ) {
	unset( $items['downloads'] );
	return $items;
} );