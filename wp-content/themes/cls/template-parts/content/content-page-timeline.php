<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/content/page-header/page-header' ); ?>

	<div class="entry-content">
		<?php 
			cls_render_block( 'core/heading' );

			get_template_part( 'template-parts/component/component', 'timeline' );
		?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'template-parts/content/page-footer/page-footer' ); ?>

	<footer class="entry-footer"></footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
