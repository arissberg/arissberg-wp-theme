<?php
/* -------------------------------------------------------------------------- *\
    Advanced Custom Fields Functions
\* -------------------------------------------------------------------------- */


 /**
 * Wrapper Function for get_field
 *
 * Returns default values, if ACF Pro is not activated. Prevents fatal errors.
 *
 * @param string $key          The key of the custom field.
 * @param int    $id           The post ID.
 * @param string $default      The default fallback value. Will be returned if ACF Pro is not activated.
 * @param bool   $format_value Whether or not to format the value loaded from the db.
 */
function ab_get_field( $key, $id = false, $default = null, $format_value = true ) {
  global $post;
  $key = trim( filter_var( $key, FILTER_SANITIZE_STRING ) );
  $result = '';
  if ( function_exists( 'get_field' ) ) {
    if ( isset( $post->ID ) && ! $id ) {
      $result = get_field( $key, false, $format_value );
    } else {
      $result = get_field( $key, $id, $format_value );
      if ( ! $result && $default ) {
        $result = $default;
      }
    }
  } else {
    $result = $default;
  }
  return $result;
}

/**
 * Wrapper Function for the_field
 *
 * Returns default values, if ACF Pro is not activated. Prevents fatal errors.
 *
 * @param string $key          The key of the custom field.
 * @param int    $id           The post ID.
 * @param string $default      The default fallback value. Will be returned if ACF Pro is not activated.
 * @param bool   $format_value Whether or not to format the value loaded from the db.
 */
function ab_the_field( $key, $id = false, $default = '', $format_value = true ) {
  echo ab_get_field( $key, $id, $default, $format_value );
}

/**
 * Wrapper Function for get_sub_field
 *
 * Returns default values, if ACF Pro is not activated. Prevents fatal errors.
 *
 * @param string $key     The key of the custom field.
 * @param string $default The default fallback value. Will be returned if ACF Pro is not activated.
 */
function ab_get_sub_field( $key, $default = '' ) {
  if ( function_exists( 'get_sub_field' ) && get_sub_field( $key ) ) {
    return get_sub_field( $key );
  } else {
    return $default;
  }
}

/**
 * Wrapper Function for the_sub_field
 *
 * Returns default values, if ACF Pro is not activated. Prevents fatal errors.
 *
 * @param string $key     The key of the custom field.
 * @param string $default The default fallback value. Will be returned if ACF Pro is not activated.
 */
function ab_the_sub_field( $key, $default = '' ) {
  echo ab_get_sub_field( $key, $default );
}

/**
 * Wrapper Function for have_rows
 *
 * @param string $key     The name of the repeater / flexible content field.
 * @param int    $id      The post ID.
 */
function ab_have_rows( $key, $id = false ) {
  if ( function_exists( 'has_sub_field' ) ) {
    return have_rows( $key, $id );
  } else {
    return false;
  }
}
