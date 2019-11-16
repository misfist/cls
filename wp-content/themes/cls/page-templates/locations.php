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

	<main id="primary" class="site-main<?php echo ( get_post_meta( get_the_ID(), 'intro_content', true ) ) ? ' has-intro' : '' ; ?>">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content/content-page' );

			if( $map = get_post_meta( get_the_ID(), 'content', true ) ) : ?>

				<?php echo do_shortcode( $map ); ?>
				
			<?php
			endif;

		endwhile; // End of the loop.
		?>

		<?php get_template_part( 'template-parts/component/cta' ); ?>

	</main><!-- #primary -->

<?php
get_footer();
