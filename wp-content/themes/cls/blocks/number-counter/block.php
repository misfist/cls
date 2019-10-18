<?php
/**
 * Block: Number Counter
 */
?>
<?php if ( block_rows( 'counter' ) ): ?>
    <?php $columns = count( block_value( 'counter' )['rows'] ); ?>
    <div class="wp-block-number-counter has-<?php echo $columns; ?>-columns">
        <div class="number-counter__inner-container inner-container">
        <?php while( block_rows( 'counter' ) ) : 
            block_row( 'counter' ); ?>

            <?php get_template_part( './blocks/number-counter/view' ); ?>
        
        <?php endwhile; ?>
        </div>
    </div>
<?php endif; 
reset_block_rows( 'counter' );
?>
