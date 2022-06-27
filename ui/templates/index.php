<div class="wrap" id="configuration-page">
    <h1 class="wp-heading-inline">
        <?php esc_html_e('Tablica przepływu', 'k3e'); ?>
    </h1>


    <div id="dashboard-widgets-wrap">
        <div id="dashboard-widgets" class="metabox-holder">
            <div class="postbox-container" style="width:100%;">
                <div class="card" style="max-width: none; margin:2px">
                    <?php
                    $args1 = array(
                        'post_type' => 'expense',
                        'order' => 'ASC',
                    );

                    $args2 = array(
                        'post_type' => 'income',
                        'order' => 'ASC',
                    );

                    $expenses = new WP_Query($args1);
                    $incomes = new WP_Query($args2);
                    ?>
                    <table id="expenses" class="display" style="width:100%" data-counter="<?= $expenses->found_posts + $incomes->found_posts ?>">
                        <thead>
                            <tr>
                                <th style="text-align: left;">Wpis</th>
                                <th style="text-align: left;">Kwota</th>
                                <th style="text-align: left;">Data</th>
                                <th style="text-align: left;">Załączniki</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($expenses->have_posts()) : $expenses->the_post(); ?>
                                <tr>
                                    <td><a href="/wp-admin/post.php?action=edit&post=<?= get_the_ID() ?>" style="text-decoration: none;"><?= get_the_title() ?></a></td>
                                    <td><span style="color: #b32d2e">- <?= number_format(get_post_meta(get_the_ID(), 'expense_transaction_price', true), 2) ?></span></td>
                                    <td><?= get_post_meta(get_the_ID(), 'expense_transaction_date', true) ?: '0000-00-00' ?></td>
                                    <td>
                                        <?php
                                        $args = array(
                                            'post_type' => 'attachment',
                                            'post_parent' => get_the_ID(),
                                        );

                                        $posts = get_posts($args);
                                        ?>
                                        <?= count($posts) ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            <?php while ($incomes->have_posts()) : $incomes->the_post(); ?>
                                <tr>
                                    <td><a href="/wp-admin/post.php?action=edit&post=<?= get_the_ID() ?>" style="text-decoration: none;"><?= get_the_title() ?></a></td>
                                    <td><span style="color: #119C38">+ <?= number_format(get_post_meta(get_the_ID(), 'income_transaction_price', true), 2) ?></span></td>
                                    <td><?= get_post_meta(get_the_ID(), 'income_transaction_date', true) ?: '0000-00-00' ?></td>
                                    <td>
                                        <?php
                                        $args = array(
                                            'post_type' => 'attachment',
                                            'post_parent' => get_the_ID(),
                                        );

                                        $posts = get_posts($args);
                                        ?>
                                        <?= count($posts)?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="text-align: left;">Wpis</th>
                                <th style="text-align: left;">Kwota</th>
                                <th style="text-align: left;">Data</th>
                                <th style="text-align: left;">Załączniki</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>