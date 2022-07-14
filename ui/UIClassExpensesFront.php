<?php

class UIClassExpensesFront extends UIClassExpenses {

    public static function run() {

        add_action('template_redirect', 'attachment_redirect');

        function attachment_redirect() {
            $homepage_id = get_option('page_on_front');
            if ('attachment' == get_post_type()) {
                wp_redirect(home_url('index.php?page_id=' . $homepage_id));
            }
        }

    }

}
