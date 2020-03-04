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
  * Include the snow Theme custom nav walker
  * @since snow 1.0
  */
// require_once ( dirname( __FILE__ ) . '/snow_menu_walkers/snow_Main_Menu_Walker.php');
// require_once ( dirname( __FILE__ ) . '/snow_menu_walkers/snow_Footer_Menu_Walker.php');

 /**
  * Include CDN attributes to fontAwesome script enqueue
  * @since snow 1.0
  */
 function add_font_awesome_5_cdn_attributes( $tag, $handle, $src ) {
    if ( 'fontawesome5' === $handle ) {
      $tag = '<script defer type="text/javascript" src="' . esc_url( $src ) . '" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous" ></script>';
    }

    if ( 'fontawesomesolidstyle' === $handle) {
      $tag = '<script defer type="text/javascript" src="' . esc_url( $src ) . '" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous" ></script>';
    }

  return $tag;
}
add_filter( 'script_loader_tag', 'add_font_awesome_5_cdn_attributes', 10, 3 );


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