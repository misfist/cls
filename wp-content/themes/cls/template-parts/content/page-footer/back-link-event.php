<?php
/**
 * Template part for displaying back to News & Events page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<div class="wp-block-custom-back-link">
    <a href="<?php echo esc_url( get_site_url( null, '/about/news-events/', null ) ); ?>"><?php esc_html_e( 'Back to News & Events', 'cls'); ?></a>
</div>