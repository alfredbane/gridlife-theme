<?php
/**
 * The template for displaying the bottom of footer
 * Mainly copyright text and payment options image
 *
 * @package WordPress
 * @subpackage autumn
 * @since Autumn 1.0
 */

$theme_settings = gridlife_settings(); 

?>

<div class="c-footer__copyright">

   <span class="c-footer__copyright-content">
     <?php
       if( $theme_settings['opt-copyright-text'] ) :

         echo $theme_settings['opt-copyright-text'];

       else:

         printf(
         /* translators: %s: Post author. */
         __( '&copy; %2$d Copyright %1$s | All Rights Reserved', 'autumn' ), get_bloginfo('name'), date('Y')
         );

       endif;
     ?>
   </span>
</div>
