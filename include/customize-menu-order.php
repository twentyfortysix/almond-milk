<?php
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
     
    return array(
        'edit.php?post_type=page', // Pages
        // 'index.php', // Dashboard
        'separator1', // First separator
        'edit.php', // Posts
        'upload.php', // Media
        // 'link-manager.php', // Links
        // 'edit-comments.php', // Comments
        // 'separator2', // Second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');