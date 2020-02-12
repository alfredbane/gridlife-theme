<?php
/**
 * Snow back compat functionality
 *
 * Prevents Snow from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Snow 1.0.0
 */

/**
 * Prevent switching to Snow on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Snow 1.0.0
 */
function snow_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'snow_upgrade_notice' );
}
add_action( 'after_switch_theme', 'snow_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Snow on WordPress versions prior to 4.7.
 *
 * @since Snow 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function snow_upgrade_notice() {
	/* translators: %s: WordPress version. */
	$message = sprintf( __( 'Snow requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'snow' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Snow 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function snow_customize() {
	wp_die(
		sprintf(
			/* translators: %s: WordPress version. */
			__( 'Snow requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'snow' ),
			$GLOBALS['wp_version']
		),
		'',
		array(
			'back_link' => true,
		)
	);
}
add_action( 'load-customize.php', 'snow_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Snow 1.0.0
 *
 * @global string $wp_version WordPress version.
 */
function snow_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: WordPress version. */
		wp_die( sprintf( __( 'Snow requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'snow' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'snow_preview' );
