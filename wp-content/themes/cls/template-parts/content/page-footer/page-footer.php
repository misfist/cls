<?php
/**
 * Template part for displaying page footer
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
if( !function_exists( 'get_field' ) )  return; ?>

<?php if( $footer = get_field( 'footer' ) ) : ?>
    <section class="wp-block-custom-content-footer">
        <div class="wp-block-custom-content-footer__inner-container inner-container">
            <div class="wp-block-columns has-2-columns">
                <div class="wp-block-column">
                    <?php if( $title = $footer['title'] ) : ?>
                    <h2><?php echo apply_filters( 'the_title', $title ); ?></h2>
                    <?php endif; ?>

                    <?php if( $content = $footer['content'] ) : ?>
                    <?php echo apply_filters( 'the_content', $content ); ?>
                    <?php endif; ?>

                    <?php if( $image = $footer['image'] ) : ?>
                    <figure class="wp-block-image">
                        <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
                    </figure>
                    <?php endif; ?>

                </div><!-- .wp-block-column -->

                <div class="wp-block-column">
                    <?php if( $quote = $footer['quote'] ) : ?>
                    <blockquote class="wp-block-quote">
                        <?php echo apply_filters( 'the_content', $quote['content'] ); ?>
                        <?php if( $citation = $quote['citation'] ) : ?>
                        <cite><?php esc_html_e( $citation, 'cls' ); ?></cite>
                        <?php endif; ?>
                    </blockquote>
                    <?php endif; ?>
                </div><!-- .wp-block-column -->
            </div>
        </div>
    </section><!-- .wp-block-custom-content-footer -->
<?php endif; ?>