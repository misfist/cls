<?php
/**
 * Template part for displaying history
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
	</div><!-- .entry-media -->
	<div class="entry-body">
		<header class="entry-header">
			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php the_content();?>
		</div><!-- .entry-content -->
	</div><!-- .entry-body -->
	<footer class="entry-footer"></footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
