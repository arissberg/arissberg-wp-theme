<?php
/**
 * Widget Area Footer.

 */

?>
<section class="widgets py-6">
  <div class="container mx-auto flex flex-wrap lg:flex-no-wrap items-center">
    <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
      <div class="widget w-full text-center lg:text-left">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
      </div>
      <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
    <div class="widget w-full text-center text-center lg:text-left">
      <?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="widgets py-6">

  <div class="container mx-auto flex flex-wrap lg:flex-no-wrap items-center">

    <?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
    <div class="widget w-full text-center lg:text-left">
      <?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
    </div>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
    <div class="widget w-full text-center lg:text-right">
      <?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
    </div>
    <?php endif; ?>

  </div>

</section>

<section class="widgets py-6 bg-blue-600 text-white">

  <div class="container mx-auto flex flex-wrap lg:flex-no-wrap items-center">
    <div class="w-full text-center lg:text-left text-2xs uppercase">
      &copy; <?php echo date("Y"); ?> | <?= get_bloginfo( 'name' ) ?>
    </div>

    <?php if ( is_active_sidebar( 'sidebar-footer-5' ) ) : ?>
    <div class="widget w-full text-center lg:text-right">
      <?php dynamic_sidebar( 'sidebar-footer-5' ); ?>
    </div>
    <?php endif; ?>

  </div>

</section>