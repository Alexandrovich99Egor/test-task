<?php

namespace FieldBlocks\Interfaces;

interface IRenderer {
	function init(): void;

	function get_current_section(): array;

	function render_blocks( string $content, int | string | false $acf_id ): string;
}
