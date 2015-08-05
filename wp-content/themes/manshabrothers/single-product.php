<?php get_header(); ?>

<div class="navbar-header">
 <button type="button" class="button-side pull-left navbar-toggle" data-toggle="offcanvas" data-target="#bs-example-navbar-collapse-1">  
                    <span class="glyphicon glyphicon-list"></span>
                          CATEGORIES  
                </button>
              </div>
    <section id="main-content">
        <div class="container top-padding">
            <div class="row-offcanvas row-offcanvas-left">
                
                <div class="col-md-3 col-sm-3 hidden-xs sidebar-offcanvas categories" id="sidebar" role="navigation">
                 <h3>CATEGORIES</h3>
                  <p>Business Communication server</p>
              	 <div class=" mbs-docs-sidebar affix-top" role="complementary">
                	<ul class=" nav mbs-docs-sidenav">
                	<?php  $cat_product = $_GET['cat'];  ?>
                	<?php  $solution_id = $_GET['solution-id'];  ?>
					   
					     <?php  $counter2 =0; while (have_posts()) : the_post(); ?>
								<?php $counter1 =0;?>
								<?php  $_select_solution = get_field('_product',$solution_id);  ?>
							    <?php if($_select_solution){foreach ($_select_solution as  $_product) { 									
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
							$query = new WP_Query( $args );  $post_product = $_GET['product']; ?>
							 <li <?php  if($cat_product==$_product->name) echo 'class="active"';?>>
			                          <a class="tree-toggle nav-header" href="javascript:void(null)" ><?php echo $_product->name;?></a>
			                            <ul class="nav tree">
										<?php while ($query->have_posts()) : $query->the_post(); 
										  global $post;?>
			                              <li <?php if($post_product==$post->post_title) echo 'class="active"';?> ><a href="<?php echo add_query_arg(array('cat'=>$_product->name,'solution-id'=>$solution_id), get_permalink($post->ID) );?>"><?php echo $post->post_title?></a></li>
								<?php 
								endwhile;?>
							</ul>
							</li>
						<?php }}
						endwhile;?>
					</ul><!--copy-ul-->
              </div>
                </div><!--affix-->
                <div class="visible-xs sidebar-offcanvas" id="sidebar" role="navigation">
              	 <div class=" mbs-docs-sidebar affix-top" role="complementary">
                	<ul class=" nav mbs-docs-sidenav">
                	<?php  $cat_product = $_GET['cat'];  ?>
                	<?php  $solution_id = $_GET['solution-id'];  ?>
					     <?php  $counter2 =0; while (have_posts()) : the_post(); ?>
								<?php $counter1 =0;?>
								<?php  $_select_solution = get_field('_product',$solution_id);  ?>
							    <?php if($_select_solution){foreach ($_select_solution as  $_product) { 									
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
							$query = new WP_Query( $args );  $post_product = $_GET['product']; ?>
							 <li <?php  if($cat_product==$_product->name) echo 'class="active"';?>>
			                          <a class="tree-toggle nav-header" href="javascript:void(null)" ><?php echo $_product->name;?></a>
			                            <ul class="nav tree">
										<?php while ($query->have_posts()) : $query->the_post(); 
										  global $post;?>
			                              <li <?php if($post_product==$post->post_title) echo 'class="active"';?> ><a href="<?php echo add_query_arg(array('cat'=>$_product->name,'solution-id'=>$solution_id), get_permalink($post->ID) );?>"><?php echo $post->post_title?></a></li>
								<?php 
								endwhile;?>
							</ul>
							</li>
						<?php }}
						endwhile;?>
					</ul><!--copy-ul-->
              </div>
                </div>
                <?php while (have_posts()) : the_post(); ?>
				  <?php  $_banner = get_field('_banner',get_the_ID());?>
						<div id="mcontent" class="col-md-9 col-sm-9 hidden-xs">
						   <h1 class="main-head"><?php the_title();?></h1>
						     <img src="<?php echo  $_banner;?>" class="product-img" width="100%">
								<div class="product-wrapper bottom-margin product">
									<div id="myTabContent" class="tab-content">
										 <div class="tab-pane fade in active" id="features">
									  		<?php the_content();?>	
									     </div>
							    	</div>
						   		</div>
						</div>
					<?php endwhile;?>

                
   <!--Case-Study Mobile Version Starts Here-->   
			<div class="container" id="mcontent">
					 <div class="row"> 

					 <?php while (have_posts()) : the_post(); ?>
					  <?php  $_banner = get_field('_banner',get_the_ID());?>
							 <div class="col-md-8 cat-nav hidden-lg">
							   <h1 class="main-head"><?php the_title();?></h1>
							     <img src="<?php echo  $_banner;?>" class="product-img" width="100%">
									<div class="product-wrapper bottom-margin product">
										<div id="myTabContent" class="tab-content">
											 <div class="tab-pane fade in active" id="features">
										  		<?php the_content();?>	
										     </div>
								    	</div>
							   		</div>
							</div>
						<?php endwhile;?>
					  </div>
			  </div>
		</div>
	</div>
</section>
<!--Case-Study Mobile Version Ends Here-->



<?php get_footer(); ?>