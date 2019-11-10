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

	/**
	 * Landing Page Fields for Sections Block
	 */
	acf_add_local_field_group(array(
		'key' => 'group_5dc70d75489e8',
		'title' => __( 'Sections', 'site-functions' ),
		'fields' => array(
			array(
				'key' => 'field_5dc70d98a3cbe',
				'label' => __( 'Sections', 'site-functions' ),
				'name' => 'sections',
				'type' => 'repeater',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'collapsed' => 'field_5dc70dbfa3cbf',
				'min' => 0,
				'max' => 0,
				'layout' => 'row',
				'button_label' => __( 'Add Section', 'site-functions' ),
				'sub_fields' => array(
					array(
						'key' => 'field_5dc70dbfa3cbf',
						'label' => __( 'Title', 'site-functions' ),
						'name' => 'title',
						'type' => 'text',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					array(
						'key' => 'field_5dc70dc6a3cc0',
						'label' => __( 'Content', 'site-functions' ),
						'name' => 'content',
						'type' => 'wysiwyg',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'tabs' => 'all',
						'toolbar' => 'basic',
						'media_upload' => 0,
						'delay' => 0,
					),
					array(
						'key' => 'field_5dc70dcda3cc1',
						'label' => __( 'Image', 'site-functions' ),
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'return_format' => 'array',
						'preview_size' => 'medium',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => '',
					),
					array(
						'key' => 'field_5dc70dd3a3cc2',
						'label' => 'Link',
						'name' => 'link',
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
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/subsections',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
	
}