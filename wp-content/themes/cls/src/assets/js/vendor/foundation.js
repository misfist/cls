import $ from 'jquery';
import whatInput from 'what-input';


window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
// import './lib/foundation-explicit-pieces';

$(document).foundation();


console.log( 'foundation.js loaded' );

/**
 * Drop-down Menus
 */
const mainNav = new Foundation.DropdownMenu($('#site-navigation'), {});

/**
 * Timeline Tabs
 */
const timelineTabs = new Foundation.Tabs($('#timeline-controls'), {
    linkClass: 'timeline-tab-title',
    panelClass: 'timeline-tabs-panel'
});

/**
 * Timeline Modal
 */
// const modalContent = `#timeline-controls`;
// const modalDiv = `#timeline-modal`;

// function createTimelineModalContent(selector, destination, callback) {
//     const content = document.querySelector(`${selector}`);
//     const clone = content.cloneNode(true);
//     document.querySelector(`${destination}`).insertAdjacentElement( 'afterbegin', clone );
//     callback();
// }

// createTimelineModalContent(modalContent, modalDiv, function() {
//     const timelineModal = new Foundation.Reveal($(`${modalDiv}`), {});
// });