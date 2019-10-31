<?php
/**
 * Template Name: Grid Content
 * 
 * The template for displaying the Join Our Team, Our Work, Get Help
 *
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

		<?php get_template_part( 'template-parts/component/cta' ); ?>
		
	</main><!-- #primary -->

<?php
get_footer();
