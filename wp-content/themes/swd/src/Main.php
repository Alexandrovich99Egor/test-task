<?php

namespace Swd;

use Swd\Util;

class Main {
	public function init() {
		$this->hooks->init();
		$this->assets->init();
		$this->atom_blocks->init();
		$this->reusable_blocks->init();
		$this->field_blocks_conf->init();
	}

	public function __construct(
		public Hooks $hooks,
		public Assets $assets,
		public AtomBlocks $atom_blocks,
		public ReusableBlocks $reusable_blocks,
		public FieldBlocksConf $field_blocks_conf,
	) {}
}
