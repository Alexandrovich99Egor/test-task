<?php
namespace Swd;

class FieldBlocksConf {
	function init() {
		add_filter( 'field_blocks_column_layout_enabled', '__return_true' );
	}
}
