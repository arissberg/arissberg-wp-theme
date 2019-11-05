<?php
/**
 * Widget Area Footer.

 */

?>
<section class="widgets">
  <div class="container mx-auto py-10 flex flex-wrap lg:flex-no-wrap items-center border-solid border-t border-b border-gold-200">
    <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
      <div class="widget w-full text-center lg:text-left lg:mr-6">
        <?php dynamic_sidebar( 'sidebar-footer' ); ?>
      </div>
      <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
    <div class="widget w-full text-center text-center lg:text-left lg:ml-6">
      <?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<section class="widgets">

  <div class="container mx-auto py-10 flex flex-wrap lg:flex-no-wrap items-center">

    <?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
    <div class="widget w-full text-center lg:text-left lg:mr-6">
      <?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
    </div>
    <?php endif; ?>

    <?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
    <div class="widget w-full text-center lg:text-right lg:ml-6">
      <?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
    </div>
    <?php endif; ?>

  </div>

</section>

<section class="widgets py-6 bg-blue-300 text-white">

  <div class="container mx-auto flex flex-wrap lg:flex-no-wrap items-center">
    <div class="w-full text-center lg:text-left text-2xs uppercase">
      &copy; <?php echo date("Y"); ?> <?= get_bloginfo( 'name' ) ?>
    </div>

    <?php if ( true ) : ?>
    <div class="widget w-full text-center lg:text-right my-4 lg:my-0">
      <?= ab_social_links( get_customizer_social_links() ); ?>
    </div>
    <?php endif; ?>

  </div>

</section>