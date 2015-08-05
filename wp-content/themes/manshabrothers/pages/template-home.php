<?php
/*
Template Name: Home Template
*/
get_header(); ?>
<?php query_posts(array('post_type' => 'case','showposts' => -1,) );?>
<div class="padngZero">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
   <div class="carousel-inner" role="listbox">
    
    <?php $counter1 =1;?>
    <?php $counter12 =1;?>
     <?php $counter122 =0;?>
          <?php while (have_posts()) : the_post(); ?>
          <?php $_subtitle = get_field('_subtitle',get_the_ID()); ?>
          <?php $_solution = get_field('_solution',get_the_ID()); ?>
          <?php $_feature_case_study = get_field('_feature_case_study',get_the_ID()); ?>
          
          <?php if($_feature_case_study): ?>
           
               
              

              <div class="item <?php if($counter12==1): echo 'active '.$counter12; else: echo ''; endif;?>" data-slide-number='<?php echo $counter122;?>'>
                <?php if ( has_post_thumbnail() ): the_post_thumbnail('full',array('class' => 'first-slide')); ?>
                <?php endif; ?>

              <div class="container caption-rel">
                <div class="carousel-caption ">
                    <h1><?php echo $_subtitle;?></h1>
                    <div class="caption-btn">
                      <a href="<?php the_permalink();?>" class=" btn btn-lg blu-Bck">Learn more  <i class="fa fa-angle-double-right icon2"></i></a>
                      <a href="<?php echo get_permalink(148);?>" class=" btn btn-lg green-back homeLern active">Free Assesment <i class="icon2 fa fa-pencil-square-o"></i></a>
                    </div>
                  </div>
                </div>
              </div>
           <?php echo $counter12='';?>  
            <?php $counter122++;?>   
           <?php endif;?>

            
          <?php $counter1++;?> 


       
           <?php endwhile;?>
   <?php wp_reset_query();?>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
  <div class="col-md-12 hidden-sm hidden-xs hidden-md thumbs" id="slider-thumbs">
    <ul class="list-inline">
    <?php query_posts(array('post_type' => 'case','showposts' => -1) );?>
    <?php $counter1 =1;?>
      <?php $counter122 =0;?>
    <?php while (have_posts()) : the_post(); ?>
          <?php $_feature_case_study = get_field('_feature_case_study',get_the_ID()); ?>
          <?php if($_feature_case_study):?>
              <li>
        	      <a <?php if($counter1==1): echo 'class="selected"'; else: echo 'class="selected"'; endif;?> id="carousel-selector-<?php echo $counter122;?>">
                    <?php if ( has_post_thumbnail() ): the_post_thumbnail('full',array('class' => 'img-responsive'));?>
                       
                <?php endif; ?>
        	      </a>
              </li>
              <?php $counter122++;?> 
           <?php endif;?>
    <?php $counter1++;?> 
   
    <?php endwhile;?>
    <?php wp_reset_query();?>
    </ul>
  </div>
</div>
<!--Company Profile Starts Here-->
<div class="blue-wrapper visible-sm hidden-xs">
   <div class="container">
     <div class="box col-md-4">
      <h1> 12k + </h1> 
        <p>corporate and individual customers</p>
       </div>
        <div class="box col-md-4">
       <h1> 135k + </h1>
       <p>successful installations</p>
       </div>
        <div class="box col-md-4">
       <h1> 300 + </h1> 
       <p>trained stafff in Lahore, Karachi &amp; Islamabad</p>
       </div>
    </div>
</div>

<!--Company Profile Mobile Version-->
<div class="blue-wrapper show-xs hidden-md hidden-lg responsive hidden-sm">
   <div class="container">
    <div class="row">
    <div class="col-xs-12">
     <div class="box">
      <h1> 12k + </h1> 
        <p>corporate and individual customers</p>
      </h1>
       </div>
        <div class="box">
       <h1> 135k + </h1>
       <p>successful installations</p>
       </div>
        <div class="box">
       <h1> 300 + </h1> 
       <p>trained stafff in Lahore, Karachi &amp; Islamabad</p>
       </div>
    </div>
  </div>
 </div>
</div>
<!--Company Profile Ends Here--> 


<?php query_posts(array('post_type' => 'partner','showposts' => -1,'order' => 'DESC') );?>

<!--Partners Starts Here-->
<div class="container">
  <div class="row">
    <div class="col-md-12">
       <h1 class="inner-heading">Our Trusted Partners</h1> 
      </div>
    </div>  
	<div class="row">
	  <div class="partners-wrapper">
	  		<?php while (have_posts()) : the_post(); ?>
	  			<?php $_color = get_field('_color',get_the_ID());?>
          <?php $_solution = get_field('_solution',get_the_ID()); ?>

			    <div class="col-md-3 col-xs-6 col-sm-6 partners-res">
			      <div class="partners-box">
			        <h4 class="<?php echo $_color;?>"><?php echo get_the_title($_solution->ID);?></h4>
			        <div><?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full',array('class' => 'img-responsive') ); 	} ?></div>
			        <a href="<?php echo get_the_permalink($_solution->ID);?>" class="<?php echo $_color;?>-btn btn">Learn More</a>
			      </div>
			 	</div>
		 	<?php endwhile;?>
			
		</div>
 	</div>
 	
	</div>
  <?php wp_reset_query();?>
<!--Awaards Starts Here-->
<div class="awaards-wrapper">
  <div class="container">
    <div class="col-md-12 awaards">
    <h1>Awards and Recognitions</h1>
    </div>
  </div>
</div>
<!--Awaards Ends Here-->

<?php get_footer(); ?>