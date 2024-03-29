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

// register menus	
function register_child_menus() {
	register_nav_menus(
		array(
			'footer_menu' => __('Footer Menu'),
		)
	);
}
add_action('init', 'register_child_menus');

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

function print_menu_shortcode($atts, $content = null) {
	extract(shortcode_atts(array( 'name' => null, 'class' => null ), $atts));
	return wp_nav_menu( array( 'menu' => $name, 'menu_class' => 'menu', 'echo' => false ) );
	}
	
	add_shortcode('menu', 'print_menu_shortcode');



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






// Disable Comments
add_action('admin_init', function () {
    // Redirect any user trying to access comments page
    global $pagenow;
     
    if ($pagenow === 'edit-comments.php') {
        wp_safe_redirect(admin_url());
        exit;
    }
 
    // Remove comments metabox from dashboard
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
 
    // Disable support for comments and trackbacks in post types
    foreach (get_post_types() as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
 
// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
 
// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);
 
// Remove comments page in menu
add_action('admin_menu', function () {
    remove_menu_page('edit-comments.php');
});
 
// Remove comments links from admin bar
add_action('init', function () {
    if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
});


?>