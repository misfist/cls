<?php
/**
 * Template part for displaying news posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

$paged = ( get_query_var( 'paged') ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type'              => array( 'event' ),
    'nopaging'               => false,
    'numberposts'            => 3,
    'posts_per_page'         => 3,
    'suppress_filters'       => false,
    'group_events_by'        => 'series',
    'post_status'            => array( 'publish' ),
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
    <div class="section-events">
        <div class="section-events__inner-container inner-container">
            <header class="section-header">
                <?php
                echo sprintf( '
                    <h2 class="section-title">%s <span class="separator"></span></h2>
                    <div class="section-subtitle">%s</div>
                    ',
                    esc_attr_x( 'Events', 'cls' ),
                    esc_attr_x( 'CLS can help you know your rights and how to enforce those rights.  Please come to one of our free events and let us help you.', 'cls' )
                );
                ?>
            </header>
            <div class="posts-list">
            <?php
            while ( $query->have_posts() ) :
                $query->the_post(); ?>

                <?php get_template_part( 'template-parts/content/content-list', 'event' ); ?>

            <?php
            endwhile; ?>
            </div><!-- .posts-list -->
            <div class="section-footer">
                <button class="button js-load-more-events" data-posts-per-page="<?php echo intval( $args['posts_per_page'] ); ?>" data-max-pages="<?php echo intval( $query->max_num_pages ); ?>"<?php echo ( $paged >= $query->max_num_pages ) ? ' disabled' : ''; ?>><?php esc_html_e( 'Load More', 'cls' ); ?></button>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_postdata();
?>

