<?php

/* ** ** ** ** ** ** ** * S T Y L E S * ** ** ** ** ** ** **/

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    //    wp_enqueue_style('parent-style', get_parent_theme_file_uri() . 'style.css'); 

    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));

    /** home-page.css */
    wp_enqueue_style('home-page-style', get_stylesheet_directory_uri() . '/css/home-page.css', array(), filemtime(get_stylesheet_directory() . '/css/home-page.css'));

}


/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/* ** ** ** ** ** ** ** ** M E N U S ** ** ** ** ** ** ** **/

function register_header_menu()
{
    register_nav_menu('header_menu', __('Main Menu'));
}
add_action('init', 'register_header_menu');
/* --- */

function register_visitor_menu()
{
    register_nav_menu('visiteur', __('Main Menu'));
}
add_action('init', 'register_visitor_menu');
/* --- */

function register_footer_menu()
{
    register_nav_menu('footer_menu', __('Footer'));
}
add_action('init', 'register_footer_menu');


/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** ** ** ** ** ** ** ** MENU CONNECTE  ** ** ** ** ** ** **/

function connected_menu( $args = '' ) {

    if( is_user_logged_in()) { 
        $args['menu'] = "header_menu";
    } else { 
        $args['menu'] = "visiteur";
    } 

    return $args;
}

add_filter( 'wp_nav_menu_args', 'connected_menu' );

/*** */

function the_footer_menu($args = '')
{
    if ($args['theme_location'] == 'Footer') {
        $args['menu'] = "footer_menu";
    }
    return $args;
}

add_filter('wp_nav_menu_args', 'the_footer_menu');


/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** ** ** ** ** ** * SHORT CODES / WIDGETS ** ** ** ** ** **/

require_once(__DIR__ . '/shortcodes/shortcodes.php');