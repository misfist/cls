<?php
/**
 * Template part for animated CTA
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>
<?php if( $link = get_post_meta( get_the_ID(), 'cta_link', true ) ) : ?>
    <div class="wp-block-animated-cta">
        <div class="wp-block-animated-cta__inner-container inner-container">
            <div class="wrapper-l">
                <div class="cta-image"></div>
            </div><!-- .wrapper-l -->
            <div class="wrapper-r">
                <div class="cta-text">
                    <a href="<?php echo esc_url( $link['url'] ); ?>" class="cta-link"<?php echo ( $link['target'] ) ? ' target="_blank"  rel="noopener noreferrer"' : ''; ?>>
                    <?php echo esc_html( $link['title'] ); ?></a>
                </div><!-- .cta-text -->
            </div><!-- .wrapper-r -->
        </div><!-- .inner-container -->
    </div><!-- .wp-block-animated-cta -->
<?php endif; ?>