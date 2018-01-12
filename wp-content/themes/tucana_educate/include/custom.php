<?php
/***********************************
**								  **
**Slider Custom Posts             **
**                                **
************************************/
/***********************************
**								  **
**Skill Custom Posts              **
**                                **
************************************/
function jbrsoft_Tutorial_post_custom() {
	$labels = array(
		'name'                => _x( 'Tutorial', 'Post Type General Name', 'jbrsoft' ),
		'singular_name'       => _x( 'Tutorial', 'Post Type Singular Name', 'jbrsoft' ),
		'menu_name'           => __( 'Tutorial', 'jbrsoft' ),
		'parent_item_colon'   => __( 'Parent Tutorial', 'jbrsoft' ),
		'all_items'           => __( 'All Tutorial', 'jbrsoft' ),
		'view_item'           => __( 'View Tutorial', 'jbrsoft' ),
		'add_new_item'        => __( 'Add New Tutorial', 'jbrsoft' ),
		'add_new'             => __( 'Add New', 'jbrsoft' ),
		'edit_item'           => __( 'Edit Tutorial', 'jbrsoft' ),
		'update_item'         => __( 'Update Tutorial', 'jbrsoft' ),
		'search_items'        => __( 'Search Tutorial', 'jbrsoft' ),
		'not_found'           => __( 'Not Found', 'jbrsoft' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'jbrsoft' ),
	);
	$args = array(
		'label'               => __( 'Tutorial', 'jbrsoft' ),
		'description'         => __( 'Tutorial news and reviews', 'jbrsoft' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies'          => array( 'tutorial' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'menu_icon'           => 'dashicons-products',
	);
	
	register_post_type( 'tutorial', $args );
}

add_action( 'init', 'jbrsoft_Tutorial_post_custom', 0 );



