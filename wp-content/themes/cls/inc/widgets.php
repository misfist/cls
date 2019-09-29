<?php
/** 
 * Widget areas
 * 
 * @package cls
 */

 /**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentynineteen_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'cls' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'cls' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title screen-reader-text">',
			'after_title'   => '</h2>',
		)
    );
    
    register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'cls' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'cls' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title screen-reader-text">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'cls' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'cls' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title screen-reader-text">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'cls' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'cls' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title screen-reader-text">',
			'after_title'   => '</h2>',
		)
	);


}
add_action( 'widgets_init', 'twentynineteen_widgets_init' );