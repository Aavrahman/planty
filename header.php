<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();
    ?>

    <div id="wrapper" class="hfeed">
    <!-- -->
    <header id="header" role="banner" class="nav-bar">
        <div id="branding">
            <?php
            echo '<div id="logo">
                    <a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home" itemprop="url"> 
                        <img src="' . esc_url(get_theme_file_uri('images/logo_.png')) . '" alt="pas d\'image !" class="logo" />
                    </a>
                </div>';
            ?>
        </div>

        <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <div id="menu-icon">
                <div id="hamburger">
                    <div class="hamburger-bar"> </div>
                    <div class="hamburger-bar"> </div>
                    <div class="hamburger-bar"> </div>
                </div>
            </div>

            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'Main Menu',
                        'link_before' => '<span itemprop="name">',
                        'link_after' => '</span>'
                    )
                );
            ?>
        </nav>
    </header>

    <div id="container">
        <main id="content" role="main">