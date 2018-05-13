<?php

require_once(TEMPLATEPATH. '/include/theme-support.php');
require_once(TEMPLATEPATH. '/include/bootstrap-nav-walker.php');
// require_once(TEMPLATEPATH. '/include/register-custom-post-types.php');
// require_once(TEMPLATEPATH. '/include/customize-menu-order.php');
// require_once(TEMPLATEPATH. '/include/rename-posts.php');
// require_once(TEMPLATEPATH. '/include/rename-pages.php');
// require_once(TEMPLATEPATH. '/include/p2p-registers.php');
// require_once(TEMPLATEPATH. '/include/remove-page-wyswig.php');
// require_once(TEMPLATEPATH. '/include/remove-taxonomies.php');
// require_once(TEMPLATEPATH. '/include/page-step-navigation.php');
// require_once(TEMPLATEPATH. '/include/create-taxonomies.php');
// 
// ;ocalize
add_action('after_setup_theme', 'localize_theme');

#remove admin bar
add_filter('show_admin_bar', '__return_false');


function localize_theme(){
	load_theme_textdomain( 'twentyfortysix', get_bloginfo('template_directory').'/languages' );
}

function f_2046_add_scripts() {
	// register scripts
	wp_register_script ( 'bootstrap-js', get_bloginfo('template_directory') .'/js/vendor/bootstrap.min.js', array('jquery'), '', true);
    wp_register_script ( 'autoprefix-js', get_bloginfo('template_directory') .'/js/vendor/prefixfree.min.js', array('jquery'), '', true);
    
    // register styles
	wp_register_style ( 'bootstrap-css', get_bloginfo('template_directory') .'/css/vendor/bootstrap.min.css');
	wp_register_style ( 'my-css', get_bloginfo('template_directory') .'/style.css', array('bootstrap-css'));
	wp_register_style ( 'font', 'https://fonts.googleapis.com/css?family=Raleway:400,800,600|Open+Sans:400,700&subset=latin,latin-ext');
	
	// enque scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'autoprefix-js' );			
	wp_enqueue_script( 'bootstrap-js' );	
	// enque styles
	wp_enqueue_style( 'bootstrap-css' );		
	wp_enqueue_style( 'my-css' );			
	wp_enqueue_style( 'font' );		
}
add_action('wp_enqueue_scripts', 'f_2046_add_scripts');


// TIMBER related
// let users know the timber is not loaded
if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p><a href="http://upstatement.com/timber/">Timber</a> not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}
// set default *.twig location
Timber::$dirname = 'twig';


// remove image dimensions
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

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

// colorize the ACF cells a bit 
add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    .acf-flexible-content .layout .acf-fc-layout-handle{background: #dedede;} 
    .acf-flexible-content .layout{box-shadow: 0 4px 15px #e2e2e2;}
    .acf-flexible-content .layout.ui-sortable-helper{
    	layout{box-shadow: 0 10px 50px #e2e2e2;
    }
    .acf-field .acf-label label {
    	font-size: 16px;
	    font-weight: 400;
	    margin: 0;
	    padding: 9px 15px 4px 0;
	    line-height: 29px;
    }

    .acf-field .acf-fields .acf-label label {
    	font-size: 14px;
	    line-height:1.2em;
    }
  </style>';
}


