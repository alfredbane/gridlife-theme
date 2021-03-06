<?php

/**
 * Template part for displaying sidebar on post detail pages
 *
 * @package WordPress
 * @subpackage Gridlife
 * @since 1.0
 * @version 1.0
 */

?>

<div class="c-sidebar-section">

	<?php

		$the_cat_query = gridlife_get_relatedposts_query(get_the_id(), 12);

	?>

	<div class="c-sidebar-header">
		<label for="sidebar-content">
			<?php echo esc_html__('Related news', 'gridlife')?>
		</label>
	</div>

	<div class="c-sidebar-body">
		<ul role="sidebar-content">

			<?php

			if ( $the_cat_query-> have_posts() ) :

				while ( $the_cat_query->have_posts() ) : $the_cat_query->the_post(); ?>

						<?php if( ( $the_cat_query->current_post+1 ) > 3 ) : ?>

							<li class="compact-content">
								<a href="<?php echo get_the_permalink();?>">

									<span class="featured-image">
										<?php echo get_the_post_thumbnail() ?>
									</span>

								</a>
							</li>

						<?php else: ?>

							<li>
								<a href="<?php echo get_the_permalink();?>">

									<span class="featured-image">
										<?php echo get_the_post_thumbnail(array(100,150)) ?>
									</span>
									<p class="title"><?php the_title(); ?></p>

								</a>
							</li>

						<?php endif; ?>

					</li>

				<?php

				endwhile;

				wp_reset_postdata();

			endif; ?>

		</ul>

	</div>

</div>

<div class="c-sidebar-section">

	<div class="c-sidebar-header">
		<label for="sidebar-content">
			<?php echo esc_html__('Tags', 'gridlife')?>
		</label>
	</div>

	<div class="c-sidebar-body">

		<?php

			$tags = wp_get_post_tags(get_the_ID());
			$class_name = 'c-post-tags';

			if ( ! empty( $tags ) && ! is_wp_error( $tags ) ) {

			    shuffle( $tags );

			    foreach( $tags as $tag ) {
			        printf( '<a class="%1$s" href="%2$s">%3$s</a>',
			            sanitize_html_class( $class_name ),
			            get_tag_link( $tag->term_id ),
			            sprintf( __( '%s') , $tag->name )
			        );
			    }

			}

		 ?>
	</div>

</div>


	<?php if ( is_active_sidebar( 'sidebar-widgets' ) ) : ?>
		<aside id="secondary" class="sidebar widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
		</aside><!-- .sidebar .widget-area -->
	<?php endif; ?>
