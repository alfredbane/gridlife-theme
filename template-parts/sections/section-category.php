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

?>



	<?php
		// args

		$tax_Query = '';
		$args = array();

		if( $category !== 'recent_posts' ) :

			$tax_Query = array(
		        'taxonomy' => 'category', //double check your taxonomy name in you dd 
		        'field'    => 'id',
		        'terms'    => $category,
		    );

		endif;

		$args = array(
				'posts_per_page'	=> 6,
				'post_type'		=> 'post',
				'post_status'		=> 'publish',
				'tax_query' => array($tax_Query),
			);

		$the_query = new WP_Query($args);

		echo '<div class="row no-margin-right">';
			
			if($the_query->have_posts()):

				while($the_query->have_posts()) : $the_query->the_post();

					$postindex = $the_query->current_post+1;

					do_action( 'snow_display_post', $postindex, 3, true );

				endwhile;

				wp_reset_query();
				
			endif;

		echo "</div>";

	?>