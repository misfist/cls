<?php
/**
 * Template part for displaying featured event
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
if( !function_exists( 'have_rows' ) )  return; ?>

<?php if( get_post_meta( get_the_ID(), 'has_featured_event', true ) ) : ?>
    <div class="wp-block-featured-event">
        <div class="featured-event__inner-container inner-container">
            <?php if( 'manual' === get_post_meta( get_the_ID(), 'type', true ) ) : ?>

                <?php if( $event = get_field( 'manual_post' ) ) : ?>

                    <article  class="post hentry">
                    <?php if ( $image = $event['image'] ) : ?>
                        <figure class="entry-media">
                            <?php echo wp_get_attachment_image( $image['ID'], 'event-flyer' ); ?>
                        </figure>
                    <?php endif; ?>
                    <div class="entry-body">
                        <header class="entry-header">
                            <h3 class="entry-title">
                                <?php if ( $link = $event['link'] ) : ?>
                                    <a href="<?php echo esc_url( $link['url'] ); ?>"<?php echo ( $link['target'] ) ? ' target="_blank"' : ''; ?>>
                                <?php endif; ?>
                                    <?php echo apply_filters( 'the_title', $title ); ?>
                                <?php if ( $link = $post['link'] ) : ?>
                                    </a>
                                <?php endif; ?>
                            </h3>
                        </header><!-- .entry-header -->
                        <div class="entry-content">
                            <?php if( $excerpt = $event['content'] ) : ?>
                                <?php echo apply_filters( 'the_content', $excerpt ); ?>
                            <?php endif; ?>
                        </div><!-- .entry-content -->
                        <footer class="entry-footer">
                            <?php if ( $link = $event['link'] ) : ?>
                                <a href="<?php echo esc_url( $link['url'] ); ?>"<?php echo ( $link['target'] ) ? ' target="_blank"' : ''; ?> class="read-more button large">
                                    <?php esc_html_e( 'Read More', 'cls' ); ?>
                                </a>
                            <?php endif; ?>
                        </footer><!-- .entry-footer -->                    
                    </div>
                </article><!-- .post -->

                <?php endif; ?>

            <?php else : ?>
                <?php if( $event = get_field( 'post' ) ) : ;
                    global $post; $post = $event;
                    setup_postdata( $post );
                    ?>
                        <?php get_template_part( 'template-parts/content/content', 'featured-event' ); ?>
                    <?php 
                    wp_reset_postdata();
                endif; ?>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>