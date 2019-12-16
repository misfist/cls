<?php
/**
 * Gutenberg Functions
 *
 * @package cls
 */

 /**
 * Templates & pages without Gutenberg editor
 *
 */
function cls_exclude_from_gutenberg( $id = false ) {

	$excluded_templates = array(
		'page-templates/front-page.php',
		'page-templates/history-timeline.php',
		'page-templates/landing-page-get-help.php',
		'page-templates/landing-page.php',
		'page-templates/leadership.php',
		'page-templates/locations.php',
		'page-templates/news-events.php'
	);

	$excluded_ids = array(
		// get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function cls_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( cls_exclude_from_gutenberg( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'cls_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'cls_disable_gutenberg', 10, 2 );
