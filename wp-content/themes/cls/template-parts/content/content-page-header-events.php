<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

?>
<header class="entry-header page-content-header<?php echo ( has_block( 'block-lab/featured-event' ) ) ? ' has-featured-event' : ''; ?>">
	<div class="container">
		<div class="header-content">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<?php get_template_part( 'template-parts/content/content', 'featured-event' ); ?>
		</div>
		<div class="shape-separator">
			<div class="shape"></div>
		</div>
	</div>
</header><!-- .entry-header -->