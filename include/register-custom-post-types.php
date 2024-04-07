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
			'name'               => _x( 'Comm. works', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'Comm. work', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'Comm. works', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Comm. work', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add New', 'Comm. work', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add New Comm. work', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New Comm. work', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit Comm. work', 'your-plugin-textdomain' ),
			'view_item'          => __( 'View Comm. work', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All Comm. works', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search Comm. works', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent Comm. works:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No Comm. works found.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No Comm. works found in Trash.', 'your-plugin-textdomain' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'work' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			// 'taxonomies' => array( 'king-dog'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'          => 'dashicons-groups',
			'capabilities' => array(
			    'create_posts' => false, // Removes support for the "Add New" function ( use 'do_not_allow' instead of false for multisite set ups )
			),
			'map_meta_cap' => true, // Set to `false`, if users are not allowed to edit/delete existing posts
		);

		register_post_type( 'work', $cm_args );



		$pm_labels = array(
			'name'               => _x( 'Personal works', 'post type general name', 'your-plugin-textdomain' ),
			'singular_name'      => _x( 'Personal work', 'post type singular name', 'your-plugin-textdomain' ),
			'menu_name'          => _x( 'Personal works', 'admin menu', 'your-plugin-textdomain' ),
			'name_admin_bar'     => _x( 'Personal work', 'add new on admin bar', 'your-plugin-textdomain' ),
			'add_new'            => _x( 'Add New', 'Personal work', 'your-plugin-textdomain' ),
			'add_new_item'       => __( 'Add New Personal work', 'your-plugin-textdomain' ),
			'new_item'           => __( 'New Personal work', 'your-plugin-textdomain' ),
			'edit_item'          => __( 'Edit Personal work', 'your-plugin-textdomain' ),
			'view_item'          => __( 'View Personal work', 'your-plugin-textdomain' ),
			'all_items'          => __( 'All Personal works', 'your-plugin-textdomain' ),
			'search_items'       => __( 'Search Personal works', 'your-plugin-textdomain' ),
			'parent_item_colon'  => __( 'Parent Personal works:', 'your-plugin-textdomain' ),
			'not_found'          => __( 'No Personal works found.', 'your-plugin-textdomain' ),
			'not_found_in_trash' => __( 'No Personal works found in Trash.', 'your-plugin-textdomain' )
		);

		$pm_args = array(
			'labels'             => $pm_labels,
	        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'love' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'          => 'dashicons-groups'
		);

		register_post_type( 'love', $pm_args );
}

function my_rewrite_flush() {
    codex_work_init();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );
