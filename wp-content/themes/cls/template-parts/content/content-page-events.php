<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/content/content-page-header-events' ); ?>

	<?php get_template_part( 'template-parts/content/section/section', 'news' ); ?>

	<?php get_template_part( 'template-parts/content/section/section', 'events' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
