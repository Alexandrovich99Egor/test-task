<?php

namespace FieldBlocks;

/**
 * @param array{ field_group_key: string, name: string, render_callback: callable, css: array, js: array, acf_settings: array } $args Atom block arguments
 * @return void
 */
function register_atom_block( array $args ): void {
	field_blocks()->get( \FieldBlocks\AtomBlocks\Registry::class )->register_block( $args );
}

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
function register_reusable_block( array $args ): void {
	field_blocks()->get( \FieldBlocks\ReusableBlocks\Registry::class )->register_block( $args );
}

/**
 * Retrieves the post excerpt.
 *
 * @param int|WP_Post $post Post ID or WP_Post object.
 * @return string Post excerpt.
 */
function get_the_excerpt( $post ) {
	$post = get_post( $post );

	if ( empty( $post ) ) {
		return '';
	}

	if ( ! empty( $post->post_excerpt ) ) {
		return $post->post_excerpt;
	}

	$renderer = field_blocks()->get( \FieldBlocks\Interfaces\IRenderer::class );

	$text = $renderer->render_blocks( '', $post->ID );
	$text = str_replace( ']]>', ']]&gt;', $text );
	/* translators: Maximum number of words used in a post excerpt. */
	$excerpt_length = (int) _x( '55', 'excerpt_length' );

	/**
	* Filters the maximum number of words in a post excerpt.
	*
	* @param int $number The maximum number of words. Default 55.
	*/
	$excerpt_length = (int) apply_filters( 'excerpt_length', $excerpt_length );

	/**
	* Filters the string in the "more" link displayed after a trimmed excerpt.
	*
	* @param string $more_string The string shown within the more link.
	*/
	$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
	$text         = wp_trim_words( $text, $excerpt_length, $excerpt_more );

	return $text;
}
