<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package cls
 */

get_header(); ?>

	<main id="primary" class="site-main">

	<?php
	if ( have_posts() ) : ?>

		<?php get_template_part( 'template-parts/content/page-header/page-header', 'search' ); ?>

		<div class="page-content">

			<?php get_search_form(); ?>

			<div class="search-meta">
				<?php global $wp_query; ?>

				<?php echo sprintf( '%s Results Found', intval( $wp_query->found_posts ) ); ?>
			</div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content/content', 'excerpt' );

			endwhile;

			cls_the_post_navigation();

		else :

			get_template_part( 'template-parts/content/content', 'none' );

		endif; ?>


		</div>

	</main><!-- #primary -->

<?php
get_footer();
