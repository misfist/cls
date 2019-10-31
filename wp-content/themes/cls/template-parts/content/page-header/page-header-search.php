<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

?>
<header class="entry-header page-content-header">
	<div class="container">
		<div class="header-content">
			<?php printf( esc_html__( 'Search Results for: %s', 'cls' ), '<span>' . get_search_query() . '</span>' ); ?>
		</div>
		<div class="shape-separator">
			<div class="shape"></div>
		</div>
	</div>
</header><!-- .entry-header -->
