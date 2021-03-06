<?php
/**
 * Template Name: Section Landing Page - Get Help (T4A)
 * 
 * The template for displaying the Get Help
 *
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

			get_template_part( 'template-parts/content/content-page', 'landing-page' );

		endwhile; // End of the loop.
		?>

    <?php get_template_part( 'template-parts/component/cta' ); ?>

</main><!-- #primary -->

<?php
get_footer();