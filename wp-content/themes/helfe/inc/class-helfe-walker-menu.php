<?php
/**
 * Custom comment walker for this theme
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */

/**
 * This class outputs custom menu walker for HTML5 friendly WordPress comment and threaded replies.
 *
 * @since 1.0.0
 */
class Helfe_Walker_Menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
		$object = $item->object;
    	$type = $item->type;
    	$title = $item->title;
    	$description = $item->description;
    	$permalink = $item->url;
	
		$output .= "<li class='nav-item " .  implode(" ", $item->classes) . "'>";
        
		//Add SPAN if no Permalink
		if( $permalink && $permalink != '#' ) {
			$output .= '<a href="' . $permalink . '" class="nav-link">';
		} else {
			$output .= '<span>';
		}
		
		$output .= $title;
		if( $description != '' && $depth == 0 ) {
			$output .= '<small class="description">' . $description . '</small>';
		}
		if( $permalink && $permalink != '#' ) {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	}
}
