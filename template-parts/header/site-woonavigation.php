<?php

/**
 * Displays header site navigation
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */

?>

  <?php if ( class_exists('WooCommerce') ) : ?>

    <div class="c-ecommerce-actions">

      <?php if( !wp_is_mobile() ) : ?>

        <div class="c-ecommerce-actions__account">
          <?php echo autumn_woocommerce_account_link(); ?>
        </div>

      <?php endif; ?>

      <div class="c-ecommerce-actions__cart">
        <img src="<?php echo get_template_directory_uri()."/assets/icon/bucket.svg" ?>" class="o-icon__bucket" />
        <a class="c-ecommerce-actions__cart-link" href="#" title="<?php _e('Cart','woothemes'); ?>"><?php _e('Cart','woothemes'); ?></a>
      </div>

    </div>

  <?php endif;  ?>
