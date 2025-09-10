<?php
if ( empty( $block_data['history_block'] ) ) {
	return;
}
?>
<div class="container history-section-wrapper">
	<?php
	foreach ( $block_data['history_block'] as $block_download ) {
		echo '<div class="history-block-wrapper">';
		echo '<h2>' . $block_download['title'] . '</h2>';
		echo '<div class="history-list">';
		foreach ( $block_download['history_item'] as $history_item ) {
			echo '<div class="history-item">';
				echo '<div class="history-content">';
					echo ( $history_item['title'] ? '<strong>' . $history_item['title'] . '</strong>' : '' );
					echo '<p>' . $history_item['text'] . '</p>';
				echo '</div>';
				echo '<div class="history-image">';
			if ( $history_item['preview'] ) {
				echo wp_get_attachment_image( $history_item['preview']['ID'], 'full' );
			}
				echo '</div>';
			echo '</div>';

		}
		echo '</div>';
		echo '</div>';
	}
	?>
</div>
