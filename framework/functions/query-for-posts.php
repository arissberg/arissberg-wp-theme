<?php
if ( ! function_exists( 'ab_query_for_posts' ) ) :
/**
 * Simple Wrapper for WP_Query
 *
 * @param array $args query arguments
 * @return wp_query object
 */
  function ab_query_for_posts( array $args = array() ) {

    $default_args = array(
      'post_type' => 'post',
      'ignore_sticky_posts' => 1,
      'post_status' => 'publish',
      'posts_per_page' => get_option( 'posts_per_page' ),
      'orderby' => 'ID',
      'order' => 'DESC',
      'no_found_rows' => true,
      'update_post_term_cache' => false
    );

    $query_args = wp_parse_args( $args, $default_args );
    $posts = new \WP_Query( $query_args );

    return $posts;
  }
  endif;
?>