<?php
/**
 * Template Name: Leadership Page (T1)
 * 
 * The template for displaying the Leadership page
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

			get_template_part( 'template-parts/content/content-page' );

		endwhile; // End of the loop.
		?>

    <?php get_template_part( 'template-parts/component/cta' ); ?>

</main><!-- #primary -->

<?php
get_footer();