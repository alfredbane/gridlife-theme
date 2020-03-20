<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="c-post-meta-single">

	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">

	    <?php
	    if(function_exists('bcn_display'))
	    {
	            bcn_display();
	    }?>

	</div>

	<div class="c-post-publish-date">

		<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished">
			<?php echo get_the_date('d.m.Y / l / h:i A'); ?>
		</time>

	</div>

</div>

<section class="c-post-detail">
	<div class="row">

		<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9 col-md-9 col-sm-12 col-xs-12'); ?>>

			<div class="entry-content">

				<?php
					the_content();
				?>
			</div><!-- .entry-content -->

			<?php

				if ( is_singular( 'post' ) ) {

					if ( class_exists("Wpfc_Public") ):
						echo do_shortcode("[gs-fb-comments]");
					endif;

					// Previous/next post navigation.
					echo snow_the_post_navigation ('Previous', 'Next');

				}
			?>
		</article><!-- #post-<?php the_ID(); ?> -->

		<aside class="c-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
		</aside>

	</div>
</section>

<?php


	$terms = get_the_terms( get_the_ID(), 'category' );

    if ( empty( $terms ) ) $terms = array();

    $term_list = wp_list_pluck( $terms, 'term_id' );

	do_action('snow_category_var', $term_list[0]);


?>

<section class="section">
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
