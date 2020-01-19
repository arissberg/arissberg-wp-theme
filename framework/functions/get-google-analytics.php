<?php
if (!function_exists('ab_get_google_analytics')):
  /**
   * Gets the social links in the theme options and returns and array of values
   *
   * @return array
   */
  function ab_get_google_analytics($script = true)
  {
    $ga_id = sanitize_text_field(get_theme_mod('google_analytics_id'));

    if (empty($ga_id)) {
      return;
    }

    //Return the ID instead of the full script. Might be usefull
    if (!$script) {
      return $ga_id;
    }

    ob_start();
    ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $ga_id ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', '<?= $ga_id ?>');
    </script>

    <?php return ob_get_clean();
  }
endif;

?>
