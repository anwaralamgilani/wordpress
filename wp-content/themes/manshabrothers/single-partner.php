<?php get_header(); ?>

<div class="navbar-header">
      <button type="button" class="button-side pull-left navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-4" aria-expanded="false">
      <span class="glyphicon glyphicon-list"></span> Partners
      </button>
   </div>
<!--Partners Starts Here-->
<div class="container tabs-partners top-padding bottom-margin">
   <div class="col-md-3 tabs-partners categories">
    <div class="tabbable  tabs-left">
      <h3 class="hidden-xs">partners</h3>
      <?php if(has_nav_menu('footer_partner')):?>
    	 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-4">
		<?php 
			wp_nav_menu( array('container' => false,
				 'theme_location' => 'footer_partner',
				 'menu_class' => 'nav nav-tabs',
				 'items_wrap' => '<ul class="%2$s">%3$s</ul>') ); ?>
		</div>
	<?php endif;?>		

   
       </div>
     </div>


<div class="col-md-9">
  <div class="tab-content tab-content2">
  <?php //$counter1=1;?>
      <?php //query_posts(array('post_type' => 'partner','showposts' => -1) );?>
      <?php while (have_posts()) : the_post(); ?>
      	<?php $_solution = get_field('_solution',get_the_ID()); //var_dump($_solution->ID);?>

     <div class="bottom-margin" >
       <span class="heading">
         <h1 class="main-head"><?php the_title();?></h1>
        </span>
        <?php the_post_thumbnail( 'full', array( 'class' => 'left' ) ); ?>
      <div class="bottom-margin">
      <?php the_content();?>
      
  </div>
  <div class="row"><a href="<?php echo get_the_permalink($_solution->ID);?>">
  See the Products & Solutions <i class="fa fa-puzzle-piece fa-lg icon3"></i></a>
  </div>
     </div>
         <?php $counter1++; endwhile;?>     
    </div>
   </div>
  </div>
</div>
<!--Partners Ends Here-->

<?php get_footer(); ?>