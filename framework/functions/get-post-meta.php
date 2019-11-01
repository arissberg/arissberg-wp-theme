<?php
/**
 * Post Meta Helper Functions
 *
 * These helper functions return post meta
 *
 * @version 1.0.0
 */

if ( ! function_exists( 'ab_get_post_meta' ) ) {
  /**
   * Post Meta
   *
   * A wrapper function that returns all post meta types either
   * in an ordered list <ul> or as a single element <span>.
   *
   * @param mixed $meta     Contains post meta types.
   * @param bool  $compact  If compact version shall be displayed.
   * @param bool  $hentry   Include .hentry required author and date.
   * @param bool  $echo     Echo or return.
   * @param array $allowed  Allowed meta types.
   */
  function ab_get_post_meta( $meta, $compact = false, $hentry = false, $echo = true, $allowed = array() ) {

    // Return if no post meta types provided or required by .hentry element.
    if ( ! $meta && false === $hentry ) {
      return;
    }

    if ( ! $allowed ) {
      // Set default allowed post meta types.
      $allowed = get_theme_mod( 'post_meta', array( 'date', 'category', 'tags', 'reading_time', 'author' ) );
    }

    // Convert string to array if .hentry author and date are required.
    if ( is_string( $meta ) && $hentry ) {
      $meta = array( $meta );
    }

    if ( is_array( $meta ) ) {
      // Intersect provided and allowed meta types.
      $filtered = array_map(
        function($item) use ($allowed) {
          if( in_array($item, $allowed)) return $item;
        },
        $meta
      );

      //Remove empty items
      $filtered = array_values(array_filter($filtered));
    }

    // Set .hentry required post meta types.
    $required = array( 'date', 'author' );

    $output = '';

    // Return required meta types only.
    if ( ! $meta && $hentry ) {

      // Output hidden list of required meta types.
      $output .= '<ul class="post-meta sr-only">';

      foreach ( $required as $type ) {
        $function = "ab_get_meta_$type";
        $output .= $function( 'li' );
      }

      $output .= '</ul>';

    }

    if ( $meta && is_array( $meta ) ) {

      $output .= '<ul class="post-meta">';

      // Add .hentry required meta types to the list.
      if ( $hentry ) {
        foreach ( $required as $type ) {
          $function = "ab_get_meta_$type";
          if ( ! in_array( $type, $meta, true ) ) {
            $output .= $function( 'li', $compact, false );
          }
        }
      }

      // Add normal meta types to the list.
      foreach ( $meta as $type ) {
        $function = "ab_get_meta_$type";
        $output .= $function( 'li', $compact );
      }

      $output .= '</ul>';

    } else {
      if ( in_array( $meta, $allowed, true ) ) {
        // Output single meta type.
        $function = "ab_get_meta_$meta";
        $output .= $function( 'span', $compact );
      }
    }

    if ( $echo ) {
      echo $output;
    } else {
      return $output;
    }
  }
}

if ( ! function_exists( 'ab_get_meta_category' ) ) {
  /**
   * Post Сategory
   *
   * @param string $tag     Element tag, i.e. div or span.
   * @param bool   $compact If compact version shall be displayed.
   * @param int    $post_id Post ID.
   */
  function ab_get_meta_category( $tag = 'span', $compact = false, $post_id = null ) {

    $output = '';

    if ( ! $post_id ) {
      $post_id = get_the_ID();
    }

    $output .= '<' . esc_html( $tag ) . ' class="meta-category">';

    // $output .= get_the_category_list( '', '', $post_id );
    $cat = get_the_category( $post_id )[0];
    $output .= '<a href="' . esc_url( get_category_link( $cat->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'arissberg' ), $cat->name ) ) . '">' . esc_html( $cat->name ) . '</a>';

    $output .= '</' . esc_html( $tag ) . '>';

    return $output;
  }
}


if ( ! function_exists( 'ab_get_meta_tags' ) ) {
  /**
   * Post Tags
   *
   * @param string $tag     Element tag, i.e. div or span.
   * @param bool   $compact If compact version shall be displayed.
   * @param int    $post_id Post ID.
   */
  function ab_get_meta_tags( $tag = 'span', $compact = false, $post_id = null ) {

    $output = '';
    $separator = ' | ';

    if ( ! $post_id ) {
      $post_id = get_the_ID();
    }

    //Only want the top 5 tags
    $post_tags = get_the_tags( $post_id );

    if( empty($post_tags) ) return;


    usort(
      $post_tags,
      function($a, $b) {
        return $b->count >= $a->count;
      }
    );

    $post_tags = array_slice($post_tags, 0, 5);

    $output .= '<' . esc_html( $tag ) . ' class="meta-tags">';
    $output .= '<i class="os-icons os-icons-tag"></i>';

    foreach ($post_tags as $post_tag) {

      $output .= '<a href="' . esc_url( get_tag_link( $post_tag->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'arissberg' ), $post_tag->name ) ) . '">' . esc_html( $post_tag->name ) . '</a>' . $separator;

    }

    $output = trim($output, $separator);

    $output .= '</' . esc_html( $tag ) . '>';

    return $output;
  }
}


if ( ! function_exists( 'ab_get_meta_date' ) ) {
  /**
   * Post Date
   *
   * @param string $tag     Element tag, i.e. div or span.
   * @param bool   $compact If compact version shall be displayed.
   * @param bool   $display If post meta is enabled.
   */
  function ab_get_meta_date( $tag = 'span', $compact = false, $display = true ) {

    $output = '';

    $output .= '<' . esc_html( $tag ) . ' class="meta-date' . ( false === $display ? ' d-none' : '') . '">';

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
      $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    if ( false === $compact ) {
      $date = get_the_date('M j, Y');
    } else {
      $date = get_the_date( 'M j/Y' );
    }

    $time_string = sprintf( $time_string,
      get_the_date( DATE_W3C ),
      $date,
      get_the_modified_date( DATE_W3C ),
      get_the_modified_date()
    );

    // Wrap the time string in a link, and preface it with 'Posted on'.
    $output .= sprintf(
      // __( '<span class="screen-reader-text">Posted on</span> %s', 'arissberg' ),
      // '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'

      __( '<span class="sr-only">Posted on</span> %s', 'arissberg' ),  $time_string
    );

    $output .= '</' . esc_html( $tag ) . '>';

    return $output;
  }
}

if ( ! function_exists( 'ab_get_meta_author' ) ) {
  /**
   * Post Author
   *
   * @param string $tag     Element tag, i.e. div or span.
   * @param bool   $compact If compact version shall be displayed.
   * @param bool   $display If post meta is enabled.
   */
  function ab_get_meta_author( $tag = 'span', $compact = false, $display = true ) {

    $output = '';

    $output .= '<' . esc_attr( $tag ) . ' class="meta-author' . ( false === $display ? ' d-none' : '') . '">';

    if ( false === $compact ) {
      $output .= '<span class="meta-separator">' . esc_html__( 'Written by: ', 'arissberg' ) . '</span>';
    }
    if ( function_exists( 'coauthors_posts_links' ) ) {
      $output .= coauthors_posts_links( null, null, null, null, false );
    } else {
      $author_name = get_the_author_meta( 'display_name', get_post_field( 'post_author', get_the_ID() ) );
      $output .= sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        /* translators: %s: author name */
        esc_attr( sprintf( __( 'View all posts by %s', 'arissberg' ), $author_name ) ),
        $author_name
      );
    }

    $output .= '</' . esc_html( $tag ) . '>';

    return $output;

  }
}


if ( ! function_exists( 'ab_get_meta_reading_time' ) ) {
  /**
   * Post Reading Time
   *
   * @param string $tag     Element tag, i.e. div or span.
   * @param bool   $compact If compact version shall be displayed.
   */
  function ab_get_meta_reading_time( $tag = 'span', $compact = false ) {

    $reading_time = ab_get_post_reading_time();

    $output = '';

    $output .= '<' . esc_html( $tag ) . ' class="meta-reading-time"><i class="os-icons os-icons-clock"></i>';

    if ( true === $compact ) {
      $output .= intval( $reading_time ) . ' ' . esc_html( 'min read', 'arissberg' );
    } else {
      /* translators: %s number of minutes */
      $output .= esc_html( sprintf( _n( '%s minute read', '%s minute read', $reading_time, 'arissberg' ), $reading_time ) );
    }

    $output .= '</' . esc_html( $tag ) . '>';

    return $output;
  }
}



if ( ! function_exists( 'ab_calculate_post_reading_time' ) ) {
  /**
   * Calculate Post Reading Time in Minutes
   *
   * @param int $post_id The post ID.
   */
  function ab_calculate_post_reading_time( $post_id = null ) {
    if ( ! $post_id ) {
      $post_id = get_the_ID();
    }
    $post_content = get_post_field( 'post_content', $post_id );
    $strip_shortcodes = strip_shortcodes( $post_content );
    $strip_tags = strip_tags( $strip_shortcodes );
    $word_count = str_word_count( $strip_tags );
    $reading_time = intval( ceil( $word_count / 250 ) );
    return $reading_time;
  }
}

/**
 * Update Post Reading Time on Post Save
 *
 * @param int  $post_id The post ID.
 * @param post $post    The post object.
 * @param bool $update  Whether this is an existing post being updated or not.
 */
function ab_update_post_reading_time( $post_id, $post, $update ) {
  if ( ! $post_id ) {
    $post_id = get_the_ID();
  }
  $reading_time = ab_calculate_post_reading_time( $post_id );
  update_post_meta( $post_id, '_ab_reading_time', $reading_time );
}



/**
 * Get Post Reading Time from Post Meta
 *
 * @param int $post_id The post ID.
 */
function ab_get_post_reading_time( $post_id = null ) {
  if ( ! $post_id ) {
    $post_id = get_the_ID();
  }
  // Get existing post meta.
  $reading_time = get_post_meta( $post_id, '_ab_reading_time', true );
  // Calculate and save reading time, if there's no existing post meta.
  if ( ! $reading_time ) {
    $reading_time = ab_calculate_post_reading_time( $post_id );
    update_post_meta( $post_id, '_ab_reading_time', $reading_time );
  }
  return $reading_time;
}
