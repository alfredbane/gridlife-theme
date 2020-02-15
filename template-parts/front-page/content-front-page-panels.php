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
		<div class="col-xs-8">
			<div class="c-section-item c-slider">
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
							echo '<article style="background-image:url('.get_the_post_thumbnail_url().')" class="post-'.get_the_ID().' c-article c-article-short has-Background-img">';
								echo wp_sprintf(
									'<label class="c-classification" for="article-%1$s">%2$s</label>
										<h3 class="c-article-title">%3$s</h3>'
								,
								get_the_ID(),
								get_the_category_list(get_the_id()),
								esc_html__(get_the_title()));
							echo '</article>';

						endwhile;
						wp_reset_query();
					endif;

				?>
			</div>
			<div class="c-section-item c-slider">
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
							echo '<article style="background-image:url('.get_the_post_thumbnail_url().')" class="post-'.get_the_ID().' c-article c-article-short has-Background-img">';
								echo wp_sprintf(
									'<label class="c-classification" for="article-%1$s">%2$s</label>
										<h3 class="c-article-title">%3$s</h3>'
								,
								get_the_ID(),
								get_the_category_list(get_the_id()),
								esc_html__(get_the_title()));
							echo '</article>';

						endwhile;
						wp_reset_query();
					endif;

				?>
			</div>	
		</div>
		<div class="col-xs-4">
			<div class="c-section-item c-slider c-section-compact">
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
							echo '<article style="background-image:url('.get_the_post_thumbnail_url().')" class="post-'.get_the_ID().' c-article c-article-short has-Background-img">';
								echo wp_sprintf(
									'<label class="c-classification" for="article-%1$s">%2$s</label>
										<h3 class="c-article-title">%3$s</h3>'
								,
								get_the_ID(),
								get_the_category_list(get_the_id()),
								esc_html__(get_the_title()));
							echo '</article>';

						endwhile;
						wp_reset_query();
					endif;

				?>
			</div>
			<div class="c-section-item c-slider c-section-compact">
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
							echo '<article style="background-image:url('.get_the_post_thumbnail_url().')" class="post-'.get_the_ID().' c-article c-article-short has-Background-img">';
								echo wp_sprintf(
									'<label class="c-classification" for="article-%1$s">%2$s</label>
										<h3 class="c-article-title">%3$s</h3>'
								,
								get_the_ID(),
								get_the_category_list(get_the_id()),
								esc_html__(get_the_title()));
							echo '</article>';

						endwhile;
						wp_reset_query();
					endif;

				?>
			</div>
			<div class="c-section-item c-slider c-section-compact">
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
							echo '<article style="background-image:url('.get_the_post_thumbnail_url().')" class="post-'.get_the_ID().' c-article c-article-short has-Background-img">';
								echo wp_sprintf(
									'<label class="c-classification" for="article-%1$s">%2$s</label>
										<h3 class="c-article-title">%3$s</h3>'
								,
								get_the_ID(),
								get_the_category_list(get_the_id()),
								esc_html__(get_the_title()));
							echo '</article>';

						endwhile;
						wp_reset_query();
					endif;

				?>
			</div>	
		</div>
	</div>
</section>