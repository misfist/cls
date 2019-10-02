<?php
/**
 * Template Name: Content Footer Bar & Image (T3)
 * 
 * The template for displaying the Our Story, Our Impact & Our Clients pages
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

get_header(); ?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
