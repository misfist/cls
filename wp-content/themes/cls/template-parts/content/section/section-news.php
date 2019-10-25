<?php
/**
 * Template part for displaying news posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */

$args = array(
	'post_type'              => array( 'post' ),
	'nopaging'               => false,
	'posts_per_page'         => 4,
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
    <div class="section-posts">
        <div class="section-posts__inner-container inner-container">
            <header class="section-header">
                <?php
                echo sprintf( '
                    <h2 class="section-title">%s <span class="separator"></span></h2>
                    <div class="section-subtitle">%s %s</div>
                    ',
                    esc_attr_x( 'News', 'cls' ),
                    get_bloginfo( 'name' ),
                    esc_attr_x( 'in the news', 'cls' )
                );
                ?>
            </header>
            <div class="posts-list">
            <?php
            while ( $query->have_posts() ) :
                $query->the_post(); ?>

                <?php get_template_part( 'template-parts/content/content-list', 'news' ); ?>
                
            <?php
            endwhile; ?>
            </div>
        </div>
    </div>
<?php endif;
wp_reset_postdata();
?>

