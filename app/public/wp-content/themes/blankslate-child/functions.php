<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // wp_enqueue_style('parent-style', get_stylesheet_uri());
    // wp_enqueue_style('blanckslade-child-style', get_template_directory_uri() . '/style.css');

    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    //  wp_enqueue_style('theme-style', get_parent_theme_file_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css')); 

/*
    // Add an inline CSS
    wp_add_inline_style(
        'parent-style',
        'body { background: lightblue; }
    );          */
}

function register_ft_menu() {
   register_nav_menu('footer_menu', __('Footer') );
}
add_action('init', 'register_ft_menu');

/*
add_action('after_setup_theme', 'blankslate_child_setup');
function blankslate_child_setup() {
    add_editor_style(array(
        get_stylesheet_uri(),
        get_parent_theme_file_uri('css/theme.css')
    ));
}
*/