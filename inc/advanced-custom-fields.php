<?php

//Copied from ACF Plugin Export
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_hero-details',
		'title' => 'Hero Details',
		'fields' => array (
			array (
				'key' => 'field_54596edc79639',
				'label' => 'Hero Image',
				'name' => 'hero_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'full',
				'library' => 'all',
			),
			array (
				'key' => 'field_54596ef87963a',
				'label' => 'Hero Text',
				'name' => 'hero_text',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_545970aa105de',
				'label' => 'Position',
				'name' => 'hero_position',
				'type' => 'checkbox',
				'choices' => array (
					'right' => 'right',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-heropage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_homepage-slider',
		'title' => 'Homepage Slider',
		'fields' => array (
			array (
				'key' => 'field_543ffb2662a0a',
				'label' => 'Homepage Slide',
				'name' => 'homepage_slide',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_543ffb5f62a0b',
						'label' => 'Slider Image',
						'name' => 'slider_image',
						'type' => 'image',
						'column_width' => '',
						'save_format' => 'url',
						'preview_size' => 'medium',
						'library' => 'all',
					),
					array (
						'key' => 'field_543ffb8462a0c',
						'label' => 'Slider Text',
						'name' => 'slider_text',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_543ffb8f62a0d',
						'label' => 'Slider Link',
						'name' => 'slider_link',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_54529a5beab05',
						'label' => 'Position',
						'name' => 'text_position',
						'type' => 'checkbox',
						'column_width' => '',
						'choices' => array (
							'right' => 'right',
						),
						'default_value' => '',
						'layout' => 'vertical',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-homepage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_person-details',
		'title' => 'Person Details',
		'fields' => array (
			array (
				'key' => 'field_54400d2da7e13',
				'label' => 'Grid Image',
				'name' => 'grid_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_5440115b40312',
				'label' => 'Person Title',
				'name' => 'person_title',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5440117940313',
				'label' => 'Person Quote',
				'name' => 'person_quote',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_54405a4a6ddf9',
				'label' => 'Force Right',
				'name' => 'force_right',
				'type' => 'checkbox',
				'choices' => array (
					'Right' => 'Right',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
			array (
				'key' => 'field_5452ce15151f5',
				'label' => 'Related People',
				'name' => 'related_people',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5452ce24151f6',
						'label' => 'Person',
						'name' => 'person',
						'type' => 'post_object',
						'column_width' => '',
						'post_type' => array (
							0 => 'people',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'allow_null' => 0,
						'multiple' => 0,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'people',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_sidebar-details',
		'title' => 'Sidebar Details',
		'fields' => array (
			array (
				'key' => 'field_545beab7a70ee',
				'label' => 'Sidebar',
				'name' => 'sidebar',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 12,
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-sidebarpage.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_subnav',
		'title' => 'Subnav',
		'fields' => array (
			array (
				'key' => 'field_545beb60c65d6',
				'label' => 'Sub Navigation',
				'name' => 'subnav',
				'type' => 'repeater',
				'instructions' => 'Insert title and slug for each line. Add div ID with id=slug in your body to corresponding link. ',
				'sub_fields' => array (
					array (
						'key' => 'field_545bedaef1eff',
						'label' => 'Subnav Title',
						'name' => 'subnav_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
					array (
						'key' => 'field_545bee5abf9ab',
						'label' => 'Subnav Slug',
						'name' => 'subnav_slug',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'html',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'table',
				'button_label' => 'Add Row',
			),
			array (
				'key' => 'field_545bf77b38a7b',
				'label' => 'Align Left',
				'name' => 'align_left',
				'type' => 'checkbox',
				'choices' => array (
					'left' => 'Left',
				),
				'default_value' => '',
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



?>