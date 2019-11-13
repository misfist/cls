<?php
/**
 * Template part for displaying home callout
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<?php if( have_rows( 'callout' ) ): ?>
    <?php while( have_rows( 'callout' ) ): the_row(); ?>
    <aside class="wp-block-home-callout" >
        <div class="home-callout__inner-container inner-container">
            <?php if( $heading = get_sub_field( 'title' ) ) : ?>
                <header class="block-header" data-aos="zoom-in-right" data-aos-delay="0">
                    <?php echo esc_textarea( $heading ); ?>
                </header>
            <?php endif; ?>
            <?php if( $content = get_sub_field( 'content' ) ) : ?>
                <div class="block-content" data-aos="zoom-in-left" data-aos-delay="300">
                    <?php echo apply_filters( 'the_content', $content ); ?>
                </div>
            <?php endif; ?>
            <?php if( $link = get_sub_field('link') ) : ?>
                <footer class="block-footer" data-aos="zoom-in-right" data-aos-delay="600">
                    <a href="<?php echo esc_url( $link['url'] ); ?>"<?php echo ( $link['target'] ) ? ' target="_blank"' : ''; ?>><?php echo esc_textarea( $link['title'] ); ?><i class="icon arrow"></i></a>
                </footer>
            <?php endif; ?>
        </div>
    </aside>
    <?php endwhile; ?>
<?php endif; ?>