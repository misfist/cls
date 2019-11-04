<?php
/**
 * The template is used for displaying a single event details on the single event page.
 *
 *
 * @package Event Organiser (plug-in)
 * @since 1.7
 */
?>

<div class="event-meta">

	<!-- Is event recurring or a single event -->
	<?php if ( eo_recurs() ) :?>

		<!-- Event recurs - is there a next occurrence? -->
		<?php $next = eo_get_next_occurrence( get_option( 'date_format' ) );?>

		<?php if ( $next ) : ?>

			<div class="event-date">
				<h3 class="date-title"><?php esc_html_e( 'Date', 'cls' ); ?></h3>
				<div class="date-details">
				<?php if( $recurrence_description = get_post_meta( get_the_ID(), 'recurrence_description', true ) ) : ?>

					<div class="event-date-description"><?php esc_html_e( $recurrence_description, 'cls' ); ?></div>

				<?php else : ?>
					
					<time datetime="<?php echo eo_get_next_occurrence( 'Y-m-d' ); ?>"><?php echo $next; ?></time>
					
				<?php endif; ?>
				</div>
			</div>

			<div class="event-time">
				<h3 class="time-title"><?php esc_html_e( 'Time', 'cls' ); ?></h3>
				<div class="time-details">
					<time datetime="<?php echo eo_get_the_start( 'H:i' ); ?>"><?php eo_the_start( 'g:i' ); ?></time><span class="separator">-</span><time datetime="<?php echo eo_get_the_end( 'H:i' ); ?>"><?php eo_the_end( get_option( 'time_format' ) ); ?></time>
				</div>
			</div>

		<?php else : ?>
			<!-- Otherwise the event has finished (no more occurrences) -->
			<?php printf( '<p>' . __( 'This event finished on %s', 'cls' ) . '</p>', eo_get_schedule_last( 'd F Y', '' ) );?>
		<?php endif; ?>

		<?php
		/**
		 * Show upcoming events, if recurrence
		 */
		$upcoming = new WP_Query(array(
			'post_type'         => 'event',
			'event_start_after' => 'today',
			'posts_per_page'    => -1,
			'event_series'      => get_the_ID(),
			'group_events_by'   => 'occurrence',
		));

		if ( $upcoming->have_posts() ) : ?>
			<h4 class="upcoming-dates-title screen-reader-text"><?php esc_html_e( 'Upcoming Dates', 'cls' ); ?></h4>
			<ul class="upcoming-events screen-reader-text">

				<?php
				while ( $upcoming->have_posts() ) :
					$upcoming->the_post(); ?>
					<li><?php echo eo_format_event_occurrence(); ?></li>
				<?php 
				endwhile;
				wp_reset_postdata();
				//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
				wp_enqueue_script( 'eo_front' );
				?>
			</ul>
		<?php endif; ?>

		<?php
		/**
		 * Show location
		 */
		if ( eo_get_venue() ) :
			$tax = get_taxonomy( 'event-venue' ); ?>
			<div class="event-location">
				<h3 class="location-title"><?php esc_html_e( 'Location', 'cls' ); ?></h3>
				<div class="event-address">
					<?php eo_venue_name(); ?>
					<?php if( $address = eo_get_venue_address() ) : ?>

						<div class="address-street"><?php echo $address['address']; ?></div>
						<div class="city-state-zip">
							<span class="address-city"><?php echo $address['city']; ?></span>
							<span class="address-state"><?php echo $address['state']; ?></span>
							<span class="address-zip"><?php echo $address['postcode']; ?></span>
						</div>
					
				<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

	<?php else : 
		/**
		 * Show event date, for single date
		 */
		?>
			<div class="event-date">
				<h3 class="date-title"><?php esc_html_e( 'Date', 'cls' ); ?></h3>
				<div class="date-details">
					<time datetime="<?php echo eo_format_event_occurrence( 'Y-m-d' ); ?>"><?php echo eo_format_event_occurrence( get_option( 'date_format' ) ); ?></time>
				</div>
			</div>

			<div class="event-time">
				<h3 class="time-title"><?php esc_html_e( 'Time', 'cls' ); ?></h3>
				<div class="time-details">
					<time datetime="<?php echo eo_get_the_start( 'H:i' ); ?>"><?php eo_the_start( 'g:i' ); ?></time><span class="separator">-</span><time datetime="<?php echo eo_get_the_end( 'H:i' ); ?>"><?php eo_the_end( get_option( 'time_format' ) ); ?></time>
				</div>
			</div>

	<?php endif; ?>

	<?php
	if( $cta = get_post_meta( get_the_ID(), 'cta', true ) ) :
	?>
		<div class="event-cta">
			<a href="<?php echo esc_url( $cta['url'] ); ?>" class="button accent"<?php echo ( $cta['target'] ) ? ' target="_blank"' : ''; ?>><?php esc_html_e( $cta['title'] ); ?></a>
		</div>
		
	<?php
	endif;
	?>

	<?php do_action( 'eventorganiser_additional_event_meta' ) ?>

</div><!-- .entry-meta -->
