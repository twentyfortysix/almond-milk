<?php
function custom_menu_order($menu_ord) {
    if (!$menu_ord) return true;
     
    return array(
        'edit.php?post_type=artwork',
        'edit.php?post_type=artist',
        'edit.php?post_type=theorist',
        'edit.php?post_type=group',
        'edit.php?post_type=space',
        'edit.php?post_type=video',
        'edit.php?post_type=contributor',
        'separator1', // First separator
        'edit.php?post_type=page',
        // 'index.php', // Dashboard
        // 'edit.php', // Posts
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

// hide admin menu items
// add_action( 'admin_init', '__remove_menu_pages' );
// function __remove_menu_pages() {
//   if ( !current_user_can('administrator') ) { //your user id

//    remove_menu_page('edit.php'); // Posts
//    remove_menu_page('edit.php?post_type=page'); // Pages
//   }
// }
