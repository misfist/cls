<?php
/**
 * Block: Curated Posts - Adhoc
 */
?>
<div class="wp-block-curated-posts adhoc-posts">
    <div class="curated-posts__inner-container inner-container">
        <?php if( $block_title = block_value( 'block-title' ) ) : ?>
            <header class="block-header"><h2 class="block-title"><?php echo $block_title; ?></h2></header>
        <?php endif; ?>
        <?php if ( block_rows( 'posts' ) ) :
            while ( block_rows( 'posts' ) ) : 
                block_row( 'posts' );
                ?>
                <article  class="post hentry">
                    <?php if ( $image = block_sub_value( 'image' ) ) : ?>
                        <figure class="entry-media">
                            <img src="<?php block_sub_field( 'image' ); ?>" />
                        </figure>
                    <?php endif; ?>
                    <div class="entry-body">
                        <header class="entry-header">
                            <h3 class="entry-title"><a href="<?php echo esc_url( block_sub_value( 'link' ) ); ?>"<?php echo ( block_sub_value( 'target' ) ) ? ' target="_blank"' : ''; ?>><?php block_sub_field( 'title' ); ?></a></h3>
                        </header>
                        <div class="entry-content">
                            <?php if( $excerpt = block_sub_value( 'excerpt' ) ) : ?>
                                <?php echo apply_filters( 'the_content', $excerpt ); ?>
                            <?php endif; ?>
                        </div>
                        <footer class="entry-footer">
                            <a href="<?php echo esc_url( block_sub_value( 'link' ) ); ?>" class="read-more"<?php echo ( block_value('target') ) ? ' target="_blank"' : ''; ?>><?php esc_html_e( 'Read More', 'cls' ); ?></a>
                        </footer></div>
                </article>
            <?php
            endwhile;
            reset_block_rows( 'posts' );
        endif; ?>
    </div>
</div>