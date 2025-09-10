<?php

namespace FieldBlocks\ReusableBlocks;

class Registry {


	public array $blocks = array();

	/**
	 * @param array{ label: string,
	 *     name: string,
	 *     blocks: array<array{id: string, name: string, settings: array}>,
	 *     section_settings: ?array,
	 *     js: ?array,
	 *     css: ?array
	 *     } $args Reusable block arguments.
	 * @return void
	 */
	function register_block( array $args ): void {
		$args = wp_parse_args(
			$args,
			array(
				'js'               => array(),
				'css'              => array(),
				'section_settings' => array(),
			)
		);

		$this->blocks[ $args['name'] ] = $args;
	}

	/**
	 * Convert registered Reusable Blocks into ACF layouts so that they can be
	 * used in the FieldBlocks editor.
	 *
	 * @return array
	 */
	function get_acf_layouts(): array {
		$layouts = array();

		foreach ( $this->blocks as $block_name => $settings ) {

			$sub_fields = $this->get_acf_sub_fields( $settings['blocks'], $block_name );

			if ( empty( $sub_fields ) ) {
				continue;
			}

			$key = 'layout_' . md5( $block_name );

			$layouts[ $key ] = array(
				'key'        => $key,
				'name'       => $block_name,
				'label'      => $settings['label'],
				'display'    => 'block',
				'sub_fields' => $sub_fields,
				'min'        => '',
				'max'        => '',
			);
		}
		return $layouts;
	}

	/**
	 * Get ACF sub fields for atom blocks.
	 *
	 * @param array $blocks
	 * @param string $reusable_block_name Reusable block name.
	 * @return array
	 */
	private function get_acf_sub_fields( array $blocks, string $reusable_block_name ): array {
		if ( empty( $blocks ) ) {
			return array();
		}

		$sub_fields = array();

		foreach ( $blocks as $block ) {
			$block_name = $block['name'];

			$acf_settings = $this->atom_blocks_registry->get_block_acf_settings( $block_name );

			if ( empty( $acf_settings ) ) {
				continue;
			}

			/*
			 * In ACF, when multiple subfields are provided in a layout, they need to have
			 * different keys, otherwise not all subfields are going to show up in the layout.
			 *
			 * If an Atom Block is used in multiple layouts, in needs to have a different
			 * key for each layout.
			 *
			 * Top level Atom Blocks also need to have unique names (ACF 'name') because of how
			 * ACF saves data into the database. Name is generated from the ID provided when
			 * an Atom Block is registered within a reusable block.
			 */
			$acf_settings = $this->generate_unique_acf_field_keys( $block, $acf_settings, $reusable_block_name );

			$sub_fields[] = $acf_settings;
		}

		return $sub_fields;
	}

	/**
	 * Get atom blocks within a reusable block.
	 *
	 * @param string $block_name Reusable block name.
	 * @return array Array of atom blocks
	 */
	function get_atom_blocks( string $block_name ): array {
		if ( empty( $this->blocks[ $block_name ] ) ) {
			return array();
		}

		return $this->blocks[ $block_name ]['blocks'];
	}

	function get_atom_block_db_name( array $atom_block, string $reusable_block_name ): string {
		return "{$reusable_block_name}_{$atom_block['id']}";
	}

	/**
	 * Get settings for the section within which the reusable block is rendered.
	 *
	 * @param string $block_name
	 * @return array
	 */
	function get_section_settings( string $block_name ): array {
		if ( empty( $this->blocks[ $block_name ] ) ) {
			return array();
		}

		return $this->blocks[ $block_name ]['section_settings'];
	}

	function __construct( public \FieldBlocks\AtomBlocks\Registry $atom_blocks_registry ) {}

	private function generate_unique_acf_field_keys( array $block, array $acf_settings, string $reusable_block_name ): array {
		$acf_settings['key']  = 'field_' . md5( "{$block['id']}-$reusable_block_name" );
		$acf_settings['name'] = $this->get_atom_block_db_name( $block, $reusable_block_name );

		$parent_key = $acf_settings['key'];

		if ( ! empty( $acf_settings['sub_fields'] ) ) {
			$this->generate_unique_keys_for_acf_sub_fields( $acf_settings['sub_fields'], $block, $parent_key );
		}

		return $acf_settings;
	}

	private function generate_unique_keys_for_acf_sub_fields( array &$sub_fields, array &$block, string $parent_key = '' ): void {
		foreach ( $sub_fields as &$sub_field ) {
			$sub_field['key'] = 'field_' . md5( "{$block['id']}-{$sub_field['key']}" );

			if ( ! empty( $sub_field['parent_repeater'] ) ) {
				$sub_field['parent_repeater'] = $parent_key;
			} elseif ( ! empty( $sub_field['parent_layout'] ) ) {
				$sub_field['parent_layout'] = $parent_key;
			}

			if ( ! empty( $sub_field['sub_fields'] ) ) {
				$this->generate_unique_keys_for_acf_sub_fields( $sub_field['sub_fields'], $block, $sub_field['key'] );
			}
		}
	}
}
