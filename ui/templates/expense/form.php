<?php
wp_nonce_field(basename(__FILE__), "meta-box-nonce");
?>
<?php $expense_price = get_post_meta($object->ID, "expense_transaction_price", true); ?>
<?php $expense_date = get_post_meta($object->ID, "expense_transaction_date", true); ?>


<div class="k3e_box">
    <style scoped>
        .k3e_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .k3e_field{
            display: contents;
        }
    </style>
    <p class="meta-options k3e_field">
        <label for="k3e_date"><?= __('Data transakcji', 'k3e') ?></label>
        <input id="k3e_date" type="date" name="expense_transaction_date" value='<?= $expense_date ?>'>
    </p>
    <p class="meta-options k3e_field">
        <label for="k3e_price"><?= __('Kwota', 'k3e') ?></label>
        <input id="k3e_price" type="number" step="0.01" name="expense_transaction_price" value='<?= $expense_price ?>'>
    </p>
</div>

