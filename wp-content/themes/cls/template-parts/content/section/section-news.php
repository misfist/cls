<?php
/**
 * Template part for displaying news posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type'              => array( 'post' ),
    'posts_per_page'         => 4,
    'paged'                  => $paged,
    'ignore_sticky_posts'    => true,
    'post_status'            => array( 'publish' ),
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
    <div class="section-posts">
        <div class="section-posts__inner-container inner-container">
            <header class="section-header">
                <?php
                echo sprintf( '
                    <h2 class="section-title">%s <span class="separator"></span></h2>
                    <div class="section-subtitle">%s</div>',
                    get_post_meta( $post->ID, 'section_title_news', true ),
                    get_post_meta( $post->ID, 'section_subheading_news', true )
                );
                ?>
            </header><!-- .section-header -->
            <div class="posts-list fade-in">
            <?php
            while ( $query->have_posts() ) :
                $query->the_post(); ?>

                <?php get_template_part( 'template-parts/content/loop/content', 'news' ); ?>
                
            <?php
            endwhile; ?>
            </div><!-- .posts-list -->
            <div class="section-footer">
                <button class="button js-load-more-posts" data-posts-per-page="<?php echo intval( $args['posts_per_page'] ); ?>" data-max-pages="<?php echo intval( $query->max_num_pages ); ?>"<?php echo ( $paged >= $query->max_num_pages ) ? ' disabled="true" aria-disabled="true"' : ''; ?>><?php esc_html_e( 'Load More', 'cls' ); ?></button>
            </div>
        </div><!-- .inner-container -->
    </div><!-- .section-posts -->
<?php endif;
wp_reset_postdata();
?>

