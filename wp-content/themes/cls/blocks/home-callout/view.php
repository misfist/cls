<?php
/**
 * Block: Home Callout
 */
?>
<aside class="wp-block-home-callout" >
    <div class="home-callout__inner-container inner-container">
        <header class="block-header" data-aos="zoom-in-right" data-aos-delay="0"><?php block_field( 'heading' ); ?></header>
        <div class="block-content" data-aos="zoom-in-left" data-aos-delay="300"><?php block_field( 'content' ); ?></div>
        <footer class="block-footer" data-aos="zoom-in-right" data-aos-delay="600"><a href="<?php block_field( 'link' ); ?>"<?php echo ( block_value('target') ) ? ' target="_blank"' : ''; ?>><?php block_field( 'link-text' ); ?><i class="icon arrow"></i></a></footer></div>
</aside>