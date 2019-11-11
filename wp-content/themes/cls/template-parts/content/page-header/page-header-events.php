<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

?>
<header class="entry-header page-content-header<?php echo ( get_post_meta( get_the_ID(), 'has_featured_event', true ) ) ? ' has-featured-event' : ''; ?>">
	<div class="container">
		<div class="header-content">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<?php get_template_part( 'template-parts/component/featured-event' ); ?>
		</div>
		<div class="shape-separator">
			<div class="shape"></div>
		</div>
	</div>
</header><!-- .entry-header -->