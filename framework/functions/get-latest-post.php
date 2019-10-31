<?php
if ( ! function_exists( 'ab_get_latest_post' ) ) :
/*
* Query for the latest post
*/
function ab_get_latest_post() {

  return ab_query_for_posts([
    'posts_per_page' => 1
  ]);

}
endif;

?>