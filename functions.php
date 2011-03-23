<?php
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Left Top Sidebar',
    		'id'   => 'left-top-sidebar',
    		'description'   => 'These are widgets for upper left sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));

		register_sidebar(array(
    		'name' => 'Right Top Sidebar',
    		'id'   => 'right-top-sidebar',
    		'description'   => 'These are widgets for the upper right sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));

		register_sidebar(array(
    		'name' => 'Left bottom Sidebar',
    		'id'   => 'left-bottom-sidebar',
    		'description'   => 'These are widgets for lower left sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));

		register_sidebar(array(
    		'name' => 'Right Bottom Sidebar',
    		'id'   => 'right-bottom-sidebar',
    		'description'   => 'These are widgets for the lower right sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }

    add_action('init', 'register_custom_menu');
 
    function register_custom_menu() {
	register_nav_menu('custom_menu', __('Custom Menu'));
    }

	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'week_highlights' => 'Week Highlights',
	  		  'festivities' => 'July 4th Festivities',
			  'main_menu' => 'Main Menu',
			  'quick_links' => 'Quick Links'
	  		)
	  	);
	}

	if ( function_exists( 'add_theme_support' ) ) { 
	  add_theme_support( 'post-thumbnails' ); 
	}

?>