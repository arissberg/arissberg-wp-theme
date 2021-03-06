<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <?= ab_get_google_analytics() ?>

  <meta charset="<?php bloginfo('charset'); ?>">

  <?php wp_head(); ?>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
</head>

<body <?php body_class(); ?>>

  <?php do_action('ab_body_start'); ?>

  <div class="site-container">
    <main id="content" <?php ab_get_main_class(); ?> role="main">

    <?php do_action('ab_site_start'); ?>
