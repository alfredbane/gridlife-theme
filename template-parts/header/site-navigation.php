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
          'walker' => new Autumn_Main_Menu_Walker(),
          'depth'       => 1,
        )
      );
    ?>
<?php endif; ?>
