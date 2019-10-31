<div class="top-navbar-container w-screen">
  <div class="mx-auto px-8 py-3 flex justify-between items-center">

    <div class="site-branding">

    <?php if ( $logo_default_url || $logo_white_url ) : ?>
      <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img class="h-6 w-auto default-logo" src="<?php echo esc_html( $logo_default_url ); ?>" alt="<?php echo esc_html( $logo_text ); ?>">
        <img class="h-6 w-auto white-logo" src="<?php echo esc_html( $logo_white_url ); ?>" alt="<?php echo esc_html( $logo_text ); ?>">
      </a>
      <p class="sr-only" rel="home"><?php echo esc_html( $logo_text ); ?></p>
    <?php endif; ?>

    </div>

    <div class="primary-menu-container">
      <div class="global-menu">
        <?= ( $primary_menu ) ? $primary_menu : ''; ?>
      </div>

      <svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
        <path class="shape-overlays__path"></path>
        <path class="shape-overlays__path"></path>
        <path class="shape-overlays__path"></path>
      </svg>
    </div>

    <div class="secondary-menu-container flex items-center">

      <?= ( $secondary_menu ) ? $secondary_menu : ''; ?>

      <div class="hamburger js-hover">
        <div class="hamburger__line hamburger__line--01">
          <div class="hamburger__line-in hamburger__line-in--01"></div>
        </div>
        <div class="hamburger__line hamburger__line--02">
          <div class="hamburger__line-in hamburger__line-in--02"></div>
        </div>
        <div class="hamburger__line hamburger__line--03">
          <div class="hamburger__line-in hamburger__line-in--03"></div>
        </div>
        <div class="hamburger__line hamburger__line--cross01">
          <div class="hamburger__line-in hamburger__line-in--cross01"></div>
        </div>
        <div class="hamburger__line hamburger__line--cross02">
          <div class="hamburger__line-in hamburger__line-in--cross02"></div>
        </div>
      </div>

    </div>

  </div>
</div>