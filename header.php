<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<title>
			<?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ''; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="js/shadowbox3/shadowbox.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
    
    <meta name="description" content="<?php if ( is_single() ) {
        single_post_title('', true); 
    } else {
        bloginfo('name'); echo " - "; bloginfo('description');
    }
    ?>" />
    <meta name="keywords" content="<?php bloginfo('description'); ?>" />
    <meta name="generator" content="Page developped by Code for America, designed by Osiris" />
    
	<!-- link rel="shortcut icon" href="favicon.ico" / -->
	<!--[if lte IE 7]><link href="css/ie6.css" rel="stylesheet" type="text/css" /><![endif]-->
    
	<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="js/shadowbox3/shadowbox.js"></script>
    <script type="text/javascript"  src="js/jquery.pngFix.js"></script>
    <script type="text/javascript"  src="js/jquery.simplemodal.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script src="js/jquery/jquery.history_remote.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type='text/javascript' src='http://wa.j10s.com/wp-content/plugins/all-in-one-slideshow/cufon/cufon-yui.js?ver=3.1'></script>
	<script type='text/javascript' src='http://wa.j10s.com/wp-content/plugins/all-in-one-slideshow/cufon/fonts/Rockwell_400-Rockwell_700.font.js?ver=3.1'></script>

    <?php wp_head(); ?>
    
    <script type="text/javascript">
		// Setup where Cufon will run
		Cufon.replace('#menu-main-menu li a',{ fontFamily: 'Rockwell', textShadow: '2px 2px #000'});
		Cufon.replace('h1, h2, h4.event-day',{ fontFamily: 'Rockwell'});
		
		// A few touchups
		$(document).ready(function() {
			// Remove a border from the last footer link
			$('.footer-widgets li:last').addClass('last');
			setContentHeight();
			
			$('window').scroll(function(ev) {
				setContentHeight();
			});
			
			// Determine the tallest column and make sure the page stretches the whole length
			function setContentHeight(){ 
				var heights = [$('.leftcol').height(), $('.textcolumn').height(), $('.rightcol').height(), $('#tec-content').height()];
				heights.sort(function (a, b) { return b - a; });
				$('#contentwrap').css('height',heights[0]);
			}
		});
	</script>
</head>	

<body <?php body_class(); ?>>

<div id="headerwrap">
	<div id="header">
		<div class="logo">
    		<a href="<?php bloginfo('url'); ?>" >Wawa Welcome America Philadelphia</a>
    		<p><?php bloginfo('description'); ?></p>
    	</div>
		<?php 
			if(is_front_page()) { 
				aio_slideshow();
      		} else {
				echo '<div class="homebanner"><img width="960" height="362" src="'.get_bloginfo('template_directory').'/images/pgHeader/parade.jpg"></div>';
			}
		?>
        <?php wp_nav_menu(array('menu' => 'custom_menu')); ?>
	</div>
</div>
        

    