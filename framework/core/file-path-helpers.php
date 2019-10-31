<?php
/* -------------------------------------------------------------------------- *\
    Path Helpers
\* -------------------------------------------------------------------------- */


if ( ! function_exists('__t')) {
  /**
   * The root template directory, this can be over written in the child theme.
   *
   * @return string
   */
  function __t()
  {
    return get_template_directory_uri() . '/';
  }
}


if ( ! function_exists('__a')) {
  /**
   * Assets relative to the template directory.
   *
   * @return string
   */
  function __a()
  {
    return __t() . 'dist/';
  }
}


if ( ! function_exists('__j')) {
  /**
   * Echoes the Javascript path.
   */
  function __j()
  {
    echo __a() . 'js/';
  }
}


if ( ! function_exists('__i')) {
  /**
   * Echoes the Images path.
   */
  function __i()
  {
    echo __a() . 'img/';
  }
}


if ( ! function_exists('__c')) {
  /**
   * Echoes the CSS path.
   */
  function __c()
  {
    echo __a() . 'css/';
  }
}


if ( ! function_exists('__v')) {
  /**
   * Echoes the Vendor path.
   */
  function __v()
  {
    echo __t() . 'vendor/';
  }
}


if ( ! function_exists('__lib')) {
  /**
   * Returns the Lib path.
   */
  function __lib($path)
  {
    return template_directory('/lib/' . $path);
  }
}


if ( ! function_exists('__m')) {
  /**
   * Returns the mix-manifest.json file
   *
   * @return bool|string
   */
  function __m()
  {
    return template_directory('mix-manifest.json');
  }
}


if ( ! function_exists('__video')) {
  /**
   *  Echos the video path.
   */
  function __video()
  {
    echo __a() . 'video/';
  }
}


if ( ! function_exists('underscore')) {
  /**
   * add an underscore to a string
   *
   * @param [type] $string
   * @return void
   */
  function underscore($string)
  {
    return strtolower(preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $string));
  }
}


/**
 * @param $template_name
 *
 * @return string
 */
function check_path($template_name)
{
  if (file_exists(STYLESHEETPATH . '/' . $template_name) or file_exists(TEMPLATEPATH . '/' . $template_name)) {
    return TEMPLATEPATH . '/' . $template_name;
  }
  return false;
}


/**
 * @param $template_name
 *
 * @return bool|string
 */
function template_directory($template_name)
{
  $template_name = trim($template_name, "/");
  if (file_exists(STYLESHEETPATH . '/' . $template_name)) {
    return STYLESHEETPATH . '/' . $template_name;
  }
  if (file_exists(TEMPLATEPATH . '/' . $template_name)) {
    return TEMPLATEPATH . '/' . $template_name;
  }
  return false;
}



if ( ! function_exists('mix')) {
  function mix($path)
  {
    $pathWithOutSlash = ltrim($path, '/');
    $pathWithSlash    = '/' . ltrim($path, '/');
    $manifestFile     = __m();
    // No manifest file was found so return whatever was passed to mix().
    if ( ! $manifestFile) {
        return __t() . $pathWithOutSlash;
    }
    $manifestArray = json_decode(file_get_contents($manifestFile), true);
    if (array_key_exists($pathWithSlash, $manifestArray)) {
        return __t() . ltrim($manifestArray[$pathWithSlash], '/');
    }
    // No file was found in the manifest, return whatever was passed to mix().
    return __t() . $pathWithOutSlash;
  }
}


?>