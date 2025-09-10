<?php

define( 'SWD_ATOM_BLOCKS_TEMPLATE', get_stylesheet_directory() . '/template-parts/swd/atom-blocks/' );
define( 'SWD_THEME_FILE', __FILE__ );

require 'vendor/autoload.php';

function swd_init() {
	$wputm = new \WpUtm\Main(
		array(
			'definitions' => array(
				\WpUtm\Interfaces\IDynamicCss::class => \DI\create( \Swd\DynamicCss::class ),
				\WpUtm\Interfaces\IDynamicJs::class  => \DI\create( \Swd\DynamicJs::class ),
				'main_file'                          => SWD_THEME_FILE,
				'type'                               => 'theme',
				'prefix'                             => 'swd',
			),
		)
	);

	$wputm->get( \Swd\Main::class )->init();
}

swd_init();
