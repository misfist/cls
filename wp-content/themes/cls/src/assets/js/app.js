import './vendor/foundation.js';
import './vendor/navigation.js';
import { CountUp } from './vendor/countUp.min.js';

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

    /**
     * Sticky Nav
     */
    const headerEl = document.querySelector('#masthead');
    const headerElTop = headerEl.offsetTop;

    function stickyNavigation() {
        /** Only on medium or larger */
        if(Foundation.MediaQuery.is('medium')) {
            const shrinkOn = 200;

            /** Stick Header */
            if (window.scrollY >= headerElTop) {
                document.body.classList.add('is-fixed');
            } else {
                document.body.style.paddingTop = 0;
                document.body.classList.remove('is-fixed');
            }

            /** Shrink Header */
            if (window.scrollY > shrinkOn) {
                document.body.classList.add("is-minimized");
            } else {
                document.body.classList.remove("is-minimized");
            }
        }
    }
    if(headerEl) {
        window.addEventListener('scroll', stickyNavigation, false);
    }

    /**
     * Number Counter
     */
    const counterEls = document.querySelectorAll('.wp-block-number-counter');
    if(counterEls) {
        const counters = Array.from(counterEls);
        counters.forEach( function(counter, index) {
            let counterEl = counter.querySelector('.block-number');
            if(counterEl) {
                const count = [];
                let number = counterEl.getAttribute('data-number');
                const options = {};
                count[index] = new CountUp( counterEl, number , options );
                count[index].start();
            }
        } );
    }

}
document.addEventListener( "DOMContentLoaded", themeReady );