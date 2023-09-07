<?php
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');
function enqueue_theme_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
}

add_action('wp_enqueue_scripts', 'enqueue_themes_scripts');
function enqueue_themes_scripts()
{
    wp_enqueue_script('checkout-script', get_stylesheet_directory_uri() . '/checkout.js', array(), filemtime(get_stylesheet_directory() . '/checkout.js'), true);
}

add_action('after_setup_theme', 'planty_setup');
function planty_setup()
{
    add_theme_support('custom-logo');

    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_attr__('Noir', 'themeLangDomain'),
            'slug'  => 'noir',
            'color' => '#000000',
        ),
        array(
            'name'  => esc_attr__('Blanc', 'themeLangDomain'),
            'slug'  => 'blanc',
            'color' => '#FFFFFF',
        ),
        array(
            'name'  => esc_attr__('Beige', 'themeLangDomain'),
            'slug'  => 'beige',
            'color' => '#ECE2DA',
        ),
        array(
            'name'  => esc_attr__('Rose', 'themeLangDomain'),
            'slug'  => 'rose',
            'color' => '#D2776A',
        ),
        array(
            'name'  => esc_attr__('Rose soutenu', 'themeLangDomain'),
            'slug'  => 'rose-soutenu',
            'color' => '#C02E44',
        ),
        array(
            'name'  => esc_attr__('Vert', 'themeLangDomain'),
            'slug'  => 'vert',
            'color' => '#3B8E46',
        ),
    ));

    register_nav_menus(array('footer-menu' => esc_html__('Menu Pied de page')));
}
