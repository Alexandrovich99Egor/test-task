<?php

namespace FieldBlocks;

class AstraAddons {


	private bool $shortcode_is_saving = false;

	function init(): void {
		add_action( 'save_post', array( $this, 'add_field_blocks_shortcode' ), 10, 2 );
		add_action( 'enqueue_block_assets', array( $this, 'enqueue_astra_advanced_layout_assets' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_astra_advanced_layout_assets' ) );
	}

	function enqueue_astra_advanced_layout_assets(): void {
		if ( ! class_exists( 'Astra_Target_Rules_Fields' ) || ! defined( 'ASTRA_ADVANCED_HOOKS_POST_TYPE' ) ) {
			return;
		}

		$option = array(
			'location'  => 'ast-advanced-hook-location',
			'exclusion' => 'ast-advanced-hook-exclusion',
			'users'     => 'ast-advanced-hook-users',
		);

		$result = \Astra_Target_Rules_Fields::get_instance()->get_posts_by_conditions( ASTRA_ADVANCED_HOOKS_POST_TYPE, $option );

		foreach ( $result as $post_id => $post_data ) {
			$this->assets->enqueue_block_assets( $post_id );
		}
	}

	function add_field_blocks_shortcode( int | string $post_id, \WP_Post $post ): void {
		if ( $this->shortcode_is_saving ) {
			return;
		}

		if ( $post->post_type !== 'astra-advanced-hook' ) {
			return;
		}

		if ( strpos( $post->post_content, '[field_blocks_content' ) !== false ) {
			return;
		}

		$this->shortcode_is_saving = true;

		$post->post_content = "[field_blocks_content id={$post_id}]";

		wp_insert_post( (array) $post );
	}

	function __construct( public Assets $assets ) {}
}
