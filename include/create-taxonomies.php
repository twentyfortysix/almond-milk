<?php
// // hook into the init action and call create_event_taxonomies when it fires
add_action( 'init', 'create_Location_taxonomies', 0 );

// // create two taxonomies, genres and writers for the post type "book"
function create_Location_taxonomies() {

	// Add new taxonomy, make it hierarchical (like categories)
	$labels_ = array(
		'name'              => _x( 'types', 'taxonomy general name' ),
		'singular_name'     => _x( 'type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search types' ),
		'all_items'         => __( 'All types' ),
		'parent_item'       => __( 'Parent type' ),
		'parent_item_colon' => __( 'Parent type:' ),
		'edit_item'         => __( 'Edit type' ),
		'update_item'       => __( 'Update type' ),
		'add_new_item'      => __( 'Add New type' ),
		'new_item_name'     => __( 'New type Name' ),
		'menu_name'         => __( 'type' ),
	);

	$args_ = array(
		'hierarchical'      => true,
		'labels'            => $labels_,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		// 'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'typ-chemickych-latek' ),
	);

	register_taxonomy( 'chemical-type', array( 'chemical' ), $args_ );

}
