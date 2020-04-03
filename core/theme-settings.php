<?php

/**
 * Include the snow TGM script init class.
 *
 * @since snow 1.0
 *
 */

require_once get_template_directory() . '/core/TGM_script/snowtgm_init.php';

/**
 * Include the Redux Framework class and settings.
 *
 * @since snow 1.0
 *
 */
 if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
     require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
 }
 if ( !isset( $snow_settings ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/theme-config.php' ) ) {
     require_once( dirname( __FILE__ ) . '/ReduxFramework/theme-config.php' );
 }


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
 * 4). Remove emoticon support from theme
 *
 * @method WP hooks, print_emoji_detection_script
 * @since snow v1.0.0
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
