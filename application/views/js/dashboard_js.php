<!-- trouble_list -->
<script>
    const DATA = {};

    DATA.onLoad = function() {
        get_troubleList();
    }

    // 更新 Button toggle
    function show_button() {
        $(".button_column").toggle();
        $("#search-bar-").hide();
    }

    // 設備 Table Constructor -> Via dashboard/get_troubleList
    // Also has ajax based search bar
    function get_troubleList() {
        // Toggle Button
        $('#new_spareparts').hide();
        $('#new_trouble').show();
        // Toggle Div
        $('#spare_part_list').hide();
        $("#trouble_list").show();

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/get_troubleList",
            success: function(response) {
                $("#trouble_list").html(response);
            },
            complete: function() {
                $(document).ready(function() {
                    // Setup - add a text input to each cell
                    $('#trouble_table thead tr:eq(0) th').each(function() {
                        var title = $(this).text();
                        $(this).html('<label class="form-label" for="search-bar-' + title + '">' + title + '</label><input type="text" placeholder="Search " class="column_search form-control" id="search-bar-' + title + '" />');
                    });

                    // DataTable
                    var table = $('#trouble_table').DataTable({
                        ordering: false,
                        info: false,
                        // searching:false,
                        paging: false,
                        orderCellsTop: true,
                        fixedHeader: true,
                        pageLength: 100,
                        "language": {
                            "zeroRecords": "該当する記録は見つかりません",
                        }
                    });

                    // Apply the search
                    $('#trouble_table thead').on('keyup', ".column_search", function() {

                        table
                            .column($(this).parent().index())
                            .search(this.value)
                            .draw();
                    });

                });
            }
        });
    }

    // 送品 Table Constructor -> Via dashboard/get_sparepartList
    // Also has ajax based search bar
    function get_sparepartlist() {
        // Toggle Button
        $('#new_trouble').hide();
        $('#new_spareparts').show();
        // Toggle Div
        $('#trouble_list').hide();
        $("#spare_part_list").show();

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/get_sparepartList",
            success: function(response) {
                $("#spare_part_list").html(response);
            },
            complete: function() {
                console.log('done')
            }
        });
    }

    // function delete_sparepart() {
    //     partId = ;
    //     $(document).on('click', '.form-check-input', function() {

    //     });
    // }
    function deleteData($id, $type) {

        var conf = swal({
                title: "データを削除しますか？",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal({
                        // button: false,
                        title: "データが削除されました",
                        icon: "success",
                    });
                    $.ajax({
                        url: "<?= base_url() ?>dashboard/deleteDatas/" + $id + "/" + $type,
                        complete: function() {
                            if ($type == 'spareparts')
                                get_sparepartlist();
                            else
                                get_troubleList();

                        }
                    });
                } else {
                    // DELETE CANCELLED
                }
            });
    }

    // 送品 search function
    function search_all_function() {
        var $rows = $('#gen_table tbody tr');

        $('#table_input').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });
    }


    function view_record(el) {
        var $id = $(el).children('.ID').text().trim();
        var url = 'item/' + $id;
        console.log(url)
        window.location.replace(<?php base_url() ?>url)
    }

    function editSpare_populate(el) {
        $id = $(el).parent().siblings('.ID').text().trim()

        $.ajax({
            url: "<?php echo base_url() ?>dashboard/editSpares_view/" + $id,
            success: function(response) {
                console.log(response)
                $('#modalPlaceHolder').append(response)
                // var editSpareModal = new bootstrap.Modal($('#editPartsModal'))
                // editSpareModal.show();
                $('#editPartsModal').modal('show');

            },
            complete: function() {
                console.log('done')
            }
        });
        // Get DATA via ID
        // CALL MODAL FILLED WITH DATA
        // via ajax
    }

    function editSpare() {
        
        var spare_data = {
            "c_t202_id": $('#partId_edit').val(),
            "c_purchaseDate": $('#purchaseDate_edit').val(),
            "c_department": $('#department_edit').val(),
            "c_placement": $('#placement_edit').val(),
            "c_partName": $('#partName_edit').val(),
            "c_model": $('#model_edit').val(),
            "c_maker": $('#maker_edit').val(),
            "c_quantity": $('#quantity_edit').val(),
            "c_unit": $('#unit_edit').val(),
            "c_price":$('#price_edit').val()
        }

        $.ajax({
            url: "<?= base_url(); ?>dashboard/editSpare",
            type: 'POST',
            data: spare_data,
            success: function(response) {
                console.log(response);
                if(response == 1){
                    $('#editPartsModal').modal('hide');
                    get_sparepartlist();
                } else {
                    $('#alert-msg').html('<div class="alert alert-danger">' + response + '</div>');
                }   
            },
            complete: function() {
                console.log('DONNNNNN')
            }
        });
        event.preventDefault();

    }

    document.addEventListener("DOMContentLoaded", DATA.onLoad)
</script>