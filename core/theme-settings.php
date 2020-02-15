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

?>
