<?php
/**
 * Setup Functions
 *
 * @package cls
 */

 
if ( ! function_exists( 'gutenberg_starter_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gutenberg_starter_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cls, use a find and replace
		 * to change 'cls' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cls', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'cls' ),
				'footer' => __( 'Footer Menu', 'cls' ),
				'social' => __( 'Social Menu', 'cls' ),
				'cta' => __( 'CTA Menu', 'cls' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// // Set up the WordPress core custom background feature.
		// add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
		// 	'default-color' => 'ffffff',
		// 	'default-image' => '',
		// ) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 148,
			'width'       => 56,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Image Sizes
		 */
		update_option( 'thumbnail_size_w', 190 );
		update_option( 'thumbnail_size_h', 142 );
		update_option( 'thumbnail_crop', 1 );
		update_option( 'medium_size_w', 600 );
		update_option( 'medium_size_h', 360 );
		update_option( 'large_size_w', 1200 );
		update_option( 'large_size_h', 900 );

		add_image_size( 'staff-thumb', 166, 208, true );
		add_image_size( 'event-flyer', 300, 450, true );
		add_image_size( 'editorial-thumb', 334, 252, array( 'center', 'top' ) );
		add_image_size( 'banner', 1600,600, true );


        // Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( get_stylesheet_directory_uri() . '/dist/assets/css/style-editor.css' );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'cls' ),
					'shortName' => __( 'S', 'cls' ),
					'size'      => 14,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Normal', 'cls' ),
					'shortName' => __( 'M', 'cls' ),
					'size'      => 16,
					'slug'      => 'normal',
				),
				array(
					'name'      => __( 'Large', 'cls' ),
					'shortName' => __( 'L', 'cls' ),
					'size'      => 24,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'X-Large', 'cls' ),
					'shortName' => __( 'XL', 'cls' ),
					'size'      => 32,
					'slug'      => 'x-large',
				),
				array(
					'name'      => __( 'Huge', 'cls' ),
					'shortName' => __( 'XL', 'cls' ),
					'size'      => 36,
					'slug'      => 'huge',
				),
			)
		);

		$color_palette =  array(
			array(
				'name'  => __( 'Primary', 'cls' ),
				'slug'  => 'primary',
				'color' => '#F58B6F',
			),
			array(
				'name'  => __( 'Secondary', 'cls' ),
				'slug'  => 'secondary',
				'color' => '#8169B1',
			),
			array(
				'name'  => __( 'Blue', 'cls' ),
				'slug'  => 'accent',
				'color' => '#1B3E70',
			),
			array(
				'name'  => __( 'Dark Gray', 'cls' ),
				'slug'  => 'gray-dark',
				'color' => '#333333',
			),
			array(
				'name'  => __( 'Medium Gray', 'cls' ),
				'slug'  => 'gray-medium',
				'color' => '#CECECE',
			),
			array(
				'name'  => __( 'Light Gray', 'cls' ),
				'slug'  => 'gray-light',
				'color' => '#EFEFEF',
			),
			array(
				'name'  => __( 'White', 'cls' ),
				'slug'  => 'white',
				'color' => '#FFF',
			),
			array(
				'name'  => __( 'Black', 'cls' ),
				'slug'  => 'black',
				'color' => '#000',
			),
		);

		// Editor color palette.
		add_theme_support(
			'editor-color-palette',
			$color_palette
        );
        
        // Disable custom colors.
        add_theme_support( 'disable-custom-colors' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

	}
endif;
add_action( 'after_setup_theme', 'gutenberg_starter_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gutenberg_starter_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gutenberg_starter_theme_content_width', 1180 );
}
add_action( 'after_setup_theme', 'gutenberg_starter_theme_content_width', 0 );