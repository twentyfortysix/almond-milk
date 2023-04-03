<?php
require_once(TEMPLATEPATH. '/include/timber.php');
require_once(TEMPLATEPATH. '/include/theme-support.php');
require_once(TEMPLATEPATH. '/include/remove_api.php');
require_once(TEMPLATEPATH. '/include/acf.php');
require_once(TEMPLATEPATH. '/include/remove-page-wyswig.php');
require_once(TEMPLATEPATH. '/include/wp_cleanup.php');
// require_once(TEMPLATEPATH. '/include/customize-appereance-menus.php');
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


function superNaturalSort($a, $b){
    $A = diacriticEqvivalent($a);
    $B = diacriticEqvivalent($b);//str_replace($czechCharsS, $czechCharsR, $b);
    return strnatcasecmp($A, $B);
};

function diacriticEqvivalent($a){
    static $czechCharsS = array('Á', 'Č', 'Ď', 'É', 'Ě' , 'Ch' , 'Í', 'Ň', 'Ó', 'Ř', 'Š', 'Ť', 'Ú', 'Ů' , 'Ý', 'Ž', 'á', 'č', 'ď', 'é', 'ě' , 'ch' , 'í', 'ň', 'ó', 'ř', 'š', 'ť', 'ú', 'ů' , 'ý', 'ž');
    static $czechCharsR = array('AZ','CZ','DZ','EZ','EZZ','HZZZ','IZ','NZ','OZ','RZ','SZ','TZ','UZ','UZZ','YZ','ZZ','az','cz','dz','ez','ezz','hzzz','iz','nz','oz','rz','sz','tz','uz','uzz','yz','zz');
    $a = str_replace($czechCharsS, $czechCharsR, $a);
    return $a;
}
