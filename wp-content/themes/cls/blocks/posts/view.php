<?php
/**
 * Block: Curated Posts
 */
?>
<section class="curated-posts posts">
    <div class="curated-posts__inner-container">
        <header><h2 class="section-title"><?php block_field( 'block-title' ); ?></h2></header>
        <?php if ( block_rows( 'posts' ) ) :
            while ( block_rows( 'posts' ) ) : 
                block_row( 'posts' ); 
                $post = block_sub_value( 'post' );  ?>

                <article id="post-<?php echo $post->ID; ?>" class="post hentry">
                    <?php if ( has_post_thumbnail( $post->ID ) ) : ?>
                        <div class="entry-media">
                            <?php the_post_thumbnail( $post->ID ); ?>
                        </div>
                    <?php endif; ?>
                    <header class="entry-header">
                        <h3 class="entry-title"><a href="<?php echo get_permalink( $post->ID ); ?>" rel="bookmark"><?php echo apply_filters( 'the_title', $post->post_title ); ?></a></h3>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php if( $excerpt = block_sub_value( 'excerpt' ) ) : ?>
                            <?php echo apply_filters( 'the_content', $excerpt ); ?>
                        <?php else : ?>
                            <?php echo apply_filters( 'the_content', $post->excerpt ); ?>
                        <?php endif; ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" class="read-more" rel="bookmark"><?php esc_html_e( 'Read More', 'cls' ); ?></a>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php echo $post->ID; ?> -->
            <?php
            endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</section>