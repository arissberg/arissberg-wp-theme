<?php
if ( ! function_exists( 'alter_query_with_conditional_tags' ) ) {
  /**
   * Alter the main query based on a conditional
   *
   * @param [type] $query
   * @return void
   */
  function alter_query_with_conditional_tags( $query ) {

    if ( ! is_admin() && $query->is_main_query() ) {
      // This is the main query (not on an admin screen page)
      // Change the query for category archives here
      // $query->set( 'posts_per_page', 200 );
      // $query->set( 'order', "ASC" );
      // $query->set( 'no_found_rows', true );
      // $query->set( 'update_post_term_cache', false );

      if ( is_home() ) : //Main Blog Archive
        $offset = 1;

        $ppp = get_option('posts_per_page');

        //Next, detect and handle pagination...
        if ( $query->is_paged ) {

          //Manually determine page query offset (offset + current page (minus one) x posts per page)
          $page_offset = $offset + ( ($query->query_vars['paged'] - 1) * $ppp );

          //Apply adjust page offset
          $query->set('offset', $page_offset );

        } else {
          //This is the first page. Just use the offset...
          $query->set('offset',$offset);
        }

        //Ignore Sticky Posts
        $query->set( 'post__not_in', get_option('sticky_posts') );

      endif;

      if ($query->is_search) {
        $query->set('post_type', 'post');
      }
    }
  }
}

?>