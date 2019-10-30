<?php
/**
 * Plugin Name:     Site Functions
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     Custom functions for site
 * Author:          Pea
 * Author URI:      https://patricialutz.tech
 * Text Domain:     core-functionality
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Site_Functionality
 */

// Your code starts here.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Plugin Directory
 *
 * @since 0.1.0
 */
define( 'SITE_CORE_DIR', dirname( __FILE__ ) );
define( 'SITE_CORE_DIR_URI', plugin_dir_url( __FILE__ ) );

/**
 * Dependencies
 */
include_once( SITE_CORE_DIR . '/includes/custom-post-types.php' );
include_once( SITE_CORE_DIR . '/includes/custom-taxonomies.php' );
include_once( SITE_CORE_DIR . '/includes/custom-fields.php' );
include_once( SITE_CORE_DIR . '/includes/filters.php' );


/**
 * Block Initializer.
 */
include_once( SITE_CORE_DIR . '/blocks/src/blocks.php' );
include_once( SITE_CORE_DIR . '/blocks/acf/register-blocks.php' );