<?php

/**
 * Include the gridlife TGM script init class.
 *
 * @since gridlife 1.0
 *
 */

require_once get_template_directory() . '/core/TGM_script/gridlife_init.php';

/**
 * Include the Redux Framework class and settings.
 *
 * @since gridlife 1.0
 *
 */
 if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
     require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
 }
 if ( !isset( $gridlife_settings ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/theme-config.php' ) ) {
     require_once( dirname( __FILE__ ) . '/ReduxFramework/theme-config.php' );
 }


/**
 * 3.1). Change admin menu & post type "Post" labels
 *
 * @method gridlife_change_post_label
 * @since gridlife v1.0.0
 * @return HTML5
 *
 */
function gridlife_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}

add_action( 'admin_menu', 'gridlife_change_post_label' );

/**
 * 3.2). Change admin menu & post type "Post" object
 *
 * @method gridlife_change_post_object
 * @since gridlife v1.0.0
 * @return HTML5
 *
 */
function gridlife_change_post_object() {
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

add_action( 'init', 'gridlife_change_post_object' );

/**
 * 4). Remove emoticon support from theme
 *
 * @method WP hooks, print_emoji_detection_script
 * @since gridlife v1.0.0
 *
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

function callAPI($method, $url, $data){

   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      default:
            $url = $url;
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}

/**
 * Scrap image from the content in wordpress.
 * acting as fallback image if no image is found.
 *
 * @param Integer $post_id
 * @return IMAGE
 * @since Gridlife v1.0.0
 *
 */

function gridlife_get_fallback_image( $post_id ) {

  $first_img = '';
  $get_content = get_the_content( $post_id );
  ob_start();
  ob_end_clean();

  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $get_content, $matches);
  if( $output ) {
    $first_img = $matches [1] [0];
  }

  if(empty($first_img)){ //Defines a default image
    $first_img = get_template_directory_uri().'/assets/image/default-post-image.jpg';
  }

  return $first_img;

}


function gridlife_get_the_post_thumbnail($post_id) {

  $post_thumbnail = '';
  $post_title = get_the_title($post_id);
  $image_from_content = gridlife_get_fallback_image($post_id);

  if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {

    $post_thumbnail = get_the_post_thumbnail($post_id);

  } else {

    $post_thumbnail = "<img src='".$image_from_content."' alt='$post_title' class='frame' />";

  }

  return $post_thumbnail;

}

function gridlife_get_the_post_thumbnail_url($post_id) {

  $post_thumbnail_url = '';
  $post_title = get_the_title($post_id);
  $image_from_content = gridlife_get_fallback_image($post_id);

  if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {

    $post_thumbnail_url = get_the_post_thumbnail_url($post_id);

  } else {

    $post_thumbnail_url = $image_from_content;

  }

  return $post_thumbnail_url;

}
