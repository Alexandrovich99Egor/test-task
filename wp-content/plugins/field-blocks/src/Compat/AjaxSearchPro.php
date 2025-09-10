<?php

namespace FieldBlocks\Compat;

use FieldBlocks\Interfaces\IRenderer;

class AjaxSearchPro {


	/**
	 * This must be a non-existing meta key. We just need some meta key
	 * so that the functionality that indexes meta fields is not bypassed.
	 */
	const FIELD_BLOCKS_CONTENT_KEY = '_acf_dummy_field_blocks_content';

	function init() {
		add_filter( 'asp_it_args', array( $this, 'search_field_blocks_content' ) );
		add_filter( 'asp_post_custom_field_before_tokenize', array( $this, 'get_field_blocks_content' ), 10, 3 );
		add_filter( 'asp_query_args', array( $this, 'search_field_blocks_meta_field' ) );
	}

	function search_field_blocks_meta_field( array $args ): array {
		$args['post_custom_fields_all'] = 1;
		$args['post_custom_fields']     = array( 'all' );

		return $args;
	}

	function get_field_blocks_content( array $values, $obj, $field ): array {
		if ( $field !== self::FIELD_BLOCKS_CONTENT_KEY ) {
			return $values;
		}

		if ( is_a( $obj, 'WP_Post' ) ) {
			$acf_id = $obj->ID;
		} elseif ( is_a( $obj, 'WP_Term' ) ) {
			$acf_id = 'term_' . $obj->term_id;
		} else {
			return $values;
		}

		$sections = get_field( 'sections', $acf_id );

		if ( empty( $sections ) ) {
			return $values;
		}

		$content = $this->renderer->render_blocks( '', $acf_id );

		$values[ self::FIELD_BLOCKS_CONTENT_KEY ] = $content;

		return $values;
	}

	function search_field_blocks_content( array $args ): array {
		if ( empty( $args['index_customfields'] ) ) {
			$args['index_customfields'] = self::FIELD_BLOCKS_CONTENT_KEY;
		} else {
			$args['index_customfields'] = $args['index_customfields'] . '|' . self::FIELD_BLOCKS_CONTENT_KEY;
		}

		return $args;
	}

	function __construct( public IRenderer $renderer ) {}
}
