<?php
/**
* Plugin Name: SweetThemes Framework
* Plugin URI: https://themeforest.net/user/sweet-themes
* Description: SweetThemes Framework required by SweetThemes Theme.
* Version: 1.5.2
* Author: SweetThemes
* Author https://themeforest.net/user/sweet-themes
* Text Domain: niva
*/
$plugin_dir = plugin_dir_path( __FILE__ );

/**

||-> Function: Dynamic Featured Image for 'portfolio' CPT only

*/

function sweetthemes_allowed_post_types() {
    return array('projects', 'st_projects'); //show DFI only in post
}
add_filter('dfi_post_types', 'sweetthemes_allowed_post_types');

/**
||-> Function: require_once() plugin necessary parts
*/
require_once('inc/post-types/post-types.php'); // POST TYPES
require_once('inc/shortcodes/shortcodes.php'); // SHORTCODES
require_once('inc/widgets/widgets.php'); // WIDGETS
require_once('inc/widgets/widgets-theme.php'); // WIDGETS
require_once('inc/metaboxes/metaboxes.php'); // METABOXES
require_once('inc/metaboxes/metaboxes-taxonomy.php'); // METABOXES FOR TAX's
require_once('inc/demo-importer/wbc907-plugin-example.php'); // DEMO IMPORTER
require_once('inc/sb-google-maps-vc-addon/sb-google-maps-vc-addon.php'); // GMAPS
require_once('inc/custom-functions.php'); // CUSTOM FUNCTIONS
require_once('inc/dynamic-featured-image/dynamic-featured-image.php'); // DYNAMIC FEATURED IMAGE
/**
||-> Function: LOAD PLUGIN TEXTDOMAIN
*/
function sweetthemes_load_textdomain(){
    $domain = 'sweetthemes';
    $locale = apply_filters( 'plugin_locale', get_locale(), $domain );
    load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' );
    load_plugin_textdomain( $domain, FALSE, basename( plugin_dir_path( dirname( __FILE__ ) ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'sweetthemes_load_textdomain' );
/**
||-> Function: sweetthemes_framework()
*/
function sweetthemes_framework() {
    // CSS
    wp_register_style( 'style-shortcodes-inc',  plugin_dir_url( __FILE__ ) . 'inc/shortcodes/shortcodes.css' );
    wp_enqueue_style( 'style-shortcodes-inc' );
    wp_register_style( 'style-animations',  plugin_dir_url( __FILE__ ) . 'css/animations.css' );
    wp_enqueue_style( 'style-animations' );
    wp_register_style( 'style-fiters',  plugin_dir_url( __FILE__ ) . 'css/fiters-style.css' );
    wp_enqueue_style( 'style-fiters' );
    
    // SCRIPTS
    wp_enqueue_script( 'vivus', plugin_dir_url( __FILE__ ) . 'js/vivus.min.js', array(), '1.0.0', false );
    wp_enqueue_script( 'classie', plugin_dir_url( __FILE__ ) . 'js/classie.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'js-mt-plugins', plugin_dir_url( __FILE__ ) . 'js/mt-plugins.js', array(), '1.0.0', true );
    wp_enqueue_script( 'select2', plugin_dir_url( __FILE__ ) . 'js/select2.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'percircle', plugin_dir_url( __FILE__ ) . 'js/mt-skills-circle/percircle.js', array(), '1.0.0', true );
    wp_enqueue_script( 'js-sweetthemes-custom', plugin_dir_url( __FILE__ ) . 'js/sweetthemes-custom.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'magnific-popup', plugin_dir_url( __FILE__ ) . 'js/mt-video/jquery.magnific-popup.js', array(), '1.0.0', true );
    wp_enqueue_script( 'filter-sort', plugin_dir_url( __FILE__ ) . 'js/filters-mixitup.min.js', array(), '1.0.0', true );
    wp_enqueue_script( 'filter-main', plugin_dir_url( __FILE__ ) . 'js/filters-main.js', array(), '1.0.0', true );
    wp_enqueue_script( 'particles', plugin_dir_url( __FILE__ ) . 'js/st-particles/particles.min.js', array(), '2.0.0', true );
    wp_enqueue_script( 'particles-app', plugin_dir_url( __FILE__ ) . 'js/st-particles/app.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'sweetthemes_framework' );
/**
||-> Function: sweetthemes_enqueue_admin_scripts()
*/
function sweetthemes_enqueue_admin_scripts( $hook ) {
    // JS
    wp_enqueue_script( 'js-sweetthemes-admin-custom', plugin_dir_url( __FILE__ ) . 'js/sweetthemes-custom-admin.js', array(), '1.0.0', true );
    // CSS
    wp_register_style( 'css-sweetthemes-custom',  plugin_dir_url( __FILE__ ) . 'css/sweetthemes-custom.css' );
    wp_enqueue_style( 'css-sweetthemes-custom' );
    wp_register_style( 'css-fontawesome-icons',  plugin_dir_url( __FILE__ ) . 'css/font-awesome.min.css' );
    wp_enqueue_style( 'css-fontawesome-icons' );
    wp_register_style( 'css-simple-line-icons',  plugin_dir_url( __FILE__ ) . 'css/simple-line-icons.css' );
    wp_enqueue_style( 'css-simple-line-icons' );
}
add_action('admin_enqueue_scripts', 'sweetthemes_enqueue_admin_scripts');
    
    
add_image_size( 'mt_1250x700', 1250, 700, true );
add_image_size( 'mt_320x480', 320, 480, true );
add_image_size( 'mt_900x550', 900, 550, true );
/**
||-> Function: sweetthemes_cmb_initialize_cmb_meta_boxes
*/
function sweetthemes_cmb_initialize_cmb_meta_boxes() {
    if ( ! class_exists( 'cmb_Meta_Box' ) )
        require_once ('init.php');
}
add_action( 'init', 'sweetthemes_cmb_initialize_cmb_meta_boxes', 9999 );
/**
||-> Function: sweetthemes_cmb_initialize_cmb_meta_boxes
*/
function sweetthemes_excerpt_limit($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit) {
        array_pop($words);
    }
    return implode(' ', $words);
}
// |---> REDUX FRAMEWORK
function sweetthemes_RemoveDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'sweetthemes_RemoveDemoModeLink');

/**
||-> Function: mtportfolio_taxonomy_template_from_directory()
*/
function stprojects_taxonomy_template_from_directory($template){
    // is a specific custom taxonomy being shown?
    $taxonomy_array = array('st-projects-category');
    foreach ($taxonomy_array as $taxonomy_single) {
        if ( is_tax($taxonomy_single) ) {
            if(file_exists(trailingslashit(plugin_dir_path( __FILE__ ) . 'inc/templates/projects/taxonomy-projects-archive.php'))) {
                $template = trailingslashit(plugin_dir_path( __FILE__ ) . 'inc/templates/projects/taxonomy-projects-archive.php');
            }else {
                $template = plugin_dir_path( __FILE__ ) . 'inc/templates/projects/taxonomy-projects-archive.php';
            }
            break;
        }
    }
    return $template;
}
add_filter('template_include','stprojects_taxonomy_template_from_directory');

/* Filter the single_template with our custom function project*/
function stprojects_single_template($single) {
    global $wp_query, $post;
    /* Checks for single template by post type */
    if ( $post->post_type == 'st_projects' ) {
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'inc/templates/projects/single/single-project.php' ) ) {
            return plugin_dir_path( __FILE__ ) . 'inc/templates/projects/single/single-project.php';
        }
    }
    return $single;
}
add_filter('single_template', 'stprojects_single_template');

/* Filter the single_template with our custom function member*/
function member_single_template($single) {
    global $wp_query, $post;
    /* Checks for single template by post type */
    if ( $post->post_type == 'member' ) {
        if ( file_exists( plugin_dir_path( __FILE__ ) . 'inc/templates/members/single/single-member.php' ) ) {
            return plugin_dir_path( __FILE__ ) . 'inc/templates/members/single/single-member.php';
        }
    }
    return $single;
}
add_filter('single_template', 'member_single_template');

/**
||-> ... Custom functions here ...
*/
?>