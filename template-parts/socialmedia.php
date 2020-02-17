<?php
/**
 * Displays social media links in left
 * main sidebar footer
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */

/**
 * Redux Theme Settings
 */
$theme_settings = snow_settings();

$facebook_url = !empty( $theme_settings['opt-facebook'] ) ? $theme_settings['opt-facebook'] : '';
$instagram_url= !empty( $theme_settings['opt-instagram'] ) ? $theme_settings['opt-instagram'] : '';
$twitter_url = !empty( $theme_settings['opt-twitter'] ) ? $theme_settings['opt-twitter'] : '';
$youtube_url = !empty( $theme_settings['opt-youtube'] ) ? $theme_settings['opt-youtube'] : '';
$linkedin_url = !empty( $theme_settings['opt-linkedin'] ) ? $theme_settings['opt-linkedin'] : '';

?>

<?php if ( isset($theme_settings) ): ?>



    <ul class="c-social-media">

      <?php if( $facebook_url ) : ?>
        <li class="c-social-media__item">
          <a target="_blank" aria-label="Facebook" rel="noreferrer" title="Facebook" href="<?php echo $facebook_url ?>" class="c-social-media__link">
            <i class="fab fa-facebook"></i>
          </a>
        </li>
      <?php endif; ?>

      <?php if( $instagram_url ) : ?>
      <li class="c-social-media__item">
        <a target="_blank" aria-label="Instagram" rel="noreferrer" title="Instagram" href="<?php echo $instagram_url ?>" class="c-social-media__link">
          <i class="fab fa-instagram"></i>
        </a>
      </li>
      <?php endif; ?>

      <?php if( $youtube_url ) : ?>
      <li class="c-social-media__item">
        <a target="_blank" aria-label="Youtube" rel="noreferrer" title="Youtube" href="<?php echo $youtube_url ?>" class="c-social-media__link">
          <i class="fab fa-youtube"></i>
        </a>
      </li>
      <?php endif; ?>
      
      <?php if( $twitter_url ) : ?>
      <li class="c-social-media__item">
        <a target="_blank" aria-label="Twitter" rel="noreferrer" title="Twitter" href="<?php echo $instagram_url ?>" class="c-social-media__link">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <?php endif; ?>

      <?php if( $linkedin_url ) : ?>
      <li class="c-social-media__item">
        <a target="_blank" aria-label="Linkedin" rel="noreferrer" title="Linkedin" href="<?php echo $linkedin_url ?>" class="c-social-media__link">
          <i class="fab fa-linkedin"></i>
        </a>
      </li>
      <?php endif; ?>

    </ul>

<?php endif; ?>
