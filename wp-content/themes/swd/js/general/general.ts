import domReady from '@wordpress/dom-ready';

function toggleVideo(): void {
	// find all video poster sections
	const videos = document.querySelectorAll<HTMLDivElement>('.video-poster-section');

	videos.forEach((item) => {
		// find video element and play button within each section
		const itemVideo = item.querySelector<HTMLVideoElement>('video');
		const itemButton = item.querySelector<HTMLButtonElement>('.video-section__play');

		if (itemVideo && itemButton) {
			// define click event handler
			const handleClick = (): void => {
				// toggle play/pause state of the video and update the button appearance
				if (itemVideo.paused) {
					itemButton.classList.add('play');
					itemVideo.play();
				} else {
					itemButton.classList.remove('play');
					itemVideo.pause();
				}
			};

			// bind the click event handler to both the video and play button
			itemVideo.addEventListener('click', handleClick);
			itemButton.addEventListener('click', handleClick);
		}
	});
}

function addPaddingTop(): void {
	const header: HTMLElement | null = document.querySelector('header.site-header');
	const body: HTMLElement | null = document.querySelector('body');
	const popUpContact: HTMLElement | null = document.querySelector('.popup-form');
	const sidebar: HTMLElement | null = document.querySelector('.sidebar-main');

	const headerHeight: number = header?.getBoundingClientRect().height || 0;

	if (body) {
		body.style.paddingTop = `${headerHeight}px`;
	}
	if (popUpContact) {
		popUpContact.style.top = `${headerHeight}px`;
	}
	if (sidebar) {
		sidebar.style.top = `${headerHeight + 44}px`;
	}
}

function togglePopupItem(): void {
	const popupItems: NodeListOf<Element> | null = document.querySelectorAll('.have-popup');
	popupItems.forEach((item: Element) => {
		const popup: HTMLElement | null = item.querySelector('.item-popup');
		const closeButton: HTMLButtonElement | null = popup?.querySelector('.item-popup-close') as HTMLButtonElement | null;

		if (popup && closeButton) {
			item.addEventListener('click', (event: Event) => {
				if (event.target === item) popup.classList.add('open');
			});

			closeButton.addEventListener('click', () => {
				popup.classList.remove('open');
			});
		}
	});

	document.addEventListener('click', (event: Event) => {
		const target: HTMLElement = event.target as HTMLElement;
		if (!target.closest('.have-popup')) {
			const openPopups: NodeListOf<Element> = document.querySelectorAll('.item-popup.open');
			openPopups.forEach((popup: Element) => {
				popup.classList.remove('open');
			});
		}
	});
}

function toggleContactPopup(): void {
	const contactForm: NodeListOf<Element> | null = document.querySelectorAll('.popup-form');

	contactForm?.forEach((item: Element) => {
		const openButton: HTMLElement | null = item.querySelector('.popup-button');
		const closeButton: HTMLButtonElement | null = item?.querySelector('.popup-form-close') as HTMLButtonElement | null;

		if (openButton && closeButton) {
			openButton.addEventListener('click', (): void => {
				item.classList.toggle('open');
			});
			closeButton.addEventListener('click', (): void => {
				item.classList.remove('open');
			});
		}
	});
	document.addEventListener('click', (event: Event) => {
		const target: HTMLElement = event.target as HTMLElement;
		if (!target.closest('.popup-form.open')) {
			const formPopups: NodeListOf<Element> = document.querySelectorAll('.popup-form.open');
			formPopups.forEach((popup: Element) => {
				popup.classList.remove('open');
			});
		}
	});
}

function toggleSidebarMenu(): void {
	const sidebarMenuItems: NodeListOf<Element> | null = document.querySelectorAll('.sidebar-main .menu-item.menu-item-has-children');

	sidebarMenuItems?.forEach((item: Element) => {
		const subMenu: HTMLElement | null = item.querySelector('.sub-menu') as HTMLElement;

		if (subMenu) {
			const subMenuHeight: number = subMenu.scrollHeight;

			item.addEventListener('click', (e: Event) => {
				if (!item.classList.contains('clicked')) {
					e.preventDefault();
					item.classList.add('clicked');

					subMenu.classList.add('open');
					subMenu.style.height = `${subMenuHeight}px`;
				}
			});
		}
	});
}

function toggleAccordion(): void {
	const accordionItems: NodeListOf<Element> | null = document.querySelectorAll('.accordion-wrapper');

	accordionItems?.forEach((item: Element) => {
		const itemTitle: HTMLElement | null = item.querySelector('.accordion-title') as HTMLElement;
		const itemContent: HTMLElement | null = item.querySelector('.accordion-content') as HTMLElement;
		itemTitle?.addEventListener('click', (e: Event) => {
			const itemContentHeight: number = itemContent.scrollHeight;
			if (!item.classList.contains('open')) {
				e.preventDefault();
				item.classList.add('open');
				itemContent.style.height = `${itemContentHeight}px`;
			} else {
				item.classList.remove('open');
				itemContent.style.height = '0';
			}
		});
	});
}

function clickOnFilter(): void {
	window.onload = (): void => {
		// select all elements '.asp_option_cat'
		document.querySelectorAll<HTMLElement>('.asp_filter_tax_category .asp_option_cat').forEach((option: HTMLElement) => {
			// add event listeners for 'click' and 'touchstart'
			option.addEventListener('click', handleClick);
			option.addEventListener('touchstart', handleClick);
		});
	}

	function handleClick(this: HTMLElement): void {
		// assign the clicked element to the variable 'option'
		const option: HTMLElement = this;

		// if clicked option has class '.asp_option_selectall'
		if (option.classList.contains('asp_option_selectall')) {

			// select all elements with class '.asp_option_cat' within '.asp_filter_tax_category'
			const allOptions: NodeListOf<HTMLElement> = document.querySelectorAll<HTMLElement>('.asp_filter_tax_category .asp_option_cat');

			// check if any option is already selected
			const isAnyOptionSelected: boolean = allOptions[0].classList.contains('selected');

			// toggle 'selected' class for all options based on the 'isAnyOptionSelected' value
			allOptions.forEach((cat: HTMLElement) => {
				cat.classList.toggle('selected', !isAnyOptionSelected);
			});
		} else {
			// toggle 'selected' class for the clicked option
			option.classList.toggle('selected');
		}
	}
}

function downloadModal(): void {
	// Add click event listener to all buttons with 'data-download-btn' attribute
	document.querySelectorAll<HTMLButtonElement>('[data-download-btn]').forEach((button: HTMLButtonElement) => {
		button.addEventListener('click', (e: MouseEvent) => {
			e.preventDefault();
			// get the download link from the button's dataset
			const currentLink: string | undefined = button.dataset.file;

			// find the download form
			const form: HTMLFormElement | null = document.querySelector('.download-form-wrapper.popup form.wpcf7-form');
			if (form) {
				// create a hidden input field to store the download link
				const hiddenInput: HTMLInputElement = document.createElement('input');
				hiddenInput.type = 'hidden';
				hiddenInput.name = 'downloadLink';
				hiddenInput.value = currentLink || '';
				form.appendChild(hiddenInput);
			}

			// make the download form wrapper visible
			const downloadFormWrapper: HTMLElement | null = document.querySelector<HTMLElement>('.download-form-wrapper.popup');
			if (downloadFormWrapper) {
				downloadFormWrapper.classList.add('open');
			}
		});
	});

	// add click event listener to all close buttons with 'popup-form-close' class
	document.querySelectorAll<HTMLButtonElement>('.popup-form-close').forEach((closeButton: HTMLButtonElement) => {
		closeButton.addEventListener('click', () => {
			// remove the 'open' class from all open download form wrappers
			document.querySelectorAll('.download-form-wrapper.popup.open').forEach((popup: Element) => {
				popup.classList.remove('open');
			});

			// remove the downloadLink input field from the form
			document.querySelectorAll('input[name="downloadLink"]').forEach((input: Element) => {
				input.remove();
			});
		});
	});

	// get the download form
	const downloadForm: HTMLFormElement | null = document.querySelector<HTMLFormElement>('.download-form-wrapper .wpcf7 form.wpcf7-form');
	if (downloadForm) {
		// add submit event listener to the download form
		downloadForm.addEventListener('wpcf7mailsent', (e: Event) => {
			e.preventDefault();
			// get the download link from the hidden input field
			const downloadLinkInput: HTMLInputElement | null = downloadForm.querySelector('input[name="downloadLink"]');
			if (downloadLinkInput) {
				const downloadLink: string = downloadLinkInput.value;
				if (downloadLink) {
					// create an anchor element to trigger the file download
					const anchorElement: HTMLAnchorElement = document.createElement('a');
					anchorElement.href = downloadLink;
					anchorElement.download = '';
					anchorElement.click();
				}
			}
		});
	}
}

domReady((): void => {
	// add padding-top like header height
	addPaddingTop();
	// toggle video
	toggleVideo();
	// toggle popupItem
	togglePopupItem();
	// toggle contactPopup
	toggleContactPopup();
	// toggle sidebarMenu
	toggleSidebarMenu();
	// toggle accordion
	toggleAccordion();
	// click on filter and give css class selected
	clickOnFilter();
	// on click [data-download-btn] open form modal
	downloadModal();
});
