<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "gridlife_settings";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Gridlife Settings', 'gridlife' ),
        'page_title'           => __( 'Gridlife Settings', 'gridlife' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'gridlife-docs',
        'href'  => '',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );
    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => '',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );


    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

     // -> START General settings
     Redux::setSection( $opt_name, array(
         'title'            => __( 'General', 'redux-framework-demo' ),
         'id'               => 'common',
         'icon'             => 'el el-cog',
     ) );

    // -> START Media Uploads
    Redux::setSection( $opt_name, array(
        'title' => __( 'Website logo', 'gridlife' ),
        'id'    => 'website-logo',
        'desc'  => __( 'Upload a new logo by selecting existing or uploading new images using the WordPress native uploader', 'gridlife' ),
        'icon'  => 'el el-picture',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-site-logo',
                'type'     => 'media',
                'title'    => __( 'Add/Edit Logo', 'gridlife' ),
                'subtitle' => __( 'MAIN LOGO, Upload a new logo by selecting existing or uploading new images using the WordPress native uploader', 'gridlife' ),
                'desc'     => __( 'The logo dimension for normal screen must be atleast 211 X 72', 'gridlife' ),
            ),
            array(
                'id'       => 'opt-mobile-logo',
                'type'     => 'media',
                'title'    => __( 'Add/Edit Mobile Logo', 'gridlife' ),
                'subtitle' => __( 'MOBILE LOGO, Upload a new mobile logo by selecting existing or uploading new images using the WordPress native uploader', 'gridlife' ),
                'desc'     => __( 'The logo dimension for mobile screen must be atleast 71 X 53', 'gridlife' ),
            ),
        )
    ) );

    // -> START Social media links
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Social media links', 'gridlife' ),
        'id'     => 'social-media-links',
        'desc'   => __( 'Add new socal media links related to site, add only related URLs.', 'gridlife' ),
        'icon'   => 'el el-globe',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'opt-facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook', 'gridlife' ),
                'subtitle' => __( 'Add your facebook page link or a page that tells about your business. It should not be any page name or search term or any personal acccount URL.', 'gridlife' ),
                'hint'     => array(
                    'content' => 'Add only facebook page link type here, no pagenames etc..',
                )
            ),
            array(
                'id'       => 'opt-pinterest',
                'type'     => 'text',
                'title'    => __( 'Pinterest', 'gridlife' ),
                'subtitle' => __( 'Add your pinterest page link or a page that tells about your business. It should not be any page name or search term or any personal acccount URL.', 'gridlife' ),
                'hint'     => array(
                    'content' => 'Add only pinterest page link type here, no pagenames etc..',
                )
            ),
            array(
                'id'       => 'opt-twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter', 'gridlife' ),
                'subtitle' => __( 'Add your twitter page link or a page that tells about your business. It should not be any page name or search term or any personal acccount URL.', 'gridlife' ),
                'hint'     => array(
                    'content' => 'Add only twitter page link type here, no pagenames etc..',
                )
            ),
            array(
                'id'       => 'opt-instagram',
                'type'     => 'text',
                'title'    => __( 'Instagram', 'gridlife' ),
                'subtitle' => __( 'Add your instagram page link or a page that tells about your business. It should not be any page name or search term or any personal acccount URL.', 'gridlife' ),
                'hint'     => array(
                    'content' => 'Add only instagram page link type here, no pagenames etc..',
                )
            ),
            array(
                'id'       => 'opt-youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube', 'gridlife' ),
                'subtitle' => __( 'Add your youtube page link or a page that tells about your business. It should not be any page name or search term or any personal acccount URL.', 'gridlife' ),
                'hint'     => array(
                    'content' => 'Add only youtube page link type here, no pagenames etc..',
                )
            ),
            array(
                'id'       => 'opt-linkedin',
                'type'     => 'text',
                'title'    => __( 'LinkedIn', 'gridlife' ),
                'subtitle' => __( 'Add your linkedin page link or a page that tells about your business. It should not be any page name or search term or any personal acccount URL.', 'gridlife' ),
                'hint'     => array(
                    'content' => 'Add only linkedin page link type here, no pagenames etc..',
                )
            ),
        )
    ) );

    // -> START Home page settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Home settings', 'gridlife' ),
        'id'               => 'home',
        'icon'             => 'el el-magic',
    ) );

    // -> Home page first section settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'First Section', 'gridlife' ),
        'id'    => 'home-first-settings',
        'desc'  => __( 'Add categories for first section on home page, add category slug here instead of name.', 'gridlife' ),
        'icon'  => 'el el-file',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'first-section-left-bottom',
                'type'     => 'select',
                'data'     => 'terms',
                'args'  => array(
                    'taxonomies' => array( 'category' ),
                    'hide_empty' => true,
                ),
                'title'    => __( 'Left Bottom Category', 'gridlife' ),
                'subtitle' => __( 'Add name of existing category term from post type to display on left bottom of home page first section.', 'gridlife' ),
            ),
            array(
                'id'       => 'first-section-right-column',
                'type'     => 'select',
                'multi'    => true,
                'data'     => 'terms',
                'args'  => array(
                    'taxonomies' => array( 'category' ),
                    'hide_empty' => true,
                ),
                'title'    => __( 'Right Column Categories', 'gridlife' ),
                'subtitle' => __( 'Select name of existing category term from post type to display on right of home page first section. If term is not visible make sure term is selected in atleast one post.', 'gridlife' ),
            ),
        )
    ) );

    // -> Home page first section settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Open Weather API', 'gridlife' ),
        'id'    => 'owapi-settings',
        'desc'  => __( 'Open weather map API settings for the theme.', 'gridlife' ),
        'icon'  => 'el el-file',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'opt-weatherapiurl',
                'type'     => 'text',
                'title'    => __( 'WeatherAPI Url', 'gridlife' ),
                'subtitle' => __( 'Add Weather API url without arguments from which data will be fetched', 'gridlife' ),
            ),

            array(
                'id'       => 'opt-weatherapikey',
                'type'     => 'text',
                'title'    => __( 'WeatherAPI Key', 'gridlife' ),
                'subtitle' => __( 'Add Weather API key, go to openmap api site to get one', 'gridlife' ),
            ),

            array(
                'id'       => 'opt-longitude',
                'type'     => 'text',
                'title'    => __( 'Default location longitude', 'gridlife' ),
                'subtitle' => __( 'Add a defualt location longitude.', 'gridlife' ),
            ),

            array(
                'id'       => 'opt-latitude',
                'type'     => 'text',
                'title'    => __( 'Default location latitude', 'gridlife' ),
                'subtitle' => __( 'Add a defualt location latitude.', 'gridlife' ),
            ),

        )
    ) );

    // -> Home page first section settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Recent Post Section', 'gridlife' ),
        'id'    => 'home-recent-settings',
        'desc'  => __( 'Add recent post section settings for the section to be displayed on home page.', 'gridlife' ),
        'icon'  => 'el el-globe',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'section-heading',
                'type'     => 'text',
                'title'    => __( 'Section Heading', 'gridlife' ),
                'subtitle' => __( 'Add a heading for the section to be displayed on home page.', 'gridlife' )
            ),
            array(
                'id'       => 'section-description',
                'type'     => 'textarea',
                'title'    => __( 'Section Description', 'gridlife' ),
                'subtitle' => __( 'Add a section description to be displayed below heading.', 'gridlife' )
            ),
            array(
                'id'       => 'post-days-padding',
                'type'     => 'text',
                'title'    => __( 'Add Days', 'gridlife' ),
                'subtitle' => __( 'Add number of days upto which recent posts must be shown. example: if value is 10 then recent posts will be shown from today upto 10 days before.', 'gridlife' )
            ),

        )
    ) );

    // -> Home page first section settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Category Sections', 'gridlife' ),
        'id'    => 'home-category-section',
        'desc'  => __( 'Add categories for the section to be displayed on home page.', 'gridlife' ),
        'icon'  => 'el el-globe',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'section-categories',
                'type'     => 'select',
                'multi'    => true,
                'title'    => __( 'Section Categories', 'gridlife' ),
                'data'     => 'terms',
                'args'  => array(
                    'taxonomies' => array( 'category' ),
                    'hide_empty' => true,
                ),
                'subtitle' => __( 'Add comma separated name of existing category term from post type to display on home page category section. I want to change display order than right the categories in that order', 'gridlife' ),
            ),

        )
    ) );


    // -> START Contact settings
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Contact settings', 'gridlife' ),
        'id'               => 'contact',
        'icon'             => 'el el-signal',
    ) );

    // -> START Active campaign settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Newsletter settings', 'gridlife' ),
        'id'    => 'newsletter-settings',
        'desc'  => __( 'Add all the newsletter related settings here. These settings include images, Text, headings, subheadings', 'gridlife' ),
        'icon'  => 'el el-envelope',
        'subsection' => true,
        'fields'     => array(

            array(
                'id'       => 'opt-toggle',
                'type'     => 'switch',
                'title'    => __( 'Enable newsletter popup', 'gridlife' ),
                'subtitle' => __( 'Show subscription pop up on site load.', 'gridlife' ),
            ),

            array(
                'id'       => 'opt-newsletter-image',
                'type'     => 'media',
                'title'    => __( 'Newsletter popup image', 'gridlife' ),
                'subtitle' => __( 'Image used in the popup for newsletter, this popup will appear on website whenevre the site is loaded', 'gridlife' ),
                'required' => array('opt-toggle','equals',true),
                'desc'     => __( 'The image dimension for normal screen must be atleast 600 X 600', 'gridlife' ),
            ),

            array(
                'id'       => 'opt-newsletter-heading',
                'type'     => 'text',
                'title'    => __( 'Newsletter heading', 'gridlife' ),
                'subtitle' => __( 'Heading used in the popup for newsletter, this popup will appear on website whenever the site is loaded', 'gridlife' ),
            ),

            array(
                'id'       => 'opt-newsletter-text',
                'type'     => 'text',
                'title'    => __( 'Newsletter Text', 'gridlife' ),
                'subtitle' => __( 'Text used in the popup for newsletter, this popup will appear on website whenever the site is loaded', 'gridlife' ),
            ),

            array(
                'id'       => 'opt-newsletter-form',
                'type'     => 'textarea',
                'title'    => __( 'Form shortcode', 'gridlife' ),
                'subtitle' => __( 'Add your form shortcode for the site.', 'gridlife' ),
            ),
        )
    ) );

    // -> START Footer settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Contact details', 'gridlife' ),
        'id'    => 'contact-details',
        'desc'  => __( 'Add all the contact details here like address, contact number, email, opening hours.', 'gridlife' ),
        'icon'  => 'el el-phone',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-address-text',
                'type'     => 'textarea',
                'title'    => __( 'Address of business', 'gridlife' ),
                'subtitle' => __( 'Add address to be displayed and keep it simple text, no HTML allowed. It will not render as HTML.', 'gridlife' ),
            ),
            array(
                'id'       => 'opt-phone-number',
                'type'     => 'text',
                'title'    => __( 'Phone number', 'gridlife' ),
                'subtitle' => __( 'Add phone number to be displayed and keep it simple number, no HTML allowed. It will not render as HTML.', 'gridlife' ),
            ),
            array(
                'id'       => 'opt-business-email',
                'type'     => 'text',
                'title'    => __( 'Email address', 'gridlife' ),
                'subtitle' => __( 'Add email address to be displayed and keep it simple number, no HTML allowed. It will not render as HTML.', 'gridlife' ),
            ),
            array(
                'id'       => 'opt-opening-days',
                'type'     => 'text',
                'title'    => __( 'Opening days', 'gridlife' ),
                'subtitle' => __( 'Add opening days for your business to be displayed and keep it simple number, no HTML allowed. It will not render as HTML.', 'gridlife' ),
            ),
            array(
                'id'       => 'opt-opening-hours',
                'type'     => 'text',
                'title'    => __( 'Opening hours', 'gridlife' ),
                'subtitle' => __( 'Add opening hours for your business to be displayed and keep it simple number, no HTML allowed. It will not render as HTML.', 'gridlife' ),
            ),
        )
    ) );

    // -> START Footer settings
    Redux::setSection( $opt_name, array(
        'title' => __( 'Footer settings', 'gridlife' ),
        'id'    => 'footer-settings',
        'desc'  => __( 'Add all the footer settings here like copyright text, payment gateway images, navigation links.', 'gridlife' ),
        'icon'  => 'el el-cogs',
        'fields'     => array(
            array(
                'id'       => 'opt-copyright-text',
                'type'     => 'text',
                'title'    => __( 'Copyright text', 'gridlife' ),
                'subtitle' => __( 'Add copyright text to be displayed in footer and keep it simple text, no HTML allowed. It will not render as HTML.', 'gridlife' ),
            ),
            array(
                'id'       => 'opt-footer-image',
                'type'     => 'media',
                'title'    => __( 'Footer image', 'gridlife' ),
                'subtitle' => __( 'This image can be used anywhere in the site. But mainly is used to add important images like different logos, payment gateway images etc.', 'gridlife' ),
            ),
            array(
                'id'       => 'opt-extra-text',
                'type'     => 'textarea',
                'title'    => __( 'Extra text for footer', 'gridlife' ),
                'subtitle' => __( 'Add extra text to be displayed and keep it simple text, no HTML allowed. It will not render as HTML.', 'gridlife' ),
            ),
        )
    ) );

    // -> START Footer settings
    // Redux::setSection( $opt_name, array(
    //     'title' => __( 'Slider settings', 'gridlife' ),
    //     'id'    => 'slider-settings',
    //     'desc'  => __( 'Add all the site wide default slider settings like slider orientation, slider speed, slider navigation controls, slider image count etc. These settings can be overriden from individual pages', 'gridlife' ),
    //     'icon'  => 'el el-laptop',
    //     'fields'     => array(
    //       array(
    //           'id'            => 'opt-show-slides',
    //           'type'          => 'slider',
    //           'title'         => __( 'Show images', 'gridlife' ),
    //           'subtitle'      => __( 'Number of images to be shown on slider init or page load. cannot be maximum than total images', 'gridlife' ),
    //           'desc'          => __( 'Min: 1, max: 10, step: 1, default value: 2', 'gridlife' ),
    //           'default'       => 2,
    //           'min'           => 1,
    //           'step'          => 1,
    //           'max'           => 10,
    //           'display_value' => 'label'
    //       ),
    //       array(
    //           'id'            => 'opt-image-slides',
    //           'type'          => 'slider',
    //           'title'         => __( 'Slide images', 'gridlife' ),
    //           'subtitle'      => __( 'Number of images to slide on slider interaction. Make sure to always keep the value equal to or less than total, otherwise slider will break', 'gridlife' ),
    //           'desc'          => __( 'Min: 1, max: 4, step: 1, default value: 1', 'gridlife' ),
    //           'default'       => 1,
    //           'min'           => 1,
    //           'step'          => 1,
    //           'max'           => 4,
    //           'display_value' => 'label'
    //       ),
    //       array(
    //           'id'       => 'opt-display-dots',
    //           'type'     => 'switch',
    //           'title'    => 'Display dots',
    //           'subtitle' => 'Display navigation dots below slider. This is a default setting and can be overriden within the page.',
    //           'default'  => false
    //       ),
    //       array(
    //           'id'       => 'opt-infinite-scroll',
    //           'type'     => 'switch',
    //           'title'    => 'Enable Infinite Scroll',
    //           'subtitle' => 'Enable slider content scroll infinitely. The slider will always repeat images once all images are shown. This is a default setting and can be overriden within the page.',
    //           'default'  => false
    //       ),
    //       array(
    //           'id'       => 'opt-autoscroll',
    //           'type'     => 'switch',
    //           'title'    => 'Enable Autoscroll',
    //           'subtitle' => 'Enable slider autoscroll. Images will change / slide automatically after a given time threshold. This is a default setting and can be overriden within the page.',
    //           'default'  => false
    //       ),
    //       array(
    //           'id'            => 'opt-scroll-speed',
    //           'type'          => 'slider',
    //           'title'         => __( 'Autoscroll Speed', 'gridlife' ),
    //           'subtitle'      => __( 'Autoscrll speed for the slider. This setting will work only if autoscroll setting above is enabled.', 'gridlife' ),
    //           'desc'          => __( 'Min: 1, max: 4, step: 1, default value: 1', 'gridlife' ),
    //           'default'       => 1,
    //           'min'           => 1,
    //           'step'          => 1,
    //           'max'           => 4,
    //           'required' => array('opt-autoscroll','equals',true),
    //           'display_value' => 'label'
    //       ),
    //     ),
    //   )

    // );

    Redux::setSection( $opt_name, array(
        'title'            => __( 'Google settings', 'gridlife' ),
        'id'               => 'google-settings',
        'icon'             => 'el el-graph',
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Google Analytics code', 'gridlife' ),
        'id'    => 'analytics-code',
        'desc'  => __( '', 'gridlife' ),
        'icon'  => 'el el-compass',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'opt-ace-editor-js',
              'type'     => 'ace_editor',
              'title'    => __( 'Google Analytics code', 'gridlife' ),
              'subtitle' => __( 'Add google analytics code to be injected in header. Add all the code with script tags to added in your header.', 'gridlife' ),
              'mode'     => 'javascript',
              'theme'    => 'chrome',
              'desc'     => '',
              'default'  => ""
          ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Google Maps', 'gridlife' ),
        'id'    => 'google-map-key',
        'desc'  => __( '', 'gridlife' ),
        'icon'  => 'el el-key',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'opt-google-map-key',
              'type'     => 'text',
              'title'    => __( 'Google maps key', 'gridlife' ),
              'subtitle' => __( 'Add google maps key to be used in order to display maps. Add only key here script will be genrated and added to header.', 'gridlife' ),
          ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Google Adsense', 'gridlife' ),
        'id'    => 'opt-init-ad',
        'desc'  => __( 'Add shortcode ', 'gridlife' ),
        'icon'  => 'el el-key',
        'subsection' => true,
        'fields'     => array(
          array(
              'id'       => 'opt-home-first-section-ad-key',
              'type'     => 'text',
              'title'    => __( 'First Section ad code', 'gridlife' ),
              'subtitle' => __( 'Add shortcode generated from the adsense plugin. Advanced ads plugin is recommended.', 'gridlife' ),
          ),

          array(
              'id'       => 'opt-ad-placement-key',
              'type'     => 'text',
              'title'    => __( 'First Section ad placement', 'gridlife' ),
              'subtitle' => __( 'Advertisement will be placed only in right block, first secnd and third position.', 'gridlife' ),
          ),

          array(
              'id'       => 'opt-category-ad-key',
              'type'     => 'text',
              'title'    => __( 'Category section ad code', 'gridlife' ),
              'subtitle' => __( 'Add shortcode generated from the adsense plugin. Advanced ads plugin is recommended.', 'gridlife' ),
          ),

          array(
              'id'       => 'opt-weather-ad-key',
              'type'     => 'text',
              'title'    => __( 'Weather section ad code', 'gridlife' ),
              'subtitle' => __( 'Add shortcode generated from the adsense plugin. Advanced ads plugin is recommended.', 'gridlife' ),
          ),

          array(
              'id'       => 'opt-category-ad-placement-key',
              'type'     => 'text',
              'title'    => __( 'Category sections ad placement', 'gridlife' ),
              'subtitle' => __( 'Keep the count equalto or below total post count. It can vary based on number of posts shown on page.', 'gridlife' ),
          ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
