import domReady from '@wordpress/dom-ready';
import Swiper from 'swiper';
import {Navigation, Pagination} from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const testimonialsSlider: NodeListOf<HTMLElement> = document.querySelectorAll('.testimonials-section-wrapper__slider');
const milestonesSlider: NodeListOf<HTMLElement> = document.querySelectorAll('.milestones-section-wrapper__slider');

domReady((): void => {
	if (testimonialsSlider.length) {
		testimonialsSlider!.forEach((testimonialSlider: HTMLElement) => {
			new Swiper(testimonialSlider, {
				modules: [Navigation, Pagination],
				slidesPerView: 1,
				spaceBetween: 40,
				loop: true,
				navigation: {
					nextEl: '.testimonials-section-wrapper .swiper-button-next',
					prevEl: '.testimonials-section-wrapper .swiper-button-prev',
				},
				pagination: {
					el: '.testimonials-section-wrapper .swiper-pagination',
					clickable: true,
				},
				breakpoints: {
					768: {
						slidesPerView: 2,
					},
				}
			});
		});
	}
	if (milestonesSlider.length) {
		milestonesSlider!.forEach((milestonesSlider: HTMLElement) => {
			new Swiper(milestonesSlider, {
				modules: [Navigation, Pagination],
				slidesPerView: 1,
				spaceBetween: 2,
				navigation: {
					nextEl: '.milestones-section-wrapper .swiper-button-next',
					prevEl: '.milestones-section-wrapper .swiper-button-prev',
				},
				pagination: {
					el: '.milestones-section-wrapper .swiper-pagination',
					clickable: true,
				},
				breakpoints: {
					768: {
						slidesPerView: 2,
					},
					1100: {
						slidesPerView: 3,
					}
				}
			});
		});
	}
});
