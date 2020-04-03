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
 *  Get field in templates after checking if exists
*/

function find_and_get_field($field_callback) {

  if(!class_exists('ACF')) :
    return ;
  endif;

  return $field_callback;

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

/**
 * Split the heading from the title.
 *
 * @param String $string Title from the content.
 * @param String $fallback_text Fallback text in case title is single word.
 * @return HTML
 * @since Snow v1.0.0
 *
 */

function snow_split_string($string, $fallback_text = 'news') {

  $split_string = array($string, $fallback_text);

  if( strpos(trim($string), ' ') !== false ) {
    $split_string = explode(" ", $string);
  }

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

function snow_get_relatedposts_query($post_id, $post_limit='') {

    $terms = get_the_terms( $post_id, 'category' );

    if ( empty( $terms ) ) $terms = array();

    $term_list = wp_list_pluck( $terms, 'slug' );

    $tax_Query = array(
      'taxonomy' => 'category', //double check your taxonomy name in you dd
      'field'    => 'slug',
      'terms'    => $term_list,
    );

    $related_args = array(

      'post_type' => 'post',
      'posts_per_page' => $post_limit,
      'post_status' => 'publish',
      'post__not_in' => array( $post_id ),
      'orderby' => 'rand',
      'tax_query' => array($tax_Query),


    );

    return new WP_Query($related_args);

}

function snow_set_category_content($category, $limit=6) {
  // args

    $tax_Query = '';
    $single_post_id = '';

    $args = array();

    if( $category !== 'recent_posts' ) :

      $tax_Query = array(
            'taxonomy' => 'category', //double check your taxonomy name in you dd
            'field'    => 'id',
            'terms'    => $category,
        );

    endif;

    if ( is_single() ) {

      global $post;
      $single_post_id = get_the_ID();

    }

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(
        'post_type'   => 'post',
        'posts_per_page'  => 6,
        'paged' => $paged,
        'post_status'   => 'publish',
        'post__not_in'  => array($single_post_id),
        'tax_query' => array($tax_Query),
      );

    return new WP_Query($args);

}

function get_weather_icon( $weather_type_id ) {

    if( !$weather_type_id ) {
      return;
    }

    $icon = '';

    switch( $weather_type_id ) {

      case ($weather_type_id == 800):
        $icon='<i class="fas fa-sun"></i>';
        break;

      case ($weather_type_id >= 500 && $weather_type_id <= 531):
        $icon='<i class="fas fa-cloud-rain"></i>';
        break;

      case ($weather_type_id > 800 && $weather_type_id <= 804):
        $icon='<i class="fas fa-cloud-sun"></i>';
        break;

      default:
        $icon='<i class="fas fa-sun"></i>';
    }

    return $icon;

}

function snow_get_the_weather() {

  if(!function_exists('callAPI')):
    return;
  endif;


  $theme_settings = snow_settings();
  $apiUrl = $theme_settings['opt-weatherapiurl'];
  $apiKey = $theme_settings['opt-weatherapikey'];
  $defaultLong = '';
  $defaultLat = '';


  if ( wp_doing_ajax() ) {
    $defaultLong = $_GET['lon'];
    $defaultLat = $_GET['lat'];
  } else {
    $defaultLong = $theme_settings['opt-longitude'];
    $defaultLat = $theme_settings['opt-latitude'];
  }

  $defaultParams = '/?lat='.$defaultLat.'&lon='.$defaultLong.'&cnt=8&appid='.$apiKey;

  $get_data = callAPI('GET', $apiUrl.$defaultParams, false);

  $response = json_decode($get_data, true);
  $errors = $response['response']['errors'];

  $city = array("city"=>$response['city']['name']);
  $temperature_array = array();

  foreach($response['list'] as $forecast):

    $get_icon = get_weather_icon($forecast['weather'][0]['id']);
    setlocale(LC_ALL, 'hi_IN');
    $get_date = date('l, d F Y', $forecast['dt']);
    $get_time = date('h:i A', $forecast['dt']);
    $get_temp = floor($forecast['main']['temp']-273.15).'&#8451;';

    $temp = array("icon"=>$get_icon, "date"=>$get_date, "time"=>$get_time, "temperature"=>$get_temp);

    array_push($temperature_array, $temp);

  endforeach;

  if ( wp_doing_ajax() ) :

    echo json_encode(array_merge($city, array("main"=>$temperature_array)), JSON_PRETTY_PRINT);
    die();

  else :

  return array_merge($city, array("main"=>$temperature_array));

  endif;

}

add_action("wp_ajax_snow_get_the_weather", "snow_get_the_weather");
add_action("wp_ajax_nopriv_snow_get_the_weather", "snow_get_the_weather");


/**
 * Scrap image from the content in wordpress.
 * acting as fallback image if no image is found.
 *
 * @param Integer $post_id
 * @return IMAGE
 * @since Snow v1.0.0
 *
 */

function snow_scrap_image_from_content( $post_id ) {

  $first_img = '';
  $get_content = get_the_content( $post_id );
  ob_start();
  ob_end_clean();

  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $get_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = get_template_directory().'/assets/image/default-post-image.jpg';
  }

  return $first_img;

}
