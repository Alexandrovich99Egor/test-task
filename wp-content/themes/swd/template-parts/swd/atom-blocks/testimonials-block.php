<?php
if (empty($block_data['testimonial'])) {
	return;
}
?>
<div class="container testimonials-section-wrapper">
	<div class="swiper testimonials-section-wrapper__slider">
		<div class="swiper-wrapper">
			<?php
			foreach ($block_data['testimonial'] as $item) {
				echo '<div class="swiper-slide testimonial-item">';
				echo '<div class="testimonial-item-name">' . $item['name_vorname'] . '</div>';
				echo '<div class="testimonial-item-content">' . $item['testimonial_content'] . '</div>';
				echo '</div>';
			}
			?>
		</div>
		<div class="swiper-pagination"></div>
	</div>
	<div class="swiper-button-prev">
		<svg xmlns="http://www.w3.org/2000/svg" width="14.234" height="26.828" viewBox="0 0 14.234 26.828">
			<path d="M-17461-23296.5l12.182-11.82,11.818,11.82"
				  transform="translate(23309.318 -17435.586) rotate(-90)" fill="none" stroke="#fff"
				  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
		</svg>
	</div>
	<div class="swiper-button-next">
		<svg xmlns="http://www.w3.org/2000/svg" width="14.234" height="26.828" viewBox="0 0 14.234 26.828">
			<path d="M-17461-23296.5l12.182-11.82,11.818,11.82"
				  transform="translate(-23295.084 17462.414) rotate(90)" fill="none" stroke="#fff"
				  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
		</svg>
	</div>
</div>
