<?php

namespace FieldBlocks\AtomBlocks;

class Registry {


	public array $blocks = array();

	/**
	 * @param array{ field_group_key: string, name: string, render_callback: callable, css: array, js: array, acf_settings: array } $args Atom block arguments
	 * @return void
	 */
	function register_block( array $args ): void {
		$args                          = wp_parse_args(
			$args,
			array(
				'css' => array(),
				'js'  => array(),
			)
		);
		$this->blocks[ $args['name'] ] = $args;

    }

	function get_block_acf_settings( string $block_name ): array | false {
		if ( empty( $this->blocks[ $block_name ] ) ) {
			return false;
		}

		$settings = $this->blocks[ $block_name ];

		if ( ! empty( $settings['field_group_key'] ) ) {
			$field_settings = acf_get_raw_field( $settings['field_group_key'] );
		} elseif ( ! empty( $settings['acf_settings'] ) ) {
			$field_settings = $settings['acf_settings'];
		}

		// The parent needs to be set to the key of the "Content" field registered in the AcfGroups class.
		// Otherwise, the fields do not show up properly in the Flexible Content Layout.
		$field_settings['parent'] = 'field_645a23294e7db';

		return $field_settings;
	}
}
