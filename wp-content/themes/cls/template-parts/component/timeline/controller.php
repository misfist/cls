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
			<button type="button" class="pager page-up js-up" id="next"><i class="icon pager-up"></i><span class="screen-reader-text"><?php esc_html_e( 'Page Up', 'cls' ); ?></span></button>
			<button type="button" class="pager page-down js-down" id="previous"><i class="icon pager-down"></i><span class="screen-reader-text"><?php esc_html_e( 'Page Down', 'cls' ); ?></span></button>
		</div>
		
		<ul id="timeline-controls" class="timeline-nav" data-rows="<?php echo $rows; ?>" style="grid-template-rows: repeat(<?php echo $rows; ?>, auto);" data-tabs>
		<?php
		$index = 0;
		foreach( $terms as $term ) : ?>

			<li id="<?php echo $term->term_id; ?>" class="timeline-tab-title<?php echo ( 0 === $index ) ? ' is-active' : '' ;?>"><a href="#year-<?php echo $term->slug;?>" data-toggle="#year-<?php echo $term->slug;?>"><?php echo $term->name;?></a></li>

		<?php
		$index++;
		endforeach; ?>
		</ul>

		<button class="close-button" aria-label="Close modal" type="button">
			<span aria-hidden="true" class="icon"></span>
		</button>
	</div><!-- .timeline-wrapper -->
</nav><!-- .timeline-controls -->
