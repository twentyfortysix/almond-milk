<?php
// Register custom_post type
add_action( 'init', 'codex_work_init' );
/**
 * Register a work post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

function codex_work_init() {

	$cm_labels = array(
		'name'               => _x( 'Donastavení', 'post type general name', 'arnika' ),
		'singular_name'      => _x( 'Donastavení', 'post type singular name', 'arnika' ),
		'menu_name'          => _x( 'Donastavení', 'admin menu', 'arnika' ),
		'name_admin_bar'     => _x( 'Donastavení', 'add new on admin bar', 'arnika' ),
		'add_new'            => _x( 'Přidat', 'Donastavení', 'arnika' ),
		'add_new_item'       => __( 'Přidat Donastavení', 'arnika' ),
		'new_item'           => __( 'Nové Donastavení', 'arnika' ),
		'edit_item'          => __( 'Editovat Donastavení', 'arnika' ),
		'view_item'          => __( 'Zobrazit Donastavení', 'arnika' ),
		'all_items'          => __( 'Všechny Donastavení', 'arnika' ),
		'search_items'       => __( 'Vyhledat Donastavení', 'arnika' ),
		'parent_item_colon'  => __( 'Nadřazené Donastavení:', 'arnika' ),
		'not_found'          => __( 'No Donastavení found.', 'arnika' ),
		'not_found_in_trash' => __( 'No Donastavení found in Trash.', 'arnika' )
	);

	$cm_args = array(
		'labels'             => $cm_labels,
        'description'        => __( 'Description.', 'arnika' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'aside' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title' ),
		// 'capabilities' => array(
		//     'create_posts' => 'false', // Removes support for the "Add New" function 
		// ),
		// 'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
		'menu_icon'          => 'dashicons-buddicons-activity'
	);

	register_post_type( 'aside', $cm_args );

	$cm_labels = array(
		'name'               => _x( 'Publikace', 'post type general name', 'arnika' ),
		'singular_name'      => _x( 'Publikace', 'post type singular name', 'arnika' ),
		'menu_name'          => _x( 'Publikace', 'admin menu', 'arnika' ),
		'name_admin_bar'     => _x( 'Publikace', 'add new on admin bar', 'arnika' ),
		'add_new'            => _x( 'Přidat', 'Publikace', 'arnika' ),
		'add_new_item'       => __( 'Přidat Publikace', 'arnika' ),
		'new_item'           => __( 'Nové Publikace', 'arnika' ),
		'edit_item'          => __( 'Editovat Publikace', 'arnika' ),
		'view_item'          => __( 'Zobrazit Publikace', 'arnika' ),
		'all_items'          => __( 'Všechny Publikace', 'arnika' ),
		'search_items'       => __( 'Vyhledat Publikace', 'arnika' ),
		'parent_item_colon'  => __( 'Nadřazené Publikace:', 'arnika' ),
		'not_found'          => __( 'No Publikace found.', 'arnika' ),
		'not_found_in_trash' => __( 'No Publikace found in Trash.', 'arnika' )
	);

	$cm_args = array(
		'labels'             => $cm_labels,
        'description'        => __( 'Description.', 'arnika' ),
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'publikace' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		// 'capabilities' => array(
		//     'create_posts' => 'false', // Removes support for the "Add New" function 
		// ),
		// 'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
		'menu_icon'          => 'dashicons-book'
	);

	register_post_type( 'publication', $cm_args );

	$cm_labels = array(
		'name'               => _x( 'Chemické látky', 'post type general name', 'arnika' ),
		'singular_name'      => _x( 'Chemické látky', 'post type singular name', 'arnika' ),
		'menu_name'          => _x( 'Chemické látky', 'admin menu', 'arnika' ),
		'name_admin_bar'     => _x( 'Chemické látky', 'add new on admin bar', 'arnika' ),
		'add_new'            => _x( 'Přidat', 'Chemické látky', 'arnika' ),
		'add_new_item'       => __( 'Přidat Chemické látky', 'arnika' ),
		'new_item'           => __( 'Nové Chemické látky', 'arnika' ),
		'edit_item'          => __( 'Editovat Chemické látky', 'arnika' ),
		'view_item'          => __( 'Zobrazit Chemické látky', 'arnika' ),
		'all_items'          => __( 'Všechny Chemické látky', 'arnika' ),
		'search_items'       => __( 'Vyhledat Chemické látky', 'arnika' ),
		'parent_item_colon'  => __( 'Nadřazené Chemické látky:', 'arnika' ),
		'not_found'          => __( 'No Chemické látky found.', 'arnika' ),
		'not_found_in_trash' => __( 'No Chemické látky found in Trash.', 'arnika' )
	);

	$cm_args = array(
		'labels'             => $cm_labels,
        'description'        => __( 'Description.', 'arnika' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'chemicke-latky' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' ),
		'menu_icon'          => 'dashicons-color-picker'
	);

	register_post_type( 'chemical', $cm_args );

}

function my_rewrite_flush() {
    codex_work_init();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );
