<?php
/*
Template Name: Testimonials Template
*/
get_header(); ?>

<div id="content">

	<?php while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<?php the_title('<div class="title"><h1>', '</h1></div>'); ?>
		<div class="content">
			<?php the_content(); ?>			
			<?php edit_post_link( __( 'Edit', 'base' ) ); ?>
			<?php
				query_posts(array(
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_parent' => get_the_ID(),
				));

				if (have_posts()) : while (have_posts()) : the_post();
			?>

			<blockquote>
				<?php the_content(); ?>
			</blockquote>

			<?php endwhile; ?>

			<div class="navigation">
				<div class="next"><?php next_posts_link(__('Older Entries &raquo;', 'base')) ?></div>
				<div class="prev"><?php previous_posts_link(__('&laquo; Newer Entries', 'base')) ?></div>
			</div>

			<?php endif; ?>

			<?php wp_reset_query(); ?>
		</div>
	</div>
	<?php endwhile; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>