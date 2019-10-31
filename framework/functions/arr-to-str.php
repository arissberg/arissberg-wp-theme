<?php
if ( ! function_exists( 'arr_to_str' ) ) {
  /**
   * Simple wrapper function for array implode
   * but it cleans things up a bit
   *
   * Useful for outputing a class list
   *
   * @param array $arr
   * @param string $glue
   * @return string
   */
  function arr_to_str( $arr = array(), $glue = ' ' ) {
    if ( empty($arr) ) return '';

    return preg_replace( '/\s+/', ' ', implode( $glue, array_filter( array_unique( $arr ) ) ) );
  }
}

?>