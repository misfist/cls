import $ from 'jquery';
import whatInput from 'what-input';


window.$ = $;

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
// import './lib/foundation-explicit-pieces';

$(document).foundation();


// console.log( 'foundation.js loaded' );

/**
 * Timeline Tabs
 */
const timelinePage = document.querySelector(`.page-template-history-timeline`);
if(timelinePage) {
    const timelineTabs = new Foundation.Tabs($('#timeline-controls'), {
        linkClass: 'timeline-tab-title',
        panelClass: 'timeline-tabs-panel'
    });
}