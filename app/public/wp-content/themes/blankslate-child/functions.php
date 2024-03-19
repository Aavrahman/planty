<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    //    wp_enqueue_style('parent-style', get_parent_theme_file_uri() . 'style.css'); 

    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));

    /** home-page.css */
    wp_enqueue_style('home-page-style', get_stylesheet_directory_uri() . '/css/home-page.css', array(), filemtime(get_stylesheet_directory() . '/css/home-page.css'));

    /** nous-rencontre.css */
    wp_enqueue_style('nous-rencontrer-style', get_stylesheet_directory_uri() . '/css/nous-rencontrer.css', array(), filemtime(get_stylesheet_directory() . '/css/nous-rencontrer.css'));

    /** commander.css */
    wp_enqueue_style('commander-style', get_stylesheet_directory_uri() . '/css/commander.css', array(), filemtime(get_stylesheet_directory() . '/css/commander.css'));

    /*
    // Add an inline CSS
    wp_add_inline_style(
        'parent-style',
        'body { background: lightblue; }
    );          */
}


/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/* ** ** ** ** ** ** ** ** M E N U S ** ** ** ** ** ** ** **/

function register_header_menu()
{
    register_nav_menu('header_menu', __('Main Menu'));
}
add_action('init', 'register_header_menu');
/* --- */

function register_footer_menu()
{
    register_nav_menu('footer_menu', __('Footer'));
}
add_action('init', 'register_footer_menu');
/* --- */

function register_visitor_menu()
{
    register_nav_menu('visiteur', __('Main Menu'));
}
add_action('init', 'register_visitor_menu');


/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** ** ** ** ** ** ** ** SHORT CODES ** ** ** ** ** ** ** **/

function accueil_bloc_titre($atts)                              //* Affichage bloc superieur page  accueil_bloc_titre
{				
    $atts = shortcode_atts(                                     // Récupérer les attributs sasis sur le shortcode				
        array(
            'src' => ' ',
            'titre' => 'Titre',
            'src2' => '',
            'src3' => ''
        ),
        $atts,
        'titre-et-image'
    );

    ob_start();                                                 //Sauvegarde en mémoire de données (vars et/ou txt) qui suivent

    if ($atts['src'] != "") {
?>


        <div class="rameau" style="background-image: url(<?= $atts['src2'] ?>); object-fit:contain;"> </div>
        <div class="titre-et-image" style="background-image: url(<?= $atts['src'] ?>)">
            <h1 class="titre"><?= $atts['titre'] ?></h1>
        </div>
        <div class="rameau" style="background-image: url(<?= $atts['src3'] ?>) object-fit:contain"> </div>
<?php
    }

    $output = ob_get_contents();                                // Récupération des données sauvegardées dans la var $output	
    ob_end_clean();
    return $output;
}

add_shortcode('titre-et-image', 'accueil_bloc_titre');


/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/
/** ** ** ** ** ** ** ** MENU CONNECTE  ** ** ** ** ** ** **/

function connected_menu( $args = '' ) {

    if( is_user_logged_in() ) { 
        $args['menu'] = 'header_menu';
    } else { 
        $args['menu'] = 'visiteur';
    } 

    return $args;
}

add_filter( 'wp_nav_menu_args', 'connected_menu' );



/** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** ** **/

/*
function register_header_menu()
{
    register_nav_menu('header_menu', __('Main Menu'));
}
add_action('init', 'register_header_menu');

/*
add_action('after_setup_theme', 'blankslate_child_setup');
function blankslate_child_setup() {
    add_editor_style(array(
        get_stylesheet_uri(),
        get_parent_theme_file_uri('css/theme.css')
    ));
}


<!--
            <div class="rameau" style="background-image: url(<?= $atts['src2']) ?>)">       -->
        
        */