<?php
/**
 * Helfe functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Helfe
 * @since 1.0.0
 */

function helfe_setup() {
    // Ajouter la prise en charge des images mises en avant
    add_theme_support( 'post-thumbnails' );

    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support( 'title-tag' );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
        array(
            'menu-1' => __( 'Primary', 'helfe' ),
            'footer' => __( 'Footer Menu', 'helfe' ),
            'social' => __( 'Social Links Menu', 'helfe' ),
        )
    );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 190,
            'width'       => 190,
            'flex-width'  => false,
            'flex-height' => false,
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for Block Styles.
    add_theme_support( 'wp-block-styles' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'style-editor.css' );

}
add_action( 'after_setup_theme', 'helfe_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function helfe_widgets_init() {

	register_sidebar(
		array(
			'name'          => __( 'Footer', 'helfe' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'helfe' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'helfe_widgets_init' );

/**
 * Bootstrap Setup
 * 
 * Adding Bootstrap
 */
function helfe_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/src/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'helfe-style', get_stylesheet_uri(), $dependencies );
    wp_enqueue_style( 'helfe_header', get_template_directory_uri() . '/src/css/header.css');
    wp_enqueue_style( 'helfe_footer', get_template_directory_uri() . '/src/css/footer.css');
}

function helfe_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/src/js/bootstrap.min.js', $dependencies, '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'helfe_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'helfe_enqueue_scripts' );

/**
 * Font Awesome Kit Setup
 * 
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
if (! function_exists('fa_custom_setup_kit') ) {
    function fa_custom_setup_kit($kit_url = '') {
        foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
        add_action(
            $action,
            function () use ( $kit_url ) {
            wp_enqueue_script( 'font-awesome-kit', $kit_url, [], null );
            }
        );
        }
    }
}

fa_custom_setup_kit('https://kit.fontawesome.com/42deadbeef.js');

/**
 * Custom Comment Walker template.
 */
require get_template_directory() . '/inc/class-helfe-walker-comment.php';

/**
 * Enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/helfe-functions.php';
require get_template_directory() . '/inc/template-tags.php';


