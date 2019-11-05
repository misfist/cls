<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		if ( is_singular() ) : ?>

			<?php get_template_part( 'template-parts/content/page-header/page-header' ); ?>

		<?php else : ?>

			<header class="entry-header">

				<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
				<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail();
				endif; ?>

				<?php 
				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php gutenberg_starter_theme_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php
				endif; ?>

			</header><!-- .entry-header -->

		<?php endif; ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cls' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cls' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if( is_singular( array( 'post' ) ) ) : ?>
			<?php get_template_part( 'template-parts/content/page-footer/back-link', 'events' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
