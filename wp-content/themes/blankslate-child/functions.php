<?php
add_action('wp_enqueue_scripts', 'enqueue_parent_style');
function enqueue_parent_style()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_action('wp_enqueue_scripts', 'enqueue_child_style', 11);
function enqueue_child_style()
{
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('home-style', get_stylesheet_directory_uri() . '/assets/css/home.css', array('child-style'), filemtime(get_stylesheet_directory() . '/assets/css/home.css'));
    wp_enqueue_style('meet-style', get_stylesheet_directory_uri() . '/assets/css/meet.css', array('child-style'), filemtime(get_stylesheet_directory() . '/assets/css/meet.css'));

    if (is_page_template('templates/checkout.php')) :
        wp_enqueue_style('checkout-style', get_stylesheet_directory_uri() . '/assets/css/checkout.css', array('child-style'), filemtime(get_stylesheet_directory() . '/assets/css/checkout.css'));
    endif;
}

add_action('wp_enqueue_scripts', 'enqueue_themes_scripts');
function enqueue_themes_scripts()
{
    wp_enqueue_script('checkout-script', get_stylesheet_directory_uri() . '/assets/js/checkout.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/checkout.js'), true);
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/0641598835.js');
}

add_action('after_setup_theme', 'planty_setup');
function planty_setup()
{
    add_theme_support('custom-logo');

    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_attr__('Sombre', 'themeLangDomain'),
            'slug'  => 'dark',
            'color' => '#000000',
        ),
        array(
            'name'  => esc_attr__('Clair', 'themeLangDomain'),
            'slug'  => 'light',
            'color' => '#FFFFFF',
        ),
        array(
            'name'  => esc_attr__('Couleur dominante', 'themeLangDomain'),
            'slug'  => 'brand-primary',
            'color' => '#ECE2DA',
        ),
        array(
            'name'  => esc_attr__("Couleur d'accentuation atténuée", 'themeLangDomain'),
            'slug'  => 'brand-tertiary-light',
            'color' => '#E0B9B4',
        ),
        array(
            'name'  => esc_attr__("Couleur d'accentuation", 'themeLangDomain'),
            'slug'  => 'brand-tertiary',
            'color' => '#D2776A',
        ),
        array(
            'name'  => esc_attr__("Couleur d'accentuation renforcée", 'themeLangDomain'),
            'slug'  => 'brand-tertiary-dark',
            'color' => '#C02E44',
        ),
        array(
            'name'  => esc_attr__('Couleur secondaire', 'themeLangDomain'),
            'slug'  => 'brand-secondary',
            'color' => '#3B8E46',
        ),
    ));

    register_nav_menus(array('footer-menu' => esc_html__('Menu Pied de page')));
}

add_filter('wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2);
function add_extra_item_to_nav_menu($items, $args)
{
    if (is_user_logged_in() && $args->theme_location == 'main-menu') {
        $items_array = array();
        while (($item_pos = strpos($items, '<li', 2)) !== false) // Add the position where the menu item is placed
        {
            $items_array[] = substr($items, 0, $item_pos);
            $items = substr($items, $item_pos);
        }
        $items_array[] = $items;
        array_splice($items_array, 1, 0, '<li class="menu-item admin-link"><a href="' . admin_url() . '"></a></li>'); // insert custom item after 9th item one

        $items = implode('', $items_array);
    }
    return $items;
}
