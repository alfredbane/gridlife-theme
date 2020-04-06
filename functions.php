<?php

/**
 * gridlife functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://developer.wordpress.org/plugins/}
 *
 * @package gridlife theme
 * @subpackage Gridlife
 * @since gridlife 1.0
 */

/**
 * gridlife theme only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/core/back-compat.php';
}

/**
 * Include the gridlife Theme specific settings
 * TGM script, Redux Framework for theme settings
 * @since gridlife 1.0
 */
require_once get_template_directory() . '/core/theme-settings.php';

/**
 * Include the gridlife Theme helper methods
 * @since gridlife 1.0
 */
require_once get_template_directory() . '/core/theme-helper.php';

 /**
  * Include SVG upload support to wordpress media upload.
  * @since gridlife 1.0
  */

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

     $new_filetypes = array();
     $new_filetypes['svg'] = 'image/svg';
     $file_types = array_merge($file_types, $new_filetypes );

     return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


if ( ! function_exists( 'gridlife_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Create your own gridlife_setup() function to override in a child theme.
	 *
	 * @since gridlife 1.0
	 */
	function gridlife_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/gridlife
		 * If you're building a theme based on gridlife, use a find and replace
		 * to change 'gridlife' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'gridlife' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for custom logo.
		 *
		 *  @since gridlife 1.2
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
		);

		/**
		 * Add Woocommerce support to theme
		 */
		add_theme_support( 'woocommerce' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'gridlife' ),
				'mobile_nav' => __( 'Mobile Menu', 'gridlife' ),
				'mobile_categories' => __( 'Mobile Categories', 'gridlife' ),
				'help_links' => __( 'Footer Menu Primary', 'gridlife' ),
				'useful_links' => __( 'Footer Menu Secondary', 'gridlife' ),
				'social'  => __( 'Social Links Menu', 'gridlife' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://wordpress.org/support/article/post-formats/
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'gallery',
			)
		);

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', gridlife_fonts_url() ) );

		// Load regular editor styles into the new block-based editor.
		add_theme_support( 'editor-styles' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom color scheme.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Pacific Blue', 'gridlife' ),
					'slug'  => 'pacific-blue',
					'color' => '#00afbd',
				),
				array(
					'name'  => __( 'Dark Red', 'gridlife' ),
					'slug'  => 'dark-red',
					'color' => '#640c1f',
				),
				array(
					'name'  => __( 'Bright Red', 'gridlife' ),
					'slug'  => 'bright-red',
					'color' => '#ff675f',
				),
				array(
					'name'  => __( 'Yellow', 'gridlife' ),
					'slug'  => 'yellow',
					'color' => '#ffef8e',
				),
			)
		);

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // gridlife_setup
add_action( 'after_setup_theme', 'gridlife_setup' );


if ( ! function_exists( 'gridlife_fonts_url' ) ) :
	/**
	 * Register Google fonts for gridlife.
	 *
	 * Create your own gridlife_fonts_url() function to override in a child theme.
	 *
	 * @since gridlife 1.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function gridlife_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Merriweather, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Comfortaa font: on or off', 'gridlife' ) ) {
			$fonts[] = 'Comfortaa:300,400,500,600';
		}

		/*
		 * translators: If there are characters in your language that are not supported
		 * by Montserrat, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Hind font: on or off', 'gridlife' ) ) {
			$fonts[] = 'Hind:400,500,600&display=swap&subset=devanagari';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				array(
					'family'  => urlencode( implode( '|', $fonts ) ),
					'subset'  => urlencode( $subsets ),
					'display' => urlencode( 'fallback' ),
				),
				'https://fonts.googleapis.com/css'
			);
		}

		return $fonts_url;
	}
endif;

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since gridlife 1.0
 */
function gridlife_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gridlife_content_width', 1040 );
}
add_action( 'after_setup_theme', 'gridlife_content_width', 0 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since gridlife 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function gridlife_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'gridlife_content_image_sizes_attr', 10, 2 );

/**
 * Enqueues scripts and styles.
 *
 * @since gridlife 1.0
 */
function gridlife_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'gridlife-fonts', gridlife_fonts_url(), array(), null );

	// Flexbox support for the theme
	wp_enqueue_style( 'gridlife-flexbox', 'https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css', array(), '6.3.1' );

	// Slick Slider JS concept css
	wp_enqueue_style( 'gridlife-slick-theme', get_template_directory_uri() . '/assets/vendor/SlickJS/slick-theme.css', array(), '1.8.1' );

	wp_enqueue_style( 'gridlife-slick-default', get_template_directory_uri() . '/assets/vendor/SlickJS/slick.css', array(), '1.8.1' );

	// Theme stylesheet. rand() to avoid caching issues
	wp_enqueue_style( 'gridlife-style', get_stylesheet_uri(), array('gridlife-flexbox'), rand(100,999) );

	/**
	 * PAGEPILIMG INIT FOR FEW PAGES ONLY
	 */

	if( wp_is_mobile() ):

	else:

		if( is_front_page() || is_archive() ):
			// gridlife PagePiling Js support
			wp_enqueue_script( 'gridlife-pagepiling', get_template_directory_uri() . '/assets/vendor/PagePilingJs/jquery.pagepiling.min.js', array('jquery'), '2.0.5', true );

			// gridlife PagePiling Js support
			wp_enqueue_script( 'gridlife-pagepiling-init', get_template_directory_uri() . '/assets/js/gridlife-pagepiling-init.js', array('jquery', 'gridlife-pagepiling'), '1.0.0', true );

		endif;

	endif;

	wp_enqueue_script( 'gridlife-slick-js', get_template_directory_uri() . '/assets/vendor/SlickJS/slick.min.js', array('jquery'), '1.7.2', true );


	//1. gridlife Helper scripts

	/**
	 * 1.1 Glider Init jQuery for gridlife.
	 *
	 * @depends jQuery
	 * @version 1.0.0
	 *
	 */
	wp_enqueue_script( 'gridlife-slick-init-js', get_template_directory_uri() . '/assets/js/gridlife-slick-init.js', array('jquery', 'gridlife-helper'), '1.0.0', true );

	/**
	 * 1.2 Weather API ajax load.
	 *
	 * @depends jQuery
	 * @version 1.0.0
	 *
	 */
	wp_enqueue_script( 'gridlife-weatherapi', get_template_directory_uri() . '/assets/js/weatherapi.js', array('jquery'), '1.0.0', true );

	$theme_settings = gridlife_settings();
	$apicredentials = array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),

	);
	wp_localize_script( 'gridlife-weatherapi', 'weatherapi', $apicredentials );

	/**
	 * 1.3 General helper Jquery modifications
	 * for theme.
	 *
	 * @depends jQuery
	 * @version 1.0.0
	 *
	 */
	wp_enqueue_script( 'gridlife-helper', get_template_directory_uri() . '/assets/js/gridlife-helper.js', array('jquery'), '1.0.0', true );

	/**
	 * 1.4 SmoothState Init jQuery for gridlife.
	 *
	 * @depends jQuery, gridlife-helper
	 * @version 1.0.0
	 *
	 */
	//wp_enqueue_script( 'gridlife-ss-init', get_template_directory_uri() . '/assets/js/gridlife-smoothstate.js', array('jquery', 'gridlife-helper'), '1.0.0', true );


	// Load the html5 shiv.
	wp_enqueue_script( 'gridlife-html5', get_template_directory_uri() . '/assets/vendor/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'gridlife-html5', 'conditional', 'lt IE 9' );

	// FontAwesmoe JS
	wp_enqueue_script( 'fontawesomesolidstyle', 'https://use.fontawesome.com/releases/v5.13.0/js/solid.js', array(), null );

	// FontAwesmoe Brands JS
	wp_enqueue_script( 'fontawesomebrandstyle', 'https://use.fontawesome.com/releases/v5.13.0/js/brands.js', array(), null );

	wp_enqueue_script( 'fontawesome5', 'https://use.fontawesome.com/releases/v5.13.0/js/fontawesome.js', array('fontawesomesolidstyle'), null );

}
add_action( 'wp_enqueue_scripts', 'gridlife_scripts' );

function gridlife_add_footer_styles() {

	if( wp_is_mobile() ):

	else:

    if( is_front_page() || is_archive() ):
			// Theme FullPage concept css
			wp_enqueue_style( 'gridlife-pagepiling', get_template_directory_uri() . '/assets/vendor/PagePilingJs/jquery.pagepiling.css', array(), '3.0.8' );

		endif;

	endif;
};
add_action( 'get_footer', 'gridlife_add_footer_styles' );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since gridlife 1.0
 */
function gridlife_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer widgets', 'gridlife' ),
			'id'            => 'footer-widgets',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'gridlife' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Sidebar widgets', 'gridlife' ),
			'id'            => 'sidebar-widgets',
			'description'   => __( 'Appears at right side of the blog detail page.', 'gridlife' ),
			'before_widget' => '<div id="%1$s" class="widget c-sidebar-section %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<label class="sidebar-content">',
			'after_title'   => '</h5>',
		)
	);

}
add_action( 'widgets_init', 'gridlife_widgets_init' );



?>
