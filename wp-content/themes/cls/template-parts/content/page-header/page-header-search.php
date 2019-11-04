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
			<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'cls' ), '<span class="search-phrase">' . get_search_query() . '</span>' ); ?></h1>
		</div>
	</div>
</header><!-- .entry-header -->
