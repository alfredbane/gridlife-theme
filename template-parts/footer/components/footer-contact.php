<?php
/**
 * Template part component for footer contact navigation
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */
global $autumn_settings;

$email = !empty( $autumn_settings['opt-business-email'] ) ? $autumn_settings['opt-business-email'] : get_option('admin_email');
$phone_number= !empty( $autumn_settings['opt-phone-number'] ) ? $autumn_settings['opt-phone-number'] : '';

?>


<h4 class="c-footer__col-title"> <?php echo __("Contact Us"); ?> </h4>
<ul class="c-column__list">
   <li itemprop="itemListElement" class="c-column__item">
      <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress" ><?php echo $autumn_settings['opt-address-text'] ?></span>
   </li>
   <li itemprop="itemListElement" class="c-column__item">
      <a itemprop="email" title="<?php echo __('Email'); ?>" href="mailto:<?php echo $email; ?>" class="c-column__link"><?php echo $email; ?></a>
   </li>
   <li itemprop="itemListElement" class="c-column__item">
      <a itemprop="telephone" title="<?php echo __('Phone number'); ?>" href="tel:<?php echo $phone_number; ?>" class="c-column__link"><?php echo $phone_number; ?></a>
   </li>
   <li itemprop="itemListElement" class="c-column__item">
       <span itemprop="openingHours"><?php echo $autumn_settings['opt-opening-days']; ?> : <?php echo $autumn_settings['opt-opening-hours']; ?></span>
   </li>
</ul>
