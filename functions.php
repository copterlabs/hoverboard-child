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
define('ASSETS_DIR',  get_stylesheet_directory_uri() . '/assets');
define('ASSETS_PATH', get_stylesheet_directory() . '/assets');

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

    /**
     * INCLUDES CUSTOM FIELDS (PRODUCTION ONLY)
     *************************************************************************/
    require_once 'includes/custom-fields.php';

    // Retrieves options to determine which CPTs to grab
    $opts = get_option('rw_theme_settings');

    // Custom post type party!
    $custom_post_types = array();

    if (isset($opts['has_products']) && $opts['has_products']==='yes') {
        $custom_post_types[] = array(
            'singular'      => 'Product',
            'plural'        => 'Products',
            'menu_position' => 7, // Lower number means higher placement
            'supports'      => array('title'),
            'menu_icon'     => 'dashicons-cart',
            'rewrite'       => array(
                'slug' => 'product',
                'with_front' => FALSE
            ),
        );
    }

    if (isset($opts['has_services']) && $opts['has_services']==='yes') {
        $custom_post_types[] = array(
            'singular'      => 'Service',
            'plural'        => 'Services',
            'menu_position' => 8, // Lower number means higher placement
            'supports'      => array('title'),
            'menu_icon'     => 'dashicons-awards',
            'rewrite'       => array(
                'slug' => 'service',
                'with_front' => FALSE
            ),
        );
    }

    if (isset($opts['has_testimonials']) && $opts['has_testimonials']==='yes') {
        $custom_post_types[] = array(
            'singular'      => 'Testimonial',
            'plural'        => 'Testimonials',
            'menu_position' => 9, // Lower number means higher placement
            'menu_icon'     => 'dashicons-testimonial',
            'supports'      => array('title'),
        );
    }
    
    // hb_add_custom_post_types($custom_post_types);
    // hb_register_custom_fields();

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

    // Unhooks the RotorWash2 stylesheet
    wp_dequeue_style('rotorwash-main-styles');

    // Hooks up the child theme's stylesheet
    wp_enqueue_style(
        'theme-main-styles',
        ASSETS_DIR . '/css/main.css',
        array(),
        '1.0.0b' . filemtime(ASSETS_PATH . '/css/main.css')
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

function additional_theme_styles()  
{ 
    wp_register_style( 'lte-ie8', ASSETS_DIR . '/assets/css/lte-ie8.css' );

    global $wp_styles;
    $wp_styles->add_data('lte-ie8', 'conditional', 'lte IE 8');

    // enqueing:
    wp_enqueue_style( 'screen'  );
    wp_enqueue_style( 'lte-ie8' );
}
