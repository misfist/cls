<?php
/**
 * Template Name: Narrow Width (6B)
 * 
 * The template for displaying the Our Work and othr general pages
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
