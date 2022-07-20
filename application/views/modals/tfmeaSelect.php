<div class="modal fade" id="fmeaLite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FMEA選ぶの画面</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


            </div>
            <div class="modal-body" >
                <div class="col-12">

                    <label for="departement_select" class="col-form-label">部署</label>
                    <select class="form-control" name="" id="departement_select">
                        <option value="" selected>全部</option>
                        <option value="生技">生技</option>
                        <option value="塗装">塗装</option>
                    </select>


                </div>
                <div class="mb-3">
                    <div id="fmeaUpper"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->data['CANCEL_BUTTON'] ?></button>
            </div>
        </div>
    </div>
</div>

<style>
    #details {
        margin: 0;
    }

    .shown tr td {
        padding: 0;
    }
</style>

<script>
    function format(d) {
        return (
            '<table class="table" id="details">' +
            '<tbody>' +
            '   <tr><td>&nbsp;&nbsp;<b>予防</b> :' + d.c_prevention + '</td></tr>' +
            '   <tr><td>&nbsp;&nbsp;<b>検出</b> :' + d.c_detection + '</td></tr>' +
            '   <tr><td>&nbsp;&nbsp;<b>対策案</b> :' + d.c_counterPlan + '</td></tr>' +
            '   <tr><td>&nbsp;&nbsp;<b>故障の潜在原因メカニズム</b> :' + d.c_failImpact + '</td></tr>' +
            '</tbody>' +
            '</table>'
        );
    }

    function show($id) {
        $.ajax({
            url: "<?= base_url(); ?>dashboard/fmea_tool_print/" + $id,

            success: function(response) {
                $("#fmea_place").html(response);
                $('#fmea_id').val($id)
            },
        })
    }

    // List loader
    $('#fmeaLite').on('show.bs.modal', function(event) {
        $.ajax({
            url: "<?= base_url(); ?>dashboard/get_trouble_list_tool_fmea_lite",

            success: function(response) {
                $("#fmeaUpper").html(response)

            },

            complete: function() {




                $(document).ready(function() {
                    // Setup - add a text input to each cell
                    $('#trouble_fmea_table_lite thead tr:eq(0) th').each(function() {
                        var title = $(this).text().trim();



                        if (title.length == 0)
                            $('#search-bar').append('<th></th>');
                        else if (title.length == 0 && $(this).hasClass('button_column'))
                            $('#search-bar').append('<th class="table-light"></th>');
                        else
                            $('#search-bar').append('<th><input type="text" placeholder="Search " class="column_search form-control" id="search-bar-' + title + '" /></th>');

                    });

                    // DataTable
                    var table = $('#trouble_fmea_table_lite').DataTable({
                        ajax: {
                            url: '<?= base_url() ?>dashboard/get_trouble_list_data',
                            dataSrc: ''
                        },
                        ordering: true,
                        info: false,
                        paging: false,
                        orderCellsTop: true,
                        dom: 't',
                        scrollX: false,
                        "language": {
                            "zeroRecords": "該当する記録は見つかりません",
                        },
                        "columnDefs": [{
                            "className": "dt-center",
                            "targets": "_all"
                        }],
                        columns: [{
                                className: 'dt-control',
                                orderable: false,
                                data: null,
                                defaultContent: '',
                                "bSortable": false
                            },
                            {

                                data: 'c_facility',
                                width: '30%'
                            },
                            {

                                data: 'c_processName',
                                width: '30%'
                            },
                            {

                                data: 'c_failMode',
                                width: '35%'
                            },
                            {

                                data: null,
                                "bSortable": false,
                                render: function(data, type, row) {

                                    return '<button class="btn btn-primary text-nowrap" onclick="show(' + data.c_t203_id + ')" data-bs-dismiss="modal" >登録</button>';
                                }
                            },
                            {
                                data: 'c_department',
                                visible: false
                            }
                        ]
                     

                    });

                    // Show and hide function for
                    $('#trouble_fmea_table_lite tbody').on('click', 'td.dt-control', function() {
                        var tr = $(this).closest('tr');
                        var row = table.row(tr);

                        if (row.child.isShown()) {

                            row.child.hide();
                            tr.removeClass('shown');
                        } else {

                            row.child(format(row.data())).show();
                            tr.addClass('shown');
                        }
                    });

                    // Apply the search
                    $('#trouble_fmea_table_lite thead').on('keyup change', ".column_search", function() {

                        table
                            .column($(this).parent().index())
                            .search(this.value)
                            .draw();
                    });

                    // Div selector
                    $('#departement_select').on('change', function() {
                        table.search($(this).val()).draw();
                    })

                });



            }

        })
    })
</script>