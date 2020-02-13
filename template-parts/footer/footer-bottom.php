<?php
/**
 * The template for displaying the bottom of footer
 * Mainly copyright text and payment options image
 *
 * @package WordPress
 * @subpackage autumn
 * @since Autumn 1.0
 */
 global $autumn_settings;

?>

<div class="c-footer__copyright">

   <span class="c-footer__copyright-content">
     <?php
       if( $autumn_settings['opt-copyright-text'] ) :

         echo $autumn_settings['opt-copyright-text'];

       else:

         printf(
         /* translators: %s: Post author. */
         __( '&copy; %2$d Copyright %1$s | All Rights Reserved', 'autumn' ), get_bloginfo('name'), date('Y')
         );

       endif;
     ?>
   </span>
</div>

<?php if ($autumn_settings['opt-footer-image']) : ?>
  <div class="c-footer__payment-img">
     <img alt=<?php echo __("Available payment options") ?> src=<?php echo $autumn_settings['opt-footer-image']['url'] ?> class="o-icon__user">
  </div>
<?php endif; ?>
