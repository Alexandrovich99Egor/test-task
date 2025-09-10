<?php
if ( empty( $block_data['team_member'] ) ) {
	return;
}
?>
<div class="container team-section-wrapper">
	<?php
	foreach ( $block_data['team_member'] as $team_member ) {
		echo '<div class="team-member">';
			echo '<div class="team-thumb">' . wp_get_attachment_image( $team_member['image']['ID'], 'full' ) . '</div>';
			echo '<div class="team-name">';
				echo $team_member['name'];
			echo '</div>';
			echo '<div class="team-jobtitle">';
				echo $team_member['job_title'];
			echo '</div>';
			echo '<div class="team-phone">';
				echo '<a href="tel:' . $team_member['phone'] . '">' . $team_member['phone'] . '</a>';
			echo '</div>';
			echo '<div class="team-email">';
				echo '<a href="mailto:' . $team_member['email'] . '">' . $team_member['email'] . '</a>';
			echo '</div>';
		echo '</div>';
	}

	?>
</div>
