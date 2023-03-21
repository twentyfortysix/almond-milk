<?php
// featured images
add_theme_support( 'post-thumbnails', array( 'page' ) );    

// add excerpt to page
// add_post_type_support( 'page', 'excerpt' );

// register nav menu
function register_my_menu() {
  register_nav_menu('top_menu','Top menu');
}
add_action( 'init', 'register_my_menu' );


function remove_default_image_sizes( $sizes) {
    unset( $sizes['medium_large']);
    unset( $sizes['2048x2048']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

// add custom image sizes
// add_image_size( 'gallery', '360', '270', true );
