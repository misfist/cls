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

	/**
	 * Event Pages
	 */
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
	 * Featured Event
	 * Appears only on News & Events
	 */

	acf_add_local_field_group(array(
		'key' => 'group_5dc77eb8e5e4a',
		'title' => __( 'Featured Event', 'site-functionality' ),
		'fields' => array(
			array(
				'key' => 'field_5dc9c6fb0172e',
				'label' => __( 'Display Featured Event', 'site-functionality' ),
				'name' => 'has_featured_event',
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => '',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => 'Show',
				'ui_off_text' => 'Hide',
			),
			array(
				'key' => 'field_5dc77eb91ff0a',
				'label' => 'Type',
				'name' => 'type',
				'type' => 'radio',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5dc9c6fb0172e',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array(
					'dynamic' => 'Dynamic',
					'manual' => 'Manual',
				),
				'allow_null' => 0,
				'other_choice' => 0,
				'default_value' => 'dynamic',
				'layout' => 'horizontal',
				'return_format' => 'value',
				'save_other_choice' => 0,
			),
			array(
				'key' => 'field_5dc77eb91ff67',
				'label' => 'Manual Post',
				'name' => 'manual_post',
				'type' => 'group',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5dc77eb91ff0a',
							'operator' => '==',
							'value' => 'manual',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'layout' => 'row',
				'sub_fields' => array(
					array(
						'key' => 'field_5dc77eb92f969',
						'label' => 'Title',
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
						'key' => 'field_5dc77eb92f9e1',
						'label' => 'Excerpt',
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
						'key' => 'field_5dc77eb92fa49',
						'label' => 'Image',
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
						'key' => 'field_5dc77eb92faac',
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
			array(
				'key' => 'field_5dc77eb93d4b3',
				'label' => 'Event',
				'name' => 'post',
				'type' => 'post_object',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => array(
					array(
						array(
							'field' => 'field_5dc77eb91ff0a',
							'operator' => '!=',
							'value' => 'manual',
						),
						array(
							'field' => 'field_5dc9c6fb0172e',
							'operator' => '==',
							'value' => '1',
						),
					),
				),
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'post_type' => array(
					0 => 'event',
				),
				'taxonomy' => '',
				'allow_null' => 0,
				'multiple' => 0,
				'return_format' => 'object',
				'ui' => 1,
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-templates/news-events.php',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'acf_after_title',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => array(
			0 => 'the_content',
		),
		'active' => true,
		'description' => '',
	));

	/**
	 * Home Page Fields
	 * Appears only on Home Page
	 */
	acf_add_local_field_group(array(
		'key' 			=> 'group_5dc7684d79aaa',
		'title' 		=> __( 'Home Sections', 'site-functionality' ),
		'fields' 		=> array(
			array(
				'key' => 'field_5dcadc7f46d47',
				'label' => __( 'Sections', 'site-functionality' ),
				'name' => 'sections',
				'type' => 'flexible_content',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'acfe_permissions' => '',
				'acfe_flexible_stylised_button' => 1,
				'acfe_flexible_layouts_thumbnails' => 1,
				'acfe_flexible_layouts_templates' => 0,
				'acfe_flexible_layouts_placeholder' => 1,
				'acfe_flexible_close_button' => 0,
				'acfe_flexible_title_edition' => 1,
				'acfe_flexible_copy_paste' => 0,
				'acfe_flexible_modal_edition' => 0,
				'acfe_flexible_modal' => array(
					'acfe_flexible_modal_enabled' => '0',
				),
				'acfe_flexible_layouts_state' => '',
				'layouts' => array(
					'layout_5dcadc93685a7' => array(
						'key' => 'layout_5dcadc93685a7',
						'name' => 'hero',
						'label' => 'Hero',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5dc768869951f',
								'label' => 'Image',
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
								'acfe_permissions' => '',
								'acfe_uploader' => 'wp',
								'acfe_thumbnail' => 0,
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
								'key' => 'field_5dc7689299520',
								'label' => 'Headline',
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
								'acfe_permissions' => '',
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array(
								'key' => 'field_5dc768a499521',
								'label' => 'Content',
								'name' => 'content',
								'type' => 'textarea',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'acfe_permissions' => '',
								'default_value' => '',
								'placeholder' => '',
								'maxlength' => '',
								'rows' => 3,
								'new_lines' => '',
								'acfe_textarea_code' => 0,
							),
							array(
								'key' => 'field_5dc768be99522',
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
								'acfe_permissions' => '',
								'return_format' => 'array',
							),
						),
						'min' => '',
						'max' => '',
						'acfe_flexible_thumbnail' => '1109',
					),
					'layout_5dcaddbfb9fe7' => array(
						'key' => 'layout_5dcaddbfb9fe7',
						'name' => 'number-counter',
						'label' => 'Number Counter',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5dcae1d8dc91e',
								'label' => 'Numbers',
								'name' => 'numbers',
								'type' => 'repeater',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'acfe_permissions' => '',
								'acfe_repeater_stylised_button' => 0,
								'collapsed' => 'field_5dcae20cdc920',
								'min' => 0,
								'max' => 0,
								'layout' => 'table',
								'button_label' => 'Add Number',
								'sub_fields' => array(
									array(
										'key' => 'field_5dcae201dc91f',
										'label' => 'Number',
										'name' => 'number',
										'type' => 'number',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'acfe_permissions' => '',
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'min' => '',
										'max' => '',
										'step' => '',
									),
									array(
										'key' => 'field_5dcae20cdc920',
										'label' => 'Content',
										'name' => 'content',
										'type' => 'textarea',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'acfe_permissions' => '',
										'default_value' => '',
										'placeholder' => '',
										'maxlength' => '',
										'rows' => 2,
										'new_lines' => '',
										'acfe_textarea_code' => 0,
									),
									array(
										'key' => 'field_5dcae21cdc921',
										'label' => 'Image',
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
										'acfe_permissions' => '',
										'acfe_uploader' => 'wp',
										'acfe_thumbnail' => 0,
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
								),
							),
						),
						'min' => '',
						'max' => '',
						'acfe_flexible_thumbnail' => '1112',
					),
					'layout_5dcaf0c8cfa39' => array(
						'key' => 'layout_5dcaf0c8cfa39',
						'name' => 'main',
						'label' => 'Main',
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5dcaf530faf36',
								'label' => 'Posts',
								'name' => 'posts',
								'type' => 'group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'acfe_permissions' => '',
								'layout' => 'row',
								'acfe_seemless_style' => 0,
								'acfe_group_modal' => 0,
								'sub_fields' => array(
									array(
										'key' => 'field_5dc76c3e767f1',
										'label' => 'Section Title',
										'name' => 'section_title',
										'type' => 'text',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'acfe_permissions' => '',
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'maxlength' => '',
									),
									array(
										'key' => 'field_5dc769f209547',
										'label' => 'Posts',
										'name' => 'posts',
										'type' => 'repeater',
										'instructions' => '',
										'required' => 0,
										'conditional_logic' => 0,
										'wrapper' => array(
											'width' => '',
											'class' => '',
											'id' => '',
										),
										'acfe_permissions' => '',
										'acfe_repeater_stylised_button' => 0,
										'collapsed' => 'field_5dc76d30594fc',
										'min' => 0,
										'max' => 0,
										'layout' => 'row',
										'button_label' => 'Add Post',
										'sub_fields' => array(
											array(
												'key' => 'field_5dc76d30594fc',
												'label' => 'Type',
												'name' => 'type',
												'type' => 'radio',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => 0,
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'choices' => array(
													'dynamic' => 'Dynamic',
													'manual' => 'Manual',
												),
												'allow_null' => 0,
												'other_choice' => 0,
												'default_value' => 'dynamic',
												'layout' => 'horizontal',
												'return_format' => 'value',
												'save_other_choice' => 0,
											),
											array(
												'key' => 'field_5dc76cb882b77',
												'label' => 'Manual Post',
												'name' => 'manual_post',
												'type' => 'group',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => array(
													array(
														array(
															'field' => 'field_5dc76d30594fc',
															'operator' => '==',
															'value' => 'manual',
														),
													),
												),
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'layout' => 'row',
												'sub_fields' => array(
													array(
														'key' => 'field_5dc76cc782b78',
														'label' => 'Title',
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
														'key' => 'field_5dc76ccd82b79',
														'label' => 'Excerpt',
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
														'key' => 'field_5dc76ce882b7a',
														'label' => 'Image',
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
														'key' => 'field_5dc76cf482b7b',
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
											array(
												'key' => 'field_5dc76d7b594fd',
												'label' => 'Post',
												'name' => 'post',
												'type' => 'post_object',
												'instructions' => '',
												'required' => 0,
												'conditional_logic' => array(
													array(
														array(
															'field' => 'field_5dc76d30594fc',
															'operator' => '==',
															'value' => 'dynamic',
														),
													),
												),
												'wrapper' => array(
													'width' => '',
													'class' => '',
													'id' => '',
												),
												'post_type' => array(
													0 => 'page',
													1 => 'event',
													2 => 'post',
												),
												'taxonomy' => '',
												'allow_null' => 0,
												'multiple' => 0,
												'return_format' => 'object',
												'ui' => 1,
											),
										),
									),
								),
							),
							array(
								'key' => 'field_5dcaf134cfa3a',
								'label' => 'Callout',
								'name' => 'callout',
								'type' => 'group',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'acfe_permissions' => '',
								'layout' => 'row',
								'acfe_seemless_style' => 0,
								'acfe_group_modal' => 0,
								'sub_fields' => array(
									array(
										'key' => 'field_5dcaf17ccfa3b',
										'label' => 'Title',
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
										'acfe_permissions' => '',
										'default_value' => '',
										'placeholder' => '',
										'prepend' => '',
										'append' => '',
										'maxlength' => '',
									),
									array(
										'key' => 'field_5dcaf182cfa3c',
										'label' => 'Content',
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
										'acfe_permissions' => '',
										'default_value' => '',
										'tabs' => 'all',
										'toolbar' => 'basic',
										'media_upload' => 0,
										'delay' => 0,
									),
									array(
										'key' => 'field_5dcaf197cfa3d',
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
										'acfe_permissions' => '',
										'return_format' => 'array',
									),
								),
							),
						),
						'min' => '',
						'max' => '',
						'acfe_flexible_thumbnail' => '1127',
					),
					'layout_5dcadeed8d59b' => array(
						'key' => 'layout_5dcadeed8d59b',
						'name' => 'twitter-feed',
						'label' => __( 'Twitter Feed', 'site-functionality' ),
						'display' => 'block',
						'sub_fields' => array(
							array(
								'key' => 'field_5dc76e2dcf545',
								'label' => 'Twitter Feed',
								'name' => 'twitter_handle',
								'type' => 'text',
								'instructions' => __( 'Remove value to hide Twitter feed from home page', 'site-functionality' ),
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'acfe_permissions' => '',
								'default_value' => 'CTLegal',
								'placeholder' => 'CTLegal',
								'prepend' => '@',
								'append' => '',
								'maxlength' => '',
							),
						),
						'min' => '',
						'max' => '',
						'acfe_flexible_thumbnail' => '1113',
					),
				),
				'button_label' => 'Add Section',
				'min' => '',
				'max' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-templates/front-page.php',
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
		'acfe_display_title' => '',
		'acfe_autosync' => '',
		'acfe_permissions' => '',
		'acfe_form' => 0,
		'acfe_meta' => '',
		'acfe_note' => '',
	));


	/**
	 * Landing Page Fields for Sections Block
	 * Used for block added to Section Landing pages
	 */
	acf_add_local_field_group( array(
		'key' => 'group_5dc70d75489e8',
		'title' => __( 'Main Page Sections', 'site-functionality' ),
		'fields' => array(
			array(
				'key' => 'field_5dc70d98a3cbe',
				'label' => __( 'Sections', 'site-functionality' ),
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
			// array(
			// 	array(
			// 		'param' => 'page_template',
			// 		'operator' => '==',
			// 		'value' => 'page-templates/grid-content.php',
			// 	),
			// ),
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

	/**
	 * Page Settings
	 */
	 /**
     * Add Custom Field
     */
    acf_add_local_field_group(array(
        'key' => 'group_page_color_settings',
        'title' => __( 'Page Settings', 'site-functionality' ),
        'fields' => array(
            array(
                'key' => 'field_page_color',
                'label' => __( 'Page Color', 'site-functionality' ),
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
			array(
				'key' => 'field_5dc9d5af737a7',
				'label' => __( 'Back to Link', 'site-functionality' ),
				'name' => 'back_to_link',
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
				array(
					'param' => 'page_template',
					'operator' => '!=',
					'value' => 'page-templates/front-page.php',
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
	// acf_add_local_field_group(array(
	// 	'key' => 'group_5dc70d75489e8',
	// 	'title' => __( 'Sections', 'site-functions' ),
	// 	'fields' => array(
	// 		array(
	// 			'key' => 'field_5dc70d98a3cbe',
	// 			'label' => __( 'Sections', 'site-functions' ),
	// 			'name' => 'sections',
	// 			'type' => 'repeater',
	// 			'instructions' => '',
	// 			'required' => 0,
	// 			'conditional_logic' => 0,
	// 			'wrapper' => array(
	// 				'width' => '',
	// 				'class' => '',
	// 				'id' => '',
	// 			),
	// 			'collapsed' => 'field_5dc70dbfa3cbf',
	// 			'min' => 0,
	// 			'max' => 0,
	// 			'layout' => 'row',
	// 			'button_label' => __( 'Add Section', 'site-functions' ),
	// 			'sub_fields' => array(
	// 				array(
	// 					'key' => 'field_5dc70dbfa3cbf',
	// 					'label' => __( 'Title', 'site-functions' ),
	// 					'name' => 'title',
	// 					'type' => 'text',
	// 					'instructions' => '',
	// 					'required' => 0,
	// 					'conditional_logic' => 0,
	// 					'wrapper' => array(
	// 						'width' => '',
	// 						'class' => '',
	// 						'id' => '',
	// 					),
	// 					'default_value' => '',
	// 					'placeholder' => '',
	// 					'prepend' => '',
	// 					'append' => '',
	// 					'maxlength' => '',
	// 				),
	// 				array(
	// 					'key' => 'field_5dc70dc6a3cc0',
	// 					'label' => __( 'Content', 'site-functions' ),
	// 					'name' => 'content',
	// 					'type' => 'wysiwyg',
	// 					'instructions' => '',
	// 					'required' => 0,
	// 					'conditional_logic' => 0,
	// 					'wrapper' => array(
	// 						'width' => '',
	// 						'class' => '',
	// 						'id' => '',
	// 					),
	// 					'default_value' => '',
	// 					'tabs' => 'all',
	// 					'toolbar' => 'basic',
	// 					'media_upload' => 0,
	// 					'delay' => 0,
	// 				),
	// 				array(
	// 					'key' => 'field_5dc70dcda3cc1',
	// 					'label' => __( 'Image', 'site-functions' ),
	// 					'name' => 'image',
	// 					'type' => 'image',
	// 					'instructions' => '',
	// 					'required' => 0,
	// 					'conditional_logic' => 0,
	// 					'wrapper' => array(
	// 						'width' => '',
	// 						'class' => '',
	// 						'id' => '',
	// 					),
	// 					'return_format' => 'array',
	// 					'preview_size' => 'medium',
	// 					'library' => 'all',
	// 					'min_width' => '',
	// 					'min_height' => '',
	// 					'min_size' => '',
	// 					'max_width' => '',
	// 					'max_height' => '',
	// 					'max_size' => '',
	// 					'mime_types' => '',
	// 				),
	// 				array(
	// 					'key' => 'field_5dc70dd3a3cc2',
	// 					'label' => 'Link',
	// 					'name' => 'link',
	// 					'type' => 'link',
	// 					'instructions' => '',
	// 					'required' => 0,
	// 					'conditional_logic' => 0,
	// 					'wrapper' => array(
	// 						'width' => '',
	// 						'class' => '',
	// 						'id' => '',
	// 					),
	// 					'return_format' => 'array',
	// 				),
	// 			),
	// 		),
	// 	),
	// 	'location' => array(
	// 		array(
	// 			array(
	// 				'param' => 'block',
	// 				'operator' => '==',
	// 				'value' => 'acf/subsections',
	// 			),
	// 		),
	// 	),
	// 	'menu_order' => 0,
	// 	'position' => 'normal',
	// 	'style' => 'default',
	// 	'label_placement' => 'top',
	// 	'instruction_placement' => 'label',
	// 	'hide_on_screen' => '',
	// 	'active' => true,
	// 	'description' => '',
	// ));

	
}