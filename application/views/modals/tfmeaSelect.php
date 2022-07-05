<div class="modal fade" id="fmeaLite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FMEA選ぶの画面</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


            </div>
            <div class="modal-body">
                <div class="col-12">

                    <label for="recipient-name" class="col-form-label">部署</label>
                    <select class="form-control" name="" id="departement_select">
                        <option value="" selected>全て</option>
                        <option value="1" >1</option>
                        <option value="2" >2</option>
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

<script>
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


                        if (title == '発生日')
                            $('#search-bar').append('<th><input type="date" placeholder="Search " class="column_search form-control" id="search-bar-' + title + '" /></th>');
                        else if (title.length == 0 )
                            $('#search-bar').append('<th></th>');
                        else
                            $('#search-bar').append('<th><input type="text" placeholder="Search " class="column_search form-control" id="search-bar-' + title + '" /></th>');

                    });

                    // DataTable
                    var table = $('#trouble_fmea_table_lite').DataTable({
                        ordering: true,
                        aoColumns: [{
                                "bSortable": true
                            },
                            {
                                "bSortable": true
                            },
                            {
                                "bSortable": true
                            },
                            {
                                "bSortable": true
                            },
                            {
                                "bSortable": false
                            },

                        ],
                        info: false,
                        // searching:false,
                        paging: false,
                        orderCellsTop: true,
                        fixedHeader: true,
                        pageLength: 100,
                        dom: 't',
                        "language": {
                            "zeroRecords": "該当する記録は見つかりません",
                        }
                    });

                    // Apply the search
                    $('#trouble_fmea_table_lite thead').on('keyup change', ".column_search", function() {

                        table
                            .column($(this).parent().index())
                            .search(this.value)
                            .draw();
                    });

                    $('#departement_select').on('change', function () {
                        table.column($('#department_ref').index()).search($(this).val()).draw();
                    })

                });



            }

        })
    })
</script>