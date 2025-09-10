<?php
namespace FieldBlocks;

class Config {
	private bool $columns_enabled = false;

	private bool $section_background_enabled = true;

	function init(): void {
		add_action( 'after_setup_theme', array( $this, 'init_config' ), 50 );
	}

	function init_config(): void {
		$this->columns_enabled            = apply_filters( 'field_blocks_column_layout_enabled', $this->columns_enabled );
		$this->section_background_enabled = apply_filters( 'field_blocks_section_background_enabled', $this->section_background_enabled );
	}

	function column_layout_enabled(): bool {
		return $this->columns_enabled;
	}

	function section_background_enabled(): bool {
		return $this->section_background_enabled;
	}
}
