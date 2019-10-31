<?php

if ( ! function_exists( 'ab_limit_words' ) ) :
/* ==========================================================================
  Limit Words
  - Limits the ammount of words output from a string
========================================================================== */

function ab_limit_words($text, $limit = 40, $after = null) {
  if (str_word_count($text, 0) > $limit) {
    $words = str_word_count($text, 2);
    $pos = array_keys($words);
    $text = substr($text, 0, $pos[$limit]) . $after;
  };
  return $text;
};

endif;
?>