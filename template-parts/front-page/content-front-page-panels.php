<?php
/**
 * Template part for displaying sections on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */
?>

<section class="section c-section">
	<div class="row">
		<div class="col-xs-8 no-padding-right">
			<?php get_template_part( 'template-parts/front-page/panels/page', 'topleft' ); ?>
			<?php get_template_part( 'template-parts/front-page/panels/page', 'bottomleft' ); ?>
		</div>
		<div class="col-xs-4 no-padding-left">
			
		</div>
	</div>
</section>