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
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
