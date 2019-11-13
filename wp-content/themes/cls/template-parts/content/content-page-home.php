<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">

		<?php if( function_exists( 'have_rows' ) ) : ?>

			<?php 
			if( have_rows( 'sections' ) ): 
				while ( have_rows( 'sections' ) ) : the_row();

					get_template_part( 'template-parts/content/section/home/section', get_row_layout() );
				
				endwhile;
			endif;
			?>

		<?php else : ?>

			<?php the_content(); ?>

		<?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
