<?php
// featured images
add_theme_support( 'post-thumbnails', array( 'page' , 'post', 'publication') );    

// add excerpt to page
// add_post_type_support( 'page', 'excerpt' );

// register nav menu
function register_my_menu() {
  register_nav_menu('top_menu','Top menu');
}
add_action( 'init', 'register_my_menu' );