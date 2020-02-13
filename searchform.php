<?php
/**
 * Template for displaying search forms in Autumn
 *
 * @package WordPress
 * @subpackage Autumn
 * @since Autumn 1.0
 */
?>

<form role="search" method="get" class="c-header__search-bar-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <div class="c-search-bar__input">
    <div class="input-group">
			<div class="input-group-append">
      <input type="search" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" class="c-search-bar__form-control form-control">
      <button id="button-addon1" type="submit" class="c-search-bar__icon"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </div>
</form>

<?php if( wp_is_mobile() ) : ?>
  <button id="button-addon1" type="submit" class="c-search-bar__icon"><i class="fa fa-search"></i></button>
<?php endif; ?>
