<?php
if ( empty( $block_data['title'] ) ) {
	return;
}
?>
<div class="container factbox-section-wrapper" <?php echo ( $block_data['background_color'] ? "style='background-color:" . $block_data['background_color'] . ";'" : '' ); ?>>
	<?php echo '<h2>' . ( $block_data['title'] ) . '</h2>'; ?>
	<?php echo '<div class="facts">' . $block_data['facts'] . '</div>'; ?>

</div>
