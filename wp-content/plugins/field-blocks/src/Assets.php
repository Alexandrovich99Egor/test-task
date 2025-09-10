<?php
namespace FieldBlocks;

use FieldBlocks\ReusableBlocks\Registry;
use FieldBlocks\Config;
use WpUtm\AssetsRegistration;

class Assets {
	function init(): void {
		$this->ar->register_assets();

		add_action( 'enqueue_block_assets', array( $this, 'enqueue_scripts_and_styles' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_scripts_and_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}

	function __construct(
		public AssetsRegistration $ar,
		public Registry $registry,
		public \FieldBlocks\AtomBlocks\Registry $atom_blocks_registry,
		public Config $config
	) {}

	function enqueue_admin_scripts(): void {
		if ( $this->config->column_layout_enabled() ) {
			wp_enqueue_script( 'field-blocks-column-layout' );
		}
	}

	function enqueue_scripts_and_styles(): void {
		if ( $this->config->column_layout_enabled() ) {
			wp_enqueue_style( 'field-blocks-column-layout' );
		}
		$this->enqueue_block_assets();
	}

	function enqueue_block_assets( int | string | false $acf_id = false ): void {
		$sections = $acf_id ? get_field( 'sections', $acf_id ) : get_field( 'sections' );

		if ( empty( $sections ) ) {
			return;
		}

		$handled_blocks = array();
		foreach ( $sections as $section ) {

			if ( empty( $section['content'] ) ) {
				continue;
			}
            $content = array($section['content'], $section['content_2'], $section['content_3'], $section['content_4']);

            foreach ($content as $blocks){
                if($blocks === false)
                    continue;

			foreach ( $blocks as $section_block ) {

				$block_name = $section_block['acf_fc_layout'];

				if ( ! empty( $handled_blocks[ $block_name ] ) ) {
					continue;
				}

				if ( ! empty( $this->registry->blocks[ $block_name ] ) ) {

					$block = $this->registry->blocks[ $block_name ];

					$this->enqueue_assets_for_reusable_block( $block );

					$this->enqueue_assets_for_atom_blocks( $block );

					$handled_blocks[ $block_name ] = true;
				}
			}
            }

        }
	}

	private function enqueue_assets_for_reusable_block( array $block ): void {
		foreach ( $block['css'] as $css_handle ) {
			wp_enqueue_style( $css_handle );
		}

		foreach ( $block['js'] as $js_handle ) {
			wp_enqueue_script( $js_handle );
		}
	}

	private function enqueue_assets_for_atom_blocks( array $block ): void {
		$atom_blocks = $this->registry->get_atom_blocks( $block['name'] );

		foreach ( $atom_blocks as $atom_block ) {
			$atom_block_definition = $this->atom_blocks_registry->blocks[ $atom_block['name'] ];

			foreach ( $atom_block_definition['css'] as $css_handle ) {
				wp_enqueue_style( $css_handle );
			}

			foreach ( $atom_block_definition['js'] as $js_handle ) {
				wp_enqueue_script( $js_handle );
			}
		}
	}
}
