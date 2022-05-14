<?php
// // hook into the init action and call create_event_taxonomies when it fires
add_action( 'init', 'create_Location_taxonomies', 0 );

// // create two taxonomies, genres and writers for the post type "book"
function create_Location_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Locations', 'taxonomy general name' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Locations' ),
		'all_items'         => __( 'All Locations' ),
		'parent_item'       => __( 'Parent Location' ),
		'parent_item_colon' => __( 'Parent Location:' ),
		'edit_item'         => __( 'Edit Location' ),
		'update_item'       => __( 'Update Location' ),
		'add_new_item'      => __( 'Add New Location' ),
		'new_item_name'     => __( 'New Location Name' ),
		'menu_name'         => __( 'Location' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		// 'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'lokace' ),
	);

	register_taxonomy( 'lokace', array( 'akce' ), $args );


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
		'rewrite'           => array( 'slug' => 'type' ),
	);

	register_taxonomy( 'typ', array( 'akce' ), $args_ );

}
