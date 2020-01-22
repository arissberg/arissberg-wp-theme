<?php

/**
 * Add favicon links to the head
 *
 * @return void
 */
if (!function_exists('ab_add_favicon')):
  function ab_add_favicon()
  {
    ?>

    <link rel="apple-touch-icon" sizes="180x180" href="<?= __t() .
      'public/img/favicon/apple-touch-icon.png' ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= __t() .
      'public/img/favicon/favicon-32x32.png' ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= __t() .
      'public/img/favicon/favicon-16x16.png' ?>">
    <link rel="manifest" href="<?= __t() .
      'public/img/favicon/site.webmanifest' ?>">
    <link rel="shortcut icon" href="<?= __t() .
      'public/img/favicon/favicon.ico' ?>">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000">

    <?php
  }
endif;

add_action('wp_head', 'ab_add_favicon');

?>
