<?php
/*
Template Name: Thanks Template
*/
get_header(); ?>
<div id="wrap">
  <div id="main">
<!--Case-Study Starts Here-->
<div class="container">
  <div class="row">
  <?php while (have_posts()) : the_post(); ?>
   <div class="col-md-12 thank-you">
    <?php the_content();?>
  </div>
<?php endwhile;?>
 </div>
</div>
<!--Case-Study Ends Here--> 
</div>
</div>
<?php get_footer(); ?>