<?php
/**
 * Template part for animated CTA
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>
<?php if( $link_text = get_post_meta( get_the_ID(), 'cta-text', true ) ) : ?>
    <div class="wp-block-animated-cta">
        <div class="wp-block-animated-cta__inner-container inner-container">
            <div class="wrapper-l">
                <div class="cta-image"></div>
            </div><!-- .wrapper-l -->
            <div class="wrapper-r">
                <div class="cta-text">
                    <a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'cta-url', true ) ); ?>" class="cta-link"<?php echo ( $target = get_post_meta( get_the_ID(), 'cta-target', true ) ) ? ' target="_blank"  rel="noopener noreferrer"' : ''; ?>>
                    <?php echo esc_html( $link_text ); ?></a>
                </div><!-- .cta-text -->
            </div><!-- .wrapper-r -->
        </div><!-- .inner-container -->
    </div><!-- .wp-block-animated-cta -->
<?php endif; ?>