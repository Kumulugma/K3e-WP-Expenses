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

            add_action('admin_init', 'expenses_plugin_settings');
        }

        function expenses_plugin_settings() {
            register_setting(WeatherSynchronizer::WEATHER_API_KEY_LABEL, WeatherSynchronizer::WEATHER_API_KEY_OPTION);
        }

        function expenses_content() {
            include plugin_dir_path(__FILE__) . 'templates/index.php';
        }

        Expenses::save();
    }

    public static function save() {
        if (isset($_POST['Expenses'])) {
            if (isset($_POST['Expenses']['synchronise'])) {
                
            }
            wp_redirect('admin.php?page=' . $_GET['page']);
        }
    }

}
