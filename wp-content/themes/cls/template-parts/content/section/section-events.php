<?php
/**
 * Template part for displaying events
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

/**
 * Querying events
 * 
 * @see http://docs.wp-event-organiser.com/querying-events/overview/
 * @see http://codex.wp-event-organiser.com/
 */
$paged = ( get_query_var( 'paged') ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type'              => array( 'event' ),
    'post_status'            => array( 'publish' ),
    'nopaging'               => false,
    'posts_per_page'         => 3,
    'suppress_filters'       => false,
    'group_events_by'        => 'series', //Group recurrent events
    'event_start_after'      => 'today',
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
    <div class="section-events">
        <div class="section-events__inner-container inner-container">
            <header class="section-header">
                <?php
                echo sprintf( '
                    <h2 class="section-title">%s <span class="separator"></span></h2>
                    <div class="section-subtitle">%s</div>',
                    get_post_meta( $post->ID, 'section_title_events', true ),
                    get_post_meta( $post->ID, 'section_subheading_events', true )
                );
                ?>
            </header>
            <div id="events-list" class="posts-list fade-in">
            <?php
            while ( $query->have_posts() ) :
                $query->the_post(); ?>

                <?php get_template_part( 'template-parts/content/loop/content', get_post_type() ); ?>

            <?php
            endwhile; ?>
            </div><!-- .posts-list -->
            <div class="section-footer">
                <button class="button js-load-more-events" data-found-posts="<?php echo $query->found_posts; ?>" data-posts-per-page="<?php echo $args['posts_per_page']; ?>" data-max-pages="<?php echo $query->max_num_pages; ?>"<?php echo ( 1 === $query->max_num_pages ) ? ' disabled="true" aria-disabled="true"' : ''; ?>><?php esc_html_e( 'Load More', 'cls' ); ?></button>
            </div>
        </div><!-- .inner-container -->
    </div><!-- .section-events -->
<?php endif;
wp_reset_postdata();
?>

