<?php

if ( ! function_exists( 'ab_remove_parent' ) ) :
  /**
   * Remove Active Class from Blog when viewing CPTs
   *
   * @param [type] $var
   * @return void
   */
  function ab_remove_parent($var){
    if ($var == 'current_page_parent' || $var == 'current-menu-item' || $var == 'current-page-ancestor') { return false; }
    return true;
  }
endif;



if ( ! function_exists( 'ab_custom_wp_nav_classes' ) ) :
/**
 * Edit the Nav Menu classes
 *
 * @param [type] $classes
 * @param [type] $item
 * @return void
 */
function ab_custom_wp_nav_classes($classes, $item){
  global $post;
  $page_blog = get_option('page_for_posts');

  if(is_post_type_archive(/** CUSTOM POST TYPES HERE **/) || is_singular(array(/** CUSTOM POST TYPES HERE **/)) ) {

      /** Remove Active Class from Blog **/
      if($item->object_id == $page_blog)
          $classes = array_filter($classes, "ab_remove_parent");

      /** Page ID of what you want to be active **/
      if($item->object_id == 3154)
          $classes[] = 'current_page_parent';
  }

  return $classes;
}
endif;
// add_filter('nav_menu_css_class' , 'ab_custom_wp_nav_classes' , 10 , 2);

//Remove all classes
//add_filter( 'nav_menu_css_class', '__return_empty_array', 10, 3 );


?>