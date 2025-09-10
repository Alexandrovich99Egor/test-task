<?php

namespace FieldBlocks;

use FieldBlocks\Interfaces\IRenderer;

class Shortcodes {


	function init() {
		add_action( 'wp_loaded', array( $this, 'register_shortcodes' ) );
	}

	function register_shortcodes() {
		add_shortcode( 'field_blocks_content', array( $this, 'render_field_blocks_content' ) );
	}

	function render_field_blocks_content( array $atts ): string {
		if ( empty( $atts['id'] ) ) {
			return '';
		}

		return $this->renderer->render_blocks( '', $atts['id'] );
	}

	function __construct( public IRenderer $renderer ) {}

}
