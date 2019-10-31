<?php
/**
 * The template for displaying search form.
 *
 */

?>

<form role="search" method="get" class="search-form form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="inline-flex m-8">
    <div class="">
      <div class="has-float-label search-field">
        <input type="search"value="<?php the_search_query(); ?>" name="s" placeholder="<?php esc_html_e( 'Enter Keyword', 'arissberg' ); ?>" required="">
        <label class="wpforms-field-label" for="wpforms-3218-field_0">Search <span class="wpforms-required-label">*</span></label>
      </div>
    </div>
    <div class="">
      <button type="submit" class="search-submit btn btn-blue"><span><?php esc_html_e( 'Search', 'arissberg' ); ?></span><span><i class="cs-icon cs-icon-search"></i></span></button>
    </div>
  </div>
</form>
