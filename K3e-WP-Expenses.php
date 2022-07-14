<?php

/*
  Plugin name: K3e - Licznik wydatków
  Plugin URI:
  Description: Dedykowany system kontroli wydatków.
  Author: K3e
  Author URI: https://www.k3e.pl/
  Text Domain:
  Domain Path:
  Version: 0.0.2c
 */
require_once 'cpt/expense.php';
require_once 'cpt/income.php';
require_once 'cpt/plugin_taxonomy.php';

add_action('init', 'k3e_expenses_plugin_init');

function k3e_expenses_plugin_init() {
    do_action('k3e_expenses_plugin_init');

    require_once 'ui/UIClassExpenses.php';
    UIClassExpenses::init();
    require_once 'ui/UIClassExpensesAdmin.php';
    require_once 'ui/UIClassExpensesFront.php';
    require_once 'ui/UIFunctions.php';

    
    if (is_admin()) {
        require_once 'widgets/ExpensesWidget.php';
        ExpensesWidget::run();
        UIClassExpensesAdmin::run();
    } else {
        UIClassExpensesFront::run();
    }
}

function k3e_expenses_plugin_activate() {
    
}

register_activation_hook(__FILE__, 'k3e_expenses_plugin_activate');

function k3e_expenses_plugin_deactivate() {
    
}

register_deactivation_hook(__FILE__, 'k3e_expenses_plugin_deactivate');
