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
		</div>
		<div class="textcolumn <?php echo get_post_class() ?>" id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>

			<?php //include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				<?php
					$content = $post->post_content;
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]&gt;', $content);
					echo $content;
				?>
			</div>

		</div>

	<?php endwhile; ?>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
