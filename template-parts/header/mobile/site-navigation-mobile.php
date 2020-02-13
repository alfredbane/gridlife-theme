<?php

/**
 * Displays mobile site navigation
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */

 /**
  * Redux Theme Settings
  */
 global $autumn_settings;

 $email = !empty( $autumn_settings['opt-business-email'] ) ? $autumn_settings['opt-business-email'] : get_option('admin_email');
 $phone_number= !empty( $autumn_settings['opt-phone-number'] ) ? $autumn_settings['opt-phone-number'] : '';


?>

 <div class="c-drawer slide slide--left">
    <div class="c-drawer__header fadeinup">
      <div class="c-drawer__login fadeinup">
        <?php echo autumn_woocommerce_account_link(); ?>
      </div>
    </div>

    <div class="c-drawer__nav-inner fadeinup color--text-white">
         <?php echo autumn_product_categories_display (); ?>
    </div>
    <div class="c-drawer__nav-main fadeinup">
      <?php if ( has_nav_menu( 'help_links' ) ) : ?>
          <?php
            wp_nav_menu(
              array(
                'theme_location' => 'help_links',
                'menu_class'  => 'c-drawer__nav-list',
                'container' => '',
                'walker' => new Autumn_Footer_Menu_Walker(),
                'depth'       => 1,
              )
            );
          ?>
      <?php endif; ?>
    </div>
    <div class="c-drawer__footer fadeinup">

      <div class="c-drawer__contact">
        <div class="c-quick-contact">

          <span class="c-quick-contact__title"><?php echo __('Chat with us'); ?>:</span>

          <ul class="c-quick-contact__list">

            <li class="c-quick-contact__item">
              <img src="<?php echo get_template_directory_uri()."/assets/icon/telephone.svg" ?>" class="c-quick-contact__image">
              <a itemprop="telephone" title="<?php echo __('Phone number'); ?>" href="tel:<?php echo $phone_number; ?>" class="c-quick-contact__link"><?php echo $phone_number; ?></a>
            </li>

            <li class="c-quick-contact__item">
              <img src="<?php echo get_template_directory_uri()."/assets/icon/mail.svg" ?>" class="c-quick-contact__image">
              <a itemprop="email" title="<?php echo __('Email'); ?>" href="mailto:<?php echo $email; ?>" class="c-quick-contact__link"><?php echo $email; ?></a>
            </li>

          </ul>

        </div>
      </div>

      <div class="c-drawer__social-media">
        <!--- Social media links -->
        <?php get_template_part( 'template-parts/socialmedia' ); ?>
      </div>

    </div>
 </div>
