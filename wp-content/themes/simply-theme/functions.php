<?php 

/**
 * Registrar los menús
 */
function simplytheme_menus(){

    register_nav_menus( array(
        'menu-principal' => __('Menú Principal', 'simplytheme')
    ));

}
add_action('init','simplytheme_menus');

/**
 * Cargar los scripts y los estilos.
 */
function simplytheme_scripts_styles(){

    wp_enqueue_style('normalize','https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(),'8.0.1');
    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'),'1.0.0');

}
add_action('wp_enqueue_scripts','simplytheme_scripts_styles');

/**
 * Establecemos parámetros para el tema.
 * Se llama una vez que ha sido activado el tema.
 */
function simplytheme_setup(){

    // Imágenes destacadas
    add_theme_support('post_thumbnail');

    // Títulos para SEO
    add_theme_support('title-tag');
}
add_action('after_setup_theme','simplytheme_setup');