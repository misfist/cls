<?php
/**
 * Template part for intro block
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package cls
 */
?>
<?php if( $content = get_post_meta( get_the_ID(), 'intro-content', true ) ) : ?>
	<div class="wp-block-custom-intro<?php echo ( $button_text = get_post_meta( get_the_ID(), 'intro-button-text', true ) ) ? ' has-button' : ''; ?>">
		<div class="wp-block-custom-intro__inner-container inner-container">
			<div class="intro-content">
				<?php if( $heading = get_post_meta( get_the_ID(), 'intro-title', true ) ) : ?>
					<h2 class="intro-heading"><?php esc_html_e( $heading, 'cls' ); ?></h2>
				<?php endif; ?>
				<?php echo apply_filters( 'the_content', $content ); ?>
			</div>
			<?php if( $button_text ) : ?>
				<div class="intro-button">
					<a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'intro-button-text', true ) ) ?>" class="button accent large"<?php echo ( $button_target = get_post_meta( get_the_ID(), 'intro-button-target', true )  ) ? ' target="_blank"' : ''; ?>><?php esc_html_e( $button_text ); ?></a>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>