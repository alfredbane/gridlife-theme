<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
$theme_settings = gridlife_settings();
$sectionclass = ( is_front_page() || is_archive() ) ? "c-section " : "";

?>

			<section id="sectionWeather" class="<?php echo $sectionclass; ?>section c-section-labelcustom c-weather-forecasts">

					<?php
						get_template_part( 'template-parts/sections/section', 'weather' );
					?>

			</section>

			<section class="section c-section c-footer-grid">

				<div class="row">

					<div class="c-footer-columns col-lg-4">

						<h5 class="title">
							<?php echo __("Subscribe", "gridlife"); ?>
						</h5>

						<div class="column-content c-newsletter">

							<?php echo do_shortcode($theme_settings['opt-newsletter-form']); ?>

							<span class="text">
								<?php echo $theme_settings['opt-newsletter-text']; ?>
							</span>

						</div>

					</div>

					<div class="c-footer-columns col-lg-4">


						<h5 class="title">
							<?php echo __("Quick links", "gridlife"); ?>
						</h5>

						<?php if ( has_nav_menu( 'help_links' ) ) : ?>
						    <?php
						      wp_nav_menu(
						        array(
						          'theme_location' => 'help_links',
						          'menu_class'  => 'nav navbar-nav',
						          'container' => '',
						          'depth'       => 1,
						        )
						      );
						    ?>
						<?php endif; ?>

					</div>

					<div class="c-footer-columns has-background-blue-base c-only-text col-lg-4">

						<h5 class="title">
							<?php echo __("Disclaimer", "gridlife"); ?>
						</h5>

						<div class="c-footer-disclaimer">

							<p class="text">
								<?php echo $theme_settings['opt-extra-text']; ?>
							</p>

						</div>

					</div>

				</div>

			</section>

			<footer class="c-footer c-footer-fix">
				<div class="container-fluid">
					<div class="row between-xs">
						<div class="col-xs-6">
							<div class="box">
								<?php get_template_part('template-parts/footer/footer','bottom'); ?>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="box">
								 <div class="c-footer-social-media">
								      <!--- Social media links -->
								      <?php get_template_part( 'template-parts/socialmedia' ); ?>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</footer>

		<?php get_template_part( 'template-parts/content', 'popup' ); ?>

		<?php wp_footer(); ?>
	</body>
</html>
