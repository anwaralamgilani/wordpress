<?php

//Custom Menu Walker
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
	}

	function end_lvl(&$output, $depth = 0, $args = array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;


		/* Add active class */
    
	
	
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';
		
		
		
			
				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		  	 	$sq = get_search_query() ? get_search_query() : __('Enter search terms&hellip;', 'base');
				$item_output = $args->before;

				

				if(in_array('dropdown', $classes))
				{
					$item_output .= "<a href='#' class='dropdown-toggle' data-toggle='dropdown'>$item->title<b class='caret'></b></a>";
				
				}
				elseif(in_array('dropdown-submenu', $classes))
				{
					$item_output .= "<a href='#'' tabindex='0' class='dropdown-toggle' data-toggle='dropdown'> $item->title<b class='caret'></b></a>";
				
				}
				elseif(in_array('dropdown_search', $classes))
				{
					$item_output .= '<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true"><i class="glyphicon glyphicon-search"></i></a>';
				
					
					$item_output .='<ul style="padding:12px;" class="dropdown-menu dropdown-search">';
					//$item_output .='<div class="col-xs-12">';
					$item_output .='	<form class="form-inline" role="search" method="get" action="'.home_url().'" >';
				//	$item_output .='		<div class="input-group">';
					$item_output .=	'		<button class="btn btn-default pull-right" type="submit"><i class="glyphicon glyphicon-search"></i></button>';
				//	$item_output .=	'		<div class="input-group-btn">';
					$item_output .=	'    		<input type="text" class="form-control pull-left" placeholder="Search" name="s" value="" >';
				//	$item_output .='			</div>';
					$item_output .='	</form>';
					//$item_output .='</div>';
					$item_output .='</ul>';
					
					
				}else{
				$item_output .= '<a'. $attributes .'>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
				}
		
				$item_output .= $args->after;
		
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function end_el(&$output, $item, $depth = 0, $args = array()) {
		$output .= "</li>\n";
	}
}