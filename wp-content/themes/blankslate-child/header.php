<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <?php if (has_custom_logo()) :
            the_custom_logo();
        endif ?>
        <nav id="menu" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
        </nav>
    </header>
    <main>