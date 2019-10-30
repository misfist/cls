<?php
/**
 * Template part for animated CTA for single events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>
<div class="wp-block-animated-cta">
    <div class="wp-block-animated-cta__inner-container inner-container">
        <div class="wrapper-l">
            <div class="cta-image"></div>
        </div><!-- .wrapper-l -->
        <div class="wrapper-r">
            <div class="cta-text">
                <a href="<?php echo esc_url( get_permalink( cls_get_page_id_by_path( 'get-help' ) ) ); ?>" class="cta-link">
                <?php esc_html_e( "Can't attend an event and need help?", 'cls' ); ?></a>
            </div><!-- .cta-text -->
        </div><!-- .wrapper-r -->
    </div><!-- .inner-container -->
</div><!-- .wp-block-animated-cta -->
