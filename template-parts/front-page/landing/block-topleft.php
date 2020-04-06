<?php

/**
 * Template sub-part for displaying top left on front page
 *
 * @package WordPress
 * @subpackage Gridlife
 * @since 1.0
 * @version 1.0
 */

?>



<div class="c-section-item">

	<div class="c-slider" data-slide=".c-article" data-autoplay="true" data-slidespeed="4000" data-fade="true" data-dotnav="true" >
		<?php
			// args
			$args = array(
				'posts_per_page'	=> 6,
				'post_status'	=> 'publish',
				'orderby'			=> 'modified',
				'order'				=> 'DESC',
				'post_type'		=> 'post',
				'meta_key'		=> 'the_post_top_story',
				'meta_value'	=> 1
			);

			$the_query = new WP_Query($args);

			if($the_query->have_posts()):


				/**
				 * Post meta div for article post slider
				 */

				$total_posts = ( $the_query->found_posts < 10 ) ? sprintf("%02d", $the_query->found_posts) : $the_query->found_posts ;

				echo '<div class="c-slider-meta">';

					echo wp_sprintf('<label class="meta-heading"><i class="fas fa-newspaper"></i>%s</label>', esc_html__('Top stories', 'gridlife'));
					echo wp_sprintf( '<div class="c-banner__counter">
						<div class="c-banner__counter-current"></div>
						<span class="divider"> / </span>
						<div class="c-banner__counter-total">%s</div>
					</div>', $total_posts );

				echo '</div>';

				// Post meta end

				while($the_query->have_posts()) : $the_query->the_post();

					echo gridlife_article_layout();

				endwhile;

				wp_reset_postdata();

			endif;

		?>
	</div>
</div>
