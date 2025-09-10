<?php
if ( empty( $block_data['form'] ) ) {
	return;
}
?>
<div class="container newsletter-section-wrapper">
	<div class="column">
		<h3 class="newsletter-section-wrapper__title"><?php echo $block_data['title']; ?></h3>
		<div class="description"><?php echo $block_data['description']; ?></div>
	</div>
	<div class="column newsletter-section-wrapper__form">
		<?php echo do_shortcode( $block_data['form'] ); ?>
	</div>
</div>
