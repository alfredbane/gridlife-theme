<?php

/**
 * Displays header site navigation in mobile
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */

?>

  <button class="c-mobile_nav-button"> <span> <?php echo __("Menu", "snow"); ?> </span> <i class="fas fa-bars"></i> </button>

  <div class="mobilenav">

    <div class="c-nav-header">

      <div class="c-account-access">
        <a href="#" class="c-link"><i class="fas fa-user-circle"></i><span><?php echo __("Login / Signup", "snow"); ?></span></a>
      </div>
      <button class="c-mobile_nav-button close"><i class="fas fa-times"></i></button>

    </div>

    <div class="c-nav-tab">
      <div class="c-label-container">
        <label data-open="#primary" class="c-label-nav active"> <i class="fas fa-paperclip"></i> <span><?php echo __("Pages", "snow"); ?></span> </label>
        <label data-open="#secondary" class="c-label-nav"> <i class="fas fa-sitemap"></i> <span><?php echo __("Categories", "snow"); ?></span> </label>
      </div>
      <div id="primary" class="c-nav-tab-item primary">

        <?php if ( has_nav_menu( 'mobile_nav' ) ) : ?>
            <?php
              wp_nav_menu(
                array(
                  'theme_location' => 'mobile_nav',
                  'menu_class'  => 'c-header__nav-list mobile',
                  'container' => '',
                )
              );
            ?>
        <?php endif; ?>

      </div>

      <div id="secondary" class="c-nav-tab-item secondary hide">
        <ul class="c-header__nav-list mobile">
            <?php wp_list_categories( array(
                'orderby' => 'name',
                'hide_empty' => 1,
                'title_li'   => "" ,
            ) ); ?>
        </ul>
      </div>

    </div>

  </div>
