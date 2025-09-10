<?php
if ( empty( $block_data['images'] ) ) {
	return;
}
?>
<div class="container gallery-section-wrapper">
	<?php
	foreach ( $block_data['images'] as $image ) {
		echo '<div class="gallery-item">' . wp_get_attachment_image( $image['ID'], 'full' ) . '</div>';
	}
	?>
</div>
