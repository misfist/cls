<?php
/**
 * Template Name: Locations (T5)
 * 
 * The template for displaying the Locations page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

get_header(); ?>

	<main id="primary" class="site-main<?php echo ( has_block( 'custom/intro' ) ) ? ' has-intro' : '' ; ?>">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content/content-page', 'no-footer' );

		endwhile; // End of the loop.
		?>

		<?php get_template_part( 'template-parts/component/cta' ); ?>

	</main><!-- #primary -->

<?php
get_footer();
