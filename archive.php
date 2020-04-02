<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<main id="site-content" class="c-main-content" data-pp-enable="true" role="main">

		<section id="primary" class="content-area c-section">

					<div class="row">
							<div class="col-xs-12 col-md-3 col-lg-3 no-padding-right">

								<?php

									get_template_part( 'template-parts/sections/section', 'sidebar' );

								?>

							</div>

							<div class="col-xs-12 col-md-9 col-lg-9 no-padding-left">

								<?php get_template_part( 'template-parts/sections/section', 'category' ); ?>

							</div>

					</div>

		</section><!-- .content-area -->

			<?php get_footer(); ?>
	</main>
