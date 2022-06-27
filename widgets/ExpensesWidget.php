<?php

class ExpensesWidget {

    public static function run() {
        
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
                            echo get_post_meta(get_the_ID(), 'expense_transaction_price', true);
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
                            echo get_post_meta(get_the_ID(), 'expense_transaction_price', true);
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

}
?>