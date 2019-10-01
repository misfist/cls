<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package cls
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function gutenberg_starter_theme_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	} else {
		global $post;
		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;

			if( function_exists( 'get_field' ) ) {
				if( $page_color = get_field( 'page-color' ) ) {
					$classes[] = sprintf( 'has-%s-page-color', sanitize_title( $page_color ) );
				}
			}
		}
	}
	return $classes;
}
add_filter( 'body_class', 'gutenberg_starter_theme_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function gutenberg_starter_theme_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'gutenberg_starter_theme_pingback_header' );
