<?php
/**
 * Template part for displaying number counter
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

if( !function_exists( 'have_rows' ) )  return; ?>


<?php if( have_rows( 'numbers' ) ) : ?>

    <div class="wp-block-number-counter has-background-color">
        <div class="number-counter__inner-container inner-container">

        <?php while ( have_rows( 'numbers' ) ) : the_row(); 
            $group = get_sub_field( 'number' ); ?>
            <div class="number-counter">
                <?php if( $title = get_sub_field( 'title' ) ) : ?>
                    <header class="block-heading"><?php esc_html_e( $title, 'cls' ); ?></header>
                <?php endif; ?>
                <?php if( $number = get_sub_field( 'number' ) ) : ?>
                    <div class="block-number" data-number="<?php echo number_format( $number, 0, '', '' ); ?>"><?php echo number_format( $number ); ?></div>
                <?php endif; ?>
                <?php if( $image = get_sub_field( 'image' ) ) : ?>
                    <figure class="block-image"><?php echo wp_get_attachment_image( $image['ID'], 'full' );?></figure>
                <?php endif; ?>
                <?php if( $content = get_sub_field( 'content' ) ) : ?>
                    <div class="block-content"><?php echo apply_filters( 'the_content', $content ); ?></div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>

        </div>
    </div>

<?php endif; ?>