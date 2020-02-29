<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div class="c-post-meta-single">
	
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">

	    <?php
	    if(function_exists('bcn_display'))
	    {
	            bcn_display();
	    }?>

	</div>

	<div class="c-post-publish-date">

		<time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished">
			<?php echo get_the_date('d.m.Y / l / h:i A'); ?>
		</time>

	</div>

</div>

<section class="c-post-detail">
	<div class="row">
		<aside class="c-sidebar col-lg-3 col-md-3">
			<?php get_template_part( 'template-parts/content', 'sidebar' ); ?>
		</aside>

		<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-8 col-md-8'); ?>>

			<div class="entry-content">

				<?php
					the_content();
				?>
			</div><!-- .entry-content -->
			
		</article><!-- #post-<?php the_ID(); ?> -->
	</div>
</section>
