<script>
    //ALL SCRIPT HERE WERE ORIGINALLY FROM THE RESPECTIVE VIEWS


    // =================== EQUIPMENT FORM FUNCTIONS=============================

    // FMEA part function toggle, also empties the hidden input for fmea_id
    //From pages/equipmentForm.php

    {
        $(document).ready(function() {

            var btn_1 = $('#btnradio1')
            var btn_2 = $('#btnradio2')


            <?php if ($this->session->flashdata('error') != '')
                if ($this->session->flashdata('fmea_id') != '') {
            ?>
                btn_2.prop('checked', true);
                let $id = '<?= $this->session->flashdata('fmea_id') ?>';


                $.ajax({
                    url: "<?= base_url(); ?>dashboard/fmea_tool_print/" + $id,

                    success: function(response) {
                        $("#fmea_place").html(response);
                        $('#fmea_id').val($id)
                    },

                })
            <?php } ?>



            if (btn_1.prop('checked')) {
                $('#FMEA_side').hide()

            }
            if (btn_2.prop('checked')) {
                $('#FMEA_side').show()
            }


            $('input[type=radio]').change(function() {
                if (btn_1.prop('checked')) {
                    $('#FMEA_side').hide()
                    $('#fmea_id').val('');

                }
                if (btn_2.prop('checked')) {
                    $('#FMEA_side').show()

                }
            })

            // For validation purposes
            <?php if ($this->session->flashdata('error') != '' &&  $this->session->flashdata('isEdit') != true) {
                if ($this->session->flashdata('part_info') != '') {

            ?>
                    // Grab data from flash session data (set in the controller)
                    $arr_spare = JSON.parse('<?= $this->session->flashdata('part_info') ?>');

                    $('#equipment_parts_list tbody tr').remove()
                    $('.emptyTab').hide()

                    <?php

                    $INDEX = 0;
                    foreach ($temp_spare as $item) { ?>
                        if (<?= $item->c_t202_id ?> == $arr_spare[<?= $INDEX ?>][0]) {

                            $('#equipment_parts_list tbody').append($('#foots tr')).append('<tr class="' + <?= $item->c_t202_id ?> + '"> <td>' + <?= $item->c_t202_id ?> + '</td> <td>' + "<?= $item->c_partName ?>" + '</td> <td>' + "<?= $item->c_model ?>" + '</td><td></td> <td>' + $arr_spare[<?= $INDEX ?>][1] + '</td> <td><a class="btn btn-primary minus">DELETE</a> </td></tr>')
                        }

                    <?php $INDEX++;
                    } ?>
                    $('#equipment_parts_list tbody').find('td:last-child').hide(); //Hide minus button
                    $('#equipment_parts_list tbody tr').find('td:eq(3)').each(function() {
                        $(this).hide()
                    }) //hide empty cell 

                    // Input field need to be loaded for .val to work
                    // Tried on document.ready but value doesnt update
                    $('#partinfo').load('equipmentForm.php', function() {

                        $('#partinfo').val(JSON.stringify($arr_spare))
                    })
            <?php
                }
            }
            ?>
        })
    }

    // DAY:HOURS to minute converter
    {
        function durToMin() {
            var days = $('#days').val()
            var hours = $('#hours').val()
            var minutes = $('#minutes').val()

            isNaN(parseFloat(days)) ? 0 : $('#days').val();
            isNaN(parseFloat(hours)) ? 0 : $('#hours').val();
            isNaN(parseFloat(minutes)) ? 0 : $('#minutes').val();

            // console.log(days + '  ' + hours + '  ' + minutes)

            var duration = parseInt(days) * 1440 + parseInt(hours) * 60 + parseInt(minutes) * 1

            $('#duration').val(duration)
        }
    }

    // FILE TEXT GRABBER
    {
        function fileUpload() {
            // console.log('uploaded')
            var text = $('#taisakusho').val()
            text = text.substring(text.lastIndexOf("\\") + 1, text.length)
            $('#taisakusho_file').val(text)
        }
    }
    //Also work on FMEA_form & Equipment_form
    //From modals/partselect.php
    {
        // var _isInit = 0;
        var $arr = [];

        // Too detailed probably need to make stand-alone table function
        $('#partsSelect').on('show.bs.modal', function(event) {

            // IF EXIST
            $.ajax({
                url: "<?= base_url(); ?>dashboard/get_sparepartList_lite",
                success: function(response) {
                    $("#upper").html(response)
                    if ($('#equipment_parts_list tbody tr').length != 0) {


                        // IF EXIST IN BODY, APPEND
                        $('#foots').append($('#equipment_parts_list tbody tr').clone())

                        // CHECK ID for button disabling and color success bg
                        var flag = 0;
                        var itemId = ''
                        var id = ''

                        var amount = ''

                        $('#foots').find('tr').each(function() {
                            $(this).find("td:eq(3)").show()
                            itemId = $(this).find("td:eq(0)").text().trim();
                            amount = $(this).find("td:eq(4)").text().trim();
                            $('#bodys').find('tr').each(function() {
                                id = $(this).find("td:eq(0)").text().trim();



                                if (id == itemId)
                                    flag = 1;
                                else
                                    flag = 0;

                                if (flag == 1) {
                                    $(this).addClass('table-success')
                                    $(this).find("td:eq(4)").html(amount)

                                    if (parseInt($(this).find("td:eq(3)").text().trim()) <= amount)
                                        $(this).find("td:eq(5)").children('.plus').addClass('disabled')
                                }
                            })



                            $(this).find('td:last-child').show();
                        })
                        // IN BODY
                    }
                },

            });


        })

        function search_all_function() {
            var $rows = $('#gen_table #bodys tr');

            $('#table_input').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
                $('#amount-sum').html($('.data-row').not(':hidden').length);
            });


        }



        // Clone from modal to main Form
        $('#insertTool').on('click', function print_checked() {
            if ($('#foots tr').length != 0) {
                $('#equipment_parts_list tbody tr').remove()
                $('.emptyTab').hide()
            } else {
                $('#equipment_parts_list tbody tr').remove()
                $('.emptyTab').show()
            }

            $('#equipment_parts_list tbody').append($('#foots tr'))


            $('#equipment_parts_list tbody').find('td:last-child').hide(); //Delete minus button
            $('#equipment_parts_list tbody tr').find('td:eq(3)').each(function() {
                $(this).hide()
            }) //Delete minus button

            //IF NOT EMPTY INSERT ALL ID AND AMOUNT INTO ARRAY

            if ($('#equipment_parts_list tbody').length != 0) {
                $arr.length = 0;
                $('#equipment_parts_list tbody').find('tr').each(function() {
                    $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(4)').text().trim()])
                })

                // console.log($arr)

                $('#partinfo').val(function(index, value) {
                    // console.log(typeof JSON.stringify($arr));
                    return JSON.stringify($arr);
                });
            }
            //ELSE SEND EMPTY STATEMENT
            else {
                $('#partinfo').val('');
            }


        })
    }


    //Spare part insertion 
    //From function/print_table_spare_lite.php
    {

    }

    //FMEA select
    //From function/print_table_tool_fmea.php
    {
        // $('#btnradio1').on('click', function () {
        //     $('#fmea_place').empty()
        // })
    }

    //FORM Validation

    {
        //Repopulate part info

    }


    // ========== EQUIPMENT EDIT FORM ===========

    //From pages/equipmentForm_edit.php
    {
        $(document).ready(function() {

            if ($('#equipment_parts_list_edit tbody').length > 0) {
                $arr.length = 0;
                $('#equipment_parts_list_edit tbody').find('tr').each(function() {
                    $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(4)').text().trim(), $(this).find('td:eq(4)').text().trim(), 'exist'])
                })

                $('#partinfo').val(JSON.stringify($arr));
            }
            //ELSE SEND EMPTY STATEMENT
            else {
                $('#partinfo').val('');
            }

            // For validation purposes
            <?php if ($this->session->flashdata('error') != '' &&  $this->session->flashdata('isEdit') == true) {
                if ($this->session->flashdata('part_info') != '') {

            ?>
                    // Grab data from flash session data (set in the controller)
                    $arr_spare = JSON.parse('<?= $this->session->flashdata('part_info') ?>');

                    $('#equipment_parts_list_edit tbody tr').remove()
                    $('.emptyTab').hide()

                    <?php

                    $INDEX = 0;
                    foreach ($temp_spare as $item) { ?>
                        if (<?= $item->c_t202_id ?> == $arr_spare[<?= $INDEX ?>][0] && ($arr_spare[<?= $INDEX ?>][3] != 'deleted')) {

                            $('#equipment_parts_list_edit tbody').append($('#foots tr')).append('<tr class="' + <?= $item->c_t202_id ?> + '"> <td>' + <?= $item->c_t202_id ?> + '</td> <td>' + "<?= $item->c_partName ?>" + '</td> <td>' + "<?= $item->c_model ?>" + '</td><td></td> <td>' + $arr_spare[<?= $INDEX ?>][1] + '</td> <td><a class="btn btn-primary minus">DELETE</a> </td></tr>')
                        }


                    <?php $INDEX++;
                    } ?>
                    $('#equipment_parts_list_edit tbody').find('td:last-child').hide(); //Hide minus button
                    $('#equipment_parts_list_edit tbody tr').find('td:eq(3)').each(function() {
                        $(this).hide()
                    }) //hide empty cell 

                    // Input field need to be loaded for .val to work
                    // Tried on document.ready but value doesnt update
                    $('#partinfo').load('equipmentForm.php', function() {

                        $('#partinfo').val(JSON.stringify($arr_spare))
                    })
            <?php
                }
            }
            ?>


        })
    }

    {
        function minToDur() {
            var duration = isNaN(parseInt($('#duration').val())) || parseInt($('#duration').val()) == 0 ? 0 : $('#duration').val()

            var days = Math.floor(duration / 1440)
            var rem_days = duration % 1440
            var hours = Math.floor(rem_days / 60)
            var minutes = duration - days * 1440 - hours * 60


            $('#days').val(days)
            $('#hours').val(hours)
            $('#minutes').val(minutes)
            // console.log('Hari : ' + days + ' Jam : ' + hours + ' Menit : ' + minutes)
        }

        $(document).ready(function() {
            minToDur()
        });
    }



    // ========== EQUIPMENT FMEA=========
    {}

    // ============== EQUIPMENT FMEA EDIT ============
    //None

    // FMEA part function toggle, also empties the hidden input for fmea_id
    //From modals/partselect.php
    {
        // var _isInit = 0;
        var $arr = [];


        // Too detailed probably need to make stand-alone table function
        $('#partsSelect_edit').on('show.bs.modal', function(event) {


            // IF EXIST

            $.ajax({
                url: "<?= base_url(); ?>dashboard/get_sparepartList_lite",
                success: function(response) {
                    $("#upper_edit").html(response)
                    if ($('#equipment_parts_list_edit tbody tr').length > 0) {


                        // IF EXIST IN BODY, APPEND
                        $('#foots').append($('#equipment_parts_list_edit tbody tr').clone())
                        // CHECK ID for button disabling and color success bg
                        var flag = 0;
                        var itemId = ''
                        var id = ''

                        var amount = ''

                        $('#foots').find('tr').each(function() {
                            $(this).find("td:eq(3)").show()
                            itemId = $(this).find("td:eq(0)").text().trim();
                            amount = $(this).find("td:eq(4)").text().trim();
                            $('#bodys').find('tr').each(function() {
                                id = $(this).find("td:eq(0)").text().trim();


                                if (id == itemId)
                                    flag = 1;
                                else
                                    flag = 0;

                                if (flag == 1) {
                                    $(this).addClass('table-success')
                                    $(this).find("td:eq(4)").html(amount)

                                    if (parseInt($(this).find("td:eq(3)").text().trim()) <= amount)
                                        $(this).find("td:eq(5)").children('.plus').addClass('disabled')
                                }
                            })



                            $(this).find('td:last-child').show();
                        })
                        // IN BODY





                    }

                },

            });


        })

        // function search_all_function() {
        //     var $rows = $('#gen_table #bodys tr');

        //     $('#table_input').keyup(function() {
        //         var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        //         $rows.show().filter(function() {
        //             var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        //             return !~text.indexOf(val);
        //         }).hide();
        //         $('#amount-sum').html($('.data-row').not(':hidden').length);
        //     });


        // }



        // Clone from modal to main Form
        $('#insertTool_edit').on('click', function print_checked() {
            if ($('#foots tr').length != 0) {
                $('#equipment_parts_list_edit tbody tr').remove()
                $('.emptyTab').hide()
            } else {
                $(' #equipment_parts_list_edit tbody tr').remove()
                $('.emptyTab').show()
            }

            $('#equipment_parts_list_edit tbody').append($('#foots tr')) //Delete the EMPTY placeholder
            $('#equipment_parts_list_edit tbody').find('td:last-child').hide(); //Delete minus button
            $('#equipment_parts_list_edit tbody tr').find('td:eq(3)').each(function() {
                $(this).hide()
            }) //Delete minus button

            //IF NOT EMPTY INSERT ALL ID AND AMOUNT INTO ARRAY
            //CHECK KINDS OF DATA (isExist, isDeleted, isNew)
            if ($('#equipment_parts_list_edit tbody tr').length != 0) {
                $arr.length = 0;

                $('.old_val').each(function() {
                    flag = '';
                    data = $(this);
                    $('#equipment_parts_list_edit tbody').find('tr').each(function() {
                        if (data.children('.id').val() == $(this).find('td:eq(0)').text().trim()) {
                            flag = 'exist';
                            amount = $(this).find('td:eq(4)').text().trim();

                            return false;
                        } else
                            flag = 'deleted';


                    })

                    if (flag == 'exist') {
                        $arr.push([$(this).children('.id').val(), amount, $(this).children('.old_amount').val(), 'exist'])
                    }

                    if (flag == 'deleted')
                        $arr.push([$(this).children('.id').val(), $(this).children('.old_amount').val(), '0', 'deleted'])

                })

                $('#equipment_parts_list_edit tbody').find('tr').each(function() {
                    flag = '0';
                    data = $(this);
                    $('.old_val').each(function() {
                        if ($(data).find('td:eq(0)').text().trim() == $(this).children('.id').val())
                            flag = '1';


                    })

                    if (flag == '0')
                        $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(4)').text().trim(), '0', 'new'])

                })






                $('#partinfo').val(JSON.stringify($arr));

            }
            //ELSE SEND EMPTY STATEMENT
            else {

                if ($('.old_val').length != 0) {
                    $arr.length = 0;
                    $('.old_val').each(function() {
                        $arr.push([$(this).children('.id').val(), $(this).children('.old_amount').val(), '0', 'deleted'])
                    })

                    $('#partinfo').val(JSON.stringify($arr));
                } else
                    $('#partinfo').val('');

                $('tfoot').html(" <tr> <td style = 'height: 100px;'colspan = '4'class = 'text-center emptyTab'><span>EMPTY</span></td></tr>")
            }


        })
    }


    //Spare part insertion 
    //From function/print_table_spare_lite.php
    {

    }

    //FMEA select
    //From function/print_table_tool_fmea.php
    {

    }



    // ================= PRINT FMEA I DONT KNOW
</script>