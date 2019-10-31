<?php

if ( ! function_exists( 'ab_read_more' ) ) :
  /**
   * Read More Button
   *
   * @param string $class class name of the anchor.
   * @param string $icon  icon name inside <span> element.
   * @param string $url   URL of the post.
   */
  function ab_read_more( $class = '', $icon = 'long_arrow_right', $url = null ) {

    $args = [
      'class' => $class,
      'icon' => $icon,
      'url' => ( $url ) ?: get_permalink(),
      'text' => esc_html__( 'Read More', 'arissberg' ),
    ];


    $args = apply_filters( 'ab_read_more', $args );

    $output  = '<div class="post-more">';
    $output .= '<a href="' . esc_url( $args['url'] ) . '" class="' . esc_html( $args['class'] ) . '">';
    $output .= '<span>' . $args['text'] . '</span> ';
    $output .= ( $args['icon'] ) ? '<span class="icon">' . ab_get_icon_svg( esc_html( $args['icon'] ), 20 ) . '</span>' : '';
    $output .= '</a>';
    $output .= '</div>';

    return $output;

  }
endif;


if ( ! function_exists( 'ab_the_read_more' ) ) :
  /**
   * Echo Read More Button
   *
   * @param string $class class name of the anchor.
   * @param string $icon  icon name inside <span> element.
   * @param string $url   URL of the post.
   */
  function ab_the_read_more( $class = 'btn btn-primary btn-effect', $icon = 'arrow-right', $url = null ) {
    echo wp_kses_post( ab_read_more( $class, $icon, $url ) );
  }
endif;

?>