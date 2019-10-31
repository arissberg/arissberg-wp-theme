<?php

if (! function_exists( 'ab_add_social_links_template' )) :
function ab_add_social_links_template( $templates ) {
  /**
   * Custom Template for Powerkit social links
   */
  $templates['arissberg'] = array(
    'name' => 'arissberg Footer',
  );

  return $templates;
}
endif;

add_filter( 'powerkit_social_links_templates', 'ab_add_social_links_template');
?>