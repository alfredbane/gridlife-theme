<?php
/**
 * The template part for displaying grid of posts
 *
 * @package WordPress
 * @subpackage Autumn_Theme
 * @since Autumn 1.0
 */
?>

	<article class="c-post c-post-inner col-md-6">
	  	<div class="c-post__counter">
		    <span>

		      <?php
						/**
						 * Post counter method
						 * @source core/theme-helper.php
						 * @method autumn_post_header_counter
						 *
						 * @since Autumn version 1.0
						 */
						echo autumn_post_header_counter();
					?>

		    </span>
	  	</div>
		<div class="c-post__date">
			<span>
			  <?php
			    echo get_the_date("d.m.Y", get_the_id());
			  ?>
			</span>
		</div>
		<div class="c-post__meta new-meta">
			<div class="c-post__title">
			<?php
			  echo sprintf("<h5>%s</h5>", get_the_title(get_the_ID()));
			?>
			</div>
			<div class="c-post__picture">
			<?php
			  echo get_the_post_thumbnail(get_the_ID(), 'post-thumbnail');
			?>
			</div>
			<div class="c-post__link">
				<a alt="read more" class="c-button c-button--white" href=<?php echo get_the_permalink(get_the_ID());?>>
				  <span class="c-arrow-button">
				    <span class="c-button__text"><?php echo __("Read more"); ?></span>
				    <span class="c-arrow-button__inner">
				      <span class="c-arrow-button__line c-arrow-button__line--right-arrow"></span>
				    </span>
				  </span>
				</a>
			</div>
		</div>
	</article>
