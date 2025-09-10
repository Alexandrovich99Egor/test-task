<?php if (empty($block_data['video']) && empty($block_data['poster'])) {
	return;
} ?>
<div class="video-poster-section">
	<?php if (!empty($block_data['video'])) : ?>
		<video class="video-section" poster="<?php echo $block_data['poster']['url']; ?>"
			   src="<?php echo $block_data['video']['url']; ?>"></video>
		<button class="video-section__play">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59.692 59.692">
				<path fill="#fff" d="M29.845 0a29.846 29.846 0 1 0 29.846 29.845A29.841 29.841 0 0 0 29.845 0Zm13.924 32.737L22.588 44.889a2.894 2.894 0 0 1-4.3-2.527V17.329a2.9 2.9 0 0 1 4.3-2.527l21.181 12.877a2.9 2.9 0 0 1 0 5.058Z"/>
			</svg>
		</button>
	<?php else :
		echo wp_get_attachment_image($block_data['poster']['ID'], 'full');
	endif; ?>
</div>
