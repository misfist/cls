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

/* Modal on Small Screens Only */
// const $timelineControl = $('#timeline-controller-container');
// if (Foundation.MediaQuery.is('small only')) {
//     $timelineControl.attr('data-reveal', '');
//     $timelineControl.addClass( 'small reveal' );
//     // var timelineModal = new Foundation.Reveal($timelineControl, {});
// }

// $(window).on('changed.zf.mediaquery', function(event, newSize, oldSize) {
// // newSize is the name of the now-current breakpoint, oldSize is the previous breakpoint
//     if( 'small' === newSize ) {
//         $timelineControl.attr('data-reveal', '');
//         $timelineControl.addClass( 'small reveal' );
//         console.log( `I'm small` );
//     } else if( 'small' === oldSize ) {
//         // timelineModal = null;
//         $timelineControl.removeAttr('data-reveal');
//         $timelineControl.removeClass( 'reveal' ).removeClass('small');
//         console.log( `I'm not so small anymore.` );
//     }
// });