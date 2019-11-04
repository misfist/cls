<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * Assets enqueued:
 * 1. blocks.style.build.css - Frontend + Backend.
 * 2. blocks.build.js - Backend.
 * 3. blocks.editor.build.css - Backend.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function site_functionality_block_assets() { // phpcs:ignore
	// Register block styles for both frontend + backend.
	wp_register_style(
		'site-functionality-block-css', // Handle.
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
		array( 'wp-editor' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
	);

	// Register block editor script for backend.
	wp_register_script(
		'site-functionality-block-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'site-functionality-block-editor-css', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		null // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
	wp_localize_script(
		'site-functionality-block-js',
		'cgbGlobal', // Array containing dynamic data for a JS Global.
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
			// Add more data here that you want to access from `cgbGlobal` object.
		]
	);

	/**
	 * Register Gutenberg block on server-side.
	 *
	 * Register the block on server-side to ensure that the block
	 * scripts and styles for both frontend and backend are
	 * enqueued when the editor loads.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
	 * @since 1.16.0
	 */
	register_block_type(
		'custom/intro', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'site-functionality-block-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'site-functionality-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'site-functionality-block-editor-css',
		)
	);

	register_block_type(
		'custom/content-footer', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'site-functionality-block-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'site-functionality-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'site-functionality-block-editor-css',
		)
	);

	register_block_type(
		'custom/group', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'site-functionality-block-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'site-functionality-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'site-functionality-block-editor-css',
		)
	);

	register_block_type(
		'custom/link-back', array(
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'site-functionality-block-css',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'site-functionality-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'site-functionality-block-editor-css',
		)
	);
}
add_action( 'init', 'site_functionality_block_assets' );

/**
 * Add Block Category
 *
 * @param array $categories
 * @return array $categories
 */
/**
 * Add a block category for "Get With Gutenberg" if it doesn't exist already.
 *
 * @param array $categories Array of block categories.
 *
 * @return array
 */
function site_functionality_block_categories( $categories, $post ) {
	if ( 'page' !== $post->post_type && 'event' !== $post->post_type ) {
        return $categories;
	}
	
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'custom',
                'title' => __( 'Custom', 'site-functionality' ),
                'icon'  => 'star-filled',
            ),
        )
    );
}
add_filter( 'block_categories', 'site_functionality_block_categories', 10, 2 );

/**
 * Add a block category for "Get With Gutenberg" if it doesn't exist already.
 *
 * @param array $categories Array of block categories.
 *
 * @return array
 */
function site_functionality_block_categories_cta( $categories, $post ) {
	if ( 'page' !== $post->post_type && 'event' !== $post->post_type && 'post' !== $post->post_type ) {
        return $categories;
	}
	
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'custom-cta',
                'title' => __( 'CTAs', 'site-functionality' ),
                'icon'  => 'megaphone',
            ),
        )
    );
}
add_filter( 'block_categories', 'site_functionality_block_categories_cta', 10, 2 );

/**
 * Register Post Meta for Blocks
 *
 * @return void
 */
function site_functionality_register_post_meta() {
	$post_types = array(
		'post',
		'page',
		'event'
	);

	/**
	 * CTA Fields
	 */
	foreach( $post_types as $post_type ) {
		register_post_meta( $post_type, 'cta-text', array(
			'show_in_rest' 	=> true,
			'single' 		=> true,
			'type' 			=> 'string',
		) );
		register_post_meta( $post_type, 'cta-url', array(
			'show_in_rest' 	=> true,
			'single' 		=> true,
			'type' 			=> 'string',
		) );
		register_post_meta( $post_type, 'cta-target', array(
			'show_in_rest' 	=> true,
			'single' 		=> true,
			'type' 			=> 'boolean',
		) );
	}

	/**
	 * Intro Fields
	 */
	register_post_meta( 'page', 'intro-data', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'intro-title', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'intro-content', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'intro-button-url', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'intro-button-text', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'intro-button-target', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'boolean',
	) );

	register_post_meta( 'page', 'intro-button-color', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	/**
	 * Featured Event Fields
	 */
	register_post_meta( 'page', 'featured-event-type', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'boolean',
	) );

	register_post_meta( 'page', 'featured-event', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'integer',
	) );

	register_post_meta( 'page', 'featured-event-title', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'featured-event-content', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'featured-event-url', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'featured-event-link-text', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'string',
	) );

	register_post_meta( 'page', 'featured-event-target', array(
		'show_in_rest' 	=> true,
		'single' 		=> true,
		'type' 			=> 'boolean',
	) );

}
add_action( 'init', 'site_functionality_register_post_meta' );
