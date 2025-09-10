<?php

namespace FieldBlocks;

use \FieldBlocks\Interfaces\IRenderer;
use FieldBlocks\ReusableBlocks\Registry;

class Astra implements IRenderer {

	private array $current_section = array();

	function init(): void {
		add_filter( 'the_content', array( $this, 'render_blocks' ) );
	}

	function get_current_section(): array {
		return $this->current_section;
	}

	function render_blocks( string $content, int | string | false $acf_id = false ): string {
		$sections = $acf_id ? get_field( 'sections', $acf_id ) : get_field( 'sections' );

		if ( empty( $sections ) ) {
			return $content;
		}

		foreach ( $sections as $section ) {
			$section = $this->get_section_settings( $section );

			$this->current_section = $section;

			$print_section_wrapper = apply_filters( 'field_blocks_print_section_wrapper', true, $section );

			if ( $print_section_wrapper ) {
				$section_has_background = ! empty( $section['background_type'] ) && $section['background_type'] !== 'none';
				if ( $section_has_background ) {
					if ( $section['background_type'] === 'image' ) {
						$style = 'style="background-image: url( ' . wp_get_attachment_image_src( $section['background_image'], 'full' )[0] . ' );"';
					} elseif ( $section['background_type'] === 'color' ) {
						$style = 'style="background-color: ' . $section['background_color'] . ';"';
					} else {
						$style = '';
					}
				} else {
					$style = '';
				}
				$column_style = '';
				if ( isset( $section['column_layout'] ) && $section['column_layout'] !== '0' ) {
					$column_style .= 'column_style_' . $section['column_layout'];
				}
				$additional_css = ! empty( $section['css_classes'] ) ? $section['css_classes'] : '';
				$content       .= '<div class="field-blocks-section ' . $column_style . ' ' . $additional_css . '" ' . $style . '>';

				$pre_content_html = apply_filters( 'field_blocks_section_start_html', '', $section );

				$content .= $pre_content_html;
			}

			// We need the following logic for column layout compatibility.
			$column_count = $this->get_column_count( $section );
			for ( $i = 0; $i < $column_count; ++$i ) {
				$content_key = $i === 0 ? 'content' : 'content_' . ( $i + 1 );
				if ( ! empty( $section[ $content_key ] ) ) {
					if ( $this->config->column_layout_enabled() ) {
						$content .= '<div class="column">';
					}

					// Process all Reusable Blocks
					foreach ( $section[ $content_key ] as $reusable_block ) {
						$block_name = $reusable_block['acf_fc_layout'];

						$atom_blocks = $this->registry->get_atom_blocks( $block_name );

						foreach ( $atom_blocks as $atom_block ) {
							$name = $this->registry->get_atom_block_db_name( $atom_block, $block_name );
							// Client settings
							$cst = $reusable_block[ $name ];

							// Developer settings
							$dst = $atom_block['settings'] ?? array();

							$block_data = wp_parse_args(
								$cst,
								$dst
							);

							$atom_block_definition = $this->atom_blocks_registry->blocks[ $atom_block['name'] ];

							ob_start();

							call_user_func( $atom_block_definition['render_callback'], $block_data );

							$content .= ob_get_clean();
						}
					}

					if ( $this->config->column_layout_enabled() ) {
						$content .= '</div>';
					}
				}
			}

			if ( $print_section_wrapper ) {
				$post_content_html = apply_filters( 'field_blocks_section_end_html', '', $section );

				$content .= $post_content_html;

				$content .= '</div>';
			}
		}

		return $content;
	}

	private function get_section_settings( array $section ): array {

		if ( empty( $section['content'] ) ) {
			return $section;
		}

		$settings = $section;

		foreach ( $section['content'] as $reusable_block ) {
			$block_name       = $reusable_block['acf_fc_layout'];
			$section_settings = $this->registry->get_section_settings( $block_name );

			if ( empty( $section_settings ) ) {
				continue;
			}

			$settings = wp_parse_args(
				$section_settings,
				$settings
			);
		}

		return $settings;
	}

	private function get_column_count( array $section ): int {
		if ( ! $this->config->column_layout_enabled() || ! isset( $section['column_layout'] ) ) {
			return 1;
		}

			// This is related to "choices" in AcfGroups class, related to column_layout entry.
		switch ( $section['column_layout'] ) {
			case '0':
				return 1;
			case '1':
				return 2;
			case '2':
				return 3;
			case '3':
				return 4;
			case '4':
				return 2;
            case '5':
				return 2;
		}

			return 1;
	}

	function __construct( public Registry $registry,
						public \FieldBlocks\AtomBlocks\Registry $atom_blocks_registry,
						public Config $config
	) {}

}
