<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'fade-in' ); ?> data-animation-in="fade-in">
	<header class="entry-header">
		<?php the_date( get_option( 'date_format' ), '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more" rel="bookmark"><?php esc_html_e( 'Read More', 'cls' ); ?></a>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
