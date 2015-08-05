<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <!--Custum css-->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/imgs/favicon.svg" type="image/gif" sizes="16x16">
     <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css" rel="stylesheet" media="all">
     <!--fontawesome-->
   
     <link href="<?php echo get_template_directory_uri(); ?>/css/hell.css" rel="stylesheet">
     <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" type="text/css" rel="stylesheet" media="all">
     <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	 <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/offcanvas.css" />
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/font-awesome-4.3.0/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="all">
    <link href='http://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500' rel='stylesheet' type='text/css'>

    <link rel="author" href="https://plus.google.com/113101541449927918834"/>
      
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/style.css"  />
		   <style type="text/css">
  @font-face {
  font-family: 'Glyphicons Halflings';
  src: url('<?php echo get_template_directory_uri(); ?>/css/fonts/glyphicons-halflings-regular.eot');
  src: url('<?php echo get_template_directory_uri(); ?>/css/fonts/glyphicons-halflings-regular.eot?#iefix') 
  format('embedded-opentype'), url('<?php echo get_template_directory_uri(); ?>/css/fonts/glyphicons-halflings-regular.woff') format('woff'), url('<?php echo get_template_directory_uri(); ?>/css/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('<?php echo get_template_directory_uri(); ?>/css/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
}

</style> 

		<script type="text/javascript">
			var pathInfo = {
				base: '<?php echo get_template_directory_uri(); ?>/',
				css: '<?php echo get_template_directory_uri(); ?>/css/',
				js: '<?php echo get_template_directory_uri(); ?>/js/',
				swf: '<?php echo get_template_directory_uri(); ?>/swf/',
			}
		</script>
		
		<?php //if ( is_singular() ) wp_enqueue_script( 'theme-comment-reply', get_template_directory_uri()."/js/comment-reply.js" ); ?>

  <?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head>

  <body <?php  body_class(); ?>>

	<?php  $case_postType =  get_post_type();
	if ( (is_front_page()) || ($case_postType=='solution')):?>
  <div class="navbar-abs">  
    <nav class="navbar navbar-default">
	 <?php elseif((!is_front_page()) || ($case_postType!='solution')):?> 
  <nav class="navbar navbar-second navbar-default">

	<?php endif;?>
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>  

      <a class="navbar-brand" href="<?php echo site_url();?>">
      <img src="<?php echo get_template_directory_uri(); ?>/imgs/logo.png" alt="<?php bloginfo('name'); ?>" class="hidden-xs hidden-sm">

      <?php  $case_postType =  get_post_type();
      if ( (is_front_page()) || ($case_postType=='solution')):?>
      <img src="<?php echo get_template_directory_uri(); ?>/imgs/logo-res.png" alt="<?php bloginfo('name'); ?>" class="visible-xs">
      <?php elseif((!is_front_page()) || ($case_postType!='solution')):?> 
      <img src="<?php echo get_template_directory_uri(); ?>/imgs/logo2.png" alt="<?php bloginfo('name'); ?>" class="hidden-lg hidden-md">
      <?php endif;?>



      </a>

    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
<?php //echo get_the_ID();

if(get_the_ID()==136):
if(has_nav_menu('primary')):?>
          
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <?php 
                    wp_nav_menu( array('container' => false,
                       'theme_location' => 'primary',
                       'menu_class' => 'nav navbar-nav navbar-right',
                       'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                       'walker' => new Custom_Walker_Nav_Menu) ); ?>
              </div>
  <?php endif; 
 endif;
  ?>
    <?php  $_display__top_menu = get_field('_display__top_menu',get_the_ID());?> 
    <?php if($_display__top_menu=='no'): 

          else: if(has_nav_menu('primary')):?>
          
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              		<?php 
              			wp_nav_menu( array('container' => false,
              				 'theme_location' => 'primary',
              				 'menu_class' => 'nav navbar-nav navbar-right',
              				 'items_wrap' => '<ul class="%2$s">%3$s</ul>',
              				 'walker' => new Custom_Walker_Nav_Menu) ); ?>
          		</div>
	<?php endif; endif; ?>			 
    
  </div><!-- /.container-fluid -->
</nav>
 
	<?php  $case_postType =  get_post_type();
  if ( (is_front_page()) || ($case_postType='solution')):?>
	</div>
<?php endif;?>


  