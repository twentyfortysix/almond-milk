<?php 
// remove image dimensions
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );

// Removes attached image sizes as well
add_filter( 'wp_calculate_image_srcset_meta', '__return_empty_array' );

// fuck off emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//Remove Gutenberg Block Library CSS from loading on the frontend
function lightroom_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
 wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'lightroom_remove_wp_block_library_css', 100 );

add_action( 'wp_enqueue_scripts', 'lightroom_remove_classic_styles', 20 );
function lightroom_remove_classic_styles() {
    wp_dequeue_style( 'classic-theme-styles' );

}
remove_action('wp_head', 'wlwmanifest_link');



$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );

function hide_menu() {

    if (current_user_can('editor')) {

        remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
        remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
        remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2Ftools.php' ); // hide the customizer submenu
        remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwp-admin%2Ftools.php&#038;autofocus%5Bcontrol%5D=background_image' ); // hide the background submenu
        remove_submenu_page( 'themes.php', 'customize.php?return=%2Fcontent%2Fwp-admin%2Fprofile.php' ); // hide the background submenu


        // these are theme-specific. Can have other names or simply not exist in your current theme.
        // remove_submenu_page( 'themes.php', 'yiw_panel' );
        remove_submenu_page( 'themes.php', 'custom-header' );
        remove_submenu_page( 'themes.php', 'custom-background' );
    }
}

add_action('admin_head', 'hide_menu');

// NO dashbord nonsense
function dashboard_redirect(){
    wp_redirect(admin_url('edit.php?post_type=page'));
}
add_action('load-index.php','dashboard_redirect');

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );
