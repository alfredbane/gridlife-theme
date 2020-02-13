<?php

/**
 * Displays product categories in left main sidebar
 *
 * @package WordPress
 * @subpackage Autumn
 * @since 1.0.0
 */


if(  !is_shop() && !is_product_category() ) :

  echo sprintf('<span class="c-sidebar__nav-title o-heading-with-underline">%s</span>',__("Collections"));
	echo autumn_product_categories_display ();

else:

  echo sprintf('<span class="c-sidebar__nav-title o-heading-with-underline">%s</span>',__("Filter By"));
	echo autumn_woocommerce_product_filters();

endif;
