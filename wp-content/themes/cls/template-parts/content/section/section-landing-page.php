<?php
/**
 * Template part for displaying landing page sections
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<?php if( have_rows( 'sections' ) ) : 
    $count = count( get_field( 'sections' ) ); ?>
<div class="wp-block-custom-sections">
    <div class="column">
        <?php while( have_rows('sections') ): the_row(); ?>
        <div class="section<?php echo ( get_sub_field( 'image' ) ) ? ' has-post-thumbnail' : ''; ?>">
            <?php if( $image = get_sub_field( 'image' ) ) : ?>
            <div class="wp-block-image">
                <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
            </div>
            <?php endif; ?>
            <div class="section-body">
                <?php
                    /** Has link */
                    if( $link = get_sub_field( 'link' ) ) : ?>
                <h3 class="section-title"><a href="<?php echo esc_url( $link['url'] ); ?>"
                        <?php echo ( $link['target'] ) ? ' target="_blank"' : '' ;?>><?php echo apply_filters( 'the_title', get_sub_field( 'title' ) ); ?></a>
                </h3>
                <?php
                    /** Doesn't have link */
                    else : ?>
                <h3 class="section-title"><?php echo apply_filters( 'the_title', get_sub_field( 'title' ) ); ?></h3>
                <?php endif; ?>

                <?php echo apply_filters( 'the_content', get_sub_field( 'content' ) ); ?>
                <?php if( $link = get_sub_field( 'link' ) ) : ?>
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-background has-accent-background-color"
                        href="<?php echo esc_url( $link['url'] ); ?>"
                        target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if( get_row_index() == ceil( $count / 2 ) ) : ?>
    </div>
    <div class="column">
        <?php endif; ?>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>