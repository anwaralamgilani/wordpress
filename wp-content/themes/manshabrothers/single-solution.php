<?php get_header(); ?>

	

<div class="padngZero">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <?php while (have_posts()) : the_post(); 

  $get_the_Title =  get_the_title(); ?>

    <div class="carousel-inner" role="listbox">
    <?php //$counter1 =1;?>

    	<?php $_case_study = get_field('_case_study',get_the_ID()); ?>	
    	<?php //$_partner_case_study = get_field('_partner_case_study',get_the_ID()); var_dump($_partner_case_study);?>	
	    <?php $counter = 0; if($_case_study){ foreach ($_case_study as  $_case) {?>
	    <?php $_subtitle = get_field('_subtitle',$_case->ID); ?>
	    <?php $_solution = get_field('_solution',$_case->ID); ?>

	    	
	     	<?php $thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($_case->ID), 'full', array('class' => 'first-slide' ));
				 $url2 = $thumb2['0'];?>
			  	  <div class="item <?php if($counter==0) echo 'active';?>" data-slide-number='<?php echo $counter?>'>
			  	  	<?php if(!$url):?>
			  	    	<img class="first-slide" src="<?php echo $url2;?>" alt="<?php echo $_subtitle; ?>">
			        <?php endif;?>
			        <div class="container caption-rel">
			          <div class="carousel-caption">
			            <h1><?php echo $_subtitle; ?></h1>
						<?php $counter1 =0;?>
						 <div class="caption-btn">
			            <a href="<?php echo add_query_arg('partner',$_partner_case_study->name, get_permalink($_case->ID) );?>" class=" btn btn-lg blu-Bck">Learn more   <i class="fa fa-angle-double-right icon2"></i></a>
			            <a href="<?php echo get_permalink(148);?>" class=" btn btn-lg green-back homeLern active">Free Assesment  <i class="icon2 fa fa-pencil-square-o"></i></a>
			          	<?php //}?>
			          	</div>
			          </div>
			        </div>
			      </div>
			     
			     <?php $counter++;}}?> 
			     
      
			    </div>
			    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>
			  <?php endwhile;?>
				  <div class="col-md-12 hidden-sm hidden-xs hidden-md thumbs" id="slider-thumbs">
				  <?php while (have_posts()) : the_post(); $get_the_Title =  get_the_title();?>

				    <ul class="list-inline">
				    <?php $counter1 =0;?>
				    <?php if($_case_study){foreach ($_case_study as  $_case) { ?>
				    <?php  $_solution = get_field('_solution',$_case->ID); ?>
				    <?php $thumb1 = wp_get_attachment_image_src( get_post_thumbnail_id($_case->ID), 'full', array('class' => 'first-slide' ));
				  $url1 = $thumb1['0'];?>
				   <?php  //if($get_the_Title ==$_solution->post_title):?>
				      <li>
					      <a <?php if($counter1==0) echo 'class="selected"';?> id="carousel-selector-<?php echo $counter1;?>">
					      <img class="img-responsive adsd" src="<?php echo $url1;?>" alt="">
					      </a>
				      </li>
				      <?php ?>
				    <?php $counter1++; }}?> 
				    </ul>
				    <?php endwhile;?>
				  </div>
			</div>





					<!--Tabs Starts Here-->
					<div class="container">
					  <div class="row">
					   <div class="col-md-12">
					    <div class="tabs">
							<ul id="myTab" class="nav nav-tabs">
							<?php while (have_posts()) : the_post(); ?>
								<?php $_case__product = get_field('_product',get_the_ID()); //var_dump($_case__product);?>	
								
								<?php $counter1 =0;?>
							    <?php if($_case__product){foreach ($_case__product as  $_product) { ?>
							   		<li <?php if($counter1==0) echo "class='active'";?>>
							   			<a href="#home_<?php echo $counter1;?>" data-toggle="tab"><?php echo $_product->name;?></a>
							   		</li>
							   	<?php $counter1++; }}?>	
							<?php endwhile;?>   
							</ul>
					<div id="myTabContent" class="tab-content">
						
							<?php  $counter2 =0; while (have_posts()) : the_post(); ?>
								<?php  $_case__product = get_field('_product',get_the_ID());  
										$Solution_ID = get_the_ID();?>
								<?php  $_case__partner = get_field('_partner',get_the_ID());  //var_dump($_case__product);?>
								<?php $arrayName = array();
								$arrayName = $_case__product; //var_dump($arrayName)?>	
								<?php $counter1 =0;?>
							    <?php if($_case__product){foreach ($_case__product as  $_product) { 									
									$args = array(
										'post_type' => 'product',
										'tax_query' => array(
											array(
												'taxonomy' => 'product',
												'field'    => 'slug',
												'terms'    => $_product->name,
											),
										),
									);
							$query = new WP_Query( $args );
							 ?>
						
								<div class="tab-pane fade <?php if($counter1==0) echo 'in active';?> " id="home_<?php echo $counter1;?>">
													   <div class="row bottom-margin">
										<?php while ($query->have_posts()) : $query->the_post(); 
										global $post;?>
													      <div class="col-md-3">
													      	<?php echo get_the_post_thumbnail( $post->ID, 'full', array('class' =>'img-responsive')); ?>
														    <a href="<?php echo add_query_arg(array('cat'=>$_product->name,'solution-id'=>$Solution_ID), get_permalink($post->ID) );?>"><h3><?php echo $post->post_title;?></h3></a>
													      </div>
											<?php endwhile;?>		      
													    </div>
												   </div>
						<?php 	$counter1++;
								}}$counter2++;
								endwhile;?>
			</div>
		  </div>
		 </div>
		</div>
		</div>
		<!--Tabs Ends Here--> 

		
		<!--Testimonial Starts Here-->
		<div class="testimonial-wrapper">
		  	<div class="container">
		    	<div class="row bottom-margin">
				     <div class="col-md-12 partners">
				        <h1>Testimonials</h1>
				     </div>
				    <?php while (have_posts()) : the_post(); ?>
				    <?php $_testimonial = get_field('_testimonial',get_the_ID());?>	
				    <?php foreach ($_testimonial as  $_testimonial_data) {?>
				    <?php $_desination = get_field('_desination',$_testimonial_data->ID);?>	
				    <?php $_company = get_field('_company',$_testimonial_data->ID);?>	
				     <div class="col-md-4 testimonial">
					      <p><?php echo $_testimonial_data->post_content;?></p>
					      <h3><strong><?php echo $_testimonial_data->post_title;?></strong> 
					      <?php if($_desination) echo '- '.$_desination;?><br/>
					      <?php if($_company) echo $_company;?></h3>
					      <?php echo get_the_post_thumbnail( $_testimonial_data->ID, 'full'); ?>
					      <?php //if ( has_post_thumbnail() ) { the_post_thumbnail( 'full'); 	} ?>
				      </div>
				     <?php } endwhile;?> 
		        </div>
		  	</div>
		</div>
		<!--Testimonial Ends Here-->

		
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