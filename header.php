<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lc-belmont2024
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta
        charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/cinzel-v23-latin-500.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/montserrat-v26-latin-regular.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload"
        href="<?=get_stylesheet_directory_uri()?>/fonts/montserrat-v26-latin-600.woff2"
        as="font" type="font/woff2" crossorigin="anonymous">
    <?php
    if (get_field('ga_property', 'options')) {
        ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property', 'options')?>">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config',
            '<?=get_field('ga_property', 'options')?>'
        );
    </script>
    <?php
    }
if (get_field('google_site_verification', 'options')) {
    echo '<meta name="google-site-verification" content="' . get_field('google_site_verification', 'options') . '" />';
}
if (get_field('bing_site_verification', 'options')) {
    echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification', 'options') . '" />';
}
if (is_front_page() || is_page('contact-us')) {
    ?>
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "url": "<?=get_site_url()?>",
            "name": "Belmont Skin and Laser Clinic",
            "legalName": "Belmont Clinic",
            "description": "---",
            "logo": "<?=get_stylesheet_directory_uri()?>/img/belmont-logo-full.png",
            "sameAs": [
                "https://twitter.com/",
                "https://www.linkedin.com/",
                "https://www.instagram.com/"
            ],
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "<?=get_field('contact_phone', 'options')?>",
                "contactType": "Customer service"
            }
        }
    </script>
    <?php
}
?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
do_action('wp_body_open');

if (get_field('gtm_property', 'options')) {
    ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe
            src="https://www.googletagmanager.com/ns.html?id=<?=get_field('ga_property', 'options')?>"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
}
?>
    <header id="navigation">
        <nav id="main-nav" class="navbar navbar-expand-lg d-block px-0" aria-labelledby="main-nav-label">
            <div class="container-xl">
                <div class="d-flex justify-content-between w-100 align-items-center">
                    <a href="/" class="navbar-brand" rel="home"></a>
                    <button class="navbar-toggler input-button" id="navToggle" data-bs-toggle="collapse"
                        data-bs-target=".navbars" type="button" aria-label="Navigation"><i
                            class="fa fa-navicon"></i></button>
                </div>
                <div class="w-100 d-flex flex-column-reverse flex-lg-column">
                    <div id="topNav" class="px-2 px-lg-0 collapse navbar-collapse navbars">
                        <ul id="top-nav"
                            class="navbar-nav w-100 justify-content-end align-items-lg-center mt-2 mt-lg-0 gap-2">
                            <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement"
                                class="menu-item nav-item">
                                <a class="topNav_phone"
                                    href="tel:<?=parse_phone(get_field('contact_phone', 'options'))?>">Call
                                    <?=get_field('contact_phone', 'options')?></a>
                            </li>
                        </ul>
                    </div>
                    <?php

                        wp_nav_menu(
                            array(
'theme_location'  => 'primary_nav',
'container_class' => 'collapse navbar-collapse navbars',
'container_id'    => 'primaryNav',
'menu_class'      => 'navbar-nav w-100 justify-content-end gap-lg-5 ms-auto',
'fallback_cb'     => '',
'menu_id'         => 'main-menu',
'depth'           => 2,
'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
)
                        );
?>
                </div>
            </div>

        </nav>
    </header>