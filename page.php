<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<main id="site-content" class="c-main-content" data-pp-enable="true" role="main">

	<!-- Page Content  -->
		<?php

			// Start the loop.
			while ( have_posts() ) :
				the_post(); ?>

					<?php // Include the page content template.
						get_template_part( 'template-parts/content', 'page' );
					?>

				<?php
				// End of the loop.
			endwhile;
		?>

	<?php get_footer(); ?>

</main><!-- #site-content -->
