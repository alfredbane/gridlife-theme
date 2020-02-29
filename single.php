<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area c-section">

	<main id="main" class="site-main" role="main">

		<?php
		
			if( have_posts() ) :
				// Start the loop.
				while ( have_posts() ) :
					the_post(); ?>

					<?php snow_post_detail_banner(); ?>

					<?php 

					// Include the single post content template.
					get_template_part( 'template-parts/content', 'single' );

					if ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						//echo autumn_the_post_navigation ('Previous', 'Next');
					}
					// End of the loop.
				endwhile;

			endif;

			wp_reset_postdata();

		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
