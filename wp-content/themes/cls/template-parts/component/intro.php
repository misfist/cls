<?php
/**
 * Template part for intro block
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>
<?php if( $content = get_post_meta( get_the_ID(), 'intro_content', true ) ) : ?>
	<div class="wp-block-custom-intro<?php echo ( get_post_meta( get_the_ID(), 'intro_link_url', true ) ) ? ' has-button' : ''; ?>">
		<div class="wp-block-custom-intro__inner-container inner-container">
			<div class="intro-content">
				<?php if( $heading = get_post_meta( get_the_ID(), 'intro_title', true ) ) : ?>
					<h2 class="intro-heading"><?php esc_html_e( $heading, 'cls' ); ?></h2>
				<?php endif; ?>
				<?php echo apply_filters( 'the_content', $content ); ?>
			</div>
			<?php if( $file = get_post_meta( get_the_ID(), 'intro_link_url', true ) ) : ?>
				<div class="intro-button">
					<a href="<?php echo wp_get_attachment_url( $file ); ?>" class="button accent large" target="_blank"><?php echo ( $link_text = get_post_meta( get_the_ID(), 'intro_link_text', true ) ) ? esc_html_e( $link_text ) : esc_html_e( 'Download Locations' ) ; ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>