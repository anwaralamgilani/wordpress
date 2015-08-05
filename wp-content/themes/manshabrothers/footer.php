
<?php  $_display__top_menu = get_field('_display__top_menu',get_the_ID());?> 
<?php  $_show_menu = get_field('_show_menu',get_the_ID());?> 
    <?php if(($_display__top_menu=='no') || ($_show_menu=='no')):?>

      <!--Footer Starts Here-->
<div id="footer">
<div class="container">
  <div class="row">
    <div class="footer-bot-land">
      <p>&copy; <?php echo date('Y');?> Mansha Brothers. All Rights Reserved.</p>
  </div>
 </div>
 </div>
</div>

<?else:?><!--Footer Starts Here-->
<div class="footer-wrapper">
  <div class="container">
    <div class="row footer-end">
    	<?php if(has_nav_menu('footer_about')):?>
	    	<div class="col-md-3 col-xs-3 footer hidden-xs">
		    	<h3>About Us</h3>
				<?php 
					wp_nav_menu( array('container' => false,
						 'theme_location' => 'footer_about',
						 'menu_class' => 'nav',
						 'items_wrap' => '<ul class="%2$s">%3$s</ul>') ); ?>
			</div>
		<?php endif;?>
		
		<?php if(has_nav_menu('footer_solution')):?>
			<div class="col-md-3 col-xs-3 footer hidden-xs">
			<h3>Solutions</h3>
			<?php 
				wp_nav_menu( array('container' => false,
					 'theme_location' => 'footer_solution',
					 'menu_class' => 'nav',
					 'items_wrap' => '<ul class="%2$s">%3$s</ul>') ); ?>
			</div>
		<?php endif;?>

       
       
       <?php if(has_nav_menu('footer_partner')):?>
			<div class="col-md-3 col-xs-3 footer hidden-xs">
			<h3>Partners</h3>
			<?php 
				wp_nav_menu( array('container' => false,
					 'theme_location' => 'footer_partner',
					 'menu_class' => 'nav',
					 'items_wrap' => '<ul class="%2$s">%3$s</ul>') ); ?>
			</div>
		<?php endif;?>

     
       <div class="col-md-3 col-xs-12 bottom-margin">
        <div class="footer">
         <?php if ( is_active_sidebar( 'default-sidebar' ) ) : ?>
          <h3 class="address hidden-xs">Lahore Head Office</h3>
         <address class="hidden-xs">
          <?php dynamic_sidebar( 'default-sidebar' ); ?>
         </address>
         <?php endif; ?>
         <div class="panel-group" id="accordion">
          <div class="panel panel-default hidden-lg top-margin hidden-md hidden-sm">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne1">
          Lahore Head Office
        </a><i class="indicator fa fa-caret-down  pull-right"></i>
      </h4>
    </div>
    <?php if ( is_active_sidebar( 'default-sidebar' ) ) : ?>
    <div id="collapseOne1" class="panel-collapse collapse in">
      <div class="panel-body">
          <?php dynamic_sidebar( 'default-sidebar' ); ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
  <?php if ( is_active_sidebar( 'default-sidebar2' ) ) : ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Karachi Office
        </a><i class="indicator fa fa-caret-down  pull-right"></i>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        <?php dynamic_sidebar( 'default-sidebar2' ); ?>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if ( is_active_sidebar( 'default-sidebar3' ) ) : ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Islamabad Office
        </a><i class="indicator fa fa-caret-down pull-right"></i>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
       <?php dynamic_sidebar( 'default-sidebar3' ); ?>
      </div>
    </div>
  </div>
  <?php endif;?>
  <?php if ( is_active_sidebar( 'default-sidebar4' ) ) : ?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Faisalabad Office
        </a><i class="indicator fa fa-caret-down pull-right"></i>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body">
             <?php dynamic_sidebar( 'default-sidebar4' ); ?>
              </div>
         </div>
    </div>
  <?php endif;?>
  </div>  
      </div>

        
         <ul class="nav social">
            <li class="fb"><a href="http://www.facebook.com/" target='_blank'><i class="fa fa-facebook"></i></a></li>
            <li class="tweet"><a href="http://www.twitter.com/" target='_blank'><i class="fa fa-twitter"></i></a></li>
            <li class="linkd"><a href="http://www.linkdin.com/" target='_blank'><i class="fa fa-linkedin"></i></a></li>
        </ul> 
        
  </div>
      </div>
      <div class="footer-bot hidden-xs">
      <span class="left">
      &copy; 2015 Mansha Brothers. All Rights Reserved.
      </span>
      <span class="right">
      Designed by: Cranberry Marketing
      </span>
    </div>
      <div class="footer-bot hidden-lg hidden-md hidden-sm">
     
      &copy; <?php echo date('Y');?> Mansha Brothers. All Rights Reserved.
      <br/>
      Designed by: Cranberry Marketing
      
    </div>
  </div> 
</div>  
<?php endif;?>
<!--Footer Mobile Version-->
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/hel.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/helidon.js"></script>

    
    <script type="text/javascript">
    jQuery.noConflict();
	function toggleChevron(e) {
    jQuery(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('fa-caret-down fa-caret-up');
}
jQuery('#accordion').on('hidden.bs.collapse', toggleChevron);
jQuery('#accordion').on('shown.bs.collapse', toggleChevron);
</script>

<script>
jQuery.noConflict();
jQuery(document).ready(function(){
  jQuery('.click').click(function(){
    jQuery('.box-inner').slideDown('slow');
  });
    jQuery('.close').click(function(){
    jQuery('.box-inner').slideUp('slow');
  });
});
</script>
 <script type="text/javascript">
 jQuery.noConflict();
  jQuery(document).ready(function () {

  
    jQuery('#myCarousel').carousel({
      interval: 8000
   
  });

    // handles the carousel thumbnails
    jQuery('[id^=carousel-selector-]').click( function(){
      var id_selector = jQuery(this).attr("id");
      var id = id_selector.substr(id_selector.length -1);
      id = parseInt(id);
      jQuery('#myCarousel').carousel(id);
      jQuery('[id^=carousel-selector-]').removeClass('selected');
      jQuery(this).addClass('selected');
    });

    // when the carousel slides, auto update
    jQuery('#myCarousel').on('slid', function (e) {
      var id = jQuery('.item.active').data('slide-number');
      id = parseInt(id);
      jQuery('[id^=carousel-selector-]').removeClass('selected');
      jQuery('[id=carousel-selector-'+id+']').addClass('selected');
    });

     });
  </script>
 
	<?php wp_footer(); ?>
  </body>
</html>		
