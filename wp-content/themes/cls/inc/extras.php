<?php
/**
 * Extra Functions
 *
 * @package cls
 */

/**
 * Append a div with the tweetbar class
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

/**
 * Page Color Functions
 */
if( function_exists( 'acf_add_local_field_group' ) ) {
    
    /**
     * Add Custom Field
     */
    acf_add_local_field_group(array(
        'key' => 'group_page_color_settings',
        'title' => __( 'Color Settings', 'cls' ),
        'fields' => array(
            array(
                'key' => 'field_page_color',
                'label' => __( 'Color', 'cls' ),
                'name' => 'page-color',
                'type' => 'swatch',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    '#F58B6F' => 'primary',
                    '#8169B1' => 'secondary',
                    '#1E4F92' => 'accent-light',
                    '#EFEFEF' => 'gray-light',
                    '#ffffff' => 'white',
                ),
                'allow_null' => 1,
                'default_value' => 'secondary',
                'layout' => 'horizontal',
                'return_format' => 'label',
                'other_choice' => 0,
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
}
