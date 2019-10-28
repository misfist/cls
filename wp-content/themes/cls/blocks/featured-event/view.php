<?php
/**
 * Block: Featured Event
 */
?>
<div class="wp-block-featured-event">
    <div class="featured-event__inner-container inner-container">
        <?php if( 'manual' === block_value( 'type' ) ) : ?>
            <article  class="post hentry">
                <?php if ( $image = block_value( 'image' ) ) : ?>
                    <figure class="entry-media">
                        <img src="<?php block_field( 'image' ); ?>" />
                    </figure>
                <?php endif; ?>
                <div class="entry-body">
                    <header class="entry-header">
                        <h3 class="entry-title"><a href="<?php echo esc_url( block_value( 'link' ) ); ?>"<?php echo ( block_value( 'target' ) ) ? ' target="_blank"' : ''; ?>><?php block_field( 'title' ); ?></a></h3>
                    </header><!-- .entry-header -->
                    <div class="entry-content">
                        <?php if( $excerpt = block_value( 'excerpt' ) ) : ?>
                            <?php echo apply_filters( 'the_content', $excerpt ); ?>
                        <?php endif; ?>
                    </div><!-- .entry-content -->
                    <footer class="entry-footer">
                        <a href="<?php echo esc_url( block_value( 'link' ) ); ?>" class="read-more"<?php echo ( block_value( 'target' ) ) ? ' target="_blank"' : ''; ?>><?php esc_html_e( 'Read More', 'cls' ); ?></a>
                    </footer><!-- .entry-footer -->                    
                </div>
            </article><!-- .post -->
        <?php else : ?>
            <?php if( $event = block_value( 'post' ) ) :
                $args = array(
                    'posts_per_page'    => 1,
                    'post_type'         => 'event',
                    'p'                 => $event->ID,
                    'suppress_filters'  => false
                );
                $posts_array = get_posts( $args );
                if( !empty( $posts_array ) ) :
                    global $post; $post = $posts_array[0];
                    setup_postdata( $post );
                    ?>
                        <?php get_template_part( 'template-parts/content/content', 'home-featured' ); ?>
                    <?php 
                    wp_reset_postdata();
                endif;
            endif; ?>
        <?php endif; ?>
    </div>
</div>