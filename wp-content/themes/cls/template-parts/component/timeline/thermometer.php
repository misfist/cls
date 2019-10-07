<?php
/**
 * Template part for timeline component
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<div id="thermometer-container" class="timeline-thermometer show-for-small-only" role="presentation">
	<ul class="thermometer">
	<?php
	$first = 0;
	$count = count( $terms );
	$last = $count - 1;
	$index = 0;
	foreach( $terms as $term ) :
		$is_end = ( $first === $index ) || ( $last === $index );
	?>

		<li class="timeline-tab-title<?php echo ( 0 === $index ) ? ' is-active' : '' ;?><?php echo ( 2 === $index ) ? ' active' : '' ;?><?php echo ( $is_end ) ? ' is-end' : '' ;?>" data-tick="year-<?php echo $term->slug;?>" data-year="<?php echo $term->slug;?>"><label><?php echo $term->name;?></label></li>

	<?php
	$index++;
	endforeach; ?>
	</ul>
	<div class="component-footer show-for-small-only"><a href="#timeline-controller-module" id="all-years-action" class="text-button open-button"><?php esc_html_e( 'See All Years', 'cls' ); ?></a></div>
</div><!-- .timeline-component -->