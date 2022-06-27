<?php

class ExpensesWidget {

    public static function run() {

        self::ExpensesDashboardBox();
        self::IncomesDashboardBox();
        self::GroupTransactionsDashboardBox();
    }

    public static function ExpensesDashboardBox() {
        add_action('wp_dashboard_setup', 'last_expenses_dashboard_widget');

        function last_expenses_dashboard_widget() {
            global $wp_meta_boxes;

            wp_add_dashboard_widget('last_expenses_help_widget', 'Ostatnie wydatki', 'last_expenses_dashboard');
        }

        function last_expenses_dashboard() {
            ?>
            <div>
                <?php
                $args = array(
                    'post_type' => 'expense',
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);
                ?>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <th style="text-align: left;"><?= __("Wpis", 'k3e') ?></th>
                            <th style="text-align: left;"><?= __("Kwota", 'k3e') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($loop->have_posts()) : $loop->the_post();
                            echo "<tr>";
                            echo '<td>';
                            echo '<a href="/wp-admin/post.php?action=edit&post=' . get_the_ID() . '" style="text-decoration: none;"> ' . get_the_title() . '</a>';
                            echo '</td>';
                            echo '<td>';
                            echo number_format(get_post_meta(get_the_ID(), 'expense_transaction_price', true), 2);
                            echo '</td>';
                            echo "</tr>";
                        endwhile;

                        wp_reset_postdata();
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }

    }

    public static function IncomesDashboardBox() {
        add_action('wp_dashboard_setup', 'last_incomes_dashboard_widget');

        function last_incomes_dashboard_widget() {
            global $wp_meta_boxes;

            wp_add_dashboard_widget('last_incomes_help_widget', 'Ostatnie wpływy', 'last_incomes_proposition_dashboard');
        }

        function last_incomes_proposition_dashboard() {
            ?>
            <div>
                <?php
                $args = array(
                    'post_type' => 'income',
                    'order' => 'ASC',
                );

                $loop = new WP_Query($args);
                ?>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <th style="text-align: left;"><?= __("Wpis", 'k3e') ?></th>
                            <th style="text-align: left;"><?= __("Kwota", 'k3e') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($loop->have_posts()) : $loop->the_post();
                            echo "<tr>";
                            echo '<td>';
                            echo '<a href=/wp-admin/post.php?action=edit&post=' . get_the_ID() . ' style="text-decoration: none;"> ' . get_the_title() . '</a>';
                            echo '</td>';
                            echo '<td>';
                            echo number_format(get_post_meta(get_the_ID(), 'income_transaction_price', true), 2);
                            echo '</td>';
                            echo "</tr>";
                        endwhile;

                        wp_reset_postdata();
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }

    }

    public static function GroupTransactionsDashboardBox() {
        add_action('wp_dashboard_setup', 'group_transactions_dashboard_widget');

        function group_transactions_dashboard_widget() {
            global $wp_meta_boxes;

            wp_add_dashboard_widget('group_transactions_help_widget', 'Grupy transakcji', 'group_transactions_dashboard');
        }

        function group_transactions_dashboard() {
            ?>
            <div>
                <?php
                $expense_fields = get_terms(array(
                    'taxonomy' => 'expense_field',
                    'hide_empty' => false,
                ));
                ?>
                <table style="width:100%;">
                    <thead>
                        <tr>
                            <th style="text-align: left;"><?= __("Grupa", 'k3e') ?></th>
                            <th style="text-align: left;"><?= __("Ostatni miesiąc", 'k3e') ?></th>
                            <th style="text-align: left;"><?= __("Całość", 'k3e') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $month_sum = 0;
                        $year_sum = 0;

                        foreach ($expense_fields as $expense_field) {

                            $month = 0;
                            $year = 0;

                            $args = array(
                                'post_type' => 'income',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'expense_field',
                                        'field' => 'slug',
                                        'terms' => $expense_field->slug
                                    )
                                ),
                            );

                            $loop = new WP_Query($args);
                            while ($loop->have_posts()) : $loop->the_post();
                                if (date('Y-m-d') <= get_post_meta(get_the_ID(), 'income_transaction_date', true)) {
                                    $month += get_post_meta(get_the_ID(), 'income_transaction_price', true);
                                }
                                $year += get_post_meta(get_the_ID(), 'income_transaction_price', true);
                            endwhile;

                            $args = array(
                                'post_type' => 'expense',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'expense_field',
                                        'field' => 'slug',
                                        'terms' => $expense_field->slug
                                    )
                                ),
                            );

                            $loop = new WP_Query($args);
                            while ($loop->have_posts()) : $loop->the_post();
                                if (date('Y-m-d') <= get_post_meta(get_the_ID(), 'expense_transaction_date', true)) {
                                    $month -= get_post_meta(get_the_ID(), 'expense_transaction_price', true);
                                }
                                $year -= get_post_meta(get_the_ID(), 'expense_transaction_price', true);
                            endwhile;

                            echo "<tr>";
                            echo '<td>';
                            echo $expense_field->name;
                            echo '</td>';
                            echo '<td>';
                            echo '<span style="color:' . ($month > 0 ? "#119C38" : ($month == 0 ? "#B3B3B3" : "#b32d2e")) . '">' . number_format($month, 2) . "</span>";
                            echo '</td>';
                            echo '<td>';
                            echo '<span style="color:' . ($year > 0 ? "#119C38" : ($year == 0 ? "#B3B3B3" : "#b32d2e")) . '">' . number_format($year, 2) . "</span>";
                            echo '</td>';
                            echo "</tr>";
                            $month_sum += $month;
                            $year_sum += $year;
                        }

                        wp_reset_postdata();
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="text-align: left;"><?= __("Suma", 'k3e') ?></th>
                            <th style="text-align: left;"><?= number_format($month_sum, 2) ?></th>
                            <th style="text-align: left;"><?= number_format($year_sum, 2) ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <?php
        }

    }

}
?>