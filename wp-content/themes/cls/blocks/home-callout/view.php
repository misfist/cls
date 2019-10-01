<?php
/**
 * Block: Home Callout
 */
?>
<aside class="home-callout">
    <div class="home-callout__inner-container">
        <header><?php block_field( 'heading' ); ?></header>
        <div><?php block_field( 'content' ); ?></div>
        <footer><a href="<?php block_field( 'link' ); ?>" target="_blank"><?php block_field( 'link-text' ); ?></a></footer>
    </div>
</aside>