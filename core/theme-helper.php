<?php
/**
 *  The file includes all the helper methods used
 *  in the theme like custom logo etc.
 *
 *  @since snow v1.0.0
 */

/*
=======================
        INDEX
=======================
1). Shortcode support to widgets
2). Get Logo url
    2.1). Display Logo
3). Get product categories
    3.1). Get product category children.
    3.2). Create product category dropdown.
*/

/**
 * 1). Add shortcode support to widgets
 * @method add_action hooks
 * @since snow v1.0.0
 */

add_filter( 'widget_text', 'do_shortcode' );

/**
 * 2).Get Logo url
 * Get the logo url from redux settings based on device
 * @return string
 *
 * @since snow v1.0.0
 */

function get_snow_theme_logo() {

  $theme_settings = snow_settings();

  $site_logo = '';

  // Desktop device logo
  $desktop_device_logo = !empty ($theme_settings['opt-site-logo']['url']) ?
               $theme_settings['opt-site-logo']['url'] : '';

  // Mobile device logo
  $mobile_device_logo = !empty ($theme_settings['opt-mobile-logo']['url']) ?
               $theme_settings['opt-mobile-logo']['url'] : $theme_settings['opt-site-logo']['url'];

  // If site loads in mobile device load mobile logo
  if ( wp_is_mobile() ) {
    return $site_logo = $mobile_device_logo;
  }

  // Always return a desktop device logo
  return $site_logo = $desktop_device_logo;

}
/**
 * 2.1). Display Logo
 * Theme logo display function using theme redux settings
 *
 * @param string for custom class
 * @param array of schema.org
 *
 * @since snow v1.0.0
 * @return HTML5 image tag
 *
 */
if ( ! function_exists( 'snow_theme_logo' ) ) :

  function snow_theme_logo( string $custom_class='', array $schema=[] ) {

      $site_logo = get_snow_theme_logo();
      $itemtype = isset($schema['itemtype']) ? $schema['itemtype'] : '';
      $class = isset($custom_class) ? $custom_class : '';

      // Link attributes
      $title = get_bloginfo('description');
      $href = get_bloginfo('url');

      return sprintf('
        <div class="" itemscope itemtype="%1$s">
          <a href="%2$s" title="%3$s">
            <img class="%4$s" alt="store logo" itemprop="logo" src=%5$s>
          </a>
        </div>', $itemtype, $href, $title, $custom_class, $site_logo);
  }

endif;

/**
 * 3.1). Change admin menu & post type "Post" labels
 *
 * @method snow_change_post_label
 * @since snow v1.0.0
 * @return HTML5
 *
 */
function snow_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}

add_action( 'admin_menu', 'snow_change_post_label' );

/**
 * 3.2). Change admin menu & post type "Post" object
 *
 * @method snow_change_post_object
 * @since snow v1.0.0
 * @return HTML5
 *
 */
function snow_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}

add_action( 'init', 'snow_change_post_object' );


/**
 * 4.1). Create post navigation buttons from params
 *
 * @method snow_post_navigation_previous_button
 * @method snow_post_navigation_next_button
 * @param $link type:string , $text type:string
 * @since snow v1.0.0
 * @return HTML5
 *
 */

function snow_post_navigation_previous_button($link, $text) {



  return wp_sprintf ('<a href="%1$s" rel="prev" class="c-button">
          <span class="c-arrow-button">
            <span class="c-arrow-button__inner">
              <span class="c-arrow-button__line c-arrow-button__line--left-arrow"></span>
            </span>
            <span class="c-button__text c-button__text--align-right">%2$s</span>
          </span>
        </a>', esc_url( $link ), __($text, 'snow' ));

}

function snow_post_navigation_next_button($link, $text) {



  return wp_sprintf ('<a href="%1$s" rel="prev" class="c-button">
          <span class="c-arrow-button">
            <span class="c-button__text">%2$s</span>
            <span class="c-arrow-button__inner">
              <span class="c-arrow-button__line c-arrow-button__line--right-arrow"></span>
            </span>
          </span>
        </a>', esc_url( $link ), __($text, 'snow' ));

}

/**
 * 4.2). Create post navigation from params
 *
 * @method snow_the_post_navigation
 * @param $previous type:string , $next type:string
 * @since snow v1.0.0
 * @return HTML5
 *
 */
function snow_the_post_navigation($previous='', $next='') {

    $prev_post = get_previous_post();

    $prev_id = ( $prev_post !== '' ) ? $prev_post->ID : '';

    $prev_permalink = ( $prev_id !== '' ) ? get_permalink($prev_id) : '';

    $next_post = get_next_post();

    $next_id = ( $next_post !== '' ) ? $next_post->ID : '';;

    $next_permalink = ( $next_id !== '' ) ? get_permalink($next_id) : '';

    ob_start();
    ?>

      <div class="c-post-nav">
        <?php if( $prev_post ):
          echo snow_post_navigation_previous_button($prev_permalink, 'Previous');
         endif; ?>
        <?php if( $next_post ):
          echo snow_post_navigation_next_button($next_permalink, 'Next');
        endif; ?>
      </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}


/**
 * 5). Add number to post card header
 *
 * @method snow_post_header_counter
 * @since snow v1.0.0
 * @return HTML5
 *
 */

function snow_post_header_counter() {

  global $wp_query;

  // Get post per page set in admin settings
  $post_per_page = get_option( 'posts_per_page' );

  // Get current page from pagination
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  // Calculate count for specific tile
  $calculate_count = ( $paged == 1 ) ? $wp_query->current_post + 1 : $wp_query->current_post+ ($paged + 1);

  return sprintf("%02d", $calculate_count);

}
