<?php
if ( empty( $block_data['benefit_item'] ) ) {
	return;
}
?>
<div class="benefits-section <?php echo $block_data['position']; ?>" <?php echo ( $block_data['background_color'] ? "style='background-color: " . $block_data['background_color'] . ";'" : '' ); ?>>
	<div class="title-wrapper"><h3><?php echo $block_data['title']; ?></h3></div>
	<div class="description-wrapper">
		<?php echo $block_data['description']; ?>
	</div>
	<div class="benefits-wrapper">
		<?php
		foreach ( $block_data['benefit_item'] as $item ) {
			echo '<div class="benefits-item ' . ( $item['person'] ? 'have-popup' : '' ) . '" ' . ( $block_data['background_color_alternate'] ? "style='background-color: " . $block_data['background_color_alternate'] . ";'" : '' ) . '>';
				echo '<span class="benefits-item-title">' . $item['title'] . '</span>';
				echo '<span class="benefits-item-icon">' . wp_get_attachment_image( $item['icon']['ID'], 'full' ) . '</span>';
			if ( $item['person'] ) {
				echo '<div class="item-popup">';
					echo '<button class="item-popup-close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35 35"><path fill="#fff" d="M17.5 0A17.5 17.5 0 1 0 35 17.5 17.439 17.439 0 0 0 17.5 0Zm8.75 23.8-2.45 2.45-6.3-6.3-6.3 6.3-2.45-2.45 6.3-6.3-6.3-6.3 2.45-2.45 6.3 6.3 6.3-6.3 2.45 2.45-6.3 6.3Z"/></svg></button>';
					echo '<div class="item-popup-content">';
						echo $item['title'];
						echo $item['description'];
					echo '</div>';
					echo '<div class="item-popup-person">';
				if ( $item['image']['url'] ) {
					echo '<div class="item-popup-person-thumb">' . wp_get_attachment_image( $item['image']['ID'], 'full' ) . '</div>';
				}
						echo '<div class="item-popup-person-contact">';
							echo '<h3>' . $item['person'] . '</h3>';
							echo '<p>' . $item['job_title'] . '</p>';
							echo '<a class="phone" href="tel:' . $item['phone'] . '">' . $item['phone'] . '</a>';
							echo '<a class="email" href="tel:' . $item['email'] . '">' . $item['email'] . '</a>';
				if ( ! empty( $item['link'] ) ) {
					echo '<a class="button" href="' . $item['link']['url'] . '" target="' . $item['link']['target'] . '">' . $item['link']['title'] . '</a>';
				}
						echo '</div>';
					echo '</div>';
				echo '</div>';

			}
			echo '</div>';
		}
		?>
	</div>
</div>
