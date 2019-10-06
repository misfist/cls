import './vendor/foundation.js';

function themeReady() {
    console.log( 'loaded app.js' );

    /**
     * Timeline UI Functions
     */

    /* History Thermometer Component */
    const timelineControl = document.querySelector( '.page-template-history-timeline #timeline-controls' );
    if( timelineControl ) {
        const links = Array.from( timelineControl.querySelectorAll('a') );
        const thermometerTicks = Array.from( document.querySelectorAll('.thermometer li') );
        links.map( link => {
            link.addEventListener('click', function(event) {
                let date = link.getAttribute('aria-controls');
                thermometerTicks.map( el => {
                    el.classList.remove('is-active')
                } );
                let tick = document.querySelector(`li[data-tick=${date}]`);
                tick.classList.add('is-active');
            })
        } );
    }

    /* Open Modal on Small Screens */
    const timelineControllerOpen = document.querySelector( '#all-years-action' );
    if( timelineControllerOpen ) {
        timelineControllerOpen.addEventListener( 'click', function(event) {
            let target = document.querySelector(`${this.getAttribute('href')}`);
            target.classList.add('is-open');
            target.setAttribute( 'aria-hidden', false );
            console.log(timelineControllerOpen, this.getAttribute('href'), target,  event);
        } );
    }

}
document.addEventListener( "DOMContentLoaded", themeReady );