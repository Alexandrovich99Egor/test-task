<?php
if ( empty( $block_data['card'] ) ) {
	return;
}
?>
<div class="container small-section-wrapper" >
	<?php
	foreach ( $block_data['card'] as $card ) {
		echo '<div class="small-card-item" ' . ( $card['background_image'] ? "style='background-image:url(" . $card['background_image']['url'] . ");'" : '' ) . '>';
			echo '<h4>' . $card['title'] . '</h4>';
			echo '<div class="theme-description">' . $card['description'] . '</div>';
			echo '<a href="' . $card['link']['url'] . '" target="' . $card['link']['target'] . '" class="button">' . $card['link']['title'] . '</a>';
		echo '</div>';
	}
	?>
</div>
