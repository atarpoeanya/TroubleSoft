<!-- trouble_list -->
<script>
    const DATA = {};

    // Making sure the first seen table get loaded first.
    DATA.onLoad = function() {

        <?php if ($this->session->flashdata('crumbs') == 0) { ?>
            get_troubleList();
            adjust_table();

            $("#real").addClass('active');
            $("#real").removeClass('bg-white')
            $("#fmea-s").removeClass('active')
            $('#new_trouble').attr('href', '<?= base_url() ?>equipment')
        <?php
        } else {
        ?>
            get_troubleList_fmea();
            adjust_table();

            $("#fmea-s").addClass('active')
            $("#real").removeClass('active');
            $("#fmea-s").removeClass('bg-white')
            $('#new_trouble').attr('href', '<?= base_url() ?>equipment_fmea')
        <?php
        }
        ?>

    }


    // Responsive hack, can be delete if unedeed
    //PROBLEM: on browser resize the table on dashboard wont resize too making it either smaller or bigger than the actual space.
    //Might be because DataTable

    $(window).resize(function() {
        // $(window).scrollTop($('#dashboard').height());
        // $('table').DataTable().columns.adjust();
        adjust_table();

        if ($('table').height() <= 190) {

            $('.dataTables_scrollBody').css('height', ($('#main-content').height() - (275 * 90 / 100)));
            $('.dataTables_scrollBody').css('max-height', $('table tbody').height());

        }

    })

    // 変更 Button toggle
    // Also work as colum resizing,
    //PROBLEM: the table head for button parts on table dashboard wont resize when toggled (appear) but will resize when the button inside it is clicked.
    //Might be because DataTable (Smiliar issue with table resize)
    function show_button() {
        $(".button_column").toggle();
        // $("#search-bar-").hide();
        $('.dataTables_scrollBody').scrollLeft(300)
        // Need to call twice because some weird bootstraps datatable interaction
        //Refer to https://datatables.net/forums/discussion/66154/how-to-fix-column-adjustment-of-hidden-table-after-showing-it
        // $('table').DataTable().columns.adjust()
        // $('table').DataTable().columns.adjust()
        adjust_table();

        if ($('th button_column').not(':visible'))
            $('.dataTables_empty').attr('colspan', function(i, rs) {
                return (parseInt(rs) + 1);
            })
        if ($('th button_column:visible'))
            $('.dataTables_empty').attr('colspan', function(i, rs) {
                return (parseInt(rs) - 1);
            })
    }

    // Normal button switched for choosing the displayed table, using class to manipulate the colors
    // Switch the button function around for displaying sub table REAL/FMEA
    function category_switcher(el) {
        // Get selected A
        var a = $(el).prop('name')

        switch (a) {
            case '設備':
                get_troubleList();

                $("#real, #fmea-s").show()

                $("#real").attr("onclick", "buttonSwitch(this);get_troubleList()");
                $("#fmea-s").attr("onclick", "buttonSwitch(this);get_troubleList_fmea()");


                $("#real").addClass('active');
                $("#real").removeClass('bg-white')
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
    }

    function adjust_table() {
        $('table').DataTable().columns.adjust();
    }

    // 設備 Table Constructor -> Via ajax dashboard/get_troubleList
    // The search bar is dataTables, work on surface level by hiding loaded element

    function durToMinDash() {
        var days = $('#days').val()
        var hours = $('#hours').val()
        var minutes = $('#minutes').val()

        // if (minutes >= 60) {
        //     $('#minutes').val(minutes % 60)
        //     $('#hours').val((isNaN(parseInt(hours)) ? $('#hours').val() : 0) + 1)
        // } else if (hours >= 24) {
        //     $('#hours').val(hours % 24)
        //     $('#days').val((isNaN(parseInt(days)) ? $('#days').val() : 0) + 1)
        // }

        days = isNaN(parseInt(days)) ? 0 : $('#days').val();
        hours = isNaN(parseInt(hours)) ? 0 : $('#hours').val();
        minutes = isNaN(parseInt(minutes)) ? 0 : $('#minutes').val();

        console.log(days + '  ' + hours + '  ' + minutes)

        var duration = parseInt(days) * 1440 + parseInt(hours) * 60 + parseInt(minutes) * 1

        $('#search-bar-time').val(duration)
        $('#search-bar-time').click()
    }

    function get_troubleList() {
        // Toggle Button
        $('#new_spareparts').hide();
        $('#new_trouble').show();

        $('#list').children().remove()

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/get_trouble_list_tool",
            success: function(response) {
                $("#list").html(response);
            },
            complete: function() {
                $(document).ready(function() {
                    // Setup - add a text input to each cell
                    $('#trouble_table thead tr:eq(1) th').each(function() {
                        var title = $(this).text().trim();


                        if (title == '発生日時') // For date input type
                            $('#search-bar').append('<th><input type="date" placeholder="検索 =" class="form-control" id="search-bar-' + title + '" /></th>');
                        else if (title == '修理時間（分）') // For separating search logic by removing column_search class
                            $('#search-bar').append('<th><input type="number" min="1"  placeholder="検索 >=" class="form-control" id="search-bar-time" /hidden><div class="input-group"><input type="number" class="form-control" oninput="durToMinDash()" name="days" id="days" value="0" min="0"><span class="input-group-text p-1" id="">日</span><input type="number" class="form-control" oninput="durToMinDash()" name="hours" id="hours" value="0" min="0"><span class="input-group-text p-1" id="">時間</span><input type="number" class="form-control" oninput="durToMinDash()" name="minutes" id="minutes" value="0" min="0"><span class="input-group-text p-1" id="days">分</span></div></th>');
                        else if (title.length == 0) //no title column for displaying edit buttons
                            $('#search-bar').append('<th class="button_column buttons" style="display:none; width:150px;"></th>');
                        else
                            $('#search-bar').append('<th><input type="text" placeholder="検索 =" class="column_search form-control" id="search-bar-' + title + '" /></th>');

                    });

                    // DataTable
                    var table = $('#trouble_table').DataTable({

                        order: [
                            [0, 'desc']
                        ],
                        aoColumns: [{
                                bSortable: true,
                                width: "15%"
                            },
                            {
                                bSortable: true,
                                width: "15%",
                                render: {
                                    "display": function(data, type, row) {
                                        var result = ''

                                        var days = Math.floor(data / 1440)
                                        var rem_days = data % 1440
                                        var hours = Math.floor(rem_days / 60)
                                        var minutes = data - days * 1440 - hours * 60

                                        if (days != 0) {
                                            result += days + '日 '
                                        }

                                        if (hours != 0) {
                                            result += hours + '時間 '
                                        }

                                        if (minutes != 0) {
                                            result += minutes + '分'
                                        }

                                        return result;
                                    }
                                }
                            },
                            {
                                bSortable: true,
                                width: "6%"
                            },
                            {
                                bSortable: true,
                                width: "6%"
                            },
                            {
                                bSortable: true,
                                width: "6%"
                            },
                            {
                                bSortable: true,
                                width: "15%"
                            },
                            {
                                bSortable: true,
                                width: "15%"
                            },
                            {
                                bSortable: true,
                                width: "6%"
                            },
                            {
                                bSortable: true,
                                width: "6%"
                            },
                            {
                                bSortable: false,
                                width: "10%"
                            },

                        ],
                        info: false,
                        searching: true,
                        paging: false,
                        scrollResize: true,
                        orderCellsTop: false,
                        fixedHeader: false,
                        scrollY: ($('#main-content').height() - (275 * 90 / 100)),
                        scrollX: true,
                        sScrollX: "100%",
                        sScrollXInner: "100%",
                        bScrollCollapse: true,
                        scrollCollapse: true,
                        dom: 'lrt',
                        "language": {
                            "zeroRecords": "該当する記録は見つかりません",
                        },
                    });

                    // Apply the search
                    $('#search-bar').on('input change', ".column_search", function() {
                        table
                            .column($(this).parent().index())
                            .search(this.value)
                            .draw();
                        $('#amount-sum').html($('.data-row').not(':hidden').length);

                    });

                    // Search for datetime format
                    $('#search-bar-発生日時').on('input change', function() {
                        table
                            .column(0)
                            .search(this.value.replace(/-/g, '/'), true, false)
                            .draw();
                        $('#amount-sum').html($('.data-row').not(':hidden').length);
                    })


                    // Only permits number [0-9] and backspace/delete
                    // Not arrow key, shift, ctrl, alphabet
                    $('#search-bar-time').on('keydown', function() {
                        return (event.keyCode >= 48 && event.keyCode <= 57) ||
                            event.keyCode == 8 || event.keyCode == 46
                    })

                    $('#search-bar-time').on('click', function() {
                        if (this.value)
                            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                                var value = parseInt($('#search-bar-time').val())

                                var time = data[1];

                                if (isNaN(value) || time >= value) {
                                    return true;
                                } else {
                                    return false;
                                }
                            });

                        table.draw();
                        $('#amount-sum').html($('.data-row').not(':hidden').length);
                        // Special search logic to show all data that greater than inputed value for 修理時間（分

                    });
                });
            }
        });
    }


    // 設備 Table Constructor -> Via ajax dashboard/get_troubleList
    // The search bar is dataTables, work on surface level by hiding loaded element
    function get_troubleList_fmea() {
        // Toggle Button
        $('#new_spareparts').hide();
        $('#new_trouble').show();
        $('#list').children().remove()

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/get_trouble_list__tool_fmea",
            success: function(response) {
                $("#list").html(response);
            },
            complete: function() {
                $(document).ready(function() {
                    // Setup - add a text input to each cell
                    $('#trouble_fmea_table thead tr:eq(1) th').each(function() {
                        var title = $(this).text().trim();

                        if (title.length == 0)
                            $('#search-bar').append('<th class="button_column buttons" style="display:none;width:150px; max-width:150px;"></th>');
                        else
                            $('#search-bar').append('<th><input type="text" placeholder="検索 =" class="column_search form-control" id="search-bar-' + title + '" /></th>');

                    });

                    // DataTable
                    var table = $('#trouble_fmea_table').DataTable({
                        ordering: true,
                        aoColumns: [{
                                bSortable: true
                            },
                            {
                                bSortable: true
                            },
                            {
                                bSortable: true
                            },
                            {
                                bSortable: true
                            },

                            {
                                bSortable: false
                            },
                        ],
                        info: false,
                        searching: true,
                        paging: false,
                        orderCellsTop: false,
                        fixedHeader: false,
                        scrollResize: true,
                        scrollY: ($('#main-content').height() - (275 * 90 / 100)),
                        scrollX: true,
                        sScrollX: "100%",
                        sScrollXInner: "100%",
                        bScrollCollapse: true,
                        scrollCollapse: true,
                        dom: 'lrt',
                        "language": {
                            "zeroRecords": "該当する記録は見つかりません",
                        },

                    });

                    // Apply the search
                    $('#search-bar').on('input change', ".column_search", function() {

                        table
                            .column($(this).parent().index())
                            .search(this.value)
                            .draw();
                        $('#amount-sum').html($('.data-row').not(':hidden').length);
                    });

                });
            }
        });
    }

    // 送品 Table Constructor -> Ajax Via dashboard/get_sparepartList
    // The search bar is dataTables, work on surface level by hiding loaded element
    function get_sparepartlist() {
        // Toggle Button
        $('#new_trouble').hide();
        $('#new_spareparts').show();
        // Toggle Div
        $('#list').children().remove()

        $.ajax({
            url: "<?php echo base_url(); ?>dashboard/get_sparepart_list",
            success: function(response) {
                $("#list").html(response);
                $('#search-bar-spare').append('<th colspan="10" class=" pe-3"><input class="form-control color-primary" type="text" id="search-bar" placeholder="検索 ="></th>');

            },
            complete: function() {
                // DataTable
                var table = $('#gen_table').DataTable({
                    ordering: true,
                    aoColumns: [{
                            bSortable: false
                        },
                        {
                            bSortable: true
                        },
                        {
                            bSortable: true
                        },
                        {
                            bSortable: true
                        },
                        {
                            bSortable: true
                        },
                        {
                            bSortable: true,
                            render: {
                                "display": function(data, type, row) {
                                    return parseFloat(data);
                                }
                            }
                        },
                        {
                            bSortable: true,
                        },
                        {
                            bSortable: true,
                            render: {
                                "display": function(data, type, row) {
                                    return parseFloat(data).toLocaleString('ja-JP-u-ca-japanese') + ' 円';
                                }
                            }
                        },
                        {
                            bSortable: true
                        },
                        {
                            bSortable: true
                        },
                        {
                            bSortable: false
                        },

                    ],
                    info: false,
                    searching: true,
                    paging: false,
                    dom: 'lrt',
                    scrollResize: true,
                    scrollY: ($('#main-content').height() - (275 * 90 / 100)),
                    scrollX: true,
                    sScrollX: "100%",
                    sScrollXInner: "100%",
                    bScrollCollapse: true,
                    scrollCollapse: true,
                    "language": {
                        "zeroRecords": "該当する記録は見つかりません",
                    },

                });

                // INCASE YOU NEED TO DISABLE THE BUTTON ON 0 AMOUNT

                // $('.amount').each(function() {
                //     if($(this).html().trim() == '0')
                //         $(this).siblings().last().children('.delete').addClass('disabled')
                // })


                $('#search-bar').on('input change', function() {

                    table
                        .search(this.value)
                        .draw();
                    $('#amount-sum').html($('.data-row').not(':hidden').length);
                });

            }

        });
    }

    function deleteData_tool($id) {

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
                        url: "<?= base_url() ?>dashboard/delete_data_tool/" + $id,
                        complete: function() {
                            get_troubleList()
                        }
                    });
                } else {
                    // DELETE CANCELLED
                }
            });
    }

    function deleteData_tool_fmea($id) {

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
                        url: "<?= base_url() ?>dashboard/delete_data_tool_fmea/" + $id,
                        complete: function() {
                            get_troubleList_fmea()
                        }
                    });
                } else {
                    // DELETE CANCELLED
                }
            });
    }

    function deleteData_sparepart($id) {

        var status = $.ajax({
            url: "<?= base_url() ?>dashboard/check_sparepart_status/" + $id,
            async: false,
            success: function(response) {

                if (response.trim() === 'true') {

                    var conf = swal({
                            title: "数量を 0 にしますか？",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                swal({
                                    // button: false,
                                    title: "数量が 0 になります",
                                    icon: "success",
                                });
                                $.ajax({
                                    url: "<?= base_url() ?>dashboard/zero_data_sparepart/" + $id,
                                    complete: function() {
                                        get_sparepartlist()
                                    }
                                });
                            } else {
                                // DELETE CANCELLED
                            }
                        });
                } else {
                    // Delete data from table
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
                                    url: "<?= base_url() ?>dashboard/delete_data_sparepart/" + $id,
                                    complete: function() {
                                        get_sparepartlist()
                                    }
                                });
                            } else {
                                // DELETE CANCELLED
                            }
                        });
                }

            }
        });

        // Make stock -> 0

    }

    function editSpare_populate(el) {
        $id = $(el).parent().siblings('.ID').text().trim()
        $.ajax({
            url: "<?php echo base_url() ?>dashboard/edit_data_sparepart_view/" + $id,
            success: function(response) {

                $('#modalPlaceHolder').append(response)
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
            "c_price": $('#price_edit').val(),
            "c_storage": $('#storage_edit').val(),
            "c_arrangement": $('#arra_edit').val()
        }

        $.ajax({
            url: "<?= base_url(); ?>dashboard/post_edit_data_sparepart",
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
                    // console.log(stringNum);
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
                            case 9:
                                $('#storage_edit').addClass('is-invalid')
                                break;
                            case 0:
                                $('#arra_edit').addClass('is-invalid')
                                break;


                            default:
                                break;
                        }
                    }
                }
            },
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
            url: "<?= base_url(); ?>dashboard/post_spare",
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
                            case 8:
                                $('#storage').addClass('is-invalid')
                                break;
                            case 9:
                                $('#arra').addClass('is-invalid')
                                break;
                            default:
                                break;
                        }
                    }
                }
            }
        });
        event.preventDefault();
    }

    // ON FOCUS REMOVE CLASS (Probably solution to the double loop)

    // SAVIOOUR //Might be unused
    $('input').on('click', function name(params) {
        $(this).removeClass('is-invalid')
    })
    // Need to investigate
    function clearSearchBar() {
        if ($('#real').hasClass('active')) {
            get_troubleList()
        } else {
            get_troubleList_fmea()
        }
    }

    function getAllFmeaList() {
        var table = $('#all_trouble_table').DataTable({
            ajax: {
                url: '<?= base_url() ?>dashboard/get_tool_fmea_list',
                dataSrc: ''
            },
            responsive: true,
            ordering: false,
            info: false,
            searching: true,
            dom: "t",
            paging: false,
            orderCellsTop: true,
            columnDefs: [{
                "className": "table-data text-center align-middle",
                "targets": "_all"
            }],
            columns: [{
                    data: "c_department",
                    visible: false
                },
                {
                    data: "c_facility",
                    width: "3%"
                }, {
                    data: "c_unit",
                    width: "3%"
                }, {
                    data: "c_processName",
                    width: "8%"
                }, {
                    data: "c_failMode",
                    width: "8%"
                }, {
                    data: "c_failImpact",
                    width: "12%"
                }, {
                    data: "c_lineEffect",
                    width: "6%"
                }, {
                    data: "c_specialChar",
                    width: "6%"
                }, {
                    data: "c_failMech",
                    width: "6%"
                }, {
                    data: "c_prevention",
                    width: "6%"
                }, {
                    data: "c_period",
                    width: "3%"
                }, {
                    data: "c_month",
                    width: "3%"
                }, {
                    data: "c_detection",
                    width: "12%"
                }, {
                    data: "c_counterPlan",
                    width: "12%"
                }, {
                    data: "c_picSchedule",
                    width: "6%"
                }, {
                    data: "c_measure",
                    width: "6%"
                },
            ],

            "language": {
                "zeroRecords": "該当する記録は見つかりません",
            }
        });

        $('#busho_fmea').on('change', function() {
            table.columns(0).search($(this).val()).draw();
        })
    }


    document.addEventListener("DOMContentLoaded", DATA.onLoad)
    // UNUSED


    // 送品 search function
    function search_all_function() {
        var $rows = $('#gen_table tbody tr');

        $('#table_input').keyup(function() {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
            $('#amount-sum').html($('.data-row').not(':hidden').length);
        });
    }

    //This function get trigger when clicking a row on equipment, then choose the ID part <td>
    //
    // function view_record(el) {
    //     var $id = $(el).children('.ID').text().trim();

    //     if (!$(el).hasClass('fmea-tools'))
    //         var url = 'item/' + $id;
    //     else
    //         var url = 'item_fmea/' + $id;

    //     window.location.replace(<?php base_url() ?>url)
    // }
</script>