<?php

// Register Custom Taxonomy
function expense_type() {

    $labels = array(
        'name' => _x('Typy', 'Taxonomy General Name', 'k3e'),
        'singular_name' => _x('Typ', 'Taxonomy Singular Name', 'k3e'),
        'menu_name' => __('Typ wydatku', 'k3e'),
        'all_items' => __('Wszystkie typy wydatków', 'k3e'),
        'parent_item' => __('Nadrzędny typ wydatku', 'k3e'),
        'parent_item_colon' => __('Nadrzędny typ wydatku:', 'k3e'),
        'new_item_name' => __('Nazwa nowego typu wydatku', 'k3e'),
        'add_new_item' => __('Dodaj nowy typ wydatków', 'k3e'),
        'edit_item' => __('Edytuj typ wydatków', 'k3e'),
        'update_item' => __('Aktualizyj typ wydatków', 'k3e'),
        'view_item' => __('Zobacz typ wydatków', 'k3e'),
        'separate_items_with_commas' => __('Typy wydatków oddzielaj przecinkiem', 'k3e'),
        'add_or_remove_items' => __('Dodaj lub usuń typy wydatków', 'k3e'),
        'choose_from_most_used' => __('Wybierz z najczęściej używanych', 'k3e'),
        'popular_items' => __('Popularne typy wydatków', 'k3e'),
        'search_items' => __('Szukaj typów wydatków', 'k3e'),
        'not_found' => __('Brak typu wydatku', 'k3e'),
        'no_terms' => __('Brak typów wydatków', 'k3e'),
        'items_list' => __('Lista typów wydatków', 'k3e'),
        'items_list_navigation' => __('Nawigacja listy typów wydatków', 'k3e'),
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
        'menu_name' => __('Grupa wydatku', 'k3e'),
        'all_items' => __('Wszystkie grupy wydatków', 'k3e'),
        'parent_item' => __('Nadrzędna grupa wydatku', 'k3e'),
        'parent_item_colon' => __('Nadrzędna grupa wydatku:', 'k3e'),
        'new_item_name' => __('Nazwa nowej grupy wydatku', 'k3e'),
        'add_new_item' => __('Dodaj nową grupę wydatków', 'k3e'),
        'edit_item' => __('Edytuj grupę wydatków', 'k3e'),
        'update_item' => __('Aktualizyj grupę wydatków', 'k3e'),
        'view_item' => __('Zobacz grupę wydatków', 'k3e'),
        'separate_items_with_commas' => __('Grupy wydatków oddzielaj przecinkiem', 'k3e'),
        'add_or_remove_items' => __('Dodaj lub usuń grupę wydatków', 'k3e'),
        'choose_from_most_used' => __('Wybierz z najczęściej używanych', 'k3e'),
        'popular_items' => __('Popularne grupy wydatków', 'k3e'),
        'search_items' => __('Szukaj grupy wydatków', 'k3e'),
        'not_found' => __('Brak grupy wydatku', 'k3e'),
        'no_terms' => __('Brak grupy wydatków', 'k3e'),
        'items_list' => __('Lista grup wydatków', 'k3e'),
        'items_list_navigation' => __('Nawigacja listy grup wydatków', 'k3e'),
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
