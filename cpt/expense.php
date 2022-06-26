<?php

// Register Custom Post Type
function expense() {

	$labels = array(
		'name'                  => _x( 'Wydatki', 'Post Type General Name', 'k3e' ),
		'singular_name'         => _x( 'Wydatek', 'Post Type Singular Name', 'k3e' ),
		'menu_name'             => __( 'Wydatek', 'k3e' ),
		'name_admin_bar'        => __( 'Wydatek', 'k3e' ),
		'archives'              => __( 'Archiwum wydatków', 'k3e' ),
		'attributes'            => __( 'Atrybuty wydatków', 'k3e' ),
		'parent_item_colon'     => __( 'Wydatek nadrzędny:', 'k3e' ),
		'all_items'             => __( 'Wszystkie wydatki', 'k3e' ),
		'add_new_item'          => __( 'Dodaj nowy wydatek', 'k3e' ),
		'add_new'               => __( 'Dodaj nowy', 'k3e' ),
		'new_item'              => __( 'Nowy wydatek', 'k3e' ),
		'edit_item'             => __( 'Edytuj wydatek', 'k3e' ),
		'update_item'           => __( 'Aktualizuj wydatek', 'k3e' ),
		'view_item'             => __( 'Zobacz wydatek', 'k3e' ),
		'view_items'            => __( 'Zabacz wydatki', 'k3e' ),
		'search_items'          => __( 'Szukaj wydatku', 'k3e' ),
		'not_found'             => __( 'Brak wydatków', 'k3e' ),
		'not_found_in_trash'    => __( 'Brak w koszu', 'k3e' ),
		'featured_image'        => __( 'Obrazek powiązany', 'k3e' ),
		'set_featured_image'    => __( 'Ustaw obrazek powiązany', 'k3e' ),
		'remove_featured_image' => __( 'Usuń obrazek powiązany', 'k3e' ),
		'use_featured_image'    => __( 'Uzyj jako obrazek powiązany', 'k3e' ),
		'insert_into_item'      => __( 'Wstaw do wydatku', 'k3e' ),
		'uploaded_to_this_item' => __( 'Wgrano do tego wydatku', 'k3e' ),
		'items_list'            => __( 'Lista wydatków', 'k3e' ),
		'items_list_navigation' => __( 'Nawigacja listy wydatków', 'k3e' ),
		'filter_items_list'     => __( 'Filtruj wydatki na liście', 'k3e' ),
	);
	$args = array(
		'label'                 => __( 'Wydatek', 'k3e' ),
		'description'           => __( 'Wpisy zawierający informacje na temat wydatków', 'k3e' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'post-formats' ),
		'taxonomies'            => array( 'expense_type', 'expense_field' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-cart',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => false,
		'can_export'            => false,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'rewrite'               => false,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'expense', $args );

}
add_action( 'init', 'expense', 0 );

