<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );

function helfe_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/src/css/bootstrap.min.css' );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'helfe-style', get_stylesheet_uri(), $dependencies );
}

function helfe_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/src/js/bootstrap.min.js', $dependencies, '3.3.6', true );
}

add_action( 'wp_enqueue_scripts', 'helfe_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'helfe_enqueue_scripts' );

?>
