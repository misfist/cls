<?php
/**
 * Template Name: Our Story (History)
 * 
 * The template for displaying the Our Story page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

get_header(); ?>

<main id="primary"
    class="site-main<?php echo ( get_post_meta( get_the_ID(), 'intro_content', true ) ) ? ' has-intro' : '' ; ?>">

    <?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content/content', 'page-timeline' );

		endwhile; // End of the loop.
		?>

    <?php get_template_part( 'template-parts/component/cta' ); ?>

</main><!-- #primary -->

<?php
get_footer();