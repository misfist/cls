<?php
/**
 * Block: Home Callout
 */
?>
<aside class="wp-block-home-callout" data-animate data-animation-classes="animated fadein">
    <div class="home-callout__inner-container inner-container">
        <header class="block-header"><?php block_field( 'heading' ); ?></header>
        <div class="block-content"><?php block_field( 'content' ); ?></div>
        <footer class="block-footer"><a href="<?php block_field( 'link' ); ?>"<?php echo ( block_value('target') ) ? ' target="_blank"' : ''; ?>><?php block_field( 'link-text' ); ?><i class="icon arrow"></i></a></footer></div>
</aside>