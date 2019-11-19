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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?> data-animation-in="fade-in">

	<div class="entry-media-wrapper">
		<div class="entry-media">
			<?php
			if ( has_post_thumbnail() ) :
				the_post_thumbnail( 'event-flyer' );
			endif; ?>
		</div>
		<?php if( eo_recurs() ) : ?>
			<?php
			if( $occurrences = eo_get_the_occurrences_of( $post->ID ) ) : ?>
				<div class="event-dates">
					<h4 class="event-dates-title"><?php esc_html_e( 'Dates', 'cls' ); ?></h4>
					<ul>
						<?php
						$limit = 6;
						foreach( $occurrences as $occurrence ) : ?>
							<li><?php echo eo_format_datetime( $occurrence['start'], get_option( 'date_format' ) ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="entry-media-banner">
			<?php if( eo_recurs() ) : ?>
				<a href="#" class="js-hover"><span class="link-text"><?php esc_html_e( 'Dates', 'cls' ); ?></span><i class="icon triangle"></i></a>
			<?php else : ?>
				<span class="link-text">No recurrances, so what goes?</span>
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
	// $occurrences = eo_get_the_occurrences_of( $post->ID );
	// if( $occurrences ) {
	// 	echo '<pre>';
	// 	var_dump( $occurrences );
	// 	echo '</pre>';
	// 	// echo '<ul>';
	// 	// foreach( $occurrences as $occurrence) {
	// 	// 	var_dump( $occurrence );
	// 	// 	//  $start = eo_format_datetime( $occurrence['start'] , 'jS F ga' );
	// 	// 	//  $end = eo_format_datetime( $occurrence['end'] , 'jS F ga' );
	// 	// 	//  printf( '<li> This event starts on the %s and ends on the %s </li>', $start, $end );
	// 	// 	//  echo eo_format_datetime( $include_date['start'], 'c' );
	// 	// }
	// 	// echo '</ul>';
	// }
	?>
	
</article><!-- #post-<?php the_ID(); ?> -->
