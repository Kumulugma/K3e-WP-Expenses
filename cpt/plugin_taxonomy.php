<?php

// Register Custom Taxonomy
function expense_type() {

    $labels = array(
        'name' => _x('Typy', 'Taxonomy General Name', 'k3e'),
        'singular_name' => _x('Typ', 'Taxonomy Singular Name', 'k3e'),
        'menu_name' => __('Typ transakcji', 'k3e'),
        'all_items' => __('Wszystkie typy transakcji', 'k3e'),
        'parent_item' => __('Nadrzędny typ transakcji', 'k3e'),
        'parent_item_colon' => __('Nadrzędny typ transakcji:', 'k3e'),
        'new_item_name' => __('Nazwa nowego typu transakcji', 'k3e'),
        'add_new_item' => __('Dodaj nowy typ transakcji', 'k3e'),
        'edit_item' => __('Edytuj typ transakcji', 'k3e'),
        'update_item' => __('Aktualizyj typ transakcji', 'k3e'),
        'view_item' => __('Zobacz typ transakcji', 'k3e'),
        'separate_items_with_commas' => __('Typy transakcji oddzielaj przecinkiem', 'k3e'),
        'add_or_remove_items' => __('Dodaj lub usuń typy transakcji', 'k3e'),
        'choose_from_most_used' => __('Wybierz z najczęściej używanych', 'k3e'),
        'popular_items' => __('Popularne typy transakcji', 'k3e'),
        'search_items' => __('Szukaj typów transakcji', 'k3e'),
        'not_found' => __('Brak typu transakcji', 'k3e'),
        'no_terms' => __('Brak typów transakcji', 'k3e'),
        'items_list' => __('Lista typów transakcji', 'k3e'),
        'items_list_navigation' => __('Nawigacja listy typów transakcji', 'k3e'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => false,
        'show_in_rest' => false,
    );
    register_taxonomy('expense_type', array('expense', 'income'), $args);
}

add_action('init', 'expense_type', 0);

// Register Custom Taxonomy
function expense_field() {

    $labels = array(
        'name' => _x('Grupy', 'Taxonomy General Name', 'k3e'),
        'singular_name' => _x('Grupa', 'Taxonomy Singular Name', 'k3e'),
        'menu_name' => __('Grupa transakcji', 'k3e'),
        'all_items' => __('Wszystkie grupy transakcji', 'k3e'),
        'parent_item' => __('Nadrzędna grupa transakcji', 'k3e'),
        'parent_item_colon' => __('Nadrzędna grupa transakcji:', 'k3e'),
        'new_item_name' => __('Nazwa nowej grupy transakcji', 'k3e'),
        'add_new_item' => __('Dodaj nową grupę transakcji', 'k3e'),
        'edit_item' => __('Edytuj grupę transakcji', 'k3e'),
        'update_item' => __('Aktualizyj grupę transakcji', 'k3e'),
        'view_item' => __('Zobacz grupę transakcji', 'k3e'),
        'separate_items_with_commas' => __('Grupy transakcji oddzielaj przecinkiem', 'k3e'),
        'add_or_remove_items' => __('Dodaj lub usuń grupę transakcji', 'k3e'),
        'choose_from_most_used' => __('Wybierz z najczęściej używanych', 'k3e'),
        'popular_items' => __('Popularne grupy transakcji', 'k3e'),
        'search_items' => __('Szukaj grupy transakcji', 'k3e'),
        'not_found' => __('Brak grupy transakcji', 'k3e'),
        'no_terms' => __('Brak grupy transakcji', 'k3e'),
        'items_list' => __('Lista grup transakcji', 'k3e'),
        'items_list_navigation' => __('Nawigacja listy grup transakcji', 'k3e'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'rewrite' => false,
        'show_in_rest' => false,
    );
    register_taxonomy('expense_field', array('expense', 'income'), $args);
}

add_action('init', 'expense_field', 0);
