<?php
if ( empty( $block_data['title'] ) ) {
	return;
}

?>
<div class="container theme-section-wrapper">
	<?php
	echo '<div class="theme-section-wrapper__inner">';

		echo '<div class="theme-image">' . wp_get_attachment_image( $block_data['image']['ID'], 'full' ) . '</div>';

		echo '<div class="theme-content">';
			echo '<h2>' . $block_data['title'] . '</h2>';
			echo '<div class="theme-description">' . $block_data['description'] . '</div>';
			echo '<a href="' . $block_data['link']['url'] . '" target="' . $block_data['link']['target'] . '" class="button">' . $block_data['link']['title'] . '</a>';
		echo '</div>';

	echo '</div>';

	?>


</div>
