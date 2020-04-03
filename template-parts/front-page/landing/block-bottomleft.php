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

		if($theme_settings['first-section-left-bottom']) {

			$tax_Query = array(
		        'taxonomy' => 'category', //double check your taxonomy name in you dd
		        'field'    => 'id',
		        'terms'    => $theme_settings['first-section-left-bottom'],
		    );
		}

		$args = array(
			'posts_per_page'	=> 1,
			'post_type'		=> 'post',
			'orderby'			=> 'date',
			'order'				=> 'DESC',
			'tax_query' => array($tax_Query),
		);

		$the_query = new WP_Query($args);

		if($the_query->have_posts()):

			while($the_query->have_posts()) : $the_query->the_post();

				echo snow_article_layout();

			endwhile;

			wp_reset_postdata();

		endif;

	?>
</div>
