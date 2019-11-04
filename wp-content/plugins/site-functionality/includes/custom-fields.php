<?php
/**
 * Custom Fields
 *
 * @since   1.0.0
 * @package Site_Functionality
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( function_exists( 'acf_add_local_field_group' ) ) {

	acf_add_local_field_group( array(
		'key' => 'group_event_details',
		'title' => __( 'Event Details', 'site-functionality' ),
		'fields' => array(
			array(
				'key' => 'field_event_cta',
				'label' => __( 'Call to Action', 'site-functionality' ),
				'name' => 'cta',
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
			array(
				'key' => 'field_event_recurrence_description',
				'label' => __( 'Recurrence Description', 'site-functionality' ),
				'name' => 'recurrence_description',
				'type' => 'textarea',
				'instructions' => __( 'Enter textual representation of recurring dates (e.g. Every third Wednesday of the Month)', 'site-functionality' ),
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 3,
				'new_lines' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'event',
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