<?php
/**
 * Template part for displaying news posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<?php if( have_rows( 'posts' ) ): ?>
    <div class="wp-block-curated-posts adhoc-posts">
        <div class="curated-posts__inner-container inner-container">
        <?php while( have_rows( 'posts' ) ): the_row(); ?>

            <?php if( $heading = get_sub_field( 'section_title' ) ) : ?>
                <header class="block-header">
                    <h2 class="block-title"><?php echo esc_textarea( $heading ); ?></h2>
                </header>
            <?php endif; ?>

            <?php if( $posts = get_sub_field( 'posts' ) ) : 
                global $post; ?>

                <?php foreach( $posts as $item ) : ?>
                    
                    <?php if( 'dynamic' === $item['type'] ) : 
                        $post = $item['post'];
                        setup_postdata( $post ); ?>

                        <?php get_template_part( 'template-parts/content/loop/content', 'home-featured' ); ?>

                        <?php wp_reset_postdata(); ?>

                    <?php elseif( 'manual' === $item['type']  ) :
                        $post = $item['manual_post']; ?>
                        
                        <article class="post hentry">
                            <?php if ( $image = $post['image'] ) : ?>
                                <figure class="entry-media">
                                    <?php echo wp_get_attachment_image( $image['ID'], 'editorial-thumb' ); ?>
                                </figure><!-- .entry-media -->
                            <?php endif; ?>
                            <div class="entry-body">
                                <?php if ( $title = $post['title'] ) : ?>
                                    <header class="entry-header">
                                        <h3 class="entry-title">
                                            <?php if ( $link = $post['link'] ) : ?>
                                                <a href="<?php echo esc_url( $link['url'] ); ?>"<?php echo ( $link['target'] ) ? ' target="_blank"' : ''; ?>>
                                            <?php endif; ?>
                                                <?php echo apply_filters( 'the_title', $title ); ?>
                                            <?php if ( $link = $post['link'] ) : ?>
                                                </a>
                                            <?php endif; ?>
                                        </h3>
                                    </header><!-- .entry-header -->
                                <?php endif; ?>
                                <div class="entry-content">
                                    <?php if( $excerpt = $post['content'] ) : ?>
                                        <?php echo apply_filters( 'the_content', $excerpt ); ?>
                                    <?php endif; ?>
                                </div><!-- .entry-content -->
                                <footer class="entry-footer">
                                    <?php if ( $link = $post['link'] ) : ?>
                                        <a href="<?php echo esc_url( $link['url'] ); ?>" class="read-more"<?php echo ( $link['target'] ) ? ' target="_blank"' : ''; ?>><?php esc_html_e( 'Read More', 'cls' ); ?></a>
                                    <?php endif; ?>
                                </footer><!-- .entry-footer -->
                            </div><!-- .entry-body -->
                        </article><!-- .post -->

                    <?php endif; ?>
                    
                <?php endforeach; ?>

            <?php endif; ?>

         <?php endwhile; ?>
        </div><!-- .inner-container -->
    </div><!-- .wp-block-curated-posts -->
<?php endif; ?>