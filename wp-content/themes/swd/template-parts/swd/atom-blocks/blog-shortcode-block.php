<?php
if ( empty( $block_data['shortcode'] ) ) {
	return;
}
?>
<div class="container blog-section-wrapper">
	<?php echo ( do_shortcode( $block_data['shortcode'] ) ); ?>
</div>
