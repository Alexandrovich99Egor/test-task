<?php

use FieldBlocks\Util;

if ( empty( $block_data['slides'] ) ) {
	return;
}

/** @var Util $util */
$util = field_blocks()->get( Util::class );

$swiper_props = array(
	'slides-per-view' => $block_data['slides_per_view'] ?? 1,
	'navigation'      => $block_data['navigation'] ?? null,
	'scrollbar'       => $block_data['scrollbar'] ?? null,
	'pagination'      => $block_data['pagination'] ?? null,
);

?>
<div class="field-blocks-slider">
	<swiper-container <?php echo $util->array_to_props( $swiper_props ); ?>>
		<?php foreach ( $block_data['slides'] as $slide ) : ?>
			<swiper-slide>
				<?php if ( ! empty( $slide['text'] ) ) : ?>
					<div class="field-blocks-slider__text">
						<?php echo $slide['text']; ?>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $slide['image'] ) ) : ?>
					<div class="field-blocks-slider__image">
						<?php echo wp_get_attachment_image( $slide['image'], array( 'thumbnail', 'full' ) ); ?>
					</div>
				<?php endif; ?>
			</swiper-slide>
		<?php endforeach; ?>
	</swiper-container>
</div>
