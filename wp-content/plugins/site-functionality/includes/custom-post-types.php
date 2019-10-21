<?php
/**
 * Custom Post Types
 *
 * @since   1.0.0
 * @package Core_Functionality
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists('site_functions_custom_post_type_event') ) {

	// Register Custom Post Type
	function site_functions_custom_post_type_event() {
	
		$labels = array(
			'name'                  => _x( 'Events', 'Post Type General Name', 'site-functions' ),
			'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'site-functions' ),
			'menu_name'             => __( 'Events', 'site-functions' ),
			'name_admin_bar'        => __( 'Event', 'site-functions' ),
			'archives'              => __( 'Event Archives', 'site-functions' ),
			'attributes'            => __( 'Event Attributes', 'site-functions' ),
			'parent_item_colon'     => __( 'Parent Event:', 'site-functions' ),
			'all_items'             => __( 'All Events', 'site-functions' ),
			'add_new_item'          => __( 'Add New Event', 'site-functions' ),
			'add_new'               => __( 'Add New', 'site-functions' ),
			'new_item'              => __( 'New Event', 'site-functions' ),
			'edit_item'             => __( 'Edit Event', 'site-functions' ),
			'update_item'           => __( 'Update Event', 'site-functions' ),
			'view_item'             => __( 'View Event', 'site-functions' ),
			'view_items'            => __( 'View Events', 'site-functions' ),
			'search_items'          => __( 'Search Event', 'site-functions' ),
			'not_found'             => __( 'Not found', 'site-functions' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'site-functions' ),
			'featured_image'        => __( 'Featured Image', 'site-functions' ),
			'set_featured_image'    => __( 'Set featured image', 'site-functions' ),
			'remove_featured_image' => __( 'Remove featured image', 'site-functions' ),
			'use_featured_image'    => __( 'Use as featured image', 'site-functions' ),
			'insert_into_item'      => __( 'Insert into item', 'site-functions' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'site-functions' ),
			'items_list'            => __( 'Events list', 'site-functions' ),
			'items_list_navigation' => __( 'Events list navigation', 'site-functions' ),
			'filter_items_list'     => __( 'Filter items list', 'site-functions' ),
		);
		$args = array(
			'label'                 => __( 'Event', 'site-functions' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'            => array( 'event_type' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-calendar-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'event', $args );
	
	}
	// add_action( 'init', 'site_functions_custom_post_type_event', 0 );
	
}

if ( ! function_exists('site_functions_custom_post_type_history') ) {

	// Register Custom Post Type
	function site_functions_custom_post_type_history() {
	
		$labels = array(
			'name'                  => _x( 'History', 'Post Type General Name', 'site-functions' ),
			'singular_name'         => _x( 'History', 'Post Type Singular Name', 'site-functions' ),
			'menu_name'             => __( 'History', 'site-functions' ),
			'name_admin_bar'        => __( 'History', 'site-functions' ),
			'archives'              => __( 'History Archives', 'site-functions' ),
			'attributes'            => __( 'History Attributes', 'site-functions' ),
			'parent_item_colon'     => __( 'Parent History:', 'site-functions' ),
			'all_items'             => __( 'All History', 'site-functions' ),
			'add_new_item'          => __( 'Add New History', 'site-functions' ),
			'add_new'               => __( 'Add New', 'site-functions' ),
			'new_item'              => __( 'New History', 'site-functions' ),
			'edit_item'             => __( 'Edit History', 'site-functions' ),
			'update_item'           => __( 'Update History', 'site-functions' ),
			'view_item'             => __( 'View History', 'site-functions' ),
			'view_items'            => __( 'View History', 'site-functions' ),
			'search_items'          => __( 'Search History', 'site-functions' ),
			'not_found'             => __( 'Not found', 'site-functions' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'site-functions' ),
			'featured_image'        => __( 'Featured Image', 'site-functions' ),
			'set_featured_image'    => __( 'Set featured image', 'site-functions' ),
			'remove_featured_image' => __( 'Remove featured image', 'site-functions' ),
			'use_featured_image'    => __( 'Use as featured image', 'site-functions' ),
			'insert_into_item'      => __( 'Insert into item', 'site-functions' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'site-functions' ),
			'items_list'            => __( 'History list', 'site-functions' ),
			'items_list_navigation' => __( 'History list navigation', 'site-functions' ),
			'filter_items_list'     => __( 'Filter items list', 'site-functions' ),
		);
		$args = array(
			'label'                 => __( 'History', 'site-functions' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'            => array( 'year' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-clock',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'history', $args );
	
	}
	add_action( 'init', 'site_functions_custom_post_type_history', 0 );
	
	}