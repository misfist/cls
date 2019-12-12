<?php
/**
 * Template part for displaying back to page link
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
if( !function_exists( 'get_field' ) )  return; ?>

<?php if( $link = get_field( 'back_to_link' ) ) : ?>
    <div class="entry-footer">
        <div class="wp-block-custom-back-link">
            <a href="<?php echo esc_url( $link['url'] ); ?>"><?php esc_html_e(  $link['title'], 'cls' ); ?></a>
        </div>
    </div><!-- .entry-footer -->
<?php endif; ?>