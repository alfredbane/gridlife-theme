<?php
/**
 * Template part component for footer newsletter
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */


?>

<?php if ( is_active_sidebar( 'footer-widgets' ) ) : ?>
   <div class="c-newsletter" role="complementary">
      <?php dynamic_sidebar( 'footer-widgets' ); ?>
   </div><!-- .sidebar .widget-area -->
<?php endif; ?>