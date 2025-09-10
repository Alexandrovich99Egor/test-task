# FieldBlocks

WordPress plugin that leverages Advanced Custom Fields to streamline building sites with fine-tuned content management interfaces for clients.

## Tutorials

- Add FieldBlocks to a custom post type: https://www.loom.com/share/0794f6e0c2e748ff820270f8935df95e
- How to use `settings` in the `register_reusable_block` function: https://www.loom.com/share/02925469da214c65b8706fa9ced09d84

## Required and recommended plugins to use alongside FieldBlocks

- ACF Pro (Required)
- Classic Editor (Required)
- Astra with Astra Pro Addons (Required - for now)
- Ajax Search Pro (Highly recommended - supports searching FieldBlocks content)

## Registering atom blocks

Atom blocks should be ACF groups field type. You can create a top level ACF group within WP Admin > ACF > Field Groups, and then within that field group you can create a group field type for each atom block, and register it with FieldBlocks.

Whichever Atom Block settings you define in ACF will also be visible to the client. Atom Blocks can also have settings that are not visible to the client. Those settings can be supplied when registering a reusable block that uses the atom block.

```php
\FieldBlocks\register_atom_block(
	array(
		'field_group_key' => 'group_647c8c6ddabb2', // Key of the "Group" that defines the atom block
		'name' => 'atomblock_test', // Must correspond to the Group field name
		'render_callback' => 'some_render_callback',
		'css' => array( 'some-css-hook-name' ),
		'js' => array( 'some-js-hook-name' )
	)
);
```

## Registering reusable blocks

Reusable blocks are what a client will see when clicking "Add Block". Reusable blocks are composed of one of more atom blocks. Reusable blocks can define settings for atom blocks that the client will not see. It can also define settings for the section that will wrap the reusable block.

```php
\FieldBlocks\register_reusable_block(array(
	// Required. Label that will be shown to the client.
	'label' => 'Reusable block name',
	// Required. Name of the reusable block. Has to be unique, (no other blocks with this name)
	'name' => 'reusable_block_name',
	// Required. Array of arrays. Each subarray is an atom block.
	'blocks' => array(
		array(
			// Required. ID for this atom block. This is necessary to distinguish between the same atom blocks added within a layout. IDs only need to be unique within one reusable block.
			// Do not use any spaces in this string. Only lowercase letters, numbers, and underscores.
			'id' => 'any_unique_string',
			// Which atom block to use.
			'name' => 'atomblock_test',
			// Settings not visible to the client, but provided to the render_callback in the first parameter.
			'settings' => array(
				'some_setting' => 'some_value'
			)
		)
	),
	// Optional. Settings for the section within which the reusable block is wrapped. Can include settings like `css_classes`.
	'section_settings' => array(),
	// Optional. JS and CSS hook names to be enqueued when this reusable block is present on the page.
	'js' => array( 'some-js-hook-name' ),
	'css' => array( 'some-css-hook-name' )
));
```

### Section settings

The following is a list of currently supported section settings

- `css_classes: string` => strings to be added to a section wrapping the reusable block.

## Getting excerpts

FieldBlocks doesn't natively support calling `get_the_excerpt` WP function within atom blocks. This results in an infinite loop.

Instead of "get_the_excerpt", use the FieldBlocks alternative `get_the_excerpt` function:

```php
$excerpt = \FieldBlocks\get_the_excerpt( $post );
```

## Built in atom blocks

### Slider

- name: `slider`
- Developer settings:
  - `slides_per_view: number`
  - `navigation: bool`
  - `pagination: bool`
  - `scrollbar: bool`

### Classic editor

**Not implemented yet.**

- name: `classic_editor`

### Section settings

- `css_classes` => string of css classes to be applied to the section wrapping the reusable block.

## Hooks

- `apply_filters( 'field_blocks_section_start_html', '', $section )` => Define HTML to show after section start.
- `apply_filters( 'field_blocks_section_end_html', '', $section )` => Define HTML to show at section end.
- `apply_filters( "field_blocks_{$block_name}_data", $block_data, $section )` => Modify block data before the block is rendered.

## Settings

- `add_filter( 'field_blocks_column_layout_enabled', '__return_true' );` => Insert this filter to functions.php to enable column layout.
- `add_filter( 'field_blocks_section_background_enabled', '__return_false' );` => Disable "Background type" field in sections.

## Development

For developing FieldBlocks itself see `docs/development.org`.

## Roadmap

- Make FieldBlocks work with the native WP get_the_excerpt function
- Accordion atom block
- Dialog atom block
- Support developing ACF backends that are not based on the standard editor with adding sections, but instead using a fully custom ACF interface.
- GH Action that pushes a FieldBlocks update whenever a commit is made to a certain branch (not main - main should be used for in-progress development)
- Update FieldBlocks through WP Admin plugins interface (plugins.php)
- Location rules for reusable blocks
- Possibility to use Gutenbeg on specified post types / or, more granulary, post IDs (maybe clients want to write blogs with Gutenberg).
