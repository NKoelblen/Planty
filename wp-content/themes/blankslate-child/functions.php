<?php
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');

function enqueue_theme_styles()
{

    // Récupérer le style du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    // Récupérer le style du thème enfant
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
}

add_action('after_setup_theme', 'planty_setup');
function planty_setup()
{
    add_theme_support('custom-logo');
    register_nav_menus(array('footer-menu' => esc_html__('Menu Pied de page')));
}
