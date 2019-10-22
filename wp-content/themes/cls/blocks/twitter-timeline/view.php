<?php
/**
 * Block: Twitter Timeline
 */
?>
<div class="wp-block-titter-timeline has-background-color">
    <div class="titter-timeline__inner-container inner-container">
        <header class="block-header">
            <h2 class="block-title"><a href="https://twitter.com/<?php echo block_value( 'handle' ); ?>" rel="me" target="_blank"><?php block_field( 'handle' ); ?></a></h2>
        </header>
        <?php 
        echo do_shortcode( '[custom-twitter-feeds]' );
        ?>
    </div>
</div>