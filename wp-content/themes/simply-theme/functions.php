<?php 

function simplytheme_menus(){

    register_nav_menus( array(
        'menu-horizontal' => __('Menú Horizontal', 'simplytheme')
    ));

}
add_action('init','simplytheme_menus');