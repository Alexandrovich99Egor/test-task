<?php

namespace FieldBlocks\AtomBlocks;

use FieldBlocks\Interfaces\IRenderer;

class BuiltInBlocks {

	function default_render_callback( string $block_name ): \Closure {
		$original_block_name = $block_name;
		$block_name          = str_replace( '_', '-', $block_name );
		return function( $block_data ) use ( $block_name, $original_block_name ) {
			$renderer   = field_blocks()->get( IRenderer::class );
			$block_data = apply_filters( "field_blocks_{$original_block_name}_data", $block_data, $renderer->get_current_section() );
			require plugin_dir_path( FIELDBLOCKS_PLUGIN_FILE ) . '/fb-blocks/' . $block_name . '.php';
		};
	}

	function init(): void {
		add_action( 'plugins_loaded', array( $this, 'register_built_in_blocks' ) );
	}

	function register_built_in_blocks(): void {
		$blocks = array(
			array(
				'name'            => 'slider',
				'render_callback' => $this->default_render_callback( 'slider' ),
				'css'             => array( 'field-blocks-slider' ),
				'js'              => array( 'field-blocks-slider' ),
				'acf_settings'    => array(
					'key'               => 'field_64806e1e853b4',
					'label'             => 'Slider',
					'name'              => 'slider',
					'aria-label'        => '',
					'type'              => 'group',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'layout'            => 'block',
					'sub_fields'        => array(
						array(
							'key'               => 'field_64806e2c853b5',
							'label'             => 'Slides',
							'name'              => 'slides',
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
							'layout'            => 'table',
							'pagination'        => 0,
							'min'               => 0,
							'max'               => 0,
							'collapsed'         => '',
							'button_label'      => 'Add Slide',
							'rows_per_page'     => 20,
							'sub_fields'        => array(
								array(
									'key'               => 'field_64806e5e853b6',
									'label'             => 'Text',
									'name'              => 'text',
									'aria-label'        => '',
									'type'              => 'text',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
									'wrapper'           => array(
										'width' => '',
										'class' => '',
										'id'    => '',
									),
									'default_value'     => '',
									'maxlength'         => '',
									'placeholder'       => '',
									'prepend'           => '',
									'append'            => '',
									'parent_repeater'   => 'field_64806e2c853b5',
								),
								array(
									'key'               => 'field_64806e8a853b7',
									'label'             => 'Image',
									'name'              => 'image',
									'aria-label'        => '',
									'type'              => 'image',
									'instructions'      => '',
									'required'          => 0,
									'conditional_logic' => 0,
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
									'parent_repeater'   => 'field_64806e2c853b5',
								),
							),
						),
					),
				),
			),
		);

		foreach ( $blocks as $block ) {
			$this->registry->register_block( $block );
		}
	}

	function __construct( public Registry $registry ) {}

}
