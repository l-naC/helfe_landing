<?php
/**
 * The template for displaying search form
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */


function custom_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform form-inline" action="' . home_url( '/' ) . '" >
    <div class="custom-search-form"><label class="screen-reader-text" for="s">' . __( 'Search:' ) . '</label>
    <input type="text" class="form-control" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" class="btn btn-outline-primary" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
  </div>
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'custom_search_form', 100 );
