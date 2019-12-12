<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/content/page-header/page-header' ); ?>

	<div class="entry-content">
	
		<?php 
			if( $content_heading = get_post_meta( $post->ID, 'content_heading', true ) ) : ?>

				<h2 class="entry-title"><?php echo apply_filters( 'the_title', $content_heading ); ?></h2>

			<?php 
			endif; ?>

			<?php 
			get_template_part( 'template-parts/component/component', 'timeline' );
		?>
	</div><!-- .entry-content -->

	<?php get_template_part( 'template-parts/content/page-footer/page-footer' ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
