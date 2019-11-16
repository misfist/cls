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
        <?php get_template_part( 'template-parts/content/section/section', 'landing-page' ); ?>
    </div><!-- .entry-content -->

    <?php if( is_page_template( 'page-templates/landing-page-get-help.php' ) ) : ?>
        <?php get_template_part( 'template-parts/content/page-footer/page-footer', 'posts' ); ?>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->