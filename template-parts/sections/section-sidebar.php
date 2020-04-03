<?php

/**
 * Template sidebar for ub-sections on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */


 if(is_archive()):
 	$term = get_queried_object();
 	$category = $term->term_id;
 else :
 	$category = $section_category;
 endif;

?>


<aside class="c-section-item c-section-aside">
	<?php echo snow_set_sidebar_label($category, 'समाचार') ?>

	<?php
		if(is_archive()):
			// Previous/next page navigation.
			the_posts_pagination(
				array(
					'screen_reader_text' => ' ',
					'prev_text'          => __( '<<', 'snow' ),
					'next_text'          => __( '>>', 'snow' ),
					'before_page_number' => '',
				)
			);
		endif;
	?>
</aside>
