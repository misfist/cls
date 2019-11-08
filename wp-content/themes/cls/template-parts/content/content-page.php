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
	<?php if( !is_home() && !is_front_page() ) : ?>
		<?php get_template_part( 'template-parts/content/page-header/page-header' ); ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php cls_the_content_no_block( 'custom/content-footer' ); ?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'template-parts/content/page-footer/page-footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
