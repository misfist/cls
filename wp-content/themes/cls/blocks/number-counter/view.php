<?php
/**
 * Block: Home Callout
 */
?>
<div class="wp-block-number-counter">
    <div class="number-counter__inner-container inner-container">
        <?php
        $number = block_value( 'number' );
        ?>
        <header class="block-heading"><?php block_field( 'heading' ); ?></header>
        <div class="block-number" data-number="<?php echo number_format( $number, 0, '', '' ); ?>"><?php echo number_format( $number ); ?></div>
        <figure class="block-image"><img src="<?php block_field( 'image' ); ?>" /></figure>
        <div class="block-content"><?php block_field( 'content' ); ?></div>
    </div>
</div>