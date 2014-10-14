<?php
/**
 * Theme setup and function definitions
 *
 * @package     WordPress
 * @subpackage  Hoverboard Child Theme
 * @since       0.1.0
 */

/**
 * Adds constants for accessing the assets directory by URI and filepath
 */
define('THEME_DIR',  get_stylesheet_directory_uri());
define('THEME_PATH', get_stylesheet_directory());
define('ASSETS_DIR',  THEME_DIR . '/assets');
define('ASSETS_PATH', THEME_PATH . '/assets');

// Boots up the add-ons folder
require_once 'includes/load.php';

/**
 * THEME INITIALIZATION
 * --------------------
 * 
 * This function runs after the parent theme is setup.
 *
 * Use this function to hook anything that overwrites RotorWash. It's important 
 * that any actions that override or alter the parent theme are hooked to this 
 * action, because otherwise they won't work.
 *
 * Read more: 
 * - http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
 * 
 * @return void
 */
function hb_setup_theme(  ) {
    /*
     * THEME SCRIPTS & STYLES
     *************************************************************************/
    add_action('wp_enqueue_scripts', 'hb_enqueue_assets');

    // Requires (and allows quick install/activation) of plugin dependencies
    $path = THEME_PATH 
          . '/includes/tgm-plugin-activation/class-tgm-plugin-activation.php';
    if (file_exists($path)) {
        require_once $path;
        add_action('tgmpa_register', 'hb_register_required_plugins');
    }

    // If we're not in dev mode, turn on ACF_LITE
    if (defined('WP_DEBUG') && WP_DEBUG!==TRUE) {
        define('ACF_LITE', TRUE);
    }

    /*
     * CUSTOM IMAGE SIZES
     * ------------------
     * Every image size used in the layout should have a custom image size 
     * associated with it. Set them here.
     *************************************************************************/
    //add_image_size( $name, $width = 0, $height = 0, $crop = false )
}
add_action('hoverboard/init', 'hb_setup_theme');

/**
 * Adds scripts and styles for the child theme
 * @return void
 */
function hb_enqueue_assets(  ) {
    /*
     * STYLESHEETS
     *************************************************************************/
    global $wp_styles;

    // Unhooks the Hoverboard stylesheet
    wp_dequeue_style('hoverboard-main-styles');

    // Hooks up the child theme's stylesheet
    wp_enqueue_style(
        'theme-main-styles',
        ASSETS_DIR . '/css/main.min.css',
        array(),
        '1.0.0b' . filemtime(ASSETS_PATH . '/css/main.min.css')
    );

    // This is only necessary if an IE-specific stylesheet is required
    wp_register_style(
        'theme-ie-styles',
        ASSETS_DIR . '/css/ie.css',
        array(),
        '1.0.0b' . filemtime(ASSETS_PATH . '/css/ie.css')
    );

    // Adds a conditional tag
    $wp_styles->add_data('theme-ie-styles', 'conditional', 'lte IE 8');

    // Uncomment this to actually include the IE stylesheet
    wp_enqueue_style('theme-ie-styles');


    /*
     * SCRIPTS
     **************************************************************************/
    
    // If a theme JS file is built, include it
    if (is_readable(ASSETS_PATH . '/js/main.min.js')) {
        wp_enqueue_script('theme-js',
            ASSETS_DIR . '/js/main.min.js',
            array('jquery'),
            '1.0.0b' . filemtime(ASSETS_PATH . '/js/main.min.js'),
            TRUE
        );
    }
}

function hb_register_required_plugins(  ) {
    $plugins = array(
        array(
            'name' => 'Advanced Custom Fields',
            'slug' => 'advanced-custom-fields',
            'required' => TRUE,
        ),
    );

    $config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => FALSE,
        'dismiss_msg'  => '',
        'is_automatic' => TRUE,
        'message'      => '',
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa($plugins, $config);
}
