<?php
if ( ! function_exists( 'ab_limit_chars' ) ) :
/* ==========================================================================
  Limit Chars
  - Limits the ammount of characters output from a string
========================================================================== */
function ab_limit_chars($text, $length = 155, $after = '&hellip;') {
  if ( strlen($text) <= $length ) {
    return $text;
  };
  $stringCut = substr($text, 0, $length);
  $string = substr($stringCut, 0, strrpos($stringCut, ' '));
  return $string . $after;
};

endif;
?>