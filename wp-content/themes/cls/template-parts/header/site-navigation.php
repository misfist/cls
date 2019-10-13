<?php
/**
 * Top Nav
 */
?>
<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'cls' ); ?>">
    <div class="mobile-menu-toggle" data-hide-for="medium">
        <button class="menu-toggle" type="button"></button>
        <div class="title-bar-title screen-reader-text"><?php esc_html_e( 'Menu', 'cls' ); ?></div>
    </div>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'menu-1',
            'menu_class'     => 'main-menu medium-horizontal menu',
            'container'		 => false,
            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        )
    );
    ?>
</nav><!-- #site-navigation -->
<?php endif; ?>