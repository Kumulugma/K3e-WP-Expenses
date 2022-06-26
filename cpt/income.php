<?php

// Register Custom Post Type
function income() {

    $labels = array(
        'name' => _x('Zarobki', 'Post Type General Name', 'k3e'),
        'singular_name' => _x('Zarobek', 'Post Type Singular Name', 'k3e'),
        'menu_name' => __('Zarobek', 'k3e'),
        'name_admin_bar' => __('Zarobek', 'k3e'),
        'archives' => __('Archiwum zarobków', 'k3e'),
        'attributes' => __('Atrybuty zarobków', 'k3e'),
        'parent_item_colon' => __('Zarobek nadrzędny:', 'k3e'),
        'all_items' => __('Wszystkie zarobki', 'k3e'),
        'add_new_item' => __('Dodaj nowy zarobek', 'k3e'),
        'add_new' => __('Dodaj nowy', 'k3e'),
        'new_item' => __('Nowy zarobek', 'k3e'),
        'edit_item' => __('Edytuj zarobek', 'k3e'),
        'update_item' => __('Aktualizuj zarobek', 'k3e'),
        'view_item' => __('Zobacz zarobek', 'k3e'),
        'view_items' => __('Zabacz zarobki', 'k3e'),
        'search_items' => __('Szukaj zarobku', 'k3e'),
        'not_found' => __('Brak zarobków', 'k3e'),
        'not_found_in_trash' => __('Brak w koszu', 'k3e'),
        'featured_image' => __('Obrazek powiązany', 'k3e'),
        'set_featured_image' => __('Ustaw obrazek powiązany', 'k3e'),
        'remove_featured_image' => __('Usuń obrazek powiązany', 'k3e'),
        'use_featured_image' => __('Uzyj jako obrazek powiązany', 'k3e'),
        'insert_into_item' => __('Wstaw do zarobku', 'k3e'),
        'uploaded_to_this_item' => __('Wgrano do tego zarobku', 'k3e'),
        'items_list' => __('Lista zarobków', 'k3e'),
        'items_list_navigation' => __('Nawigacja listy zarobków', 'k3e'),
        'filter_items_list' => __('Filtruj zarobki na liście', 'k3e'),
    );
    $args = array(
        'label' => __('Zarobek', 'k3e'),
        'description' => __('Wpisy zawierający informacje na temat zarobków', 'k3e'),
        'labels' => $labels,
        'supports' => array('title', 'post-formats'),
        'taxonomies' => array('expense_type', 'expense_field'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-chart-area',
        'show_in_admin_bar' => false,
        'show_in_nav_menus' => false,
        'can_export' => false,
        'has_archive' => true,
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'rewrite' => false,
        'capability_type' => 'post',
        'show_in_rest' => false,
    );
    register_post_type('income', $args);
}

add_action('init', 'income', 0);
