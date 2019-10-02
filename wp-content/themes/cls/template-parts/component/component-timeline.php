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
 if( $year_query->get_terms() ) : ?>
	<div class="timeline-component">
		<nav class="timeline-controls"  role="pagination">
			<a href="#" class="previous">&lt;<span class="screen-reader-text"><?php esc_html_e( 'Previous', 'cls' ); ?></span></a>
			<a href="#" class="next">&gt;<span class="screen-reader-text"><?php esc_html_e( 'Next', 'cls' ); ?></span></a>
			<ul class="timeline-nav" role="navigation">
			<?php
			foreach( $year_query->get_terms() as $term ) : ?>

				<li id="<?php echo $term->term_id; ?>"><a href="#year-<?php echo $term->slug;?>"><?php echo $term->name;?></a></li>

			<?php
			endforeach; ?>
			</ul>
		</nav><!-- .timeline-controls -->

		<div class="content-section">
		<?php
		foreach( $year_query->get_terms() as $term ) : ?>

			<?php
			$post_type = 'history';
			$tax_query = array(
				array(
					'taxonomy'         => 'year',
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

			<div id="year-<?php echo $term->slug; ?>" class="term-group">
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
		endforeach; ?>
		</div><!-- .content-section -->

	</div><!-- .timeline-component -->
<?php
endif;
?>


