<?php

/**
 * Load scripts.
 */
function react_theme_enqueue_styles() {

	$parent_style = 'parent-style'; // This is 'twentysixteen-style' for the Twenty Sixteen theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);

	// Load scripts when in production.
	wp_enqueue_script(
		'react-theme-js',
		get_stylesheet_directory_uri() . '/bundle.js',
		array( 'wp-element' ),
		filemtime( get_stylesheet_directory() . '/bundle.js' ),
		true
	);

	// Load scripts when in development.
	// wp_enqueue_script(
	// 	'react-theme-js',
	// 	'http://localhost:8083' . '/bundle.js',
	// 	array( 'wp-element' ),
	// 	time(),
	// 	true
	// );
}

add_action( 'wp_enqueue_scripts', 'react_theme_enqueue_styles' );