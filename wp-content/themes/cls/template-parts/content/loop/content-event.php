<?php
/**
 * Template part for displaying event posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>
<?php
if( !function_exists( 'eo_get_the_occurrences_of' ) ) {
	return;
}

$class = ( eo_recurs() ) ? 'has-occurances fade-in' : 'fade-in' ;
$date_format = 'n/j/y'; // format: 1/13/20
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?> data-animation-in="fade-in">

	<div class="entry-media-wrapper">
		<div class="entry-media">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'event-flyer' );
			endif; ?>
		</div>
		<?php 
		/** Manually-entered dates and locations */
		if( function_exists( 'have_rows' ) && have_rows( 'dates_locations' ) ) : ?>
			<div class="event-dates">
				<table>
					<thead>
						<tr>
						<?php
						if( get_field( 'dates_locations_0_date' ) ) : ?>
							<th><h4 class="event-dates-title"><?php esc_html_e( 'Dates', 'cls' ); ?></h4></th>
						<?php endif; ?>
						<?php if( get_field( 'dates_locations_0_location' ) ) : ?>
							<th><h4 class="event-dates-title"><?php esc_html_e( 'Locations', 'cls' ); ?></h4></th>
						<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php
						while ( have_rows( 'dates_locations' ) ) : the_row(); ?>
							<tr>
							<?php if( get_field( 'dates_locations_0_date' ) ) : ?>
								<td><?php 
									$date_string = get_sub_field( 'date' );
									$date = DateTime::createFromFormat( 'Ymd', $date_string );
									echo $date->format( $date_format ); ?></td>
							<?php endif; ?>
							<?php if( get_field( 'dates_locations_0_location' ) ) : ?>
								<td><?php  the_sub_field( 'location' ); ?></td>
							<?php endif; ?>
							</tr>
						<?php 
						endwhile; ?>
					</tbody>
				</table>
			</div><!-- .event-dates -->
		<?php
		/** Dynamic dates */
		elseif( eo_recurs() ) : ?>
			<?php
			if( $occurrences = eo_get_the_occurrences_of( $post->ID ) ) : ?>
				<div class="event-dates">
					<h4 class="event-dates-title"><?php esc_html_e( 'Dates', 'cls' ); ?></h4>
					<ul>
						<?php
						$limit = 6;
						foreach( $occurrences as $occurrence ) : ?>
							<li><?php echo eo_format_datetime( $occurrence['start'], $date_format ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="entry-media-banner">
			<?php if( $hover_text = get_post_meta( $post->ID, 'link_text', true ) ) : ?>
				<a href="#" class="js-hover"><span class="link-text"><?php esc_html_e( $hover_text, 'cls' ); ?></span><i class="icon triangle"></i></a>
			<?php elseif( eo_recurs() ) : ?>
				<a href="#" class="js-hover"><span class="link-text"><?php esc_html_e( 'Dates', 'cls' ); ?></span><i class="icon triangle"></i></a>
			<?php endif; ?>
		</div>
	</div>
	
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more" rel="bookmark"><?php esc_html_e( 'Read More', 'cls' ); ?></a>
	</footer><!-- .entry-footer -->
	<?php

	?>
	
</article><!-- #post-<?php the_ID(); ?> -->
