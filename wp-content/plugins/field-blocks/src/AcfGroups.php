<?php

namespace FieldBlocks;

use FieldBlocks\ReusableBlocks\Registry;

class AcfGroups {

	function init(): void {
		add_action( 'acf/init', array( $this, 'add_field_groups' ) );
	}

	function add_field_groups(): void {
		$layouts = $this->registry->get_acf_layouts();

		$section_sub_fields = $this->get_section_sub_fields( $layouts );

		$fields = array(
			array(
				'key'               => 'field_645a22784e7da',
				'label'             => 'Sections',
				'name'              => 'sections',
				'aria-label'        => '',
				'type'              => 'repeater',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'layout'            => 'block',
				'pagination'        => 0,
				'min'               => 0,
				'max'               => 0,
				'collapsed'         => '',
				'button_label'      => 'Add Section',
				'rows_per_page'     => 20,
				'sub_fields'        => $section_sub_fields,
			),
		);

		$settings = array(
			'key'                   => 'group_645a22777e502',
			'title'                 => __( 'Blocks', 'field-blocks' ),
			'fields'                => $fields,
			'location'              => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'post',
					),
				),
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'page',
					),
				),
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'astra-advanced-hook',
					),
				),
			),
			'menu_order'            => 0,
			'position'              => 'normal',
			'style'                 => 'default',
			'label_placement'       => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen'        => array(
				0 => 'the_content',
			),
			'active'                => true,
			'description'           => '',
			'show_in_rest'          => 0,
		);
		$settings = apply_filters( 'field_blocks_acf_blocks_settings', $settings );
		acf_add_local_field_group( $settings );
	}

	private function get_section_sub_fields( array $layouts ): array {
		$columns_enabled = $this->config->column_layout_enabled();
		$bg_enabled      = $this->config->section_background_enabled();

		if ( $bg_enabled ) {
			$fields = array(
				array(
					'key'               => 'field_645bea731dbc1',
					'label'             => 'Background type',
					'name'              => 'background_type',
					'aria-label'        => '',
					'type'              => 'select',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'choices'           => array(
						'none'  => 'None',
						'image' => 'Image',
						'color' => 'Color',
					),
					'default_value'     => 'none',
					'return_format'     => 'value',
					'multiple'          => 0,
					'allow_null'        => 0,
					'ui'                => 1,
					'ajax'              => 0,
					'placeholder'       => '',
					'parent_repeater'   => 'field_645a22784e7da',
				),
				array(
					'key'               => 'field_645a636a7dc08',
					'label'             => 'Background color',
					'name'              => 'background_color',
					'aria-label'        => '',
					'type'              => 'color_picker',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_645bea731dbc1',
								'operator' => '==',
								'value'    => 'color',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => '',
					'enable_opacity'    => 0,
					'return_format'     => 'string',
					'parent_repeater'   => 'field_645a22784e7da',
				),
				array(
					'key'               => 'field_645beac11dbc2',
					'label'             => 'Background image',
					'name'              => 'background_image',
					'aria-label'        => '',
					'type'              => 'image',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_645bea731dbc1',
								'operator' => '==',
								'value'    => 'image',
							),
						),
					),
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'return_format'     => 'id',
					'library'           => 'all',
					'min_width'         => '',
					'min_height'        => '',
					'min_size'          => '',
					'max_width'         => '',
					'max_height'        => '',
					'max_size'          => '',
					'mime_types'        => '',
					'preview_size'      => 'medium',
					'parent_repeater'   => 'field_645a22784e7da',
				),
			);
		} else {
			$fields = array();
		}

		if ( $columns_enabled ) {
			$fields[] = array(
				'key'               => 'field_645a636a7dc02',
				'label'             => 'Column layout',
				'name'              => 'column_layout',
				'aria-label'        => '',
				'type'              => 'select',
				'instructions'      => '',
				'required'          => 0,
				'conditional_logic' => 0,
				'choices'           => array(
					'0' => '1/1',
					'1' => '1/2+1/2',
					'2' => '1/3+1/3+1/3',
					'3' => '1/4+1/4+1/4+1/4',
					'4' => '1/3+2/3',
					'5' => '2/3+1/3',
				),
				'wrapper'           => array(
					'width' => '',
					'class' => 'column_selector',
					'id'    => '',
				),
				'default_value'     => '',
				'enable_opacity'    => 0,
				'return_format'     => 'string',
				'parent_repeater'   => 'field_645a22784e7da',
			);
		}

		$fields[] = array(
			'key'             => 'field_645a23294e7db',
			'label'           => 'Content',
			'name'            => 'content',
			'aria-label'      => '',
			'type'            => 'flexible_content',
			'instructions'    => '',
			'required'        => 0,
			'wrapper'         => array(
				'width' => '',
				'class' => '',
				'id'    => '',
			),
			'layouts'         => $layouts,
			'min'             => '',
			'max'             => '',
			'button_label'    => 'Add Block',
			'parent_repeater' => 'field_645a22784e7da',
		);

		if ( $columns_enabled ) {
			array_push(
				$fields,
				...array(
					array(
						'key'               => 'field_645a23294e7d2',
						'label'             => 'Content',
						'name'              => 'content_2',
						'aria-label'        => '',
						'type'              => 'flexible_content',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'field_645a636a7dc02',
									'operator' => '==',
									'value'    => '1',
								),
							),
							array(
								array(
									'field'    => 'field_645a636a7dc02',
									'operator' => '==',
									'value'    => '2',
								),
							),
							array(
								array(
									'field'    => 'field_645a636a7dc02',
									'operator' => '==',
									'value'    => '4',
								),
							),
                            array(
								array(
									'field'    => 'field_645a636a7dc02',
									'operator' => '==',
									'value'    => '5',
								),
							),
							array(
								array(
									'field'    => 'field_645a636a7dc02',
									'operator' => '==',
									'value'    => '3',
								),
							),
						),
						'wrapper'           => array(
							'width' => '50%',
							'class' => '',
							'id'    => '',
						),
						'layouts'           => $layouts,
						'min'               => '',
						'max'               => '',
						'button_label'      => 'Add Block',
						'parent_repeater'   => 'field_645a22784e7da',
					),
					array(
						'key'               => 'field_645a23294e7d3',
						'label'             => 'Content',
						'name'              => 'content_3',
						'aria-label'        => '',
						'type'              => 'flexible_content',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'field_645a636a7dc02',
									'operator' => '==',
									'value'    => '2',
								),
							),
							array(
								array(
									'field'    => 'field_645a636a7dc02',
									'operator' => '==',
									'value'    => '3',
								),
							),
						),
						'wrapper'           => array(
							'width' => '33%',
							'class' => '',
							'id'    => '',
						),
						'layouts'           => $layouts,
						'min'               => '',
						'max'               => '',
						'button_label'      => 'Add Block',
						'parent_repeater'   => 'field_645a22784e7da',
					),
					array(
						'key'               => 'field_645a23294e7d4',
						'label'             => 'Content',
						'name'              => 'content_4',
						'aria-label'        => '',
						'type'              => 'flexible_content',
						'instructions'      => '',
						'required'          => 0,
						'conditional_logic' => array(
							array(
								array(
									'field'    => 'field_645a636a7dc02',
									'operator' => '==',
									'value'    => '3',
								),
							),
						),
						'wrapper'           => array(
							'width' => '25%',
							'class' => '',
							'id'    => '',
						),
						'layouts'           => $layouts,
						'min'               => '',
						'max'               => '',
						'button_label'      => 'Add Block',
						'parent_repeater'   => 'field_645a22784e7da',
					),
				)
			);
		}

		return $fields;

	}

	function __construct( public Registry $registry, public Config $config ) {}

}
