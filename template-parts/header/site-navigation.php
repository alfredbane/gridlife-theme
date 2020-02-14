<?php

/**
 * Displays header site navigation
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */

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
        <a href="#"><i class="fas fa-search"></i></a>
      </li>
      <li class="menu-item">
        <a href="#"><i class="fas fa-rss"></i></a>
      </li>
      <li class="menu-item">
        <a href="#"><i class="fas fa-cloud"></i></a>
      </li>
    </ul>
  </div>