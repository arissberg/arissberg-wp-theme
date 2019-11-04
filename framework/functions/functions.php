<?php
/* -------------------------------------------------------------------------- *\
    Require the function files below
\* -------------------------------------------------------------------------- */
$ab_functions = array(
  'alter-query-with-conditional-tags',
  'arr-to-str',
  'can-show-post-thumbnail',
  'extract-youtube-id',
  'get-archive-template',
  'get-customizer-social-links',
  'get-featured-posts',
  'get-latest-post',
  'get-post-meta',
  'get-single-template',
  'get-template-part-props',
  'hsl-to-hex',
  'image-sizes',
  'limit-chars',
  'limit-words',
  'main-container-class',
  'post-thumbnail',
  'posts-load-more',
  'posts-pagination',
  'pretty-print',
  'query-for-posts',
  'read-more',
  'show-more',
  'social-links',
  'svg-icons',
  'theme-support',
);

wp_file_loader( $ab_functions, 'functions' );

// Unset the global variable.
unset( $ab_functions );

?>