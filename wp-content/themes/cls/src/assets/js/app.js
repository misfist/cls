import './vendor/foundation.js';
import './vendor/navigation.js';
import { CountUp } from './vendor/countUp.min.js';
import AOS from 'aos';

function themeReady() {

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

            /** Add class to body so we can stop the page from scrolling */
            document.querySelector('body').classList.add('modal-open');
        }

        /* Close Modal */
        function closeModal(event) {
            event.preventDefault();
            let target = event.target.closest('nav');
            target.classList.remove('is-open');
            target.setAttribute( 'aria-hidden', true );

            /** Remove class */
            document.querySelector('body').classList.remove('modal-open');
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

        /** Watching for Breakpoint Changes */
        $(window).on('changed.zf.mediaquery', function(event, newSize, oldSize) {
            if('small' !== newSize) {
                console.log(newSize);
                
                /** Remove class from body */
                document.querySelector('body').classList.remove('modal-open');

                /** Remove class from modal */
                document.querySelector(`#timeline-controller-module`).classList.remove('is-open');
            }
        });

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
            // if (window.scrollY >= headerElTop) {
            //     document.body.classList.add('is-fixed');
            // } else {
            //     document.body.style.paddingTop = 0;
            //     document.body.classList.remove('is-fixed');
            // }

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
     * Use CountUp.js to count up numbers
     */
    const counterEls = document.querySelectorAll('.wp-block-number-counter .number-counter');
    if(counterEls) {
        const counters = Array.from(counterEls);
        counters.forEach( function(counter, index) {
            let counterEl = counter.querySelector('.block-number');
            if(counterEl) {
                const count = [];
                let number = counterEl.getAttribute('data-number');
                const options = {
                    duration: 5
                };
                count[index] = new CountUp( counterEl, number , options );
                count[index].start();
            }
        } );
    }

    /**
     * Event Hover
     * 
     */
    const eventHoverEls = document.querySelectorAll('.entry-media-wrapper a');
    if(eventHoverEls) {
        const items = Array.from(eventHoverEls);

        function toggleHover(event) {
            event.preventDefault();
            let parent = event.target.closest('.entry-media-wrapper');
            parent.classList.toggle('is-open');
        }

        items.forEach(function(item, index) {
            // item.addEventListener('mouseover', toggleHover);
            // item.addEventListener('mouseout', toggleHover);
            item.addEventListener('click', toggleHover);
        });
    }

    /**
     * CTA Animation
     */
    const cta = document.querySelector( '.wp-block-animated-cta' );
    if(cta) {
        function makeActive(event) {
            this.classList.add('is-active');
        }
        function removeActive(event) {
           this.classList.remove('is-active');
        }
        cta.addEventListener('mouseover', makeActive);
        cta.addEventListener('mouseout',removeActive);
    }

    /**
     * Home page animation
     */
    AOS.init({
        once: true,
        duration: 1000,
    });

}
document.addEventListener( "DOMContentLoaded", themeReady );