<?php
if ( empty( $block_data['title'] ) ) {
	return;
}
?>
<div class="container markets-section-wrapper">
	<h2 class="markets-section-wrapper__title"><?php echo $block_data['title']; ?></h2>
	<div class="market-items-wrapper">
	<?php
	foreach ( $block_data['items'] as $item ) {
		echo '<div class="market-item">';
			echo '<div class="market-item-thumb">' . wp_get_attachment_image( $item['image']['ID'], 'full' ) . '</div>';
			echo '<a href="' . $item['link']['url'] . '" target="' . $item['link']['target'] . '">' . ( isset( $item['link']['title'] ) ? $item['link']['title'] : '' ) . '</a>';
		echo '</div>';
	}
	?>
	</div>
</div>

