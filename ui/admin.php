<?php

class Expense {

    public static function run() {

        add_action('admin_menu', 'expenses_menu');

        function expenses_menu() {
            add_menu_page(
                    __('Licznik wydatków', 'k3e'), //Title
                    __('Licznik wydatków', 'k3e'), //Name
                    'manage_options',
                    'expenses',
                    'expenses_content',
                    'dashicons-email-alt2',
                    5
            );

            /* Dostępne pozycje
              2 – Dashboard
              4 – Separator
              5 – Posts
              10 – Media
              15 – Links
              20 – Pages
              25 – Comments
              59 – Separator
              60 – Appearance
              65 – Plugins
              70 – Users
              75 – Tools
              80 – Settings
              99 – Separator
             */

//            add_action('admin_init', 'expenses_plugin_settings');
        }

//        function expenses_plugin_settings() {
//            register_setting(WeatherSynchronizer::WEATHER_API_KEY_LABEL, WeatherSynchronizer::WEATHER_API_KEY_OPTION);
//        }

        function expenses_content() {
            include plugin_dir_path(__FILE__) . 'templates/index.php';
        }

        function price_expense_meta_box() {
            add_meta_box("process-meta-box", "Kwota", "price_expense_box_markup", "expense", "normal", "high", null);
        }

        add_action("add_meta_boxes", "price_expense_meta_box");

        function price_expense_box_markup($object) {
            include plugin_dir_path(__FILE__) . 'templates/expense/form.php';
        }

        function k3e_save_meta_box($post_id) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return;
            if ($parent_id = wp_is_post_revision($post_id)) {
                $post_id = $parent_id;
            }
            $fields = [
                'expense_transaction_date',
                'expense_transaction_price',
            ];
            foreach ($fields as $field) {
                if (array_key_exists($field, $_POST)) {
                    update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
                }
            }
        }

        add_action('save_post', 'k3e_save_meta_box');
    }

}
