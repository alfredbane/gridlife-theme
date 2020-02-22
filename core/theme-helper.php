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
0). Shortcode support to widgets
1). Global theme settings
2). Get Logo url
    2.1). Display Logo
3). Get product categories
    3.1). Get product category children.
    3.2). Create product category dropdown.
*/

/**
 * 0). Add shortcode support to widgets
 * @method add_action hooks
 * @since snow v1.0.0
 */

add_filter( 'widget_text', 'do_shortcode' );

/**
  * Schema-builder for snow.
  */

require_once( dirname( __FILE__ ) . '/schema-config/config.php' );
require_once( dirname( __FILE__ ) . '/schema-config/theme-schema-helper.php' );

/**
  * Few layouts for theme like sections sidebar etc.
  */
require_once( dirname( __FILE__ ) . '/theme-layout-helper.php' );

/**
 * 1).Theme options global
 * Load the global autumn settings variable from redux
 * @return array
 *
 * @since autumn v1.0.0
 */
function snow_settings() {

  $snow_settings ='';

  if (file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' )) {
     global $snow_settings;
  }

  return $snow_settings;

}

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

      if(!get_snow_theme_logo()){
        if( current_user_can( 'administrator' ) ):
          return sprintf('<span>%s</span>', esc_html__('Add a logo from theme settings', 'snow'));
        else:
          return;
        endif;
      }

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
  * Add admin_ajax for top story toggle feature in post list. 
  * Works in dependency with ACF plugin.
  * @since snow 1.0
  */

if(class_exists('ACF')) :

add_action('wp_ajax_toggle_topstory', 'snow_toggle_topstory_function');

function snow_toggle_topstory_function(){

    $fieldname = 'the_post_top_story';
    
    $post_id = $_POST['currentID'];

    $value = ( $_POST['fieldValue'] === 'true' ) ? 1 : 0;
    
    update_field('field_5e47bac63f1af', $value, $post_id);

    //Don't forget to always exit in the ajax function.
    exit();

}

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function snow_enqueue_custom_admin_script() {
    // snow SmoothState support
  wp_enqueue_script( 'snow-admin-helper', get_template_directory_uri() . '/assets/js/admin/snow-admin-helper-script.js', array(), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'snow_enqueue_custom_admin_script' );

endif;

/**
  * Add an extra column to post in ACF for featued post
  * @since snow 1.0
  */

if(class_exists('ACF')) :

  // Add the custom columns to the book post type:
add_filter( 'manage_post_posts_columns', 'snow_custom_edit_post_columns' );
function snow_custom_edit_post_columns($columns) {
    // unset( $columns['author'] );
    unset($columns['date']);

    $columns['top_stories'] = __( 'Top Story', 'snow' );
    $columns['date'] = __( 'Date', 'snow' );


    return $columns;
}
  
// Add the data to the custom columns for the book post type:
add_action( 'manage_post_posts_custom_column' , 'snow_custom_top_story_column', 10, 2 );
function snow_custom_top_story_column( $column, $post_id ) {
    switch ( $column ) {

        case 'top_stories' :
            $is_enabled = ( get_field('the_post_top_story', $post_id) ) ? "checked" : '';
            echo '<input type="checkbox" '.$is_enabled.' name="top_stories" id="top_stories">';

    }
}

endif;

/** 
 * Add advertisement banner on home page on desired position
 * 
 * @param $break_count  index of post on which the content must be changed.
 * @param $index  current index of the post inside loop. 
 * @since Snow v1.0.0
 */ 

add_action('snow_display_post',  'introduce_ad_banner_within_loop', 10, 2);

function introduce_ad_banner_within_loop($postindex, $break_count) {

    if( $postindex === $break_count ) {

      echo '<img class="ad-banner" src='.get_template_directory_uri().'/assets/image/dummy-ad.jpg alt="ad-image">';
    
    } else {

      echo snow_article_layout();

    }

}

/** 
 * Pass variable to template for sections logic on front page
 * 
 * @param $category_var  term slug to be passed. 
 * @since Snow v1.0.0
 *
 */ 

add_action('snow_category_var',  'set_category_var_global', 12, 1);

function set_category_var_global($category_var) {

    return set_query_var( 'section_category', $category_var );

}

function snow_split_string($string) {

  if( strpos(trim($string), ' ') == false ) {
    return '<span>'.$string.'</span>';
  }
  
  $split_string = explode(" ", $string);

  $end_element = end($split_string);

  $html = '';

  foreach( $split_string as $word ):

    if( $word !== $end_element) {
      
      $html .= '<div class="label-inline"><span>'.$word.'</span>';

    } else {

      $html .= '</div><span class="c-side-regular">'.$word.'</span>';

    }

  endforeach;

  return $html;

}