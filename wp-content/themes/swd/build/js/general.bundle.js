/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "@wordpress/dom-ready":
/*!**********************************!*\
  !*** external ["wp","domReady"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["domReady"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!*******************************!*\
  !*** ./js/general/general.ts ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/dom-ready */ "@wordpress/dom-ready");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0__);

function toggleVideo() {
  // find all video poster sections
  const videos = document.querySelectorAll('.video-poster-section');
  videos.forEach(item => {
    // find video element and play button within each section
    const itemVideo = item.querySelector('video');
    const itemButton = item.querySelector('.video-section__play');
    if (itemVideo && itemButton) {
      // define click event handler
      const handleClick = () => {
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
function addPaddingTop() {
  const header = document.querySelector('header.site-header');
  const body = document.querySelector('body');
  const popUpContact = document.querySelector('.popup-form');
  const sidebar = document.querySelector('.sidebar-main');
  const headerHeight = header?.getBoundingClientRect().height || 0;
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
function togglePopupItem() {
  const popupItems = document.querySelectorAll('.have-popup');
  popupItems.forEach(item => {
    const popup = item.querySelector('.item-popup');
    const closeButton = popup?.querySelector('.item-popup-close');
    if (popup && closeButton) {
      item.addEventListener('click', event => {
        if (event.target === item) popup.classList.add('open');
      });
      closeButton.addEventListener('click', () => {
        popup.classList.remove('open');
      });
    }
  });
  document.addEventListener('click', event => {
    const target = event.target;
    if (!target.closest('.have-popup')) {
      const openPopups = document.querySelectorAll('.item-popup.open');
      openPopups.forEach(popup => {
        popup.classList.remove('open');
      });
    }
  });
}
function toggleContactPopup() {
  const contactForm = document.querySelectorAll('.popup-form');
  contactForm?.forEach(item => {
    const openButton = item.querySelector('.popup-button');
    const closeButton = item?.querySelector('.popup-form-close');
    if (openButton && closeButton) {
      openButton.addEventListener('click', () => {
        item.classList.toggle('open');
      });
      closeButton.addEventListener('click', () => {
        item.classList.remove('open');
      });
    }
  });
  document.addEventListener('click', event => {
    const target = event.target;
    if (!target.closest('.popup-form.open')) {
      const formPopups = document.querySelectorAll('.popup-form.open');
      formPopups.forEach(popup => {
        popup.classList.remove('open');
      });
    }
  });
}
function toggleSidebarMenu() {
  const sidebarMenuItems = document.querySelectorAll('.sidebar-main .menu-item.menu-item-has-children');
  sidebarMenuItems?.forEach(item => {
    const subMenu = item.querySelector('.sub-menu');
    if (subMenu) {
      const subMenuHeight = subMenu.scrollHeight;
      item.addEventListener('click', e => {
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
function toggleAccordion() {
  const accordionItems = document.querySelectorAll('.accordion-wrapper');
  accordionItems?.forEach(item => {
    const itemTitle = item.querySelector('.accordion-title');
    const itemContent = item.querySelector('.accordion-content');
    itemTitle?.addEventListener('click', e => {
      const itemContentHeight = itemContent.scrollHeight;
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
function clickOnFilter() {
  window.onload = () => {
    // select all elements '.asp_option_cat'
    document.querySelectorAll('.asp_filter_tax_category .asp_option_cat').forEach(option => {
      // add event listeners for 'click' and 'touchstart'
      option.addEventListener('click', handleClick);
      option.addEventListener('touchstart', handleClick);
    });
  };
  function handleClick() {
    // assign the clicked element to the variable 'option'
    const option = this;

    // if clicked option has class '.asp_option_selectall'
    if (option.classList.contains('asp_option_selectall')) {
      // select all elements with class '.asp_option_cat' within '.asp_filter_tax_category'
      const allOptions = document.querySelectorAll('.asp_filter_tax_category .asp_option_cat');

      // check if any option is already selected
      const isAnyOptionSelected = allOptions[0].classList.contains('selected');

      // toggle 'selected' class for all options based on the 'isAnyOptionSelected' value
      allOptions.forEach(cat => {
        cat.classList.toggle('selected', !isAnyOptionSelected);
      });
    } else {
      // toggle 'selected' class for the clicked option
      option.classList.toggle('selected');
    }
  }
}
function downloadModal() {
  // Add click event listener to all buttons with 'data-download-btn' attribute
  document.querySelectorAll('[data-download-btn]').forEach(button => {
    button.addEventListener('click', e => {
      e.preventDefault();
      // get the download link from the button's dataset
      const currentLink = button.dataset.file;

      // find the download form
      const form = document.querySelector('.download-form-wrapper.popup form.wpcf7-form');
      if (form) {
        // create a hidden input field to store the download link
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'downloadLink';
        hiddenInput.value = currentLink || '';
        form.appendChild(hiddenInput);
      }

      // make the download form wrapper visible
      const downloadFormWrapper = document.querySelector('.download-form-wrapper.popup');
      if (downloadFormWrapper) {
        downloadFormWrapper.classList.add('open');
      }
    });
  });

  // add click event listener to all close buttons with 'popup-form-close' class
  document.querySelectorAll('.popup-form-close').forEach(closeButton => {
    closeButton.addEventListener('click', () => {
      // remove the 'open' class from all open download form wrappers
      document.querySelectorAll('.download-form-wrapper.popup.open').forEach(popup => {
        popup.classList.remove('open');
      });

      // remove the downloadLink input field from the form
      document.querySelectorAll('input[name="downloadLink"]').forEach(input => {
        input.remove();
      });
    });
  });

  // get the download form
  const downloadForm = document.querySelector('.download-form-wrapper .wpcf7 form.wpcf7-form');
  if (downloadForm) {
    // add submit event listener to the download form
    downloadForm.addEventListener('wpcf7mailsent', e => {
      e.preventDefault();
      // get the download link from the hidden input field
      const downloadLinkInput = downloadForm.querySelector('input[name="downloadLink"]');
      if (downloadLinkInput) {
        const downloadLink = downloadLinkInput.value;
        if (downloadLink) {
          // create an anchor element to trigger the file download
          const anchorElement = document.createElement('a');
          anchorElement.href = downloadLink;
          anchorElement.download = '';
          anchorElement.click();
        }
      }
    });
  }
}
_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_0___default()(() => {
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
})();

/******/ })()
;
//# sourceMappingURL=general.bundle.js.map