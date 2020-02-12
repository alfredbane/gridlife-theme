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

<!-- Page Content  -->
	<?php

		// Start the loop.
		while ( have_posts() ) :
			the_post(); ?>

				<?php // Include the page content template.
					the_content();
				?>

			<?php
			// End of the loop.
		endwhile;
	?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>
