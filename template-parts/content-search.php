<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="c-page-path">
			<?php echo get_permalink(); ?>
		</a>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="c-search-excerpt">
		<p class="excerpt">
				<?php

					$content = get_the_content();

					if( ! get_the_excerpt() ) {
						echo mb_strimwidth($content, 0, 400, '...');
					} else {
						echo get_the_excerpt();
					}

				?>
			</p>

			<div class="c-article-searchable-meta">
				<div class="categories">


						<?php

						$category = get_the_category();
						$separator = ' | ';
						if (!empty($category)) {
							echo "<span>". __("CATEGORIES: ", "snow")." </span>";
							foreach ($category as $term) {
								echo '<a href="'.get_category_link($term->cat_ID).'">'.$term->cat_name.'</a>'. $separator;
							}
						}
						?>

				</div>

				<div class="tags">

					<?php
						$post_tags = get_the_tags();
						$separator = ' | ';
						if (!empty($post_tags)) {
							echo "<span>". __("TAGS: ", "snow")." </span>";
								foreach ($post_tags as $tag) {
										$output .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' . $separator;
								}
								echo trim($output, $separator);
						}
					?>
				</div>

			</div>

	</div>



</article><!-- #post-<?php the_ID(); ?> -->
