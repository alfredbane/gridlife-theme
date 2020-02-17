<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
		<footer class="c-footer c-footer-fix">
			<div class="container-fluid">
				<div class="row between-xs">
					<div class="col-xs-6">
						<div class="box">
							<?php get_template_part('template-parts/footer/footer','bottom'); ?>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="box">
							 <div class="c-footer-social-media">
							      <!--- Social media links -->
							      <?php get_template_part( 'template-parts/socialmedia' ); ?>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>