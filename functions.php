<?php
require_once( $_SERVER['DOCUMENT_ROOT']. '/../vendor/autoload.php' ); // while on Bedrock
// require_once( __DIR__ . '/vendor/autoload.php' ); // if you compose inside your template

require_once(TEMPLATEPATH. '/include/timber.php');
require_once(TEMPLATEPATH. '/include/theme-support.php');
require_once(TEMPLATEPATH. '/include/remove_api.php');
require_once(TEMPLATEPATH. '/include/acf.php');
require_once(TEMPLATEPATH. '/include/remove-page-wyswig.php');
// require_once(TEMPLATEPATH. '/include/register-custom-post-types.php');
// require_once(TEMPLATEPATH. '/include/customize-admin-menu.php');
// require_once(TEMPLATEPATH. '/include/rename-posts.php');
// require_once(TEMPLATEPATH. '/include/rename-pages.php');
// require_once(TEMPLATEPATH. '/include/p2p-registers.php');
// require_once(TEMPLATEPATH. '/include/remove-taxonomies.php');
// require_once(TEMPLATEPATH. '/include/page-step-navigation.php');
// require_once(TEMPLATEPATH. '/include/register-taxonomies.php');
// require_once(TEMPLATEPATH. '/include/googleAPI.php');
// require_once(TEMPLATEPATH. '/include/GQL_ACF.php');

// 
// localize
add_action('after_setup_theme', 'localize_theme');

#remove admin bar
add_filter('show_admin_bar', '__return_false');


function localize_theme(){
	load_theme_textdomain( 'almond', get_bloginfo('template_directory').'/languages' );
}

function f_2046_add_scripts() {
// 	remove guttenberg mess
	wp_dequeue_style( 'global-styles' ); 
	// register scripts
	wp_register_script ( 'bootstrap-js', get_bloginfo('template_directory') .'/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);
    	wp_register_script ( 'autoprefix-js', get_bloginfo('template_directory') .'/vendor/prefixfree/js/prefixfree.min.js', '', '', true);

    	// register styles
	wp_register_style ( 'bootstrap-css', get_bloginfo('template_directory') .'/bootstrap/css/bootstrap.min.css');
	wp_register_style ( 'my-css', get_bloginfo('template_directory') .'/style.css', array('bootstrap-css'));
	wp_register_style ( 'font', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap');

	// enque scripts
	wp_enqueue_script( 'autoprefix-js' );
	wp_enqueue_script( 'bootstrap-js' );
	// enque styles
	wp_enqueue_style( 'bootstrap-css' );
	wp_enqueue_style( 'my-css' );
	wp_enqueue_style( 'font' );
}
add_action('wp_enqueue_scripts', 'f_2046_add_scripts');



// remove image dimensions
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );

// Removes attached image sizes as well
add_filter( 'wp_calculate_image_srcset_meta', '__return_empty_array' );

// fuck off emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );



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

function login_redirect( $redirect_to, $request, $user ){
    return admin_url('edit.php?post_type=page');
}
add_filter('login_redirect','login_redirect',10,3);

function remove_menus () {
    global $menu;
    $restricted = array(__('Dashboard'));
    //$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
    end($menu);
    while(prev($menu)){
        $value = explode(' ',$menu[key($menu)][0]);
        if(in_array($value[0]!= NULL?$value[0]:'',$restricted)){unset($menu[key($menu)]);}
    }
}
add_action('admin_menu','remove_menus');

function encode_email($e) {
    $output = '';
    for ($i = 0; $i < strlen($e); $i++) { $output .= '&#'.ord($e[$i]).';'; }
    return $output;
}

function getYoutubeVideoIdFromUrl($url){
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    return $match[1];
}
function getVimeoVideoIdFromUrl($url = '') {
    $regs = array();
    $id = '';
    if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
        $id = $regs[3];
    }
    return $id;
}


function yoasttobottom() {
    return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
