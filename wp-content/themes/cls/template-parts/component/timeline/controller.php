<?php
/**
 * Template part for timeline component
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<nav id="timeline-controller-module" class="timeline-controls"  role="pagination">
	<div class="timeline-wrapper wrapper">
		<div class="timeline-pagination">
			<a href="#" class="previous ">&lt;<span class="screen-reader-text"><?php esc_html_e( 'Previous', 'cls' ); ?></span></a>
			<a href="#" class="next">&gt;<span class="screen-reader-text"><?php esc_html_e( 'Next', 'cls' ); ?></span></a>
		</div>
		
		<ul id="timeline-controls" class="timeline-nav" data-rows="<?php echo $rows; ?>" style="grid-template-rows: repeat(<?php echo $rows; ?>, auto);" data-tabs>
		<?php
		$index = 0;
		foreach( $terms as $term ) : ?>

			<li id="<?php echo $term->term_id; ?>" class="timeline-tab-title<?php echo ( 0 === $index ) ? ' is-active' : '' ;?>"><a href="#year-<?php echo $term->slug;?>"><?php echo $term->name;?></a></li>

		<?php
		$index++;
		endforeach; ?>
		</ul>

		<button class="close-button" data-close aria-label="Close modal" type="button">
			<span aria-hidden="true">&times;</span>
		</button>
	</div><!-- .timeline-wrapper -->
</nav><!-- .timeline-controls -->
