<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<main id="site-content" class="c-main-content" data-pp-enable="true" role="main">

	<div id="primary" class="content-area c-search-content">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<div class="entry-meta">
					<label class="search-page-count">
						<?php
							global $wp_query;

							echo wp_sprintf("%1d result(s) found for the term : <span class='search-query'>%2s</span>", $wp_query->found_posts, get_search_query());
						?>
					</label>
				</div><!-- .page-header -->
			</header><!-- .page-header -->

			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<?php
						// Start the loop.
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

							// End the loop.
						endwhile;

						// Previous/next page navigation.
						the_posts_pagination(
							array(
								'prev_text'          => __( 'Previous page', 'twentysixteen' ),
								'next_text'          => __( 'Next page', 'twentysixteen' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
							)
						);

						// If no content, include the "No posts found" template.
					else :
						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			</div>
		</div>

	</div><!-- .content-area -->
	<?php get_footer(); ?>
</main><!-- .site-main -->
