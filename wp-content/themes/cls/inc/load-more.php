<?php
/**
 * Load More 
 *
 * @package cls
 * @since 1.0.0
 */

 /**
  * Enqueue Research Filter Scripts
  *
  * @since 1.0.0
  *
  * @uses wp_localize_script()
  *
  * @return void
  */
  function cls_load_more_enqueue_assets() {
   /**
    * Frontend AJAX requests.
    */
    if( is_page_template( 'page-templates/news-events.php' ) ) {
      wp_deregister_script( 'jquery-slim' );
      wp_enqueue_script( 'cls-load-more', get_stylesheet_directory_uri() . '/src/assets/js/vendor/load-more.js', array( 'jquery' ), null, true );

      wp_localize_script( 'cls-load-more', 'clsLoadMore',
        array(
          'nonce'         => wp_create_nonce( 'cls_load_more' ),
          'ajax_url'      => admin_url( 'admin-ajax.php' ),
        )
      );
    }
  }
  add_action( 'wp_enqueue_scripts', 'cls_load_more_enqueue_assets' );

 /**
  * Get Posts
  * Get $_POST values and return content
  *
  * @since 1.0.0
  *
  * @uses do_archive_filters action
  * @uses wp_ajax_ action hook
  * @uses WP_Query()
  * @uses wp_verify_nonce()
  *
  * @link https://codex.wordpress.org/Class_Reference/WP_Query
  * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)
  *
  * @return void
  */
function cls_load_more_posts() {

    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'cls_load_more' ) ) {
      die( 'Permission denied' );
    }

    $args = array(
        'post_type'              => array( 'post' ),
        'posts_per_page'         => 4,
        'ignore_sticky_posts'    => true,
        'post_status'            => array( 'publish' ),
    );

    if( $_POST['args']['paged'] ) {
        $args['paged'] =  intval($_POST['args']['paged']);
    }

    $posts_query = new WP_Query( $args );

    ob_start();

    if( $posts_query->have_posts() ) {

      while( $posts_query->have_posts() ) :
        $posts_query->the_post();

        get_template_part( 'template-parts/content/loop/content', 'news' );

      endwhile;

    } else {

        echo 'no posts';

    }

    $response = array(
      'content'         => ob_get_clean(),
      'posts_found'     => intval( $posts_query->found_posts ),
      'props'           => $args
    );

    wp_send_json( $response );

    die();

}
add_action( 'wp_ajax_do_load_more_posts', 'cls_load_more_posts' ); // part after `wp_ajax_` corresponds to action called in JS
add_action( 'wp_ajax_nopriv_do_load_more_posts', 'cls_load_more_posts' ); // part after `wp_ajax_nopriv_` corresponds to action called in JS

/**
 * Get Event Posts
  * Get $_POST values and return content
  *
  * @since 1.0.0
  *
  * @uses do_archive_filters action
  * @uses wp_ajax_ action hook
  * @uses WP_Query()
  * @uses wp_verify_nonce()
  *
  * @link https://codex.wordpress.org/Class_Reference/WP_Query
  * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)
 * @return void
 */
function cls_load_more_events() {

    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'cls_load_more' ) ) {
      die( 'Permission denied' );
    }

    $args = array(
        'post_type'              => array( 'event' ),
        'nopaging'               => false,
        'numberposts'            => 3,
        'posts_per_page'         => 3,
        'suppress_filters'       => false,
        'group_events_by'        => 'series',
        'post_status'            => array( 'publish' ),
    );

    if( $_POST['args']['paged'] ) {
        $args['paged'] =  intval($_POST['args']['paged']);
    }

    $posts_query = new WP_Query( $args );

    ob_start();

    if( $posts_query->have_posts() ) {

      while( $posts_query->have_posts() ) :
        $posts_query->the_post();

        get_template_part( 'template-parts/content/loop/content', get_post_type() );

      endwhile;

    } else {

        echo 'no posts';

    }

    $response = array(
      'content'         => ob_get_clean(),
      'posts_found'     => intval( $posts_query->found_posts ),
      'props'           => $args
    );

    wp_send_json( $response );

    die();

  }
  add_action( 'wp_ajax_do_load_more_events', 'cls_load_more_events' ); // part after `wp_ajax_` corresponds to action called in JS
  add_action( 'wp_ajax_nopriv_do_load_more_events', 'cls_load_more_events' ); // part after `wp_ajax_nopriv_` corresponds to action called in JS


//   $args = array(
// 	'post_type'              => array( 'event' ),
// 	'nopaging'               => false,
//     'posts_per_page'         => 3,
//     'suppress_filters'       => false,
//     'group_events_by'        => 'series'
// );