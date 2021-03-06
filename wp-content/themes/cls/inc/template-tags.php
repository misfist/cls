<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package cls
 */

if ( ! function_exists( 'gutenberg_starter_theme_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function gutenberg_starter_theme_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'cls' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'cls' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'gutenberg_starter_theme_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function gutenberg_starter_theme_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'cls' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'cls' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'cls' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'cls' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'cls' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'cls' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Post Navigation
 * 
 * @see https://developer.wordpress.org/reference/functions/get_the_posts_pagination/
 *
 * @return void
 */
function cls_the_post_navigation() {
	the_posts_pagination(
		array(
			'mid_size'  => 2,
			'prev_text' => sprintf(
				'%s <span class="nav-prev-text screen-reader-text">%s</span>',
				'&lang;',
				__( 'Newer posts', 'cls' )
			),
			'next_text' => sprintf(
				'<span class="nav-next-text screen-reader-text">%s</span> %s',
				__( 'Older posts', 'cls' ),
				'&rang;'
			),
		)
	);
}

/**
 * Render Intro Content
 *
 * @return void
 */
function cls_render_page_intro() {
	global $post;
	$blocks = parse_blocks( $post->post_content );
	foreach( $blocks as $block ) {
		if( 'custom/intro' === $block['blockName'] ) {
			echo render_block( $block );
			break;
		}
	}
}

/**
 * Render Content without Intro
 *
 * @return void
 */
function cls_the_content_no_intro() {
	global $post;
	$blocks = parse_blocks( $post->post_content );
	if( $blocks ) {
		$content = '';
		foreach( $blocks as $block ) {
			if( 'custom/intro' === $block['blockName'] ) {
				continue;
			} else {
				$content .= render_block( $block );
			}
		}
		echo apply_filters( 'the_content', $content );
	}
}

/**
 * Render Featured Event Content
 *
 * @return void
 */
function cls_render_featured_event() {
	global $post;
	$blocks = parse_blocks( $post->post_content );
	foreach( $blocks as $block ) {
		if( 'block-lab/featured-event' === $block['blockName'] ) {
			echo render_block( $block );
			break;
		}
	}
}

/**
 * Render Content without Intro
 *
 * @return void
 */
function cls_the_content_no_featured_event() {
	global $post;
	$blocks = parse_blocks( $post->post_content );
	if( $blocks ) {
		$content = '';
		foreach( $blocks as $block ) {
			if( 'block-lab/featured-event' === $block['blockName'] ) {
				continue;
			} else {
				$content .= render_block( $block );
			}
		}
		echo apply_filters( 'the_content', $content );
	}
}

/**
 * Render content without specific block
 *
 * @param string $block_name
 * @return void
 */
function cls_the_content_no_block( $block_name ) {
	global $post;
	$blocks = parse_blocks( $post->post_content );
	if( $blocks ) {
		$content = '';
		foreach( $blocks as $block ) {
			if( $block_name === $block['blockName'] ) {
				continue;
			} else {
				$content .= render_block( $block );
			}
		}
		echo apply_filters( 'the_content', $content );
	}
}

/**
 * Render specific block
 *
 * @param string $block_name
 * @return void
 */
function cls_render_block( $block_name ) {
	global $post;
	$blocks = parse_blocks( $post->post_content );
	foreach( $blocks as $block ) {
		if( $block_name === $block['blockName'] ) {
			echo render_block( $block );
			break;
		}
	}
}

/**
 * Get page ID by slug
 * 
 * @see https://developer.wordpress.org/reference/functions/get_page_by_path/
 * 
 * @usage `cls_get_page_id_by_path( 'about/news-events/' )`
 *
 * @param string $page_slug
 * @return mixed int $page->ID or null
 */
function cls_get_page_id_by_path( $page_slug ) {
	$page = get_page_by_path( $page_slug );
	if ( $page ) {
		return $page->ID;
	} else {
		return null;
	}
}