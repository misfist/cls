<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cls
 */

get_header(); ?>

	<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content/content', get_post_type() );

		the_post_navigation( array(
			'prev_text' => '&larr; %title',
			'next_text' => '%title &rarr;',
		) );

	endwhile; // End of the loop.
	?>
		<?php get_template_part( 'template-parts/component/cta', get_post_type() ); ?>

	</main><!-- #primary -->

<?php
get_footer();