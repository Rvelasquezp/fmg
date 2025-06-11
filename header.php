<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gutenberg-starter-theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://gtm.montgolfieresgatineau.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NSPW3BL');
    </script>
    <!-- End Google Tag Manager -->
    <meta name="facebook-domain-verification" content="ji54lm15btclx45wvzlxjt836sum04" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://gtm.montgolfieresgatineau.com/ns.html?id=GTM-NSPW3BL"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="bodyGrid">
        <header id="sideMenu">
            <div class="sideMenuInner">
                <button class="openMenu">
                    <span class="burger">
                        <span></span>
                    </span>
                    <span class="title"><?php echo get_field('menu_toggle_closed_text', 'option'); ?></span>
                </button>
                <?php if (get_field('cart_link', 'options')) { ?>
                    <a class="cartButton" href="<?php echo get_field('cart_link', 'options'); ?>" target="blank">
                        <i class="fa-light fa-cart-shopping"></i>
                    </a>
                <?php } ?>
                <?php if (have_rows('social_media', 'options')) { ?>

                    <div class="socialMedia">

                        <!-- <button> -->
                        <a id="popup" href="javascript;:" target="blank">
                            <span>Infolettre</span>
                            <i class="fa-light fa-envelope"></i>
                        </a>
                        <!-- </button> -->

                        <?php while (have_rows('social_media', 'options')) {
                            the_row(); ?>

                            <a href="<?php echo get_sub_field('link'); ?>" target="blank">
                                <span><?php echo get_sub_field('title'); ?></span>
                                <?php echo get_sub_field('icon'); ?>
                            </a>

                        <?php } ?>

                    </div>

                <?php } ?>

            </div>
        </header>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'gutenberg-starter-theme'); ?></a>
            <header id="masthead" class="site-header">
                <?php
                if (get_field('which_pages_to_show_banner', 'options')) {
                    $currentPage = get_the_ID();
                    if (in_array($currentPage, get_field('which_pages_to_show_banner', 'options'))) { ?>
                        <div class="bannerDiv">
                            <a href="<?php echo get_field('banner', 'options')['url']; ?>" target="<?php echo get_field('banner', 'options')['target']; ?>" class="banner">
                                <?php echo get_field('banner', 'options')['title']; ?>
                            </a>
                            <button id="closeBanner">
                                <i class="fa-light fa-xmark"></i>
                            </button>
                        </div>
                <?php }
                }
                ?>
                <div class="site-branding">
                    <?php
                    // the_custom_logo();
                    ?>
                    <a href="<?php if (apply_filters('wpml_current_language', null) === "en") { ?>/en/<?php } else { ?>/<?php } ?>" class="custom-logo-link" rel="home" aria-current="page">
                        <?php echo get_field('header_logo', 'options') ?>
                    </a>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; ?>
                </div><!-- .site-branding -->

                <nav id="header-closed-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header-menu',
                        'link_before' => '<span>',
                        'link_after'  => '</span>'
                    ));
                    ?>
                </nav><!-- #site-navigation -->

                <nav id="header-open-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'inner-header-menu',
                        'link_before' => '<span>',
                        'link_after'  => '</span>'
                    ));
                    ?>
                </nav><!-- #site-navigation -->

                <?php if (get_field('cart_link', 'options')) { ?>
                    <a class="cartButton" href="<?php echo get_field('cart_link', 'options'); ?>" target="blank">
                        <i class="fa-light fa-cart-shopping"></i>
                    </a>
                <?php } ?>
                <button class="menu-toggle">
                    <span class="burger">
                        <span></span>
                    </span>
                </button>

                <div class="overlayMenu">

                    <div>

                        <nav id="overlay-main-navigation" class="main-navigation">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'main-menu',
                                'link_before' => '<span>',
                                'link_after'  => '</span>'
                            ));
                            ?>
                            <!-- <nav class="mobileOnly buttonsMobile">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'inner-header-menu',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>'
                                ));
                                ?>
                            </nav> -->
                            <!-- <hr> -->
                        </nav><!-- #site-navigation -->

                        <?php /*    <div class="overlayMenus">

                        <div class="eachColumnMenu">

                            <h3><?php echo __(wp_get_nav_menu_name('first-menu'), 'utopian'); ?></h3>
                            <nav id="first-column-navigation" class="main-navigation">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'first-menu',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>'
                                ));
                                ?>
                            </nav><!-- #site-navigation -->

                        </div>

                        <div class="eachColumnMenu">

							<h3><?php echo __(wp_get_nav_menu_name('second-menu'), 'utopian'); ?></h3>

                            <nav id="second-column-navigation" class="main-navigation">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'second-menu',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>'
                                ));
                                ?>
                            </nav><!-- #site-navigation -->

                        </div>

                        <div class="eachColumnMenu">

							<h3><?php echo __(wp_get_nav_menu_name('third-menu'), 'utopian'); ?></h3>

                            <nav id="third-column-navigation" class="main-navigation">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'third-menu',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>'
                                ));
                                ?>
                            </nav><!-- #site-navigation -->

                        </div>

                    </div>

                    <?php */ if (have_rows('social_media', 'options')) { ?>

                            <div class="socialMediaMobile mobileOnly">

                                <div class="eachMobileSocial">
                                    <a id="popup" href="javascript;:" target="blank">
                                        <i class="fa-light fa-envelope"></i>
                                        <span>Infolettre</span>
                                    </a>
                                </div>

                                <?php while (have_rows('social_media', 'options')) {
                                    the_row(); ?>

                                    <div class="eachMobileSocial">
                                        <a href="<?php echo get_sub_field('link'); ?>" target="blank">
                                            <?php echo get_sub_field('icon'); ?>
                                            <span><?php echo get_sub_field('title'); ?></span>
                                        </a>
                                    </div>

                                <?php } ?>

                            </div>

                        <?php } ?>
                    </div>
                </div>
            </header><!-- #masthead -->