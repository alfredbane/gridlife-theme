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
		
		$the_query = snow_set_category_content($category);

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