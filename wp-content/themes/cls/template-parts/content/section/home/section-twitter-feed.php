<?php
/**
 * Template part for displaying Twitter feed
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>
<?php if( $handle = get_sub_field( 'twitter_handle' ) ) : ?>
    <div class="wp-block-titter-timeline has-background-color">
        <div class="titter-timeline__inner-container inner-container">
            <header class="block-header">
                <h2 class="block-title"><a href="<?php echo esc_url( 'https://twitter.com/' . $handle ); ?>" rel="me" target="_blank">@<?php echo esc_attr( $handle ); ?></a></h2>
            </header>
            <?php 
            echo do_shortcode( '[custom-twitter-feeds]' );
            ?>
        </div><!-- .inner-container -->
    </div><!-- .wp-block-titter-timeline -->
<?php endif; ?>