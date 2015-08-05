<?php get_header(); ?>

<!--Case-Study Starts Here-->
<?php while (have_posts()) : the_post(); ?>
<div class="container">
  <div class="row">
   <div class="col-md-12">
    <div class="case-study bottom-margin top-padding">
    <?php the_title('<h2 class="text-left inner-heading">', '</h2>'); ?>
     <?php the_content(); ?>
   </div>
  </div>
 </div>
</div>
<!--Case-Study Ends Here--> 
<?php endwhile; ?>
  
<!--Solution Stars Here-->
<div class="darkblue-wrapper">
 <div class="container">
  <div class="row solution">
   <div class="col-md-12">
    <h3>Let Us Provide You With A Solution</h3>
    </div>
   <!-- <div class="seperator col-md-12">
    <span class="short">OR</span>
    </div>-->
     <div class="col-md-6">
      <a href="<?php echo get_permalink(148);?>" class="btn btn-lg">Free Assesment <i class="icon fa fa-pencil-square-o"></i></a>
     </div>
     <div class="col-md-6">
      <a href="javascript:void(0)" class="click btn btn-lg">Call Me Back <i class="icon fa fa-phone-square"></i>
</a>
      </div>
    </div>
  </div>
</div>
<div class="box-inner">
  <a href="javascript:void(0)" class="close"><i class="fa fa-times"></i></a>
    <div class="container">
       <div class="row">
        <?php echo do_shortcode('[contact-form-7 id="226" title="Form"]');?>
    </div>
  </div>
</div>
<!--Solution Ends Here-->
<?php get_footer(); ?>