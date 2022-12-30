<?php 
/**
 * Limit max menu depth in admin panel 
 * https://wordpress.stackexchange.com/questions/242068/how-to-limit-wordpress-menu-depth-in-admin-panel
 */

function limit_admin_menu_depth($hook)
{
    if ($hook != 'nav-menus.php') return;

    wp_register_script('limit-admin-menu-depth', get_bloginfo('template_directory') . '/js/admin/limit-menu-depth.js', array(), '1.0.0', true);
    wp_localize_script(
        'limit-admin-menu-depth',
        'myMenuDepths',
        array(
            'Top menu' => 1, // <-- Set your menu location and max depth here
            'footer' => 0 // <-- Add as many as you like
        )
    );
    wp_enqueue_script('limit-admin-menu-depth');
}
add_action( 'admin_enqueue_scripts', 'limit_admin_menu_depth' );