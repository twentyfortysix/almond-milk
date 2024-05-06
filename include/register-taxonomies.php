<?php
// // hook into the init action and call create_event_taxonomies when it fires
add_action( 'init', 'create_keyword_taxonomies', 0 );

// // create two taxonomies, genres and writers for the post type "book"
function create_keyword_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'keywords', 'taxonomy general name' ),
		'singular_name'     => _x( 'keyword', 'taxonomy singular name' ),
		'search_items'      => __( 'Search keywords' ),
		'all_items'         => __( 'All keywords' ),
		'parent_item'       => __( 'Parent keyword' ),
		'parent_item_colon' => __( 'Parent keyword:' ),
		'edit_item'         => __( 'Edit keyword' ),
		'update_item'       => __( 'Update keyword' ),
		'add_new_item'      => __( 'Add New keyword' ),
		'new_item_name'     => __( 'New keyword Name' ),
		'menu_name'         => __( 'keyword' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		// 'has_archive'       => true,
		'rewrite'           => array( 'slug' => 'keyword' ),
	);

	register_taxonomy( 'keyword', ['theorist', 'video', 'artist', 'space', 'group', 'work'], $args );

}
