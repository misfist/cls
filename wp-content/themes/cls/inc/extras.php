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
    <div class="wp-block-titter-timeline">
        <div class="titter-timeline__inner-container inner-container">
            <header class="block-header">
                <h2 class="block-title"><a href="https://twitter.com/%1$s" rel="me" target="_blank">@%1$s</a></h2>
                <div class="block-title-spacer"></div>
            </header>
            %2$s
        </div>
    </div>',
    $options['usertimeline_text'],
    $output
    );
}
add_filter( 'do_shortcode_tag', 'cls_filter_custom_twitter_fields', 10, 2 );
