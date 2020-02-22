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

		$tax_Query = array();

		if($theme_settings['first-section-right-column']) {

			$tax_Query = array(
		        'taxonomy' => 'category', //double check your taxonomy name in you dd 
		        'field'    => 'slug',
		        'terms'    => explode(",", $theme_settings['first-section-right-column']),
		    );
		}

		$args = array(
			'numberposts'	=> 1,
			'post_type'		=> 'post',
			'tax_query' => array($tax_Query),
		);

		$the_query = new WP_Query($args);

		if($the_query->have_posts()):

			while($the_query->have_posts()) : $the_query->the_post();

				$postindex = $the_query->current_post+1;

				$break_count = 3;

				do_action( 'snow_display_post', $postindex, $break_count );

			endwhile;

			wp_reset_postdata();
			
		endif;

	?>
</div>	