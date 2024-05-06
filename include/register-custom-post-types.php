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
			'name'               => _x( 'Přispevatel', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'Přispevatel', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Přispevatele', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'Přispevatel', 'add new on admin bar', 'artlist' ),
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
			'supports'           => array( 'title', 'thumbnail', 'editor' ),
			'menu_icon'          => 'dashicons-buddicons-activity',
		);

		register_post_type( 'contributor', $cm_args );


		$cm_labels = array(
			'name'               => _x( 'Teoretik', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'Teoretik', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Teoretici', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'Teoretik', 'add new on admin bar', 'artlist' ),
			'add_new'            => _x( 'přidat', 'Teoretik', 'artlist' ),
			'add_new_item'       => __( 'přidat teoretika', 'artlist' ),
			'new_item'           => __( 'Nový teoretik', 'artlist' ),
			'edit_item'          => __( 'Editovat teoretika', 'artlist' ),
			'view_item'          => __( 'Zobrazit teoretika', 'artlist' ),
			'all_items'          => __( 'Všichni Teoretici', 'artlist' ),
			'search_items'       => __( 'Vyhledat Teoretika', 'artlist' ),
			'parent_item_colon'  => __( 'Nadřazeny teoretik:', 'artlist' ),
			'not_found'          => __( 'Nenalezen', 'artlist' ),
			'not_found_in_trash' => __( 'V koši není', 'artlist' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'Teoretik' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'theorist' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'taxonomies'         => array( 'categories'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' ),
			'menu_icon'          => 'dashicons-welcome-learn-more',
		);

		register_post_type( 'theorist', $cm_args );

		$cm_labels = array(
			'name'               => _x( 'Umělec', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'Umělec', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Umělci', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'Umělec', 'add new on admin bar', 'artlist' ),
			'add_new'            => _x( 'přidat', 'Umělec', 'artlist' ),
			'add_new_item'       => __( 'přidat umělce', 'artlist' ),
			'new_item'           => __( 'Nový umělec', 'artlist' ),
			'edit_item'          => __( 'Editovat umělce', 'artlist' ),
			'view_item'          => __( 'Zobrazit umělce', 'artlist' ),
			'all_items'          => __( 'Všichni umělci', 'artlist' ),
			'search_items'       => __( 'Vyhledat umělce', 'artlist' ),
			'parent_item_colon'  => __( 'Nadřazený umělec:', 'artlist' ),
			'not_found'          => __( 'Nenalezen', 'artlist' ),
			'not_found_in_trash' => __( 'V koši není', 'artlist' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'Umělec' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'artist' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'taxonomies'         => array( 'categories'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' ),
			'menu_icon'          => 'dashicons-buddicons-replies',
		);

		register_post_type( 'artist', $cm_args );

		$cm_labels = array(
			'name'               => _x( 'Skupina', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'Skupina', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Skupiny', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'Skupina', 'add new on admin bar', 'artlist' ),
			'add_new'            => _x( 'přidat', 'Skupina', 'artlist' ),
			'add_new_item'       => __( 'přidat skupinu', 'artlist' ),
			'new_item'           => __( 'Nová skupina', 'artlist' ),
			'edit_item'          => __( 'Editovat skupinu', 'artlist' ),
			'view_item'          => __( 'Zobrazit skupinu', 'artlist' ),
			'all_items'          => __( 'Všechny skupiny', 'artlist' ),
			'search_items'       => __( 'Vyhledat skupinu', 'artlist' ),
			'parent_item_colon'  => __( 'Nadřazená skupina:', 'artlist' ),
			'not_found'          => __( 'Nenalezeno', 'artlist' ),
			'not_found_in_trash' => __( 'V koši není', 'artlist' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'Skupina' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'group' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'taxonomies'         => array( 'categories'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' ),
			'menu_icon'          => 'dashicons-superhero-alt',
		);

		register_post_type( 'group', $cm_args );

		$cm_labels = array(
			'name'               => _x( 'Video', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'Video', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Videa', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'Video', 'add new on admin bar', 'artlist' ),
			'add_new'            => _x( 'přidat', 'Video', 'artlist' ),
			'add_new_item'       => __( 'přidat video', 'artlist' ),
			'new_item'           => __( 'Nový teoretik', 'artlist' ),
			'edit_item'          => __( 'Editovat video', 'artlist' ),
			'view_item'          => __( 'Zobrazit video', 'artlist' ),
			'all_items'          => __( 'Všechny videa', 'artlist' ),
			'search_items'       => __( 'Vyhledat video', 'artlist' ),
			'parent_item_colon'  => __( 'Nadřazené video:', 'artlist' ),
			'not_found'          => __( 'Nenalezeno', 'artlist' ),
			'not_found_in_trash' => __( 'V koši není', 'artlist' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'Teoretik' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'video' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'taxonomies'         => array( 'categories'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' ),
			'menu_icon'          => 'dashicons-video-alt',
		);

		register_post_type( 'video', $cm_args );

		$cm_labels = array(
			'name'               => _x( 'Dílo', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'Dílo', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Díla', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'Dílo', 'add new on admin bar', 'artlist' ),
			'add_new'            => _x( 'přidat', 'Dílo', 'artlist' ),
			'add_new_item'       => __( 'přidat dílo', 'artlist' ),
			'new_item'           => __( 'Nové dílo', 'artlist' ),
			'edit_item'          => __( 'Editovat dílo', 'artlist' ),
			'view_item'          => __( 'Zobrazit dílo', 'artlist' ),
			'all_items'          => __( 'Všechny díla', 'artlist' ),
			'search_items'       => __( 'Vyhledat dílo', 'artlist' ),
			'parent_item_colon'  => __( 'Nadřazený dílo:', 'artlist' ),
			'not_found'          => __( 'Nenalezen', 'artlist' ),
			'not_found_in_trash' => __( 'V koši není', 'artlist' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'Dílo' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'artwork' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'taxonomies'         => array( 'categories'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' ),
			'menu_icon'          => 'dashicons-art',
		);

		register_post_type( 'artwork', $cm_args );

		$cm_labels = array(
			'name'               => _x( 'Prostor', 'post type general name', 'artlist' ),
			'singular_name'      => _x( 'Prostor', 'post type singular name', 'artlist' ),
			'menu_name'          => _x( 'Prostory', 'admin menu', 'artlist' ),
			'name_admin_bar'     => _x( 'Prostor', 'add new on admin bar', 'artlist' ),
			'add_new'            => _x( 'přidat', 'Prostor', 'artlist' ),
			'add_new_item'       => __( 'přidat prostor', 'artlist' ),
			'new_item'           => __( 'Nové prostor', 'artlist' ),
			'edit_item'          => __( 'Editovat prostor', 'artlist' ),
			'view_item'          => __( 'Zobrazit prostor', 'artlist' ),
			'all_items'          => __( 'Všechny prostory', 'artlist' ),
			'search_items'       => __( 'Vyhledat prostor', 'artlist' ),
			'parent_item_colon'  => __( 'Nadřazený prostor:', 'artlist' ),
			'not_found'          => __( 'Nenalezen', 'artlist' ),
			'not_found_in_trash' => __( 'V koši není', 'artlist' )
		);

		$cm_args = array(
			'labels'             => $cm_labels,
	        'description'        => __( 'Description.', 'Prostor' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'space' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'taxonomies'         => array( 'categories'),
			'hierarchical'       => true,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail' ),
			'menu_icon'          => 'dashicons-building',
		);

		register_post_type( 'space', $cm_args );
}

function my_rewrite_flush() {
    codex_work_init();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );


// rename title field
function contributor_change_title_text( $title ){
     $screen = get_current_screen();
   
     if  ( in_array($screen->post_type, ['theorist', 'contributor']) ) {
          $title = 'Příjmení';
     }
   
     return $title;
}
   
add_filter( 'enter_title_here', 'contributor_change_title_text' );