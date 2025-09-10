<?php
if ( empty( $block_data['title'] ) ) {
	return;
}
?>
<div class="container metrics-section-wrapper">
	<h2 class="metrics-section-wrapper__title"><?php echo $block_data['title']; ?></h2>
	<div class="metrics-items-wrapper">
	<?php
	foreach ( $block_data['items'] as $item ) {
		echo '<div class="metrics-item">';
			echo '<div class="metrics-item-thumb">' . wp_get_attachment_image( $item['image']['ID'], 'full' ) . '</div>';
			echo '<h3>' . $item['title'] . '</h3>';
			echo '<span class="metrics-item-subtitle">' . $item['subtitle'] . '</span>';
		echo '</div>';
	}
	?>
	</div>
</div>
