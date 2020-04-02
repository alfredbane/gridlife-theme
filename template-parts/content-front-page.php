<?php
/**
 * Template part for displaying sections on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */

$theme_settings = snow_settings();

$categories_settings = $theme_settings['section-categories'] ? $theme_settings['section-categories']: '' ;

?>

<section class="section c-section">
	<div class="row">

		<div class="col-xs-12 col-md-8 col-lg-8 no-padding-right">

			<?php get_template_part( 'template-parts/front-page/landing/block', 'topleft' ); ?>

			<?php get_template_part( 'template-parts/front-page/landing/block', 'bottomleft' ); ?>

		</div>

		<div class="col-xs-12 col-md-4 col-lg-4 no-padding-left compact">

			<?php get_template_part( 'template-parts/front-page/landing/block', 'right' ); ?>

		</div>

	</div>
</section>

<section class="section c-section">
	<div class="row">

		<?php do_action('snow_category_var', 'recent_posts'); ?>
		<div class="col-xs-12 col-md-3 col-lg-3 no-padding-right">
			<?php
				get_template_part( 'template-parts/sections/section', 'sidebar' );
			?>
		</div>

		<div class="col-xs-12 col-md-9 col-lg-9 no-padding-left">
			<?php
				get_template_part( 'template-parts/sections/section', 'category' );
			?>
		</div>

	</div>
</section>

<?php

	if( $categories_settings ):

		foreach ($categories_settings as $item) { ?>

			<?php do_action('snow_category_var', $item); ?>

			<section class="section c-section">
				
				<div class="row">

					<div class="col-xs-12 col-md-3 col-lg-3 no-padding-right">

						<?php

							get_template_part( 'template-parts/sections/section', 'sidebar' );

						?>

					</div>

					<div class="col-xs-12 col-md-9 col-lg-9 no-padding">

						<?php get_template_part( 'template-parts/sections/section', 'category' ); ?>

					</div>

				</div>
			</section>

	<?php	}

	endif;

	?>

	<section class="section c-section c-section-labelcustom c-weather-forecasts">

			<?php
				get_template_part( 'template-parts/sections/section', 'weather' );
			?>

	</section>
