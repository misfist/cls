<?php
/**
 * Block: Home Callout
 */
?>
<div class="number-counter">
    <?php $number = block_sub_value( 'number' ); ?>
    <header class="block-heading"><?php block_sub_field( 'heading' ); ?></header>
    <div class="block-number" data-number="<?php echo number_format( $number, 0, '', '' ); ?>"><?php echo number_format( $number ); ?></div>
    <figure class="block-image"><img src="<?php block_sub_field( 'image' ); ?>" /></figure>
    <div class="block-content"><?php block_sub_field( 'content' ); ?></div>
</div>