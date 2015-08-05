<?php
/*
Template Name: Landing Page Template
*/
get_header(); ?>

<div id="wrap">
	<div id="main">
<!--Landing-Banner Starts Here-->
<div class="landing-wrapper bottom-margin"> 
 <div class="container">
   <div class="row">
    <div class="col-md-12 landing-caption top-padding">
    <h1>You have a problem? <br/>
     We can provide you with the solution!</h1>
     <h3>Schedule a free consultation with Mansha Brothers!</h3>
   </div>
  </div>
 </div>
</div>
<!--Landing-Banner Ends Here--> 
<?php while (have_posts()) : the_post(); ?>
<!--Form-content Strats here-->
<div class="container">
 <div class="row">
  <div class="form-wrapper">
   <div class="col-md-7 form-content">
   <?php the_content();?>
</div>
<?php endwhile;?>
<div class="col-md-5">
 <div class="form">     
            <h4>Ready for Your Free Assessment?</h4>
            <?php echo do_shortcode('[contact-form-7 id="225" title="Landing page"]');?>
          </div>
        </div>
  </div>
</div>
<!--Form-content Ends here-->
<!--Social-pages Starts Here-->

<!--Social-pages Ends Here-->
</div>
</div>


<?php get_footer(); ?>