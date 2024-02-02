<?php
/**
 * Plugin Name: Competiciones
 * Description: Añade Post Types para almacenar competicones
 * Version: 1.0.0
 * Author: Roberto Rodríguez Jiménez
 * Author URI: https: robertorodriguez.net
 * Text Domain: simplytheme
 * @see https://developer.wordpress.org/reference/functions/register_post_type/
 */

if (!defined("ABSPATH"))
    exit;

// Register Custom Post Type
function competiciones_post_type() {

	$labels = array(
		'name'                  => _x( 'competiciones', 'Post Type General Name', 'simplytheme' ),
		'singular_name'         => _x( 'competicion', 'Post Type Singular Name', 'simplytheme' ),
		'menu_name'             => __( 'Competiciones', 'simplytheme' ),
		'name_admin_bar'        => __( 'Competiciones', 'simplytheme' ),
		'archives'              => __( 'Competiciones', 'simplytheme' ),
		'attributes'            => __( 'Atributos de competción', 'simplytheme' ),
		'parent_item_colon'     => __( 'Competición superior:', 'simplytheme' ),
		'all_items'             => __( 'Todas las competiciones', 'simplytheme' ),
		'add_new_item'          => __( 'Nueva competición', 'simplytheme' ),
		'add_new'               => __( 'Nueva competición', 'simplytheme' ),
		'new_item'              => __( 'Nueva competición', 'simplytheme' ),
		'edit_item'             => __( 'Editar competición', 'simplytheme' ),
		'update_item'           => __( 'Actualizar competición', 'simplytheme' ),
		'view_item'             => __( 'Ver competición', 'simplytheme' ),
		'view_items'            => __( 'Ver competiciones', 'simplytheme' ),
		'search_items'          => __( 'Buscar competición', 'simplytheme' ),
		'not_found'             => __( 'No hay competiciones', 'simplytheme' ),
		'not_found_in_trash'    => __( 'No hay competiciones en la papelerea', 'simplytheme' ),
		'featured_image'        => __( 'Imagen de portada', 'simplytheme' ),
		'set_featured_image'    => __( 'Establecer imagen de portada', 'simplytheme' ),
		'remove_featured_image' => __( 'Borrar imagen de portada', 'simplytheme' ),
		'use_featured_image'    => __( 'Usar como imagen de portada', 'simplytheme' ),
		'insert_into_item'      => __( 'Insertar en la competición', 'simplytheme' ),
		'uploaded_to_this_item' => __( 'Subido a esta competición', 'simplytheme' ),
		'items_list'            => __( 'Lista de competiciones', 'simplytheme' ),
		'items_list_navigation' => __( 'Navegación de lista de competiciones', 'simplytheme' ),
		'filter_items_list'     => __( 'Filtrar lista de competiciones', 'simplytheme' ),
	);
	$args = array(
		'label'                 => __( 'competicion', 'simplytheme' ),
		'description'           => __( 'Competiciones del club', 'simplytheme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'excerpt' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-awards',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'competiciones', $args );

}
add_action( 'init', 'competiciones_post_type', 0 );