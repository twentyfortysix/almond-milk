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
			'name'               => _x( 'přispevatel', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'přispevatel', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Přispevatele', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'přispevatel', 'add new on admin bar', 'artlist' ),
			'add_new'            => _x( 'přidat', 'přispevatel', 'artlist' ),
			'add_new_item'       => __( 'přidat přispevatele', 'artlist' ),
			'new_item'           => __( 'Nový přispevatel', 'artlist' ),
			'edit_item'          => __( 'Editovat přispevatel', 'artlist' ),
			'view_item'          => __( 'Zobrazit přispevatel', 'artlist' ),
			'all_items'          => __( 'Všichni přispevatele', 'artlist' ),
			'search_items'       => __( 'Vyhledat přispevatele', 'artlist' ),
			'parent_item_colon'  => __( 'Nadřazeny přispevatel:', 'artlist' ),
			'not_found'          => __( 'Nenalezen', 'artlist' ),
			'not_found_in_trash' => __( 'V koši není', 'artlist' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'artlist' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'contributor' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			// 'taxonomies' => array( 'king-dog'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon'          => 'dashicons-buddicons-activity',
		);

		register_post_type( 'contributor', $cm_args );

		$cm_labels = array(
			'name'               => _x( 'keyword', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'keyword', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Keywords', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'keyword', 'add new on admin bar', 'artlist' ),
			'add_new'            => _x( 'přidat', 'keyword', 'artlist' ),
			'add_new_item'       => __( 'přidat keyworde', 'artlist' ),
			'new_item'           => __( 'Nový keyword', 'artlist' ),
			'edit_item'          => __( 'Editovat keyword', 'artlist' ),
			'view_item'          => __( 'Zobrazit keyword', 'artlist' ),
			'all_items'          => __( 'Všichni keyworde', 'artlist' ),
			'search_items'       => __( 'Vyhledat keyworde', 'artlist' ),
			'parent_item_colon'  => __( 'Nadřazeny keyword:', 'artlist' ),
			'not_found'          => __( 'Nenalezen', 'artlist' ),
			'not_found_in_trash' => __( 'V koši není', 'artlist' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'keyword' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'keyword' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			// 'taxonomies' => array( 'king-dog'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor' ),
			'menu_icon'          => 'dashicons-tag',
		);

		register_post_type( 'keyword', $cm_args );
}

function my_rewrite_flush() {
    codex_work_init();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );


// rename title field
function contributor_change_title_text( $title ){
     $screen = get_current_screen();
   
     if  ( 'contributor' == $screen->post_type ) {
          $title = 'Příjmení';
     }
   
     return $title;
}
   
add_filter( 'enter_title_here', 'contributor_change_title_text' );