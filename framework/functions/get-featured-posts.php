<?php
if ( ! function_exists( 'ab_get_featured_posts' ) ) :

/**
 * Call our WP_Query wrapper for featured (sticky posts)
 * This will eventually be smarter
 *
 * @param integer $count
 * @param array $exclude_ids
 * @return void
 */
function ab_get_featured_posts( int $count = 3, array $exclude_ids = array() ) {
  $post_ids;

  if (class_exists('WordPressPopularPosts')) {
    //post_ids will be set to the string "0"
    $post_ids = do_shortcode('[wpp range="custom" time_quantity="2" time_unit="week" limit=' . $count . ' order_by="views" pid=' . implode( ',', $exclude_ids) . ']');

    $post_ids = ( !empty ($post_ids) ) ? getIdsFromWPPOutput( $post_ids ) : array();
  }

  if ( empty($post_ids) || count($post_ids) < $count ) {
    $post_ids = get_option('sticky_posts');
  }

  return ab_query_for_posts([
    'posts_per_page' => $count,
    'posts__not_in' => $exclude_ids,
    'post__in' => $post_ids,
  ]);

}
endif;


function getIdsFromWPPOutput( $shortcode_output ) {
  $shortcode_output = preg_replace( "/\r|\n/", "", $shortcode_output );
  $shortcode_output = strip_tags($shortcode_output);
  //$ids_str = substr($shortcode_output, strpos($shortcode_output, ">") + 1);

  return explode(',', $shortcode_output);
}

?>