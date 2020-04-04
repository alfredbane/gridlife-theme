<?php

/**
 * Displays header site navigation
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */

$scrolltype = ( is_front_page() || is_archive() ) ? "pp-scroll" : "windowscroll" ;
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>
    <?php
      wp_nav_menu(
        array(
          'theme_location' => 'primary',
          'menu_class'  => 'c-header__nav-list nav navbar-nav',
          'container' => '',
          'depth'       => 1,
        )
      );
    ?>
<?php endif; ?>

<!-- Extra nav links -->
  <div class="c-header__nav-quick-links">
    <ul class="c-header__nav-list ">
      <li class="menu-item">
        <a title="search button" id="modal-7493-01" href="#"><i class="fas fa-search"></i></a>
      </li>
      <li class="menu-item">
        <a title="site rss feeds" href="<?php bloginfo('rss2_url'); ?>"><i class="fas fa-rss"></i></a>
      </li>
      <li class="menu-item">
        <a id="weathersectionlink" data-scrolltype="<?php echo $scrolltype ?>" href="javascript:void(0)"><i class="fas fa-cloud"></i></a>
      </li>
    </ul>
  </div>


  <?php if( wp_is_mobile() ) : ?>
    <?php get_template_part( 'template-parts/header/site', 'mobile-navigation' ); ?>
  <?php endif; ?>
