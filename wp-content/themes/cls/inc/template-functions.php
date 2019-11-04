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
					$page_color = ( 'transparent' === $page_color ) ? 'white' : $page_color;
					$classes[] = sprintf( 'has-%s-page-color', sanitize_title( $page_color ) );
				} else {
					$classes[] = sprintf( 'has-%s-page-color', esc_attr( 'white' ) );
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

/**
 * Register post type templates
 * 
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-templates/
 *
 * @return void
 */
function cls_register_post_type_args_page( $args, $post_type ) {
	if( 'page' === $post_type ) {
		$args['template'] = array(
			array( 'custom/intro', array() ),
			array( 'core/paragraph', array() ),
			array( 'custom/content-footer', array() ),
			array( 'custom/cta', array() ),
		);
	}
	return $args;
}
add_filter( 'register_post_type_args', 'cls_register_post_type_args_page', 10, 2 );

/**
 * Filter Query
 *
 * @param obj $query
 * @return void
 */
function cls_query_filters( $query ) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_search ) {
			$home_id = get_option( 'page_on_front' );
            $query->set( 'post__not_in', $home_id );
        }
    }
}
add_action( 'pre_get_posts', 'cls_query_filters' );