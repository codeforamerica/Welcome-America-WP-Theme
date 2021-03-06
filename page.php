<?php get_header(); ?>
<div id="contentwrap">
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="leftcol">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Top Sidebar') ) ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Top Sidebar') ) ?>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Bottom Sidebar') ) ?>
		</div>
		
		<div class="rightcol">
			<div class="photoholder"><?php echo get_the_post_thumbnail($post->ID); ?></div>
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Bottom Sidebar') ) ?>
			<div class="sponsor-advert">
			<?php 
				if (class_exists('CtaPlugin') && CtaPlugin::has_post_thumbnail('page', 'sponsor-image')) {
					CtaPlugin::the_post_thumbnail('page', 'sponsor-image', NULL, 'post-sponsor-image-thumbnail'); 
				} 
			?>
			</div>
		</div>
		
			
		<div class="post textcolumn" id="post-<?php the_ID(); ?>">

			<div class="entry">
				
				<h1><?php the_title(); ?></h1>
				<?php 
					// I don't know why, but the_content was returning the wrong entry - so I've done 
					// the_content functionality manually.
					echo str_replace(']]>', ']]&gt;', apply_filters('the_content',$post->post_content)); 
				?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
		
		<?php //comments_template(); ?>

		<?php endwhile; endif; ?>
	</div>
</div>
<?php //get_sidebar(); ?>

<?php get_footer(); ?>
