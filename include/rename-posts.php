<?php
function hook_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Partials'; // 5 = post
    $submenu['edit.php'][5][0] = 'Partials';
}
add_action( 'admin_menu', 'hook_change_post_label' );


function hook_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Partial';
    $labels->singular_name = 'Partial';
    $labels->add_new = 'Add Partial';
    $labels->add_new_item = 'Add Partial';
    $labels->edit_item = 'Edit Partial';
    $labels->new_item = 'Partial';
    $labels->view_item = 'View Partial';
    $labels->search_items = 'Search Partial';
    $labels->not_found = 'No Partial found';
    $labels->not_found_in_trash = 'No Partial found in Trash';
}
add_action( 'init', 'hook_change_post_object' );