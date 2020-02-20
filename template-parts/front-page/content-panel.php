<?php

/**
 * Template sub-part for setting layout for the articles
 *
 * @package WordPress
 * @subpackage Snow
 * @since 1.0
 * @version 1.0
 *
 */

?>

<article itemscope itemtype="<?php echo set_schema_type('excerpt') ?>" 
	style="background-image:url(<?php echo get_the_post_thumbnail_url()?>)" 
	class="post-<?php echo get_the_id(); ?> c-article c-article-short has-Background-img">

	<div class="c-excerpt">
		<?php echo snow_get_post_categories(get_the_id()); ?>
		<h6 itemprop="<?php echo set_schema_title_prop('excerpt') ?>" class="c-article-title">
			<a href="<?php echo esc_url(get_the_permalink(get_the_ID())); ?>" alt="link to news">
				<?php echo esc_html__(get_the_title()) ?>
			</a>
		</h6>
	</div>
</article>