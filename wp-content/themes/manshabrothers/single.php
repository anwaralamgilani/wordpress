<?php get_header(); ?>

<div class="container">
  <div class="row">
   <div class="col-md-12">
    <div class="case-study bottom-margin top-padding">

	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('blocks/content', get_post_type()); ?>
		
		<?php comments_template(); ?>
		
		<?php get_template_part('blocks/pager-single', get_post_type()); ?>
		
	<?php endwhile; ?>
	
	
  </div>
  </div>
 </div>
</div>
<?php get_footer(); ?>