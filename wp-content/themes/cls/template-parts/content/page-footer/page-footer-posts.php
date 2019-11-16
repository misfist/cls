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

            <?php if( $title = $footer['title'] ) : ?>
                <h2><?php echo apply_filters( 'the_title', $title ); ?></h2>
            <?php endif; ?>

            <?php if( $content = $footer['content'] ) : ?>
                <?php echo apply_filters( 'the_content', $content ); ?>
            <?php endif; ?>

            <?php if( $posts = $footer['posts'] ) : 
                global $post;
                $posts = array_slice( $posts, 0, 2 );
                $count = 1;
                ?>

                <div class="wp-block-columns has-2-columns post-content">

                    <div class="wp-block-column">

                    <?php foreach( $posts as $item ) : ?>

                        <?php if( 'dynamic' === $item['type'] ) : 
                            $post = $item['post'];
                            setup_postdata( $post ); ?>

                            <?php get_template_part( 'template-parts/content/content-list', 'footer-post' ); ?>

                            <?php wp_reset_postdata(); ?>

                        <?php elseif( 'manual' === $item['type']  ) :
                            $post = $item['manual_post']; ?>

                            <article class="post hentry">
                                <?php if ( $image = $post['image'] ) : ?>
                                <figure class="entry-media">
                                    <?php echo wp_get_attachment_image( $image['ID'], 'editorial-thumb' ); ?>
                                </figure>
                                <?php endif; ?>

                                <div class="entry-body">
                                    <?php if ( $title = $post['title'] ) : ?>
                                        <header class="entry-header">
                                        <div class="entry-meta">
                                            <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php the_time( 'd/m/Y' ); ?></time></div>
                                            <h3 class="entry-title">
                                                <?php if ( $link = $post['link'] ) : ?>
                                                <a href="<?php echo esc_url( $link['url'] ); ?>"
                                                    <?php echo ( $link['target'] ) ? ' target="_blank"' : ''; ?>>
                                                    <?php endif; ?>
                                                    <?php echo apply_filters( 'the_title', $title ); ?>
                                                    <?php if ( $link = $post['link'] ) : ?>
                                                </a>
                                                <?php endif; ?>
                                            </h3>
                                        </header>
                                    <?php endif; ?>

                                    <div class="entry-content">
                                        <?php if( $excerpt = $post['content'] ) : ?>
                                            <?php echo apply_filters( 'the_content', $excerpt ); ?>
                                        <?php endif; ?>
                                    </div>

                                    <footer class="entry-footer">
                                        <?php if ( $link = $post['link'] ) : ?>
                                        <a href="<?php echo esc_url( $link['url'] ); ?>" class="read-more"
                                            <?php echo ( $link['target'] ) ? ' target="_blank"' : ''; ?>><?php esc_html_e( 'Read More', 'cls' ); ?></a>
                                        <?php endif; ?>
                                    </footer>
                                </div>
                            </article>

                        <?php endif; ?>

                        <?php if( 1 === $count ) : ?>
                            </div><!-- .wp-block-column -->
                            <div class="wp-block-column">
                        <?php endif; ?>     

                    <?php 
                    $count++;
                    endforeach; ?>

                    </div><!-- .wp-block-column -->

                </div><!-- .wp-block-columns -->

            <?php endif; ?>

    </section><!-- .wp-block-custom-content-footer -->
<?php endif; ?>