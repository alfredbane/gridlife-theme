<?php
/**
 * Template part for displaying sections on front page
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 */
?>

<section class="section c-section">
	<div class="row">
		<div class="col-xs-8 no-padding-right">
			<div class="c-section-item c-slider" data-dotnav=true >
				<?php
					// args
					$args = array(
						'numberposts'	=> -1,
						'post_type'		=> 'post',
						'meta_key'		=> 'the_post_top_story',
						'meta_value'	=> 1
					);

					$the_query = new WP_Query($args);

					if($the_query->have_posts()):
						while($the_query->have_posts()) : $the_query->the_post();
							echo wp_sprintf('<article itemscope itemtype=%1$s style="background-image:url(%2$s)" class="post-%3$s c-article c-article-short has-Background-img">
								<div class="c-excerpt"><label class="c-classification" for="article-%1$s">%4$s</label>
									<h5 itemprop="%6$s" class="c-article-title">%5$s</h5></div>'
								,
								set_schema_type('excerpt'),
								get_the_post_thumbnail_url(),
								get_the_ID(),
								get_the_category_list(get_the_id()),
								esc_html__(get_the_title()),
								set_schema_title_prop('excerpt')
								);
							echo '</article>';

						endwhile;
						wp_reset_query();
					endif;

				?>
			</div>	
		</div>
		<div class="col-xs-4 no-padding-left">
			
		</div>
	</div>
</section>