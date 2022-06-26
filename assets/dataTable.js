jQuery(document).ready(function () {
    var table = jQuery('#process-steps').DataTable(
            {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pl.json"
                },
                "columnDefs": [{
                        "targets": 1,
                        "orderable": false
                    }]
            });

    var counter = jQuery('#process-steps').data('counter');


    jQuery('#process-steps tbody').on('click', 'tr', function () {
        if (jQuery(this).hasClass('selected')) {
            jQuery(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            jQuery(this).addClass('selected');
        }
    });

    jQuery('#proces-step-remove').click(function () {
        event.preventDefault();
        table.row('.selected').remove().draw(false);
    });

    jQuery('#addRow').click(function () {
        event.preventDefault();
        counter++;
        table.row.add([
            counter,
            '<input name="step[]" class="" type="text" size="140" value=""/>'
        ]).draw(false);
    });
});