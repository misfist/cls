<?php
/**
 * Enqueue File
 *
 * @package cls
 */

 /**
 * Register Google Fonts
 */
function cls_theme_fonts() {
	$fonts_url = '';

	/*
	 *Translators: If there are characters in your language that are not
	 * supported by Raleway, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$font_families[] = 'Raleway:400,600,700,800,900';

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => 'swap'
	);

	$fonts_url = add_query_arg( $query_args, esc_url( 'https://fonts.googleapis.com/css' ) );

	return $fonts_url;
}

 /**
 * Enqueue scripts and styles.
 */
function cls_enqueue_scripts() {

	/** Don't load Custom Twitter Feeds styling */
	wp_dequeue_style( 'ctf_styles' );

	wp_enqueue_style( 'cls-base-style', get_stylesheet_uri() );

	$cls_style = get_template_directory_uri() . '/dist/assets/css/style.css';
	
	if( is_page_template( 'page-templates/leadership.php' ) ) {
		wp_enqueue_style( 'cls-style', $cls_style, array( 'kadence-blocks-tabs' ) );
	} else {
		wp_enqueue_style( 'cls-style', $cls_style );
	}

	if( !is_singular( 'event' ) ) {
		wp_dequeue_style( 'eo-leaflet.js' );
		wp_dequeue_script( 'eo-leaflet.js' );
	}

	/** Mobile image on home page */
	/*
		medium: 934px
		large: 1200px
		xlarge: 1320px
	*/
	$mobile_image = cls_get_home_mobile_img();
	$mobile_hero_css = "
		@media screen and ( max-width: 934px ) {
			.wp-block-cover.hero {
				background-image: url('$mobile_image') !important;
			}
		}
		";
	
	if( is_front_page() ) {
		wp_add_inline_style( 'cls-style', $mobile_hero_css );
	}

	wp_enqueue_style( 'cls-print', get_template_directory_uri() . '/dist/assets/css/print.css' );

	wp_enqueue_style( 'cls-fonts', cls_theme_fonts(), null, null );

	wp_enqueue_script( 'cls-scripts', get_template_directory_uri() . '/dist/assets/js/app.js', array( 'jquery' ), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'cls_enqueue_scripts' );

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

/**
 * Get Mobile Image used on home page
 *
 * @return mixed image || ''
 */
function cls_get_home_mobile_img() {
	$page_id = get_option( 'page_on_front' );
	if( $image_id = get_post_meta( $page_id, 'sections_0_mobile_image', true ) ) {
		if( $image_src_array = wp_get_attachment_image_src( $image_id, 'full' ) ) {
			return esc_url( $image_src_array[0] );
		}
	}
	return '';
}