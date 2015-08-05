<?php get_header(); ?>

	<!--Case-Study Starts Here-->
	<?php while (have_posts()) : the_post(); ?>
	<?php $_client_testimonial = get_field('_client_testimonial',get_the_ID()); ?>	
	<?php $_subtitle = get_field('_subtitle',get_the_ID());?>

	<div class="container">
	  <div class="row">
	   <div class="col-md-12">
	    <div class="case-study bottom-margin top-padding">
	    <h2 class="text-left inner-heading"><?php echo $_subtitle;?></h2>
	     <?php the_content();?>
	   </div>
	  </div>
	 </div>
	</div>
	<!--Case-Study Ends Here--> 
	<?php if($_client_testimonial):?>
	<!--Ceo Message Strats here-->
	<div class="ceo-wrapper">
	 <div class="container">
	  <div class="row">
	  <?php $counter =1;foreach ($_client_testimonial as $_testimonial) {// print_r($_testimonial);?>
	  <?php $_desination = get_field('_desination',$_testimonial->ID);?>
	  <?php $_company = get_field('_company',$_testimonial->ID);?>

	  	<?php if($counter==1):?>
		   	 <div class="col-md-12 ceo-messsge bottom-margin">
		  		<h3><?php echo $_testimonial->post_content;?></h3>
		     </div>
		     <div class="col-md-6 ceo-img">
		     <?php echo get_the_post_thumbnail( $_testimonial->ID, 'full' ); ?>
		     </div>
		     <div class="col-md-6 ceo-name">
		      <strong><?php echo $_testimonial->post_title;?> - <?php echo $_desination;?></strong>
		      <?php echo $_company;?><br/>
		     <!--  Lorem ipsum -->
		     </div>
		<?php endif;?>

	  <?php $counter++; }?>   
	    </div>
	  </div>
	</div>
	<!--Ceo Message Ends here-->
	<?php endif;?>

	<?php endwhile;?>



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