<?php
/**
 * Template sub-part for displaying top left on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */
?>



<div class="c-section-item">
	
	<div class="c-banner__counter"> 
		<div class="c-banner__counter-current"></div>
		<span class="divider"> / </span>
		<div class="c-banner__counter-total"></div>
	</div>
	
	<div class="c-slider" data-autoplay="true" data-slidespeed="4000" data-fade="true" data-dotnav="true" >
	<?php
		// args
		$args = array(
			'numberposts'	=> 5,
			'post_type'		=> 'post',
			'meta_key'		=> 'the_post_top_story',
			'meta_value'	=> 1
		);

		$the_query = new WP_Query($args);

		if($the_query->have_posts()):

			while($the_query->have_posts()) : $the_query->the_post();

				echo wp_sprintf('<article itemscope itemtype=%1$s style="background-image:url(%2$s)" class="post-%3$s c-article c-article-short has-Background-img">
					<div class="c-excerpt">%4$s
						<h6 itemprop="%6$s" class="c-article-title">
							<a href="%5$s" alt="link to news">%6$s</a>
						</h6>
					</div>'
					,
					set_schema_type('excerpt'),
					get_the_post_thumbnail_url(),
					get_the_ID(),
					snow_get_post_categories(get_the_id()),
					esc_url(get_the_permalink(get_the_ID())),
					esc_html__(get_the_title())
				);
				echo '</article>';

			endwhile;

			wp_reset_query();
			
		endif;

	?>
</div>	