<?php
/**
 * Extra Functions
 *
 * @package cls
 */

/**
 * Wrap Custom Twitter Feeds in custom div
 * after the output of any [custom-twitter-feeds] shortcode
 * 
 * @see https://developer.wordpress.org/reference/hooks/do_shortcode_tag/
 *
 * @param string $output The output from the shortcode
 * @param string $tag The name of the shortcode
 *
 * @return string The modified output
 */
function cls_filter_custom_twitter_fields( $output, $tag ) {
	if ( 'custom-twitter-feeds' !== $tag ) {
		return $output;
    }
    $options = get_option( 'ctf_options', false );
    
    return sprintf( '
    <div class="wp-block-titter-timeline has-background-color">
        <div class="titter-timeline__inner-container inner-container">
            <header class="block-header">
                <h2 class="block-title"><a href="%1$s/%2$s" rel="me" target="_blank">@%2$s</a></h2>
            </header>
            %3$s
        </div>
    </div>',
    esc_url( 'https://twitter.com' ),
    $options['usertimeline_text'],
    $output
    );
}
// add_filter( 'do_shortcode_tag', 'cls_filter_custom_twitter_fields', 10, 2 );

/**
 * Filter occurences to only return future occurrences
 * 
 * @see http://codex.wp-event-organiser.com/hook-eventorganiser_get_the_occurrences_of.html
 *
 * @param array $occurrences
 * @param int $post_id
 * @return array $occurrences - filtered to exclude past events and limited in number
 */
function cls_eventorganiser_get_the_occurrences_of( $occurrences, $post_id ) {
    $limit = 6;
    $occurrences = array_filter( $occurrences, function( $occurrence ) {
        return eo_format_datetime( $occurrence['start'], 'Y-m-d H:i:s' ) > date( 'Y-m-d H:i:s' );
    } );
	return array_slice( $occurrences, 0, $limit, true );
};
add_filter( 'eventorganiser_get_the_occurrences_of', 'cls_eventorganiser_get_the_occurrences_of', 10, 2 );

/**
 * Image Size Options
 * 
 * @see https://developer.wordpress.org/reference/hooks/image_size_names_choose/
 *
 * @param array $sizes
 * @return array $sizes
 */
function cls_image_size_names_choose( $sizes ) {
    return array_merge( $sizes, array(
        'editorial-thumb'   => __( 'Editorial Image', 'cls' ),
        'staff-thumb'       => __( 'Staff Photo', 'cls' ),
        'event-flyer'       => __( 'Event Flyer (portrait)', 'cls' ),
        'banner'            => __( 'Banner', 'cls' ),
    ) );
}
add_filter( 'image_size_names_choose', 'cls_image_size_names_choose' );

/**
 * Modify excerpt length
 * 
 * @see https://developer.wordpress.org/reference/hooks/excerpt_length/
 *
 * @param int $length
 * @return int $length
 */
function cls_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'cls_excerpt_length', 999 );