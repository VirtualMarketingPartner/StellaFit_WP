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
	wp_enqueue_script(
		'tweenmax-gasp',
		'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js',
		array('jquery'),
		'true' // load in the footer
	);
	wp_enqueue_script(
		'scrollMagic',
		'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.js',
		array('jquery'),
		'true' // load in the footer
	);
	wp_enqueue_script(
		'animation-gasp',
		'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.js',
		array('jquery'),
		'true' // load in the footer
	);
	/* wp_enqueue_script(
		'dubug-Indicators',
		'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.js',
		array('jquery'),
		'true' // load in the footer
	); 
	*/
	wp_enqueue_script(
		'animations',
		get_stylesheet_directory_uri() . '/library/js/animations.js?ver=' . date('hisA'),
		array('jquery'),
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
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Support for Featured Images
add_theme_support( 'post-thumbnails' );


/* ======================== 
   CUSTOM BACKEND MENUS 
======================== */

add_action( 'admin_menu', 'custom_resources_menu' );  
function custom_resources_menu(){    
	$resources_page_title = 'Resources';   
	$resources_menu_title = 'Resources';   
	$resources_capability = 'manage_options';   
	$resources_menu_slug  = 'resources';   
	$resources_function   = 'post';   
	$resources_icon_url   = 'dashicons-open-folder';   
	$resources_position   = 22;    
	
	add_menu_page( 
		$resources_page_title,                  
		$resources_menu_title,                   
		$resources_capability,                   
		$resources_menu_slug,                   
		$resources_function,                   
		$resources_icon_url,                   
		$resources_position ); 
}

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



/* Redirecting User Access */
function my_login_redirect( $redirect_to, $request, $user ) {
    global $user;
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {

        if ( in_array( 'contributor', $user->roles ) ) {
            // redirect them to the default place

            return home_url();
        } else {
            return home_url();
        }
    } else {
        return $redirect_to;
    }
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

?>