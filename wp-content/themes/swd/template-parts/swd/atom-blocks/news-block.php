<?php
if ( empty( $block_data['news_items'] ) ) {
	return;
}
?>
<div class="container news-section-wrapper">
	<h3 class="news-section-wrapper__title"><?php echo $block_data['title']; ?></h3>
	<div class="news-section-wrapper__inner">
		<?php
		if ( ! empty( $block_data['featured'] ) ) {
			echo '<div class="news-column featured">';
				echo '<div class="news-item">';
					echo '<div class="news-item-thumb">' . get_the_post_thumbnail( $block_data['featured']->ID, 'full' ) . '</div>';
					echo '<span class="news-item-date">' . get_the_date( 'd.m.Y', $block_data['featured']->ID ) . ' ' . ( get_field( 'read_time', $block_data['featured']->ID ) ? '- ' . get_field( 'read_time', $block_data['featured']->ID ) : '' ) . '</span>';
					echo '<div class="news-item-title">' . $block_data['featured']->post_title . '</div>';
					echo '<div class="news-item-excerpt">' . $block_data['featured']->post_excerpt . '</div>';
					echo '<a href="' . get_permalink( $block_data['featured']->ID ) . '" class="button">' . __( 'Ganzen Artikel lesen', 'swd' ) . '</a>';
				echo '</div>';
			echo '</div>';
		}
		echo '<div class="news-column list">';
		foreach ( $block_data['news_items'] as $item ) {
			echo '<div class="news-item">';
				echo '<div class="news-item-thumb">' . get_the_post_thumbnail( $item->ID, 'full' ) . '</div>';
				echo '<div class="news-item__inner">';
					echo '<span class="news-item-date">' . get_the_date( 'd.m.Y', $item->ID ) . ' ' . ( get_field( 'read_time', $item->ID ) ? '- ' . get_field( 'read_time', $item->ID ) : '' ) . '</span>';
					echo '<div class="news-item-title">' . $item->post_title . '</div>';
					echo '<div class="news-item-excerpt">' . $item->post_excerpt . '</div>';
				echo '</div>';
			echo '</div>';
		}
			echo '<a href="' . $block_data['blog_page_link']['url'] . '" target="' . $block_data['blog_page_link']['target'] . '" class="button">' . $block_data['blog_page_link']['title'] . '</a>';
		echo '</div>';
		?>
	</div>
</div>
