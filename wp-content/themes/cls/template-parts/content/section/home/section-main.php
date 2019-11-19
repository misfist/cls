<?php
/**
 * Template part for displaying main section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

if( !function_exists( 'have_rows' ) )  return; ?>

<div class="wp-block-columns has-2-columns main-content">
    <div class="wp-block-column">
        <?php get_template_part( 'template-parts/content/section/home/section-main', 'posts' ); ?>
    </div><!-- .wp-block-column -->
    <div class="wp-block-column">
        <?php get_template_part( 'template-parts/content/section/home/section-main', 'callout' ); ?>
    </div><!-- .wp-block-column -->
</div><!-- .wp-block-columns -->