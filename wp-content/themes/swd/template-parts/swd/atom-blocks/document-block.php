<?php
if ( empty( $block_data['title'] ) ) {
	return;
}
?>
<div class="document-button-section-wrapper accordion-wrapper">
	<div class="accordion-wrapper__inner">
		<div class="accordion-title"><?php echo $block_data['title']; ?></div>
		<div class="accordion-content">
			<?php
			foreach ($block_data['document_item'] as $item) {
				echo '<div class="document">';
					echo '<div class="document-preview">' . wp_get_attachment_image($item['preview']['ID'], 'full') . '</div>';
					echo '<a href="' . $item['file']['url'] . '" data-download-btn data-file="' . $item['file']['url'] . '" class="button download-btn">' . $item['button_text'] . '</a>';
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>
