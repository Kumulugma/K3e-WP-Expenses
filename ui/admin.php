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

        Expense::ExpenseBox();
        Expense::IncomeBox();

//        function expenses_plugin_settings() {
//            register_setting(WeatherSynchronizer::WEATHER_API_KEY_LABEL, WeatherSynchronizer::WEATHER_API_KEY_OPTION);
//        }

        function expenses_content() {

            Expense::List();
            include plugin_dir_path(__FILE__) . 'templates/index.php';
        }

    }

    public static function List() {
        wp_enqueue_script('dataTable', plugin_dir_url(__FILE__) . "../node_modules/datatables.net/js/jquery.dataTables.min.js", ['jquery']);
        wp_enqueue_style('dataTable-css', "https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css");
        wp_enqueue_script('dataTable-config', plugin_dir_url(__FILE__) . "../assets/dataTable.js");
    }

    public static function ExpenseBox() {

        function price_expense_meta_box() {
            add_meta_box("process-meta-box", "Kwota", "price_expense_box_markup", "expense", "normal", "high", null);
        }

        add_action("add_meta_boxes", "price_expense_meta_box");

        function price_expense_box_markup($object) {
            include plugin_dir_path(__FILE__) . 'templates/expense/form.php';
        }

        function k3e_expense_save_meta_box($post_id) {
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

        add_action('save_post', 'k3e_expense_save_meta_box');
    }

    public static function IncomeBox() {

        function price_income_meta_box() {
            add_meta_box("process-meta-box", "Kwota", "price_income_box_markup", "income", "normal", "high", null);
        }

        add_action("add_meta_boxes", "price_income_meta_box");

        function price_income_box_markup($object) {
            include plugin_dir_path(__FILE__) . 'templates/income/form.php';
        }

        function k3e_income_save_meta_box($post_id) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return;
            if ($parent_id = wp_is_post_revision($post_id)) {
                $post_id = $parent_id;
            }
            $fields = [
                'income_transaction_date',
                'income_transaction_price',
            ];
            foreach ($fields as $field) {
                if (array_key_exists($field, $_POST)) {
                    update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
                }
            }
        }

        add_action('save_post', 'k3e_income_save_meta_box');
    }

}
