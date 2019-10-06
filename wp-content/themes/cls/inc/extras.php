<?php
/**
 * Extra Functions
 *
 * @package cls
 */

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
