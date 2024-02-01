<?php 

/**
 * Registrar los menús
 */
function simplytheme_menus(){

    register_nav_menus( array(
        'menu-horizontal' => __('Menú Horizontal', 'simplytheme')
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