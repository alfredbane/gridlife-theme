<?php
/**
 * Displays social media links in left
 * main sidebar footer
 *
 * @package WordPress
 * @subpackage Gridlife
 * @since 1.0.0
 */

/**
 * Redux Theme Settings
 */
$gridlife_settings = gridlife_settings();

$facebook_url = !empty( $gridlife_settings['opt-facebook'] ) ? $gridlife_settings['opt-facebook'] : '';
$instagram_url= !empty( $gridlife_settings['opt-instagram'] ) ? $gridlife_settings['opt-instagram'] : '';
$twitter_url = !empty( $gridlife_settings['opt-twitter'] ) ? $gridlife_settings['opt-twitter'] : '';
$youtube_url = !empty( $gridlife_settings['opt-youtube'] ) ? $gridlife_settings['opt-youtube'] : '';
$linkedin_url = !empty( $gridlife_settings['opt-linkedin'] ) ? $gridlife_settings['opt-linkedin'] : '';
$pinterest_url = !empty( $gridlife_settings['opt-pinterest'] ) ? $gridlife_settings['opt-pinterest'] : '';

$social_media_links = array(
  ["title"=>"Facebook link", "icon" => "facebook", "link" => $facebook_url],
  ["title"=>"Instagram link", "icon" => "instagram", "link" => $instagram_url],
  ["title"=>"Twitter link", "icon" => "twitter", "link" => $twitter_url],
  ["title"=>"Youtube link", "icon" => "youtube", "link" => $youtube_url],
  ["title"=>"Linkedin link", "icon" => "linkedin", "link" => $linkedin_url],
  ["title"=>"Pinterest link", "icon" => "pinterest", "link" => $pinterest_url],
)

?>

<?php if ( isset($gridlife_settings) ): ?>

  <ul class="c-social-media">
    <?php foreach($social_media_links as $social_link): ?>
      <?php if( $social_link['link'] ) : ?>
        <li class="c-social-media__item">
          <a target="_blank" aria-label="<?php echo $social_link["title"]; ?>" rel="noreferrer" title="<?php echo $social_link["title"]; ?>" href="<?php echo $social_link["link"]; ?>" class="c-social-media__link">
            <i class="fab fa-<?php echo $social_link["icon"]; ?>"></i>
          </a>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ul>

<?php endif; ?>
