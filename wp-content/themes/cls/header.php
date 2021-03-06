<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cls
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'is-fixed' ); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cls' ); ?></a>

	<header id="masthead" class="site-header">

		<?php if( get_theme_mod( 'notice_text' ) ) : ?>
			<?php get_template_part( 'template-parts/header/site', 'notice' ); ?>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

		<?php get_template_part( 'template-parts/header/site', 'navigation' ); ?>
	</header><!-- #masthead -->
