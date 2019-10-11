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
	<div class="thermometer-wrapper">
	<?php
		$first = 0;
		$count = count( $terms );
		$last = $count - 1;
		$index = 0; 
		?>
		<div class="date-label"><?php echo $terms[$last]->name;?></div>
		<ul class="thermometer">
		<?php
		foreach( $terms as $term ) :
			$is_end = ( $first === $index ) || ( $last === $index );
		?>

			<li class="timeline-tab-title date-tick<?php echo ( 0 === $index ) ? ' is-active' : '' ;?>" data-tick="year-<?php echo $term->slug;?>" data-year="<?php echo $term->slug;?>"><span><?php echo $term->name;?></span></li>

		<?php
		$index++;
		endforeach; ?>
		</ul>
		<div class="date-label"><?php echo $terms[0]->name;?></div>
	</div>
	<div class="component-footer show-for-small-only"><a href="#timeline-controller-module" id="all-years-action" class="text-button open-button"><?php esc_html_e( 'See All Years', 'cls' ); ?></a></div>
</div><!-- .timeline-component -->
