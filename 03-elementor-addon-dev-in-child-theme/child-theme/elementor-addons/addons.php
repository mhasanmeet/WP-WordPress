<?php

function mhasan_theme_child_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/hello-world.php' );
	require_once( __DIR__ . '/widgets/team-members.php' );

	$widgets_manager->register( new \Mhasan_Elementor_Addon_Hello_World() );
	$widgets_manager->register( new \Team_Members() );

}

add_action( 'elementor/widgets/register', 'mhasan_theme_child_widget' );