<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>

<?php
    global $post;
    if( $post = get_field( 'post' ) ) :
        setup_postdata( $post ); 
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-media">
                <?php
                if ( has_post_thumbnail() ) :
                    the_post_thumbnail( 'medium' );
                endif; ?>
            </div>
            <header class="entry-header">
                <div class="entry-meta">
                    <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php the_time( 'd/m/Y' ); ?></time></div>
                <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php the_excerpt();?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <a href="<?php echo esc_url( get_permalink() ); ?>" class="button read-more" rel="bookmark"><?php esc_html_e( 'Read More', 'cls' ); ?></a>
            </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->

    <?php
    // wp_reset_postdata();
    endif;
?>


