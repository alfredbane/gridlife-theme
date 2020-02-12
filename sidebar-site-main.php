<?php
/**
 * Displays site left main sidebar
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */
global $autumn_settings;
?>

<aside class="c-sidebar">

  <div class="c-sidebar__logo">
    <?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
  </div>

  <div class="c-sidebar__nav">
    <?php get_template_part( 'template-parts/sitesidebar/sidebar', 'products' ); ?>
  </div>

  <div class="c-sidebar__footer">

    <!--- Contact component for the sidebar -->
    <?php get_template_part( 'template-parts/sitesidebar/sidebar', 'contact' ); ?>

    <div class="c-sidebar__footer-social-media">

      <!--- Social media links -->
      <?php get_template_part( 'template-parts/socialmedia' ); ?>

    </div>


  </div>
</aside>
