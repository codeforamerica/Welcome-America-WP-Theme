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
    
	// Set up all of the sidebars
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Left Top Sidebar',
    		'id'   => 'left-top-sidebar',
    		'description'   => 'These are widgets for upper left sidebar.',
    		'before_widget' => '<div id="%1$s" class="uplt-widgets widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));

		register_sidebar(array(
    		'name' => 'Right Top Sidebar',
    		'id'   => 'right-top-sidebar',
    		'description'   => 'These are widgets for the upper right sidebar.',
    		'before_widget' => '<div id="%1$s" class="uprt-widgets widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));

		register_sidebar(array(
    		'name' => 'Left bottom Sidebar',
    		'id'   => 'left-bottom-sidebar',
    		'description'   => 'These are widgets for lower left sidebar.',
    		'before_widget' => '<div id="%1$s" class="lwlt-widgets widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));

		register_sidebar(array(
    		'name' => 'Right Bottom Sidebar',
    		'id'   => 'right-bottom-sidebar',
    		'description'   => 'These are widgets for the lower right sidebar.',
    		'before_widget' => '<div id="%1$s" class="lwrt-widgets widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
		register_sidebar(array(
    		'name' => 'Sponsors',
    		'id'   => 'sponsor-widgets',
    		'description'   => 'These are widgets will go in the sticky footer.',
    		'before_widget' => '<div id="%1$s" class="sponsor-widgets widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));

		register_sidebar(array(
			'name' => 'Footer menu',
			'id'   => 'footer-widgets',
			'description'   => 'This is where your footer menu will live',
			'before_widget' => '<div id="%1$s" class="footer-widgets widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>'
		));
    }
    add_action('init', 'register_custom_menu');
 
	// This 'custom menu' code was in the original template.
	// I'm not familiar enough with wp menus to know if it should be here or not. -JM
    function register_custom_menu() { register_nav_menu('custom_menu', __('Custom Menu')); }

	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'week_highlights' => 'Week Highlights',
	  		  'festivities' => 'July 4th Festivities',
			  'main_menu' => 'Main Menu',
			  'quick_links' => 'Quick Links',
			  'footer_menu' => 'Footer Menu'
	  		)
	  	);
	}

	// Turn on the 'featured image' capability
	if ( function_exists( 'add_theme_support' ) ) { add_theme_support( 'post-thumbnails' ); }
	
	// Some pages on this site need iframes and this filter will stop the wysiwyg editor from stripping out the iframe html
	function add_iframe($initArray) {
		$initArray['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
		return $initArray;
	}
	add_filter('tiny_mce_before_init', 'add_iframe');
	
	function get_the_category_thumbnail( $id ) {
		$embed = '';
		$posts = get_posts('cat='.$id.'&showposts=1&meta_key=_thumbnail_id');
		foreach( $posts as $post ) { 
			setup_postdata($post);
			$imageid = get_post_thumbnail_id($post->ID);
			$embed = '<img src="'.wp_get_attachment_thumb_url($imageid).'" alt="'.get_the_title($imageid).'" class="" />';
		}
		return $embed;
	}
	
	// Set up the sponsor image
	if (class_exists('CtaPlugin')) {
			new CtaPlugin(array(
				'label' => 'Sponsor Image',
				'id' => 'sponsor-image',
				'post_type' => 'page'
			)
		);
	}
	
	
?>