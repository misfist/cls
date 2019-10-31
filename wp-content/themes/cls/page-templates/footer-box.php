<?php
/**
 * Template Name: Content Footer Bar (T4)
 * 
 * The template for displaying the Our Clients, Our Impact, Get Help
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

			get_template_part( 'template-parts/content/content', 'page' );

		endwhile; // End of the loop.
		?>

		<?php get_template_part( 'template-parts/component/cta' ); ?>
		
	</main><!-- #primary -->

<?php
get_footer();
