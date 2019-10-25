<?php
/**
 * Content Filters
 *
 * @since   1.0.0
 * @package Site_Functionality
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter posts supported by Page Links To plugin
 * 
 * @see https://wordpress.org/plugins/page-links-to/
 *
 * @param array $post_types
 * @return array modified $post_types
 */
function site_functions_page_links_to_post_types( $post_types ) {
	$post_types = [ 'post', 'event' ];
	return $post_types;
}
add_filter( 'page-links-to-post-types', 'site_functions_page_links_to_post_types' );

/**
 * Add REST API support to an already registered post type.
 * 
 * @param array $args
 * @param string $post_type
 * @return array $args
 */
function site_functions_post_type_args( $args, $post_type ) {
 
    if ( 'event' === $post_type ) {
        $args['show_in_rest'] = true;
    }
 
    return $args;
}
add_filter( 'register_post_type_args', 'site_functions_post_type_args', 10, 2 );

/**
 * Add REST API support to an already registered taxonomy
 *
 * @return void
 */
function site_functions_modify_taxonomy() {
    $taxonomy = get_taxonomy( 'event-category' );
    if( $taxonomy && !is_wp_error( $taxonomy ) ) {
        $taxonomy->show_in_rest = true;

        register_taxonomy( 'event-category', 'event', $taxonomy );
    }
}
add_action( 'init', 'site_functions_modify_taxonomy', 11 );