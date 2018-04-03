<?php

function change_page_titles() {
    global $menu;
    global $submenu;
    $menu[20][0] = 'Projects'; // 20 = Page
}
add_action( 'admin_menu', 'change_page_titles' );


function change_page_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['page']->labels;
    // var_dump($labels->name);
    $labels->name = 'Project';
    $labels->singular_name = 'Project';
    $labels->add_new = 'Add Project';
    $labels->add_new_item = 'Add project';
    $labels->edit_item = 'Edit project';
    $labels->new_item = 'Project';
    $labels->view_item = 'View project';
    $labels->search_items = 'Search project';
    $labels->not_found = 'No project found';
    $labels->not_found_in_trash = 'No project found in Trash';
    $labels->all_items = 'All projects';
}
add_action( 'init', 'change_page_object' );
