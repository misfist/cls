<?php
/**
 * Template part for timeline component
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<div class="content-section fade-in" data-animate="fade-in fade-out" data-tabs-content="timeline-controls">
	<?php
	$index = 0;
	foreach( $terms as $term ) : ?>

		<?php
		$post_type = 'history';
		$tax_query = array(
			array(
				'taxonomy'         => 'history-year',
				'terms'            => $term->term_id,
				'field'            => 'term_id',
			),
		);
		$post_args = array(
			'tax_query'		=> $tax_query,
			'post_type'		=> $post_type
		);
		$post_query = new WP_Query( $post_args );
		if( $post_query->have_posts() ) : ?>

		<div id="year-<?php echo $term->slug; ?>" data-toggler data-animate="fade-in fade-out" class="term-group timeline-tabs-panel<?php echo (0 === $index) ? ' is-active' : '' ;?>">
			<header class="term-header">
				<h2 class="term-title"><?php esc_html_e( $term->name ); ?></h2>
			</header>
			<?php
			while( $post_query->have_posts() ) : $post_query->the_post(); ?>

				<?php get_template_part( 'template-parts/content/content', $post_type ); ?>

			<?php
			endwhile;
			wp_reset_postdata(); ?>

		</div>

		<?php
		endif; ?>

	<?php
	$index++;
	endforeach; ?>
</div><!-- .content-section -->
