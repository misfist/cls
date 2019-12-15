<?php
/**
 * Site Notice
 */
?>

<div class="site-notice" data-closable>
    <?php echo apply_filters( 'the_content', get_theme_mod( 'notice_text' ) ); ?>
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true" class="icon close"></span>
    </button>
</div>
