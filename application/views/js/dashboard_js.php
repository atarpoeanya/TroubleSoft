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

    function category_switcher(el) {
        // Get selected A
        var a = $(el).html()
        // Get selected B

        // var x  = selc

        switch (a) {
            case '設備':
                get_troubleList();
                $("#real, #fmea-s").show()

                $("#real").attr("onclick", "buttonSwitch(this);get_troubleList()");
                $("#fmea-s").attr("onclick", "buttonSwitch(this);get_troubleList_fmea()");

                $("#real").addClass('active');
                $("#fmea-s").removeClass('active')


                break;
            case '予備品':
                get_sparepartlist();
                $("#real, #fmea-s").hide()


                break;
            case '品質':
                $("#real").attr("onclick", "buttonSwitch(this);get_troubleList()");
                $("#fmea-s").attr("onclick", "buttonSwitch(this);get_sparepartlist()");
                break;
            default:
                break;
        }

        console.log(a)

    }

    // 設備 Table Constructor -> Via dashboard/get_troubleList
    // Also has ajax based search bar
    function get_troubleList() {
        // Toggle Button
        $('#new_spareparts').hide();
        $('#new_trouble').show();
        // Toggle Div
        // $('#spare_part_list').hide();
        // $("#trouble_list").show();
        // $("#trouble_list_fmea").hide();
        $('#list').children().remove()

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/get_troubleList",
            success: function(response) {
                $("#list").html(response);
            },
            complete: function() {
                $(document).ready(function() {
                    // Setup - add a text input to each cell
                    $('#trouble_table thead tr:eq(0) th').each(function() {
                        var title = $(this).text().trim();


                        if (title == '発生日')
                            $('#search-bar').append('<th><input type="date" placeholder="Search " class="column_search form-control" id="search-bar-' + title + '" /></th>');
                        else if (title.length == 0)
                            $('#search-bar').append('<th class="button_column buttons" style="display:none"></th>');
                        else
                            $('#search-bar').append('<th><input type="text" placeholder="Search " class="column_search form-control" id="search-bar-' + title + '" /></th>');

                    });

                    // DataTable
                    var table = $('#trouble_table').DataTable({
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
                        "language": {
                            "zeroRecords": "該当する記録は見つかりません",
                        }
                    });

                    // Apply the search
                    $('#trouble_table thead').on('keyup change', ".column_search", function() {

                        table
                            .column($(this).parent().index())
                            .search(this.value)
                            .draw();
                    });

                });
            }
        });
    }

    // 設備 Table Constructor -> Via dashboard/get_troubleList
    // Also has ajax based search bar
    function get_troubleList_fmea() {
        // Toggle Button
        $('#new_spareparts').hide();
        $('#new_trouble').show();
        // Toggle Div
        // $('#spare_part_list').hide();
        // $("#trouble_list").hide();
        // $("#trouble_list_fmea").show();
        $('#list').children().remove()



        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/get_troubleList_fmea",
            success: function(response) {
                $("#list").html(response);
            },
            complete: function() {




                $(document).ready(function() {
                    // Setup - add a text input to each cell
                    $('#trouble_fmea_table thead tr:eq(0) th').each(function() {
                        var title = $(this).text().trim();


                        if (title == '発生日')
                            $('#search-bar').append('<th><input type="date" placeholder="Search " class="column_search form-control" id="search-bar-' + title + '" /></th>');
                        else if (title.length == 0)
                            $('#search-bar').append('<th class="button_column buttons" style="display:none"></th>');
                        else
                            $('#search-bar').append('<th><input type="text" placeholder="Search " class="column_search form-control" id="search-bar-' + title + '" /></th>');

                    });

                    // DataTable
                    var table = $('#trouble_fmea_table').DataTable({
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
                        "language": {
                            "zeroRecords": "該当する記録は見つかりません",
                        }
                    });

                    // Apply the search
                    $('#trouble_fmea_table thead').on('keyup change', ".column_search", function() {

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
        // $('#trouble_list').hide();
        $('#list').children().remove()
        // $("#spare_part_list").show();

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/get_sparepartList",
            success: function(response) {
                $("#list").html(response);
            },
            complete: function() {
                // console.log('done')
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
                            if(($type == 'equipment'))
                                get_troubleList();
                            else
                                get_troubleList_fmea()

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

        if (!$(el).hasClass('fmea-tools'))
            var url = 'item/' + $id;
        else
            var url = 'item_fmea/' + $id;
        // console.log(url)
        window.location.replace(<?php base_url() ?>url)
    }

    function editSpare_populate(el) {
        $id = $(el).parent().siblings('.ID').text().trim()
        // console.log($id)
        $.ajax({
            url: "<?php echo base_url() ?>dashboard/editSpares_view/" + $id,
            success: function(response) {
                // console.log(response)
                $('#modalPlaceHolder').append(response)
                // var editSpareModal = new bootstrap.Modal($('#editPartsModal'))
                // editSpareModal.show();
                $('#editPartsModal').modal('show');

            },
            complete: function() {
                // console.log('done')
            }
        });
        // Get DATA via ID
        // CALL MODAL FILLED WITH DATA
        // via ajax
    } //USed on 更新 button to populate with db data


    // CAUTION UGLIEST PART OF THE CODE
    // TRIPLE FOR LOOP , DOUBLE sWTICH CASE WITH ONE OF THE LOOP BEING NESTED
    // IT"S DUMB AND I DONT LIKE IT (ALL FOR VALIDATION PURPOSES)

    // WE GUCCHI
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
            "c_price": $('#price_edit').val()
        }

        $.ajax({
            url: "<?= base_url(); ?>dashboard/editSpare",
            type: 'POST',
            data: spare_data,
            success: function(response) {
                console.log(response);
                if (response == 1) {
                    $('#editPartsModal').modal('hide');
                    $('#form-parts-edit').find("input[type=text],input[type=number], textarea").val("");
                    get_sparepartlist();
                } else {
                    var stringNum = response.replace(/[^0-9.]/g, '');
                    var arrNum = Array.from(String(stringNum), Number)
                    for (let index = 0; index < arrNum.length; index++) {

                        switch (arrNum[index]) {
                            case 2:
                                $('#purchaseDate_edit').addClass('is-invalid')
                                break;
                            case 3:
                                $('#partName_edit').addClass('is-invalid')
                                break;
                            case 4:
                                $('#model_edit').addClass('is-invalid')
                                break;
                            case 5:
                                $('#maker_edit').addClass('is-invalid')
                                break;
                            case 6:
                                $('#quantity_edit').addClass('is-invalid')
                                break;
                            case 7:
                                $('#unit_edit').addClass('is-invalid')
                                break;
                            case 8:
                                $('#price_edit').addClass('is-invalid')
                                break;


                            default:
                                break;
                        }


                    }
                }
            },
            complete: function() {
                console.log('DONNNNNN')
            }
        });
        event.preventDefault();

    }

    function addSpare() {

        var spare_data = {
            "c_t202_id": $('#partId').val(),
            "c_purchaseDate": $('#purchaseDate').val(),
            "c_partName": $('#partName').val(),
            "c_model": $('#model').val(),
            "c_maker": $('#maker').val(),
            "c_quantity": $('#quantity').val(),
            "c_unit": $('#unit').val(),
            "c_price": $('#price').val(),

            'c_storage': $('#storage').val(),
            'c_arrangement': $('#arra').val(),
        }

        $.ajax({
            url: "<?= base_url(); ?>dashboard/postSpare",
            type: 'POST',
            data: spare_data,
            success: function(response) {
                // console.log(response);
                if (response == 1) {
                    $('#addPartsModal').modal('hide');
                    $('#form-parts').find("input[type=text],input[type=number], textarea").val("");
                    // $('#form-parts').find("input[type=number], textarea").val("");
                    get_sparepartlist();
                } else {
                    var stringNum = response.replace(/[^0-9.]/g, '');
                    var arrNum = Array.from(String(stringNum), Number)
                    for (let index = 0; index < arrNum.length; index++) {

                        switch (arrNum[index]) {
                            case 1:
                                $('#purchaseDate').addClass('is-invalid')
                                break;
                            case 2:
                                $('#partName').addClass('is-invalid')
                                break;
                            case 3:
                                $('#model').addClass('is-invalid')
                                break;
                            case 4:
                                $('#maker').addClass('is-invalid')
                                break;
                            case 5:
                                $('#quantity').addClass('is-invalid')
                                break;
                            case 6:
                                $('#unit').addClass('is-invalid')
                                break;
                            case 7:
                                $('#price').addClass('is-invalid')
                                break;


                            default:
                                break;
                        }


                    }
                    // var arr = [1, 2, 3, 4, 5, 6, 7, 8, 9]
                    // for (let i = 0; i < arr.length; i++) {
                    //     for (let k = 0; k < arrNum.length; k++) {
                    //         if (arrNum.includes(arr[i]))
                    //             continue;
                    //         else {
                    //             switch (arr[i]) {
                    //                 case 1:
                    //                     $('#purchaseDate').removeClass('is-invalid')
                    //                     break;
                    //                 case 2:
                    //                     $('#department').removeClass('is-invalid')
                    //                     break;
                    //                 case 3:
                    //                     $('#placement').removeClass('is-invalid')
                    //                     break;
                    //                 case 4:
                    //                     $('#partName').removeClass('is-invalid')
                    //                     break;
                    //                 case 5:
                    //                     $('#model').removeClass('is-invalid')
                    //                     break;
                    //                 case 6:
                    //                     $('#maker').removeClass('is-invalid')
                    //                     break;
                    //                 case 7:
                    //                     $('#quantity').removeClass('is-invalid')
                    //                     break;
                    //                 case 8:
                    //                     $('#unit').removeClass('is-invalid')

                    //                     break;
                    //                 case 9:
                    //                     $('#price').removeClass('is-invalid')
                    //                     break;


                    //                 default:
                    //                     break;
                    //             }
                    //         }

                    //     }

                    // }
                }
            },
            complete: function() {
                // console.log('DONNNNNN')
            }
        });
        event.preventDefault();

    }


    // ON FOCUS REMOVE CLASS (Probably solution to the double loop)

    // SAVIOOUR
    $('input').on('click', function name(params) {
        $(this).removeClass('is-invalid')
    })






    document.addEventListener("DOMContentLoaded", DATA.onLoad)
</script>