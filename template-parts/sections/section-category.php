<?php
/**
 * Template sub-part for displaying category based post on front page
 *
 * @package WordPress
 * @subpackage Gridlife
 * @since 1.0
 * @version 1.0
 */

$theme_settings = gridlife_settings();
$ad_code = $theme_settings['opt-category-ad-key'];
$ad_space_position = $theme_settings['opt-category-ad-placement-key'];

if(is_archive()):

	$term = get_queried_object();
	$category = $term->term_id;

else :
	$category = $section_category;
endif;

$the_query = gridlife_set_category_content($category, 6); ?>

		<div class="row no-margin-right">

				<?php

					if($the_query->have_posts()):

							while($the_query->have_posts()) : $the_query->the_post();

								$postindex = $the_query->current_post+1;

								$args = array(
									"postindex"=>$postindex,
									"meta_position"=>$ad_space_position,
									"meta_content"=> $ad_code,
									"excerpt"=>true
								);

								do_action( 'gridlife_display_post', $args);

							endwhile;

							wp_reset_postdata();

					endif;

				?>

		</div>
