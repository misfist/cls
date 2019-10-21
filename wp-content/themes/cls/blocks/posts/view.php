<?php
/**
 * Block: Curated Posts
 */
?>
<section class="wp-block-curated-posts posts">
    <div class="curated-posts__inner-container">
        <header><h2 class="section-title"><?php block_field( 'block-title' ); ?></h2></header>
        <?php if ( block_rows( 'posts' ) ) :
            while ( block_rows( 'posts' ) ) : 
                block_row( 'posts' ); 
                global $post;
                $post = block_sub_value( 'post' ); 
                setup_postdata( $post );
                ?>
                    <?php get_template_part( 'template-parts/content/content', 'home-featured' ); ?>

            <?php
            endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</section>