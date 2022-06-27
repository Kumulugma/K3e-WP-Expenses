jQuery(document).ready(function () {
    var table = jQuery('#expenses').DataTable(
            {
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/pl.json"
                },
                "columnDefs": [{
                        "targets": 1,
                        "orderable": false
                    }],
                order: [[2, 'desc']]
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

});