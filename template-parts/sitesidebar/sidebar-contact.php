<?php

/**
 * Displays contact details in left main sidebar
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

<div itemscope itemtype="http://schema.org/ContactPoint" class="c-sidebar__footer-contact">

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
