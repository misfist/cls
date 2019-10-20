<?php
/**
 * Block: Twitter Timeline
 */
?>
<div class="wp-block-titter-timeline">
    <div class="titter-timeline__inner-container inner-container">
        <header>
            <h2 class="block-title"><?php block_field( 'handle' ); ?></h2>
            <div class="block-title-spacer"></div>
        </header>
        <?php 
        $options = get_option( 'ctf_options', false );
        var_dump($options);
        ?>
    </div>
</div>