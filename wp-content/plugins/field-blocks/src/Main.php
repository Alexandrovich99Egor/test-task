<?php

namespace FieldBlocks;

use FieldBlocks\AtomBlocks\BuiltInBlocks;
use FieldBlocks\Compat\AjaxSearchPro;

class Main {
	public function init() {
		require 'functions.php';
		$this->assets->init();
		$this->acf_groups->init();
		$this->built_in_blocks->init();
		$this->renderer->init();
		$this->shortcodes->init();
		$this->astra_addons->init();
		$this->ajax_search_pro->init();
		$this->config->init();
	}

	public function __construct(
		public Assets $assets,
		public AcfGroups $acf_groups,
		public BuiltInBlocks $built_in_blocks,
		public Interfaces\IRenderer $renderer,
		public Shortcodes $shortcodes,
		public AstraAddons $astra_addons,
		public AjaxSearchPro $ajax_search_pro,
		public Config $config
	) {}
}
