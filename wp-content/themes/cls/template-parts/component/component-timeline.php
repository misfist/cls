<?php
/**
 * Template part for timeline component
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<?php
$args = array( 
	'taxonomy'               => 'year',
	'orderby'                => 'name',
	'order'					 => 'DESC',
    'hide_empty'             => true,
 );
 $year_query = new WP_Term_Query( $args );
 $terms = $year_query->get_terms();
 $count = count( $terms );
 $rows = ceil( $count/3 );
 if( $terms ) : ?>
	<div class="timeline-component">

		<?php include( locate_template( 'template-parts/component/timeline/thermometer.php', false, false ) ); ?>

		<?php include( locate_template( 'template-parts/component/timeline/controller.php', false, false ) ); ?>

		<?php include( locate_template( 'template-parts/component/timeline/content.php', false, false ) ); ?>

	</div><!-- .timeline-component -->
<?php
endif;
?>


