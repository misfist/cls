<?php
/**
 * Template Name: News & Events (T2)
 * 
 * The template for displaying the News & Events page
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

			get_template_part( 'template-parts/content/content', 'page-events' );

		endwhile; // End of the loop.
		?>

		<?php get_template_part( 'template-parts/component/cta', 'event' ); ?>

	</main><!-- #primary -->

<?php
get_footer();
