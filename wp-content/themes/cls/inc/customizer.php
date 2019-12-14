<?php
/**
 * cls Theme Customizer
 *
 * @package cls
 */


function cls_customize_register( $wp_customize ) {

    $wp_customize->add_setting( 'notice_text' , array(
        'type'          => 'theme_mod',
        'capability'    => 'edit_theme_options',
        'transport'     => 'refresh',
    ) );
    $wp_customize->add_control( 'notice_text_control', array(
        'label'      => __( 'News Banner Text', 'cls' ),
        'section'    => 'title_tagline',
        'settings'   => 'notice_text',
        'type'       => 'textarea',
    ) );
            
}
add_action( 'customize_register', 'cls_customize_register' );