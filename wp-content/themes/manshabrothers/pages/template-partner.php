<?php
/*
Template Name: Partner Template
*/
get_header(); ?>


<!--Partners Starts Here-->
<div class="container top-padding bottom-margin">
   <div class="col-md-3 tabs-partners categories">
    <div class="tabbable  tabs-left">
      <h3>partners</h3>
      <ul class="nav nav-tabs" data-tabs="tabs">
      <?php $counter=1;?>
      <?php query_posts(array('post_type' => 'partner','showposts' => -1) );?>
      <?php while (have_posts()) : the_post(); ?>
          <li class="<?php if($counter==1) echo 'active';?>"> <a href="#tab_<?php echo $counter;?>" data-toggle="tab"><?php the_title();?></a></li>
      

      <?php $counter++; endwhile;?>    
      </ul>
       </div>
     </div>


<div class="col-md-9">
  <div class="tab-content">
  <?php $counter1=1;?>
      <?php query_posts(array('post_type' => 'partner','showposts' => -1) );?>
      <?php while (have_posts()) : the_post(); ?>

     <div class="tab-pane fade <?php if($counter1==1) echo 'in active';?> bottom-margin" id="tab_<?php echo $counter1;?>">
       <span class="heading">
         <h1 class="main-head"><?php the_title();?></h1>
        </span>
      <img src="imgs/panasonic.jpg" alt="" class="left">
      <div class="bottom-margin">
      <?php the_content();?>
      
  </div>
  <div class="row"><a href="#"><i class="fa fa-puzzle-piece fa-lg icon3"></i>See the Products & Solutions</a></div>
     </div>
         <?php $counter1++; endwhile;?>     
    </div>
   </div>
  </div>
</div>
<!--Partners Ends Here-->
<?php get_footer(); ?>