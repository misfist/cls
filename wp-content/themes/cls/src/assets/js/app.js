import './vendor/foundation.js';

function themeReady() {
    console.log( 'loaded app.js' );

    /**
     * Timeline UI Functions
     */

    /* History Timeline Component */
    const timelineControl = document.querySelector( '#timeline-controls' );
    if( timelineControl ) {

        const links = Array.from( timelineControl.querySelectorAll('a') );
        const thermometerTicks = Array.from( document.querySelectorAll('.thermometer li') );

        /* Listen to Timeline Links */
        links.map( link => {
            link.addEventListener('click', function(event) {
                let date = link.getAttribute('aria-controls');
                thermometerTicks.map( el => {
                    el.classList.remove('is-active')
                } );
                let tick = document.querySelector(`li[data-tick=${date}]`);
                tick.classList.add('is-active');

                /* Use Foundation to detect breakpoint */
                if (Foundation.MediaQuery.is('small only')) {
                    /* Close Modal */
                    closeModal(event);
                }
            })
        } );

        /* Open Modal */
        function openModal(event) {
            event.preventDefault();
            let target = document.querySelector(`${this.getAttribute('href')}`);
            target.classList.add('is-open');
            target.setAttribute( 'aria-hidden', false );
        }

        /* Close Modal */
        function closeModal(event) {
            event.preventDefault();
            let target = event.target.closest('nav');
            target.classList.remove('is-open');
            target.setAttribute( 'aria-hidden', true );
        }

        /* Listen to Open Button */
        const timelineOpenButton = document.querySelector( '#all-years-action' );
        if( timelineOpenButton ) {
            timelineOpenButton.addEventListener( 'click', openModal );
        }

        const timelineCloseButton = document.querySelector(`#timeline-controller-module .close-button`);
        if(timelineCloseButton) {
            timelineCloseButton.addEventListener( 'click', closeModal );
        }

        /* Listen to Timeline Links */

    }

    if (Foundation.MediaQuery.is('small only')) {}

}
document.addEventListener( "DOMContentLoaded", themeReady );