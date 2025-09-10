<?php
if ( empty( $block_data['title'] ) ) {
	return;
}
?>
<div class="container contact-wide-section-wrapper">
	<div class="contact-wide-section-wrapper__inner" <?php echo($block_data['background_image'] ? "style='background-image:url(" . $block_data['background_image']['url'] . ");'" : ''); ?>>

		<?php echo "<div class='contact-wide-info'>"; ?>
			<?php echo '<h2>' . ($block_data['title']) . '</h2>'; ?>
			<?php echo "<div class='description'>" . ($block_data['description']) . '</div>'; ?>
		<?php echo '</div>'; ?>

		<?php echo "<div class='contact-wide-image'>"; ?>
			<?php echo '<div class="contactbox-thumb">' . wp_get_attachment_image($block_data['image']['ID'], 'full') . '</div>'; ?>
			<?php echo '<h3>' . ($block_data['person_name']) . '</h3>'; ?>
			<?php echo '<span class="job-title">' . ($block_data['job_title']) . '</span>'; ?>
		<?php echo '</div>'; ?>

	</div>
</div>
