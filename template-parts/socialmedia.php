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
global $autumn_settings;

$facebook_url = !empty( $autumn_settings['opt-facebook'] ) ? $autumn_settings['opt-facebook'] : '';
$instagram_url= !empty( $autumn_settings['opt-instagram'] ) ? $autumn_settings['opt-instagram'] : '';
$twitter_url = !empty( $autumn_settings['opt-twitter'] ) ? $autumn_settings['opt-twitter'] : '';
$youtube_url = !empty( $autumn_settings['opt-youtube'] ) ? $autumn_settings['opt-youtube'] : '';
$linkedin_url = !empty( $autumn_settings['opt-linkedin'] ) ? $autumn_settings['opt-linkedin'] : '';

?>

<?php if ( isset($autumn_settings) ): ?>



    <ul class="c-social-media">

      <?php if( $facebook_url ) : ?>
        <li class="c-social-media__item">
          <a target="_blank" aria-label="Facebook" rel="noreferrer" title="Facebook" href="<?php echo $facebook_url ?>" class="c-social-media__link">
            <img src="<?php echo get_template_directory_uri()."/assets/icon/facebook-icon.svg" ?>" class="c-social-media__image">
          </a>
        </li>
      <?php endif; ?>

      <?php if( $instagram_url ) : ?>
      <li class="c-social-media__item">
        <a target="_blank" aria-label="Instagram" rel="noreferrer" title="Instagram" href="<?php echo $instagram_url ?>" class="c-social-media__link">
          <img src="<?php echo get_template_directory_uri()."/assets/icon/instagram-icon.svg" ?>" class="c-social-media__image">
        </a>
      </li>
      <?php endif; ?>

      <?php if( $youtube_url ) : ?>
      <li class="c-social-media__item">
        <a target="_blank" aria-label="Youtube" rel="noreferrer" title="Youtube" href="<?php echo $youtube_url ?>" class="c-social-media__link">
          <img src="<?php echo get_template_directory_uri()."/assets/icon/youtube-icon.svg"?>" class="c-social-media__image">
        </a>
      </li>
      <?php endif; ?>
      
      <?php if( $twitter_url ) : ?>
      <li class="c-social-media__item">
        <a target="_blank" aria-label="Twitter" rel="noreferrer" title="Twitter" href="<?php echo $instagram_url ?>" class="c-social-media__link">
          <img src="<?php echo get_template_directory_uri()."/assets/icon/twitter-icon.svg" ?>"  class="c-social-media__image">
        </a>
      </li>
      <?php endif; ?>

      <?php if( $linkedin_url ) : ?>
      <li class="c-social-media__item">
        <a target="_blank" aria-label="Linkedin" rel="noreferrer" title="Linkedin" href="<?php echo $linkedin_url ?>" class="c-social-media__link">
          <img src="<?php echo get_template_directory_uri()."/assets/icon/linkedin-icon.svg"?>" class="c-social-media__image">
        </a>
      </li>
      <?php endif; ?>

    </ul>

<?php endif; ?>
