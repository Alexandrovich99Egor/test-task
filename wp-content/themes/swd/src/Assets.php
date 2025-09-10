<?php
namespace Swd;

use WpUtm\AssetsRegistration;

class Assets {
	public function init() {
		$this->ar->register_assets();

		\add_action( 'enqueue_block_assets', array( $this, 'enqueue_scripts_and_styles' ) );
		\add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_scripts_and_styles' ) );
	}

	public function __construct(
		public AssetsRegistration $ar,
	) {}

	public function enqueue_scripts_and_styles() {
		wp_enqueue_style( 'swd-common' );
		wp_enqueue_style( 'swd-header' );
		wp_enqueue_style( 'swd-footer' );

		wp_enqueue_script( 'swd-general', '', '', '', true );
		wp_enqueue_script( 'swd-sliders', '', '', '', true );

	}
}
