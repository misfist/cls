<?php
/**
 * Block: Curated Posts
 */
?>
<div class="wp-block-curated-posts posts">
    <div class="curated-posts__inner-container">
        <?php if( $block_title = block_value( 'block-title' ) ) : ?>
            <header class="block-header"><h2 class="block-title"><?php echo $block_title; ?></h2></header>
        <?php endif; ?>
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
            reset_block_rows( 'posts' );
        endif; ?>
    </div>
</div>