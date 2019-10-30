<?php
/**
 * Register ACF Blocks
 *
 *
 * @since   1.0.0
 * @package site-functionality
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// add_action( 'acf/init', 'site_function_acf_register_blocks' );
function site_function_acf_register_blocks() {
	
	if( function_exists( 'acf_register_block' ) ) {
		
		acf_register_block(array(
			'name'				=> 'featured-event',
			'title'				=> __( 'Featured Event', 'site-functionality' ),
			'description'		=> __( 'Featured event', 'site-functionality' ),
			'render_callback'	=> 'site_functionality_featured_event_render_callback',
			'category'			=> 'custom',
			'icon'				=> 'calendar-alt',
			'keywords'			=> array( 'event' ),
		));
	}
}
