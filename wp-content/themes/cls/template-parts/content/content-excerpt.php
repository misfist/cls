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
	<div class="entry-media">
		<?php
		if ( has_post_thumbnail() ) :
			the_post_thumbnail();
		endif; ?>
	</div>
	<div class="entry-body">
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_excerpt();?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more" rel="bookmark"><?php esc_html_e( 'Read More', 'cls' ); ?></a>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
