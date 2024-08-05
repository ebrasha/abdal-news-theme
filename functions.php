<?php
if (!defined('ABSPATH')) {
    die("<h1>Protected By Ebrahim Shafiei (EbraSha)</h1>"); // Exit if accessed directly
}

/*
 **********************************************************************
 * -------------------------------------------------------------------
 * Project Name : AbdalNewsTheme
 * File Name    : functions.php
 * Author       : Ebrahim Shafiei (EbraSha)
 * Email        : Prof.Shafiei@Gmail.com
 * Created On   : 2024-08-03 4:47 PM
 * Description  : [A brief description of what this file does]
 * -------------------------------------------------------------------
 *
 * "Coding is an engaging and beloved hobby for me. I passionately and insatiably pursue knowledge in cybersecurity and programming."
 * – Ebrahim Shafiei
 *
 **********************************************************************
 */
require_once __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;
Carbon::setLocale('fa');

function human_time_diff_carbon($time) {
    $carbonTime = Carbon::parse($time, 'Asia/Tehran');
    return $carbonTime->diffForHumans();

}

add_theme_support('post-thumbnails');



// Enqueue styles and scripts
function abdalnews_enqueue_styles()
{
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.rtl.min.css');
    wp_enqueue_style('main-styles', get_stylesheet_uri());
}

function abdalnews_enqueue_scripts()
{
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'abdalnews_enqueue_styles');
add_action('wp_enqueue_scripts', 'abdalnews_enqueue_scripts');

// Include Bootstrap NavWalker file
require_once get_template_directory() . '/class-bootstrap-navwalker.php';

// Register sidebar
function abdalnews_register_menus()
{
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'abdalnews')
    ));
}

add_action('init', 'abdalnews_register_menus');

// ثبت نوار کناری
function abdalnews_register_sidebars()
{
    register_sidebar(array(
        'name' => __('Main Sidebar', 'abdalnews'),
        'id' => 'main-sidebar',
        'description' => __('Widgets in this area will be shown on all posts and pages.', 'abdalnews'),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'abdalnews_register_sidebars');

// Add short bio option to WordPress customizer
function custom_theme_customizer($wp_customize) {
    $wp_customize->add_section('custom_theme_section', array(
        'title' => __('معرفی کوتاه', 'custom_theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('custom_theme_short_description', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'custom_theme_short_description', array(
        'label' => __('متن معرفی کوتاه', 'custom_theme'),
        'section' => 'custom_theme_section',
        'settings' => 'custom_theme_short_description',
        'type' => 'textarea',
    )));
}
add_action('customize_register', 'custom_theme_customizer');

// Secure Wordpress
// Remove WordPress version from HTML header
remove_action('wp_head', 'wp_generator');

// Remove WordPress version from RSS feeds
add_filter('the_generator', '__return_empty_string');


// Remove WordPress version from CSS and JS files
function remove_wp_version_strings($src) {
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('script_loader_src', 'remove_wp_version_strings');
add_filter('style_loader_src', 'remove_wp_version_strings');


// Add Security headers
function add_security_headers() {
    header('X-XSS-Protection: 1; mode=block');
    header('X-Content-Type-Options: nosniff');
    header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
    header('Permissions-Policy: microphone=()'); // geolocation=(), camera=(), microphone=(), gyroscope=(), magnetometer=()
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Programmer: Ebrahim Shafiei (EbraSha)');
    header('Referrer-Policy: no-referrer-when-downgrade');
}
add_action('send_headers', 'add_security_headers');


// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Prevent access to the xmlrpc.php file
add_action('init', function () {
    if (strpos($_SERVER['REQUEST_URI'], 'xmlrpc.php') !== false) {
        header('HTTP/1.0 403 Forbidden');
        die("<h1>Protected By Ebrahim Shafiei (EbraSha)</h1>");
    }
});



// Disable REST API completely
add_filter('rest_authentication_errors', function ($result) {
    return new WP_Error('rest_disabled', __('REST API is Protected by Ebrahim Shafiei (EbraSha)'), array('status' => 403));
});

// Remove REST API related headers
remove_action('template_redirect', 'rest_output_link_header', 11);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Disable REST API related actions
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11);