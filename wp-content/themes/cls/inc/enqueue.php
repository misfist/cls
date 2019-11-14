<?php
/**
 * Enqueue File
 *
 * @package cls
 */

 /**
 * Register Google Fonts
 */
function gutenberg_starter_theme_fonts_url() {
	$fonts_url = '';

	/*
	 *Translators: If there are characters in your language that are not
	 * supported by Raleway, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$raleway = esc_html_x( 'on', 'Raleway font: on or off', 'cls' );

	if ( 'off' !== $raleway ) {
		$font_families = array();
		// $font_families[] = 'Raleway:400,600,700,800,900';
		$font_families[] = 'Raleway:900';

		$query_args = array(
			'family'  => urlencode( implode( '|', $font_families ) ),
			'subset'  => urlencode( 'latin,latin-ext' ),
			'display' => 'swap'
		);

		$fonts_url = add_query_arg( $query_args, esc_url( 'https://fonts.googleapis.com/css' ) );
	}

	return $fonts_url;

}

 /**
 * Enqueue scripts and styles.
 */
function gutenberg_starter_theme_scripts() {

	/** Don't load Custom Twitter Feeds styling */
	wp_dequeue_style( 'ctf_styles' );

	wp_enqueue_style( 'cls-base-style', get_stylesheet_uri() );

	if( is_page_template( 'page-templates/leadership.php' ) ) {
		wp_enqueue_style( 'cls-style', get_template_directory_uri() . '/dist/assets/css/style.css', array( 'kadence-blocks-tabs' ) );
	} else {
		wp_enqueue_style( 'cls-style', get_template_directory_uri() . '/dist/assets/css/style.css' );
	}

	// wp_enqueue_style( 'cls-fonts', gutenberg_starter_theme_fonts_url(), null, null );

	// wp_enqueue_script( 'cls-navigation', get_template_directory_uri() . '/dist/js/navigation.js', array(), '20151215', true );

	// wp_enqueue_script( 'cls-skip-link-focus-fix', get_template_directory_uri() . '/dist/js/skip-link-focus-fix.js', array(), '20151215', true );

	// wp_enqueue_script( 'cls-base-scripts', get_template_directory_uri() . '/dist/assets/js/foundation.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'cls-scripts', get_template_directory_uri() . '/dist/assets/js/app.js', array( 'jquery' ), '20151215', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gutenberg_starter_theme_scripts' );

/**
 * Function to turn off inline tabs block css.
 * 
 * @see https://wordpress.org/support/topic/unregister-styles/
 *
 * @param bool   $enable is on of off.
 * @param string $type the name of the block.
 * @param string $uniqueid the unique id of the block.
 */
function cls_unregister_tabs_inline_css( $enable, $type, $uniqueid ) {
	if ( 'tabs' === $type ) {
		$enable = false;
	}
	return $enable;
}
add_filter( 'kadence_blocks_render_inline_css', 'cls_unregister_tabs_inline_css', 10, 3 );