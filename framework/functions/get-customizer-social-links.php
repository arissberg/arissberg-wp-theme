<?php

/**
 * Gets the social links in the theme options and returns and array of values
 *
 * @return array
 */
function get_customizer_social_links() {

  $links = array(
    'facebook' => sanitize_text_field( get_theme_mod( 'social_facebook' ) ),
    'twitter' => sanitize_text_field( get_theme_mod( 'social_twitter' ) ),
    'instagram' => sanitize_text_field( get_theme_mod( 'social_instagram' ) ),
    'linkedin' => sanitize_text_field( get_theme_mod( 'social_linkedin' ) ),
  );

  return array_filter($links);
}

?>