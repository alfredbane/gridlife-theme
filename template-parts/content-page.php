<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage WPGL_THEME
 * @since WPGL 1.0
 */
?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="row">

    <header class="entry-header col-lg-4 col-md-4">
      <span class="divider"></span>
  		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
  	</header><!-- .entry-header -->


  	<div class="entry-content col-lg-8 col-md-8">
  		<?php
  		  the_content();
  		?>
  	</div><!-- .entry-content -->

  </div>

</section><!-- #post-<?php the_ID(); ?> -->
