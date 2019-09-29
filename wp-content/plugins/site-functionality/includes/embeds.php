<?php
/**
 * Embed functions
 *
 * @since   1.0.0
 * @package Core_Functionality
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Sort code to add Infogram
 * 
 * `<div class="infogram-embed" data-id="9cef83d8-bb21-4fdc-a26c-88f47932c733" data-type="interactive" data-title="Women as a Percent of All Candidates and Nominees, 2018"></div>`
 *
 * @param array $atts
 * @return string
 */
function core_functions_infogram_embed( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'data-id' => '',
			'data-title' => '',
		),
		$atts
	);

	return sprintf( '<div class="infogram-embed responsive-embed" data-id="%s" data-type="interactive" data-title="%s"></div>',
		esc_attr( $atts['data-id'] ),
		esc_html( $atts['data-title'] )
	);

}
add_shortcode( 'infogram', 'core_functions_infogram_embed' );

/**
 * Undocumented function
 *
 * @return void
 */
function core_functions_infogram_embed_scripts() {
	global $post;
	wp_register_script( 'infogram-script', SITE_CORE_DIR_URI . 'assets/js/infogram.js', null, null, true );

	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'infogram' ) ) {
		wp_enqueue_script( 'infogram-script' );
	}
}
add_action( 'wp_enqueue_scripts', 'core_functions_infogram_embed_scripts' );