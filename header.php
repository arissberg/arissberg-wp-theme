<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-7519277-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-7519277-3');
  </script> -->

  <meta charset="<?php bloginfo( 'charset' ); ?>">

  <?php wp_head(); ?>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
</head>

<body <?php body_class(); ?>>

  <?php do_action('ab_body_start'); ?>

  <div class="site-container flex flex-col justify-between h-screen">
    <main id="content" <?php ab_get_main_class(); ?> role="main">

    <?php do_action( 'ab_site_start' ); ?>