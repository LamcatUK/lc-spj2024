<?php
defined('ABSPATH') || exit;

require_once get_theme_file_path('inc/class-wp-bootstrap-navwalker.php');

require_once LC_THEME_DIR . '/inc/lc-utility.php';
require_once LC_THEME_DIR . '/inc/lc-blocks.php';
// require_once LC_THEME_DIR . '/inc/lc-blog.php';

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(
        array(
            'page_title' 	=> 'Site-Wide Settings',
            'menu_title'	=> 'Site-Wide Settings',
            'menu_slug' 	=> 'theme-general-settings',
            'capability'	=> 'edit_posts',
        )
    );
}

function widgets_init()
{
  
    register_nav_menus(array(
        'primary_nav' => 'Primary Nav',
        'footer_menu_1' => 'Footer 1',
        'footer_menu_2' => 'Footer 2',
    ));
 
    unregister_sidebar('hero');
    unregister_sidebar('herocanvas');
    unregister_sidebar('statichero');
    unregister_sidebar('left-sidebar');
    unregister_sidebar('right-sidebar');
    unregister_sidebar('footerfull');
    unregister_nav_menu('primary');
 
    add_theme_support('disable-custom-colors');
    add_theme_support(
        'editor-color-palette',
        array(
            array(
                'name' => 'Black',
                'slug' => 'black',
                'color' => '#212529'
            ),
            array(
                'name' => 'White',
                'slug' => 'white',
                'color' => '#ffffff'
            ),
        )
    );
}
add_action('widgets_init', 'widgets_init', 11);

remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

//Custom Dashboard Widget
add_action('wp_dashboard_setup', 'register_lc_dashboard_widget');
function register_lc_dashboard_widget()
{
    wp_add_dashboard_widget(
        'lc_dashboard_widget',
        'Lamcat',
        'lc_dashboard_widget_display'
    );
}

function lc_dashboard_widget_display()
{
    ?>
<div style="display: flex; align-items: center; justify-content: space-around;">
    <img style="width: 50%;"
        src="<?= get_stylesheet_directory_uri().'/img/lc-full.jpg'; ?>">
    <a class="button button-primary" target="_blank" rel="noopener nofollow noreferrer"
        href="mailto:hello@lamcat.co.uk/">Contact</a>
</div>
<div>
    <p><strong>Thanks for choosing Lamcat!</strong></p>
    <hr>
    <p>Got a problem with your site, or want to make some changes & need us to take a look for you?</p>
    <p>Use the link above to get in touch and we'll get back to you ASAP.</p>
</div>
<?php
}


function lc_theme_enqueue()
{
    $the_theme = wp_get_theme();
    $theme_version = $the_theme->get('Version');

    $suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    // Grab asset urls.
    $theme_styles  = "/css/child-theme{$suffix}.css";
    $theme_scripts = "/js/child-theme{$suffix}.js";

    $css_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_styles);

    wp_deregister_script('jquery');

    wp_enqueue_style('swiper-style', "https://unpkg.com/swiper/swiper-bundle.min.css", array());
    wp_enqueue_script('swiper', "https://unpkg.com/swiper/swiper-bundle.min.js", array(), null, true);

    wp_enqueue_script('splide-script', get_stylesheet_directory_uri() . '/js/splide.min.js', array(), null, true);
    wp_enqueue_style('splide-style', get_stylesheet_directory_uri() . "/css/splide.min.css", array());

    wp_enqueue_style('aos-style', "https://unpkg.com/aos@2.3.1/dist/aos.css", array());
    wp_enqueue_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), null, true);

    wp_enqueue_script_module('lottie', 'https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs', array(), null, true);

    wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version);

    $js_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_scripts);
    
    wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true);

}
add_action('wp_enqueue_scripts', 'lc_theme_enqueue');

function custom_gutenberg_scripts()
{
    wp_enqueue_script(
        'custom-gutenberg',
        get_stylesheet_directory_uri() . '/js/custom-gutenberg.js',
        array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
        filemtime(get_stylesheet_directory() . '/js/custom-gutenberg.js'),
        true
    );
}
add_action('enqueue_block_editor_assets', 'custom_gutenberg_scripts');

add_filter('wpcf7_autop_or_not', '__return_false');

?>