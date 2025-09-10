<?php
if ( empty( $block_data['page'] ) ) {
	return;
}
?>
<div class="container technologien-section-wrapper">
	<?php
	foreach ( $block_data['page'] as $page ) {
		echo '<div class="technologien-item">';
			echo '<div class="thumb">' . wp_get_attachment_image( get_post_thumbnail_id( $page->ID ), 'full' ) . '</div>';
			echo '<div class="description">';
				echo '<h2>' . $page->post_title . '</h2>';
				echo '<div class="info">';
					echo get_field( 'short_description', $page->ID );
				echo '</div>';
				echo '<a href="' . get_permalink( $page->ID ) . '" class="button">' . __( 'Mehr erfahren', 'swd' ) . '</a>';
			echo '</div>';
		echo '</div>';
	}

	?>
</div>
