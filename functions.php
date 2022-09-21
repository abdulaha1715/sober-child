<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


function child_sober_scripts() {
	wp_enqueue_style( 'child-sober', get_stylesheet_directory_uri() . '/style.css', array(), the_time() );
	wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/js/child-theme-script.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'child_sober_scripts' );