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
  Get field in templates after checking if exists 
*/

function find_and_get_field($field_callback) {

  if(!class_exists('ACF')) :
    return ;
  endif;  

  return $field_callback;
  
}

?>
