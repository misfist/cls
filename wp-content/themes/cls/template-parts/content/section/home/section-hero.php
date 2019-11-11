<?php
/**
 * Template part for displaying the hero
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

if( !function_exists( 'have_rows' ) )  return; ?>

<?php if( have_rows( 'hero' ) ) : ?>
    <?php while( have_rows('hero') ): the_row(); ?>

        <div class="wp-block-cover alignfull hero" style="background-image:url(<?php echo ( $image = get_sub_field( 'image' ) ) ? esc_url( $image['url'] ) : ''; ?>);">
            <div class="wp-block-cover__inner-container">

                <?php if(  $title = get_sub_field( 'title' ) ) : ?>
                    <h2><?php echo esc_textarea( $title ); ?></h2>
                <?php endif; ?>

                <?php if(  $content = get_sub_field( 'content' ) ) : ?>
                    <?php echo apply_filters( 'the_content', $content ); ?>
                <?php endif; ?>

                <?php if(  $link = get_sub_field( 'link' ) ) : ?>
                    <div class="wp-block-button">
                        <a href="<?php echo esc_url( $link['url'] ); ?>" class="button"><?php echo esc_attr( $link['title'] ); ?></a>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>