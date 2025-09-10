<?php
if ( empty( $block_data['title'] ) ) {
	return;
}
?>
<div class="container contactbox-section-wrapper" <?php echo ( $block_data['background_color'] ? "style='background-color:" . $block_data['background_color'] . ";'" : '' ); ?>>
	<?php echo '<h2>' . ( $block_data['title'] ) . '</h2>'; ?>
	<?php echo '<div class="contactbox-thumb">' . wp_get_attachment_image( $block_data['image']['ID'], 'full' ) . '</div>'; ?>
	<?php echo '<h3>' . ( $block_data['person_name'] ) . '</h3>'; ?>
	<?php echo '<span class="job-title">' . ( $block_data['person_name'] ) . '</span>'; ?>
	<?php echo '<a class="phone" href="tel:' . ( $block_data['phone'] ) . '">' . ( $block_data['phone'] ) . '</a>'; ?>
	<?php echo '<a class="email" href="tel:' . ( $block_data['email'] ) . '">' . ( $block_data['email'] ) . '</a>'; ?>


</div>
