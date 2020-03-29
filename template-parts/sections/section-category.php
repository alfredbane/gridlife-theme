<?php
/**
 * Template sub-part for displaying category based post on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */

$theme_settings = snow_settings();

$category = $section_category;

$limit = 6;

$the_query = snow_set_category_content($category, 6); ?>

		<div class="row no-margin-right">

				<?php

					if($the_query->have_posts()):

							while($the_query->have_posts()) : $the_query->the_post();

								$postindex = $the_query->current_post+1;

								do_action( 'snow_display_post', $postindex, 3, true );

							endwhile;

							wp_reset_query();

					endif;

				?>

		</div>
