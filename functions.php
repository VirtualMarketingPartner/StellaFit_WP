<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', PHP_INT_MAX );

function my_theme_enqueue_styles() {
    // $handle, $src, $dependencies, $version, $media
	$theme = wp_get_theme();
	wp_enqueue_style(
		'child-stylesheet',
		get_stylesheet_directory_uri() . '/library/sass/main.css?ver=' . date('hisA'),
		array('main-stylesheet'),
		false,
		'all'
	);
	wp_enqueue_script(
		'child-js',
		get_stylesheet_directory_uri() . '/library/js/main.js?ver=' . date('hisA'),
		array('jquery', 'bootstrap'),
		date('hisA'),
		'true' // load in the footer
	);
}

// Use Custom Editor Styles
function my_theme_add_editor_styles(){
  add_editor_style( '/library/sass/main.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


// Remove the excerpt "Read More" text 
function new_excerpt_more($more) {
       global $post;
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* ======================== 
   CUSTOM BACKEND MENUS 
======================== */


/* ======================== 
   CUSTOM SHORTCODES 
======================== */

//allow widgets to use shortcodes
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

//use fontawesome icons in shortcode
function icon_Shortcode($atts){
	$atts = shortcode_atts(
		array(
			'name' => '',
			'style' =>'s'
		), $atts
	);
	
	$name = $atts['name'];
	$style = $atts['style'];
	
	$icon .= '<i class="fa'. $style .' fa-';
	$icon .= $name;
	$icon .= ' "></i>';
	
	return $icon;
}
add_shortcode('icon', 'icon_Shortcode');



?>