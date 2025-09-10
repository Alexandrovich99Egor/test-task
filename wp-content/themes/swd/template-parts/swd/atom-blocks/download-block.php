<?php
if ( empty( $block_data['file'] ) ) {
	return;
}
?>
<div class="download-button-section-wrapper">
	<?php
			echo '<a href="#" data-download-btn data-file="' . $block_data['file']['url'] . '" class="button download-btn">' . $block_data['button_text'] . '</a>';
	?>


</div>
