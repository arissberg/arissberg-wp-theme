<?php
/**
 * Widget Area Footer.

 */

?>

<section class="widgets py-12 bg-blue-600 text-white">

  <div class="container-narrow mx-auto flex flex-wrap lg:flex-no-wrap items-center">

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

  <div class="container-narrow mx-auto flex flex-wrap lg:flex-no-wrap items-center">
    <div class="w-full text-center lg:text-left">
      <?= d6_footer_navigation(); ?>
    </div>
    <div class="w-full text-center lg:text-right text-xs">Copyright &copy; <?php echo date("Y"); ?></div>
  </div>

</section>