<?php
function hook_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Akce'; 
    $submenu['edit.php'][5][0] = 'Akce';
}
add_action( 'admin_menu', 'hook_change_post_label' );


function hook_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Akce';
    $labels->singular_name = 'Akce';
    $labels->add_new = 'Přidat akci';
    $labels->add_new_item = 'Přidat akci';
    $labels->edit_item = 'Editovat akci';
    $labels->new_item = 'Nová akce';
    $labels->view_item = 'Zobrazit akci';
    $labels->search_items = 'Vyhledat akci';
    $labels->not_found = 'Nenalezeno';
    $labels->not_found_in_trash = 'V koši není';
}
add_action( 'init', 'hook_change_post_object' );
