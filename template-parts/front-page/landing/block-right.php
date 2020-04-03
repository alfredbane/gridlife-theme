<?php
/**
 * Template sub-part for displaying bottom left on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */

$theme_settings = snow_settings();
$ad_code = $theme_settings['opt-home-first-section-ad-key'];
$ad_space_position = $theme_settings['opt-ad-placement-key'];

?>



<div class="c-section-item">
	<?php
		// args

		if($theme_settings['first-section-right-column']) :

			foreach ( $theme_settings['first-section-right-column'] as $key=>$item ) :

				$postindex = $key;

				$args = array(
					'post_type'		=> 'post',
					'post_status'	=> 'publish',
					'cat' => $item,
					'posts_per_page'	=> 1,
					'order'		=> 'DESC',
					'orderby'	=> 'date'
				);

				$the_query = new WP_Query($args);

				if($the_query->have_posts()):

					while($the_query->have_posts()) : $the_query->the_post();

						$args = array(
							"postindex"=>$key,
							"meta_position"=>$ad_space_position,
							"meta_content"=> $ad_code,
							"excerpt"=>false
						);

						do_action( 'snow_display_post', $args);

					endwhile;

					wp_reset_postdata();

				endif;
			endforeach;

		endif;

	?>
</div>
