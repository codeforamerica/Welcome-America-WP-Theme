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
		<div class="textcolumn <?php echo get_post_class() ?>" id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			<?php //include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">
				<?php the_content(); ?>
			</div>

			<!--div class="postmetadata">
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
				Posted in <?php the_category(', ') ?> | 
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
			</div-->

		</div>

	<?php endwhile; ?>

	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
