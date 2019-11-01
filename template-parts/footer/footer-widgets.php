<?php
/**
 * Widget Area Footer.

 */

?>

<section class="widgets py-6 bg-blue-600 text-white">

  <div class="container mx-auto flex flex-wrap lg:flex-no-wrap items-center">

    <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
    <div class="widget w-full text-center lg:text-left">
      <?php dynamic_sidebar( 'sidebar-footer' ); ?>
    </div>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
    <div class="widget w-full text-center order-first lg:order-none">
      <?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
    </div>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
    <div class="widget w-full text-center lg:text-right">
      <?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
    </div>
    <?php endif; ?>

  </div>

  <div class="container mx-auto flex flex-wrap lg:flex-no-wrap items-center">
    <div class="w-full text-center lg:text-left text-xs">&copy; <?php echo date("Y"); ?> | <?= get_bloginfo( 'name' ) ?></div>
    <div class="w-full text-center lg:text-right">
      <?= ab_footer_navigation(); ?>
    </div>
  </div>

</section>