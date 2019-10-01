<?php
/**
 * Custom Taxonomies
 *
 * @since   1.0.0
 * @package Site_Functionality
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'site_functions_custom_taxonomy_year' ) ) {

	// Register Custom Taxonomy
	function site_functions_custom_taxonomy_year() {
	
		$labels = array(
			'name'                       => _x( 'Years', 'Taxonomy General Name', 'site-functions' ),
			'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'site-functions' ),
			'menu_name'                  => __( 'Years', 'site-functions' ),
			'all_items'                  => __( 'All Years', 'site-functions' ),
			'parent_item'                => __( 'Parent Year', 'site-functions' ),
			'parent_item_colon'          => __( 'Parent Year:', 'site-functions' ),
			'new_item_name'              => __( 'New Year Name', 'site-functions' ),
			'add_new_item'               => __( 'Add New Year', 'site-functions' ),
			'edit_item'                  => __( 'Edit Year', 'site-functions' ),
			'update_item'                => __( 'Update Year', 'site-functions' ),
			'view_item'                  => __( 'View Year', 'site-functions' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'site-functions' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'site-functions' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'site-functions' ),
			'popular_items'              => __( 'Popular Years', 'site-functions' ),
			'search_items'               => __( 'Search Years', 'site-functions' ),
			'not_found'                  => __( 'Not Found', 'site-functions' ),
			'no_terms'                   => __( 'No items', 'site-functions' ),
			'items_list'                 => __( 'Years list', 'site-functions' ),
			'items_list_navigation'      => __( 'Years list navigation', 'site-functions' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'year', array( 'history' ), $args );
	
	}
	add_action( 'init', 'site_functions_custom_taxonomy_year', 0 );
	
}

if ( ! function_exists( 'site_functions_custom_taxonomy_event_type' ) ) {

	// Register Custom Taxonomy
	function site_functions_custom_taxonomy_event_type() {
	
		$labels = array(
			'name'                       => _x( 'Event Types', 'Taxonomy General Name', 'site-functions' ),
			'singular_name'              => _x( 'Event Type', 'Taxonomy Singular Name', 'site-functions' ),
			'menu_name'                  => __( 'Type', 'site-functions' ),
			'all_items'                  => __( 'All Items', 'site-functions' ),
			'parent_item'                => __( 'Parent Item', 'site-functions' ),
			'parent_item_colon'          => __( 'Parent Item:', 'site-functions' ),
			'new_item_name'              => __( 'New Item Name', 'site-functions' ),
			'add_new_item'               => __( 'Add New Item', 'site-functions' ),
			'edit_item'                  => __( 'Edit Item', 'site-functions' ),
			'update_item'                => __( 'Update Item', 'site-functions' ),
			'view_item'                  => __( 'View Item', 'site-functions' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'site-functions' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'site-functions' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'site-functions' ),
			'popular_items'              => __( 'Popular Items', 'site-functions' ),
			'search_items'               => __( 'Search Items', 'site-functions' ),
			'not_found'                  => __( 'Not Found', 'site-functions' ),
			'no_terms'                   => __( 'No items', 'site-functions' ),
			'items_list'                 => __( 'Items list', 'site-functions' ),
			'items_list_navigation'      => __( 'Items list navigation', 'site-functions' ),
		);
		$rewrite = array(
			'slug'                       => 'type',
			'with_front'                 => true,
			'hierarchical'               => false,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'event_type', array( 'event' ), $args );
	
	}
	add_action( 'init', 'site_functions_custom_taxonomy_event_type', 0 );
	
}