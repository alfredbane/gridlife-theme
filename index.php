<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" class="c-main-content" data-pp-enable="true" role="main">

	<?php 
		get_template_part('template-parts/content','front-page');
	?>
	
<?php get_footer(); ?>
</main><!-- #site-content -->

<?php
