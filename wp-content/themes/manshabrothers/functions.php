<?php
include( get_template_directory() .'/classes.php' );
include( get_template_directory() .'/widgets.php' );

add_action('themecheck_checks_loaded', 'theme_disable_cheks');

function theme_disable_cheks() {

	$disabled_checks = array('TagCheck');

	global $themechecks;

	foreach ($themechecks as $key => $check) {

		if (is_object($check) && in_array(get_class($check), $disabled_checks)) {

			unset($themechecks[$key]);

		}

	}

}



add_theme_support( 'automatic-feed-links' );



if ( ! isset( $content_width ) ) $content_width = 900;



remove_action('wp_head', 'wp_generator');



add_action( 'after_setup_theme', 'theme_localization' );

function theme_localization () {

	load_theme_textdomain( 'base', get_template_directory() . '/languages' );

}





if ( function_exists('register_sidebar') ) {

	register_sidebar(array(

		'id' => 'default-sidebar',

		'name' => __('Footer Lahore Head Office', 'base'),

		'before_widget' => '<div>',

		'after_widget' => '</div>',

		//'before_title' => '',

		//'after_title' => ''

	));

	register_sidebar(array(

		'id' => 'default-sidebar2',

		'name' => __('Footer Karachi Office', 'base'),

		'before_widget' => '<div>',

		'after_widget' => '</div>',

		//'before_title' => '<h3>',

		//'after_title' => '</h3>'

	));

		register_sidebar(array(

		'id' => 'default-sidebar3',

		'name' => __('Footer Islamabad Office', 'base'),

		'before_widget' => '<div>',

		'after_widget' => '</div>',

		//'before_title' => '<h3>',

		//'after_title' => '</h3>'

	));

		register_sidebar(array(

		'id' => 'default-sidebar4',

		'name' => __('Footer Faisalabad Office', 'base'),

		'before_widget' => '<div>',

		'after_widget' => '</div>',

		//'before_title' => '<h3>',

		//'after_title' => '</h3>'

	));


}



if ( function_exists( 'add_theme_support' ) ) {

	add_theme_support( 'post-thumbnails' );

	set_post_thumbnail_size( 50, 50, true ); // Normal post thumbnails

	add_image_size( 'single-post-thumbnail', 400, 9999, true );

}



register_nav_menus( array(

	'primary' => __( 'Primary Navigation', 'base' ),

	'footer_about' => __( 'About Footer Navigation', 'base' ),

	'footer_partner' => __( 'Partner Footer Navigation', 'base' ),

	'footer_solution' => __( 'Solution Footer Navigation', 'base' ),

) );





//Add [email]...[/email] shortcode

function shortcode_email($atts, $content) {

	$result = '';

	for ($i=0; $i<strlen($content); $i++) {

		$result .= '&#'.ord($content{$i}).';';

	}

	return $result;

}

add_shortcode('email', 'shortcode_email');



//Register tag [template-url]

function filter_template_url($text) {

	return str_replace('[template-url]',get_bloginfo('template_url'), $text);

}

add_filter('the_content', 'filter_template_url');

add_filter('get_the_content', 'filter_template_url');

add_filter('widget_text', 'filter_template_url');



//Register tag [site-url]

function filter_site_url($text) {

	return str_replace('[site-url]',get_bloginfo('url'), $text);

}

add_filter('the_content', 'filter_site_url');

add_filter('get_the_content', 'filter_site_url');

add_filter('widget_text', 'filter_site_url');



//Replace standard wp menu classes

function change_menu_classes($css_classes) {

	$css_classes = str_replace("current-menu-item", "active", $css_classes);

	$css_classes = str_replace("current-menu-parent", "active", $css_classes);

	return $css_classes;

}

add_filter('nav_menu_css_class', 'change_menu_classes');



//Replace standard wp body classes and post classes

function theme_body_class($classes) {

	if (is_array($classes)) {

		foreach ($classes as $key => $class) {

			$classes[$key] = 'body-class-' . $classes[$key];

		}

	}

	

	return $classes;

}

add_filter('body_class', 'theme_body_class', 9999);



function theme_post_class($classes) {

	if (is_array($classes)) {

		foreach ($classes as $key => $class) {

			$classes[$key] = 'post-class-' . $classes[$key];

		}

	}

	

	return $classes;

}

add_filter('post_class', 'theme_post_class', 9999);



//Allow tags in category description

$filters = array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description');

foreach ( $filters as $filter ) {

    remove_filter($filter, 'wp_filter_kses');

}





//Make wp admin menu html valid

function wp_admin_bar_valid_search_menu( $wp_admin_bar ) {

	if ( is_admin() )

		return;



	$form  = '<form action="' . esc_url( home_url( '/' ) ) . '" method="get" id="adminbarsearch"><div>';

	$form .= '<input class="adminbar-input" name="s" id="adminbar-search" tabindex="10" type="text" value="" maxlength="150" />';

	$form .= '<input type="submit" class="adminbar-button" value="' . __('Search', 'base') . '"/>';

	$form .= '</div></form>';



	$wp_admin_bar->add_menu( array(

		'parent' => 'top-secondary',

		'id'     => 'search',

		'title'  => $form,

		'meta'   => array(

			'class'    => 'admin-bar-search',

			'tabindex' => -1,

		)

	) );

}



function fix_admin_menu_search() {

	remove_action( 'admin_bar_menu', 'wp_admin_bar_search_menu', 4 );

	add_action( 'admin_bar_menu', 'wp_admin_bar_valid_search_menu', 4 );

}



add_action( 'add_admin_bar_menus', 'fix_admin_menu_search' );



//Disable comments on pages by default

function theme_page_comment_status($post_ID, $post, $update) {

	if (!$update) {

		remove_action('save_post_page', 'theme_page_comment_status', 10);

		wp_update_post(array(

			'ID' => $post->ID,

			'comment_status' => 'closed',

		));

		add_action('save_post_page', 'theme_page_comment_status', 10, 3);

	}

}

add_action('save_post_page', 'theme_page_comment_status', 10, 3);



/* advanced custom fields settings*/



//theme options tab in appearance

if(function_exists('acf_add_options_sub_page')) {

	acf_add_options_sub_page(array(

		'title' => 'Theme Options',

		'parent' => 'themes.php',

	));

}



//acf theme functions placeholders

if(!class_exists('acf') && !is_admin()) {

	function get_field_reference( $field_name, $post_id ) {return '';}

	function get_field_objects( $post_id = false, $options = array() ) {return false;}

	function get_fields( $post_id = false) {return false;}

	function get_field( $field_key, $post_id = false, $format_value = true )  {return false;}

	function get_field_object( $field_key, $post_id = false, $options = array() ) {return false;}

	function the_field( $field_name, $post_id = false ) {}

	function have_rows( $field_name, $post_id = false ) {return false;}

	function the_row() {}

	function reset_rows( $hard_reset = false ) {}

	function has_sub_field( $field_name, $post_id = false ) {return false;}

	function get_sub_field( $field_name ) {return false;}

	function the_sub_field($field_name) {}

	function get_sub_field_object( $child_name ) {return false;}

	function acf_get_child_field_from_parent_field( $child_name, $parent ) {return false;}

	function register_field_group( $array ) {}

	function get_row_layout() {return false;}

	function acf_form_head() {}

	function acf_form( $options = array() ) {}

	function update_field( $field_key, $value, $post_id = false ) {return false;}

	function delete_field( $field_name, $post_id ) {}

	function create_field( $field ) {}

	function reset_the_repeater_field() {}

	function the_repeater_field($field_name, $post_id = false) {return false;}

	function the_flexible_field($field_name, $post_id = false) {return false;}

	function acf_filter_post_id( $post_id ) {return $post_id;}

}



// Register Partner Post Type

function partner_post_type() {



	$labels = array(

		'name'                => _x( 'Partner', 'Post Type General Name', 'text_domain' ),

		'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'text_domain' ),

		'menu_name'           => __( 'Partner', 'text_domain' ),

		'name_admin_bar'      => __( 'Partner', 'text_domain' ),

		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),

		'all_items'           => __( 'All Items', 'text_domain' ),

		'add_new_item'        => __( 'Add New Item', 'text_domain' ),

		'add_new'             => __( 'Add New', 'text_domain' ),

		'new_item'            => __( 'New Item', 'text_domain' ),

		'edit_item'           => __( 'Edit Item', 'text_domain' ),

		'update_item'         => __( 'Update Item', 'text_domain' ),

		'view_item'           => __( 'View Item', 'text_domain' ),

		'search_items'        => __( 'Search Item', 'text_domain' ),

		'not_found'           => __( 'Not found', 'text_domain' ),

		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),

	);

	$args = array(

		'label'               => __( 'partner', 'text_domain' ),

		'description'         => __( 'Partner Description', 'text_domain' ),

		'labels'              => $labels,

		'supports' 			  => array('title','editor','thumbnail'),

	//	'taxonomies'          => array( 'category', 'post_tag' ),

		'labels'              => $labels,

		'supports' 			  => array('title','editor','thumbnail'),

	//	'taxonomies'          => array( 'category', 'post_tag' ),

		'hierarchical'        => false,

		'public'              => true,

		'show_ui'             => true,

		'show_in_menu'        => true,

		'menu_position'       => 5,

		'show_in_admin_bar'   => true,

		'show_in_nav_menus'   => true,

		'can_export'          => true,

		'has_archive'         => true,		

		'exclude_from_search' => false,

		'publicly_queryable'  => true,

		'capability_type'     => 'page',

	);

	register_post_type( 'partner', $args );



}



// Hook into the 'init' action

add_action( 'init', 'partner_post_type', 0 );










// Register Solution Post Type

function solution_post_type() {



	$labels = array(

		'name'                => _x( 'Solution', 'Post Type General Name', 'text_domain' ),

		'singular_name'       => _x( 'Solution', 'Post Type Singular Name', 'text_domain' ),

		'menu_name'           => __( 'Solution', 'text_domain' ),

		'name_admin_bar'      => __( 'Solution', 'text_domain' ),

		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),

		'all_items'           => __( 'All Items', 'text_domain' ),

		'add_new_item'        => __( 'Add New Item', 'text_domain' ),

		'add_new'             => __( 'Add New', 'text_domain' ),

		'new_item'            => __( 'New Item', 'text_domain' ),

		'edit_item'           => __( 'Edit Item', 'text_domain' ),

		'update_item'         => __( 'Update Item', 'text_domain' ),

		'view_item'           => __( 'View Item', 'text_domain' ),

		'search_items'        => __( 'Search Item', 'text_domain' ),

		'not_found'           => __( 'Not found', 'text_domain' ),

		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),

	);

	$args = array(

		'label'               => __( 'solution', 'text_domain' ),

		'description'         => __( 'Solution Description', 'text_domain' ),

		'labels'              => $labels,

		'supports' 			  => array('title','editor','thumbnail'),

	//	'taxonomies'          => array( 'category', 'post_tag' ),

		'hierarchical'        => false,

		'public'              => true,

		'show_ui'             => true,

		'show_in_menu'        => true,

		'menu_position'       => 5,

		'show_in_admin_bar'   => true,

		'show_in_nav_menus'   => true,

		'can_export'          => true,

		'has_archive'         => true,		

		'exclude_from_search' => false,

		'publicly_queryable'  => true,

		'capability_type'     => 'page',

	);

	register_post_type( 'solution', $args );



}



// Hook into the 'init' action

add_action( 'init', 'solution_post_type', 0 );





// Register Product Post Type

function product_post_type() {



	$labels = array(

		'name'                => _x( 'Product', 'Post Type General Name', 'text_domain' ),

		'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'text_domain' ),

		'menu_name'           => __( 'Product', 'text_domain' ),

		'name_admin_bar'      => __( 'Product', 'text_domain' ),

		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),

		'all_items'           => __( 'All Items', 'text_domain' ),

		'add_new_item'        => __( 'Add New Item', 'text_domain' ),

		'add_new'             => __( 'Add New', 'text_domain' ),

		'new_item'            => __( 'New Item', 'text_domain' ),

		'edit_item'           => __( 'Edit Item', 'text_domain' ),

		'update_item'         => __( 'Update Item', 'text_domain' ),

		'view_item'           => __( 'View Item', 'text_domain' ),

		'search_items'        => __( 'Search Item', 'text_domain' ),

		'not_found'           => __( 'Not found', 'text_domain' ),

		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),

	);

	$args = array(

		'label'               => __( 'product', 'text_domain' ),

		'description'         => __( 'Product Description', 'text_domain' ),

		'labels'              => $labels,

		'supports' 			  => array('title','editor','thumbnail'),

		//'taxonomies'          => array( 'category', 'post_tag' ),

		'hierarchical'        => false,

		'public'              => true,

		'show_ui'             => true,

		'show_in_menu'        => true,

		'menu_position'       => 5,

		'show_in_admin_bar'   => true,

		'show_in_nav_menus'   => true,

		'can_export'          => true,

		'has_archive'         => true,		

		'exclude_from_search' => false,

		'publicly_queryable'  => true,

		'capability_type'     => 'page',

	);

	register_post_type( 'product', $args );



}



// Hook into the 'init' action

add_action( 'init', 'product_post_type', 0 );







// Register product Taxonomy

function product_taxonomy() {



	$labels = array(

		'name'                       => _x( 'Category', 'Taxonomy General Name', 'text_domain' ),

		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),

		'menu_name'                  => __( 'Product Category', 'text_domain' ),

		'all_items'                  => __( 'All Items', 'text_domain' ),

		'parent_item'                => __( 'Parent Item', 'text_domain' ),

		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),

		'new_item_name'              => __( 'New Item Name', 'text_domain' ),

		'add_new_item'               => __( 'Add New Item', 'text_domain' ),

		'edit_item'                  => __( 'Edit Item', 'text_domain' ),

		'update_item'                => __( 'Update Item', 'text_domain' ),

		'view_item'                  => __( 'View Item', 'text_domain' ),

		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),

		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),

		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),

		'popular_items'              => __( 'Popular Items', 'text_domain' ),

		'search_items'               => __( 'Search Items', 'text_domain' ),

		'not_found'                  => __( 'Not Found', 'text_domain' ),

	);

	$args = array(

		'labels'                     => $labels,

		'hierarchical'               => true,

		'public'                     => true,

		'show_ui'                    => true,

		'show_admin_column'          => true,

		'show_in_nav_menus'          => true,

		'show_tagcloud'              => true,

	);

	register_taxonomy( 'product', array( 'product' ), $args );



}



// Hook into the 'init' action

add_action( 'init', 'product_taxonomy', 0 );





// Register Testimonial Post Type

function testimonial_post_type() {



	$labels = array(

		'name'                => _x( 'Testimonial', 'Post Type General Name', 'text_domain' ),

		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name', 'text_domain' ),

		'menu_name'           => __( 'Testimonial', 'text_domain' ),

		'name_admin_bar'      => __( 'Testimonial', 'text_domain' ),

		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),

		'all_items'           => __( 'All Items', 'text_domain' ),

		'add_new_item'        => __( 'Add New Item', 'text_domain' ),

		'add_new'             => __( 'Add New', 'text_domain' ),

		'new_item'            => __( 'New Item', 'text_domain' ),

		'edit_item'           => __( 'Edit Item', 'text_domain' ),

		'update_item'         => __( 'Update Item', 'text_domain' ),

		'view_item'           => __( 'View Item', 'text_domain' ),

		'search_items'        => __( 'Search Item', 'text_domain' ),

		'not_found'           => __( 'Not found', 'text_domain' ),

		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),

	);

	$args = array(

		'label'               => __( 'testimonial', 'text_domain' ),

		'description'         => __( 'Testimonial Description', 'text_domain' ),

		'labels'              => $labels,

		'supports' 			  => array('title','editor','thumbnail'),

		//'taxonomies'          => array( 'category', 'post_tag' ),

		'hierarchical'        => true,

		'public'              => true,

		'show_ui'             => true,

		'show_in_menu'        => true,

		'menu_position'       => 5,

		'show_in_admin_bar'   => true,

		'show_in_nav_menus'   => true,

		'can_export'          => true,

		'has_archive'         => true,		

		'exclude_from_search' => false,

		'publicly_queryable'  => true,

		'capability_type'     => 'page',

	);

	register_post_type( 'testimonial', $args );



}



// Hook into the 'init' action

add_action( 'init', 'testimonial_post_type', 0 );





// Register Case Study Post Type

function case_post_type() {



	$labels = array(

		'name'                => _x( 'Case Study', 'Post Type General Name', 'text_domain' ),

		'singular_name'       => _x( 'Case Study', 'Post Type Singular Name', 'text_domain' ),

		'menu_name'           => __( 'Case Study', 'text_domain' ),

		'name_admin_bar'      => __( 'Case Study', 'text_domain' ),

		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),

		'all_items'           => __( 'All Items', 'text_domain' ),

		'add_new_item'        => __( 'Add New Item', 'text_domain' ),

		'add_new'             => __( 'Add New', 'text_domain' ),

		'new_item'            => __( 'New Item', 'text_domain' ),

		'edit_item'           => __( 'Edit Item', 'text_domain' ),

		'update_item'         => __( 'Update Item', 'text_domain' ),

		'view_item'           => __( 'View Item', 'text_domain' ),

		'search_items'        => __( 'Search Item', 'text_domain' ),

		'not_found'           => __( 'Not found', 'text_domain' ),

		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),

	);

	$args = array(

		'label'               => __( 'case', 'text_domain' ),

		'description'         => __( 'Case Study Description', 'text_domain' ),

		'labels'              => $labels,

		'supports' 			  => array('title','editor','thumbnail'),

		//'taxonomies'          => array( 'category', 'post_tag' ),

		'hierarchical'        => true,

		'public'              => true,

		'show_ui'             => true,

		'show_in_menu'        => true,

		'menu_position'       => 5,

		'show_in_admin_bar'   => true,

		'show_in_nav_menus'   => true,

		'can_export'          => true,

		'has_archive'         => true,		

		'exclude_from_search' => false,

		'publicly_queryable'  => true,

		'capability_type'     => 'page',

	);

	register_post_type( 'case', $args );



}



// Hook into the 'init' action

add_action( 'init', 'case_post_type', 0 );



add_action( 'wpcf7_before_send_mail', 'CF7_pre_send' );
 
function CF7_pre_send($cf7) {
   $output = "";
   $output .= "Name: " . $_POST['name'];
   $output .= "Email: " . $_POST['email'];
 $output .= "Message: " . $_POST['message'];
 
 file_put_contents("cf7outputtest.txt", $output);
}