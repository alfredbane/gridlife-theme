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


?>



<div class="c-section-item">
	<?php
		// args

		if($theme_settings['first-section-right-column']) :

			foreach ( $theme_settings['first-section-right-column'] as $term ) :

				$args = array(
					'post_type'		=> 'post',
					'post_status'	=> 'publish',
					'cat' => $term,
					'posts_per_page'	=> 1,
					'order'		=> 'ASC',	
				);

				$the_query = new WP_Query($args);

				if($the_query->have_posts()):

					while($the_query->have_posts()) : $the_query->the_post();

						$postindex = $the_query->current_post+1;

						$break_count = 3;

						do_action( 'snow_display_post', $postindex );

					endwhile;

					wp_reset_postdata();
					
				endif;
			endforeach;
		endif;

	?>
</div>	