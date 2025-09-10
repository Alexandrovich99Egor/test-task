<?php
if ( empty( $block_data['title'] ) ) {
	return;
}
?>
<div class="video-accordion-section-wrapper accordion-wrapper">
	<div class="accordion-wrapper__inner">
		<div class="accordion-title"><?php echo $block_data['title']; ?></div>
		<div class="accordion-content">
			<?php echo '<div class="video-block-description">' . $block_data['content'] . '</div>'; ?>
			<div class="video-poster-section">
				<?php
				if ( ! empty( $block_data['video'] ) ) :
					?>
					<video class="video-section" poster="<?php echo $block_data['video_poster']['url']; ?>" src="<?php echo $block_data['video']['url']; ?>"></video>
				<?php else : ?>
					<?php echo wp_get_attachment_image( $block_data['video_poster']['ID'], 'full' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
