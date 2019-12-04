/**
 * Load More
 *
 * Handles loading more posts
 */
( function($) {

	console.log('load more loaded');

	let postPage = 2;
	let eventPage = 2;

	const postsList = document.querySelector( '.section-posts .posts-list' );
	if( postsList ) {
		const loadPosts = document.querySelector( '.js-load-more-posts' );
		const maxPages = loadPosts.getAttribute( 'data-max-pages' );
		
		loadPosts.addEventListener( 'click', function( event ) {
			event.preventDefault();

			if( maxPages > postPage ) {
				get_posts( { paged: postPage } );
			} else {
				document.querySelector( '.js-load-more-posts' ).setAttribute( 'disabled', true );
			}
			
		} );

	}

	const eventsList = document.querySelector( '.section-events .posts-list' );
	if( eventsList ) {
		const loadEvents = document.querySelector( '.js-load-more-events' );
		const maxPages = loadEvents.getAttribute( 'data-max-pages' );

		loadEvents.addEventListener( 'click', function(event) {
			event.preventDefault();

			if( maxPages > eventPage ) {
				get_events( { paged: eventPage } );
			} else {
				document.querySelector( '.js-load-more-events' ).setAttribute( 'disabled', true );
				console.log( 'there are no more' );
			}
		} );
	}

	/**
	 * Get Posts
	 * @param  obj args
	 * @return obj response
	 */
	function get_posts( args ) {

		$.ajax({
			url: clsLoadMore.ajax_url,
			data: {
				action: 'do_load_more_posts',
				/* Action corresponds to `wp_ajax_do_` and `wp_ajax_nopriv_` actions */
				nonce: clsLoadMore.nonce,
				args: args
			},
			type: 'POST'
		})
		.success( function( response, textStatus, XMLHttpRequest ) {
			postsList.insertAdjacentHTML( 'beforeend', response.content );
			// console.log( response );
		})
		.error( function( response ) {
			//console.log('error', response);
		})
		.complete( function( response ) {
			const maxPages = document.querySelector( '.js-load-more-posts' ).getAttribute( 'data-max-pages' );
			if( maxPages > postPage ) {
				postPage++;
			} else {
				document.querySelector( '.js-load-more-posts' ).setAttribute( 'disabled', true );
			}
			
			// console.log( maxPages > postPage );
		});

	}

	/**
	 * Get Events
	 * @param  obj args
	 * @return obj response
	 */
	function get_events( args ) {

		$.ajax({
			url: clsLoadMore.ajax_url,
			data: {
				action: 'do_load_more_events',
				/* Action corresponds to `wp_ajax_do_` and `wp_ajax_nopriv_` actions */
				nonce: clsLoadMore.nonce,
				args: args
			},
			type: 'POST'
		})
		.success( function( response, textStatus, XMLHttpRequest ) {
			eventsList.insertAdjacentHTML( 'beforeend', response.content );
			// console.log( response );
		})
		.error( function( response ) {
			//console.log('error', response);
		})
		.complete( function( response ) {
			const maxPages = document.querySelector( '.js-load-more-events' ).getAttribute( 'data-max-pages' );
			if( maxPages > eventPage ) {
				eventPage++;
			} else {
				document.querySelector( '.js-load-more-events' ).setAttribute( 'disabled', true );
			}
			// console.log( 'complete', maxPages, eventPage, maxPages >= eventPage );
		});

	}

})( jQuery );
