<?php
if ( empty( $block_data['simple_text_content'] ) ) {
	return;
}
?>
<div class="container simple-text-section-wrapper" <?php echo($block_data['background_image'] ? "style='background-image:url(" . $block_data['background_image']['url'] . ");'" : ''); ?>>
	<?php

	echo '<div class="content">';
		echo($block_data['simple_text_content']);
	echo '</div>';

	if (!empty($block_data['right_image'])) {
		echo '<div class="thumb">' . wp_get_attachment_image($block_data['right_image']['ID'], 'full') . '</div>';
	}

	?>
</div>
