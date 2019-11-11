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

add_action( 'acf/init', 'site_function_acf_register_blocks' );
/**
 * Register ACF blocks
 * 
 * @see https://www.advancedcustomfields.com/resources/blocks/
 *
 * @return void
 */
function site_function_acf_register_blocks() {
	
	if( function_exists( 'acf_register_block' ) ) {
		// acf_register_block( array(
		// 	'name'				=> 'featured-event',
		// 	'title'				=> __( 'Event', 'site-functionality' ),
		// 	'description'		=> __( 'Display an event', 'site-functionality' ),
        //     // 'render_callback'	=> 'site_functionality_featured_event_render_callback',
        //     'render_template'   => 'templates/event.php',
		// 	'category'			=> 'custom',
		// 	'icon'				=> 'calendar-alt',
		// 	'keywords'			=> array( 'event' ),
        // ));
        
        acf_register_block( array(
			'name'				=> 'featured-post',
			'title'				=> __( 'Post', 'site-functionality' ),
			'description'		=> __( 'Display a post', 'site-functionality' ),
            // 'render_callback'	=> 'site_functionality_featured_post_render_callback',
            'render_template'   => SITE_CORE_DIR . '/blocks/acf/templates/post.php',
			'category'			=> 'custom',
			'icon'				=> 'text-page',
			'keywords'			=> array( 'post' ),
		));

		acf_register_block( array(
			'name'				=> 'subsections',
			'title'				=> __( 'Landing Page Sections', 'site-functionality' ),
			'description'		=> __( 'Display page sub-sections', 'site-functionality' ),
            // 'render_callback'	=> 'site_functionality_featured_post_render_callback',
            'render_template'   => SITE_CORE_DIR . '/blocks/acf/templates/section.php',
			'category'			=> 'custom',
			'icon'				=> 'grid-view',
			'keywords'			=> array( 'subpage, section' ),
			'post_types' 		=> array( 'page' ),
		));
    }
    
}

function site_functionality_featured_event_render_callback() {}
