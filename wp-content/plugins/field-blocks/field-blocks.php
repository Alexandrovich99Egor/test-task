<?php
/**
 * Plugin Name: FieldBlocks
 * Description: Reusable ACF blocks.
 * Requires at least: 6.1
 * Requires PHP: 8.0
 * Version: 2.3.0
 * Author: Cross-Link
 * Text Domain: field-blocks
 */

define( 'FIELDBLOCKS_PLUGIN_FILE', __FILE__ );

require 'vendor/autoload.php';

// Get FieldBlocks DI container
function field_blocks() {
	return field_blocks_init();
}

function field_blocks_init() {
	static $wputm;

	if ( ! empty( $wputm ) ) {
		return $wputm;
	}

	$wputm = new \WpUtm\Main(
		array(
			'definitions' => array(
				\WpUtm\Interfaces\IDynamicCss::class     => \DI\create( \FieldBlocks\DynamicCss::class ),
				\WpUtm\Interfaces\IDynamicJs::class      => \DI\create( \FieldBlocks\DynamicJs::class ),
				\FieldBlocks\Interfaces\IRenderer::class => \DI\autowire( \FieldBlocks\Astra::class ),
				'main_file'                              => FIELDBLOCKS_PLUGIN_FILE,
				'type'                                   => 'plugin',
				'prefix'                                 => 'field-blocks',
				'footer_scripts'                         => array( 'column-layout' ),
			),
		)
	);

	$wputm->get( \FieldBlocks\Main::class )->init();

	return $wputm;
}

field_blocks_init();
