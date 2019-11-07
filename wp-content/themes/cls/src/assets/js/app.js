import './vendor/foundation.js';
import './vendor/navigation.js';
import { CountUp } from './vendor/countUp.min.js';
import AOS from 'aos';
// import './vendor/paginate';

function themeReady() {

    /**
     * Timeline UI Functions
     */

    /* History Timeline Component */
    const timelineControl = document.querySelector( '#timeline-controls' );
    if( timelineControl ) {

        const links = Array.from( timelineControl.querySelectorAll('a') );
        const thermometerTicks = Array.from( document.querySelectorAll('.thermometer li') );

        const list = [...links];
        const totalNumber = list.length;
        let numberOfPages = 1;
        const pageSize = 10;
        let currentPage = 1;
        let start = 0;
        let stop = 9;

        const downButton = document.querySelector('.timeline-pagination .js-down');
        const upButton = document.querySelector('.timeline-pagination .js-up');
        
        /**
         * Kick it off
         */
        function pagerInit() {
            numberOfPages = getNumberOfPages();

            updateUp();
            updateDown();

            addPageIndentifier();
            showCurrentPageItems();
        }

        /**
         * Add page number data to items
         */
        function addPageIndentifier() {

            for( var i = 1; i <= numberOfPages; i++ ) {
                const start = getStart( i );
                const stop = getStop( i  );

                let items = list.slice( start, stop );
                items.map( item => {
                    item.setAttribute( 'data-page', i );
                } );

            }

        }

        /**
         * Maybe activate/deactivate up button
         */
        function updateUp() {
            if( currentPage > 1 ) {
                enableUp();
            } else {
                disableUp();
            }
        }

        /**
         * Maybe activate/deactivate down button
         */
        function updateDown() {
            if( currentPage < numberOfPages ) {
                enableDown();
            } else {
                disableDown();
            }
        }

        /**
         * Get the items on currnt page
         */
        function getCurrentPageItems() {
            const currentPageItems = list.filter( function( item, index ) {
                return item.getAttribute( 'data-page' ) == currentPage;
            } );
            return currentPageItems;
        }

        /**
         * Get the items that aren't on the current page
         */
        function getInactivePageItems() {
            const inactivePageItems = list.filter( function( item, index ) {
                return item.getAttribute( 'data-page' ) != currentPage;
            } );
            return inactivePageItems;
        }

        /**
         * Show the items
         */
        function showCurrentPageItems() {
            const currentPageItems = getCurrentPageItems();
            currentPageItems.map( item => {
                item.closest('li').classList.remove( 'is-off-page' );
                item.closest('li').classList.add( 'is-visible' );
            } );

            const inactivePageItems = getInactivePageItems();
            inactivePageItems.map( item => {
                item.closest('li').classList.remove( 'is-visible' );
                item.closest('li').classList.add( 'is-off-page' );
            } );
        }

        /**
         * Disable down button
         */
        function disableDown() {
            downButton.setAttribute('disabled', true);
        }

        /**
         * Disable up button
         */
        function disableUp() {
            upButton.setAttribute('disabled', true);
        }

        /**
         * Enable up button
         */
        function enableUp() {
            upButton.removeAttribute('disabled');
        }

        /**
         * Enable down button
         */
        function enableDown() {
            downButton.removeAttribute('disabled');
        }

        /**
         * Helper to get start index
         * @param {int} page 
         */
        function getStart( page ) {
            return ( page > 1 ) ? ( pageSize * page ) - pageSize : 0;
        }

        /**
         * Helper to get end index
         * @param {int} page 
         */
        function getStop( page ) {
            const start = getStart( page );
            return start + ( pageSize );
        }

        /**
         * Helper to calculate number of pages
         */
        function getNumberOfPages() {
            return Math.ceil( totalNumber / pageSize );
        }

        /**
         * Event listener for up button
         */
        downButton.addEventListener( 'click', event => {
            currentPage++;
            updateUp();
            updateDown();
            showCurrentPageItems();
        } );

        /**
         * Event listenr for own button
         */
        upButton.addEventListener( 'click', event => {
            currentPage--;
            updateUp();
            updateDown();
            showCurrentPageItems();
        } );

        /**
         * Kick it off
         */
        pagerInit();

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
    const homeCta = document.querySelector('.wp-block-home-callout');
    if(homeCta) {
        AOS.init({
            once: true,
            duration: 1000,
        });    
    }

}
document.addEventListener( "DOMContentLoaded", themeReady );