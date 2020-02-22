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


?>



<div class="c-section-item">
	<?php
		// args

		$tax_Query = array();

		$args = array(
			'numberposts'	=> 4,
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

			wp_reset_query();
			
		endif;

	?>
</div>	