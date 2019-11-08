<?php
/**
 * Template Name: Wide Width (T3)
 * 
 * The template for displaying the Our Impact, Our Clients, etc
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
