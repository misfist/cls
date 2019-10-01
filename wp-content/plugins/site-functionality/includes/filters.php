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