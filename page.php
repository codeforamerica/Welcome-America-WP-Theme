<?php get_header(); ?>
<div id="contentwrap">
	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="leftcol">
			
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar') ) : ?>
			<?php endif; ?>
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>
			<?php endif; ?>
		</div>
		
		<div class="rightcol">
			<div class="photoholder"><?php echo get_the_post_thumbnail($post->ID); ?><img width="152" height="214" src="images/pgImages/wawa-hoagie-day.jpg"></div>
		</div>
		
			
		<div class="post textcolumn" id="post-<?php the_ID(); ?>">

			<div class="entry">
				
				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>

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
