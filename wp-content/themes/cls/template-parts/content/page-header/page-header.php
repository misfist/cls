<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

?>
<header class="entry-header page-content-header<?php echo ( get_post_meta( get_the_ID(), 'intro_content', true ) ) ? ' has-intro' : '' ; ?>">
	<div class="container">
		<div class="header-content">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
		<div class="shape-separator">
			<div class="shape"></div>
		</div>
	</div>
</header><!-- .entry-header -->

<?php get_template_part( 'template-parts/component/intro' ); ?>