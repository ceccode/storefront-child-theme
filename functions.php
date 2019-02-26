<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function storefront_child_enqueue_styles() {
 
    $parent_style = 'parent-style'; // This is 'storefront-style' for the Storefront theme.
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'storefront_child_enqueue_styles' );

function storefront_child_theme_textdomain() {
    load_child_theme_textdomain( 'storefront_child', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'storefront_child_theme_textdomain' );
