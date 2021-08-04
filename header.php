<?php
/**
 * Bulma Theme Header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
<section id="page" class="site">
    <nav class="navbar py-3" role="navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'bulma' ); ?>">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?php echo get_home_url();?>">
                    <img src="<?php echo get_custom_logo_url() ?>" width="112" height="28" alt="logo" style="object-fit: contain;">
                </a>
                <a role="button" class="navbar-burger" aria-label="main-menu" aria-expanded="false" data-target="main-menu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="main-menu" class="navbar-menu">
                <?php
                wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 0,
                        'container'         => false,
                        // 'items_wrap'     => 'div',
                        'menu_class'        => 'navbar-menu mx-auto is-justify-content-center is-align-items-center',
                        'menu_id'           => 'primary-menu',
                        'after'             => "</div>",
                        'ending'            => true,
                        'walker'            => new Navwalker()
                    )
                );
                ?>
            </div>
        </div>
    </nav>
</section>
