<?php
/**
 * Custom Fields
 *
 * @since   1.0.0
 * @package Core_Functionality
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( function_exists( 'acf_add_local_field_group' ) ) {

	acf_add_local_field_group(array(
		'key' => 'group_5d7be2cfc5076',
		'title' => 'Page Navigation',
		'fields' => array(
			array(
				'key' => 'field_5d7be31ffeb67',
				'label' => __( 'Label', 'core-functionality' ),
				'name' => 'link_label',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => __( 'Up Next', 'core-functionality' ),
				'placeholder' => __( "Leave blank for 'Up Next'", 'core-functionality' ),
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5d7be335feb68',
				'label' => __( 'Link', 'core-functionality' ),
				'name' => 'page_link',
				'type' => 'link',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
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