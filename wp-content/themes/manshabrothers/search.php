<?php get_header(); ?>

<div class="container">
  <div class="row">
   <div class="col-md-12">
    <div class="case-study bottom-margin top-padding">
     <?php if (have_posts()) : ?>
			<h2 class="text-left inner-heading"><?php printf( __( 'Search Results for: %s', 'base' ), '<span>' . get_search_query() . '</span>'); ?></h2>
	
		<?php while (have_posts()) : the_post(); ?>
			<?php get_template_part('blocks/content', get_post_type()); ?>
		<?php endwhile; ?>
	
		<?php get_template_part('blocks/pager'); ?>
		
		<?php else : ?>
			<?php get_template_part('blocks/not_found'); ?>
		<?php endif; ?>
	
   </div>
  </div>
 </div>
</div>


<?php get_footer(); ?>