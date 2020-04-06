<?php

/**
 * Template sidebar for ub-sections on front page
 *
 * @package WordPress
 * @subpackage Gridlife
 * @since 1.0
 * @version 1.0
 */


 if( is_archive() || is_tag() ):

 	$term = get_queried_object();
 	$category = $term->term_id;

 else :

 	$category = $section_category;

 endif;

?>


<aside class="c-section-item c-section-aside">
	<?php echo gridlife_set_sidebar_label($category, 'समाचार') ?>

	<?php
		if(is_archive()):
			// Previous/next page navigation.
			the_posts_pagination(
				array(
					'screen_reader_text' => ' ',
					'prev_text'          => __( '<<', 'gridlife' ),
					'next_text'          => __( '>>', 'gridlife' ),
					'before_page_number' => '',
				)
			);
		endif;
	?>
</aside>
