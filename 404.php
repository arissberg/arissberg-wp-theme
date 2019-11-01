<?php

get_header();

?>
  <?php do_action( 'ab_404_before' ); ?>

  <article <?php post_class(); ?>>
    <section class="alignfull bg-white">
      <div class="container-narrow mx-auto flex flex-wrap h-full content-center items-start">
        <div class="copy w-full mt-32 mb-16 text-center">
          <?= the_archive_title( '<h1 class="text-4xl lg:text-5xl sep sep-center">', '</h1>' ); ?>
          <p class="text-xl"><?php esc_html_e( 'Oops! It looks like nothing was found at this location. Maybe try a search?', 'arissberg' ); ?></p>
          <?php get_search_form(); ?>

        </div>

      </div>
    </section>
  </article>

  <?php do_action( 'ab_404_after' ); ?>

<?php

get_footer();

?>