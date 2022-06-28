<script>
    //ALL SCRIPT HERE WERE ORIGINALLY FROM THE RESPECTIVE VIEWS


    // =================== EQUIPMENT FORM FUNCTIONS=============================

    // FMEA part function toggle, also empties the hidden input for fmea_id
    //From pages/equipmentForm.php

    {
        $(document).ready(function() {
            var btn_1 = $('#btnradio1')
            var btn_2 = $('#btnradio2')

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
        })
    }

    // FMEA part function toggle, also empties the hidden input for fmea_id
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
                    if ($('#equipment_parts_list tbody tr, #equipment_parts_list_edit tbody tr').length != 0) {


                        // IF EXIST IN BODY, APPEND
                        $('#foots').append($('#equipment_parts_list tbody tr, #equipment_parts_list_edit tbody tr').clone())
                        // CHECK ID for button disabling and color success bg
                        var flag = 0;
                        var itemId = ''
                        var id = ''

                        var amount = ''

                        $('#foots').find('tr').each(function() {
                            itemId = $(this).find("td:eq(0)").text().trim();
                            amount = $(this).find("td:eq(3)").text().trim();
                            $('#bodys').find('tr').each(function() {
                                id = $(this).find("td:eq(0)").text().trim();


                                if (id == itemId)
                                    flag = 1;
                                else
                                    flag = 0;

                                if (flag == 1) {
                                    $(this).addClass('table-success')

                                    if (parseInt($(this).find("td:eq(3)").text().trim()) <= amount)
                                        $(this).find("td:eq(4)").children('.plus').addClass('disabled')
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
                $('#equipment_parts_list tbody tr, #equipment_parts_list_edit tbody tr').remove()
                $('.emptyTab').hide()
            } else {
                $('#equipment_parts_list tbody tr, #equipment_parts_list_edit tbody tr').remove()
                $('.emptyTab').show()
            }

            $('#equipment_parts_list tbody, #equipment_parts_list_edit tbody').append($('#foots tr')) //Delete the EMPTY placeholder
            $('#equipment_parts_list tbody, #equipment_parts_list_edit tbody').find('td:last-child').hide(); //Delete minus button

            //IF NOT EMPTY INSERT ALL ID AND AMOUNT INTO ARRAY

            if ($('#equipment_parts_list tbody, #equipment_parts_list_edit tbody').length != 0) {
                $arr.length = 0;
                $('#equipment_parts_list tbody, #equipment_parts_list_edit tbody').find('tr').each(function() {
                    $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(3)').text().trim()])
                })
                console.log($arr)
                $('#partinfo').val(JSON.stringify($arr));
            }
            //ELSE SEND EMPTY STATEMENT
            else {
                $('#partinfo').val('empty');
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


    // ========== EQUIPMENT EDIT FORM ===========

    //From pages/equipmentForm_edit.php
    {
        $(document).ready(function() {

            if ($('#equipment_parts_list_edit tbody').length > 0) {
                $arr.length = 0;
                $('#equipment_parts_list_edit tbody').find('tr').each(function() {
                    $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(3)').text().trim(), $(this).find('td:eq(3)').text().trim(), 'exist'])
                })

                $('#partinfo').val(JSON.stringify($arr));
            }
            //ELSE SEND EMPTY STATEMENT
            else {
                $('#partinfo').val('empty');
            }


        })
    }

    // ========== EQUIPMENT FMEA=========
    //None

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
                            itemId = $(this).find("td:eq(0)").text().trim();
                            amount = $(this).find("td:eq(3)").text().trim();
                            $('#bodys').find('tr').each(function() {
                                id = $(this).find("td:eq(0)").text().trim();


                                if (id == itemId)
                                    flag = 1;
                                else
                                    flag = 0;

                                if (flag == 1) {
                                    $(this).addClass('table-success')

                                    if (parseInt($(this).find("td:eq(3)").text().trim()) <= amount)
                                        $(this).find("td:eq(4)").children('.plus').addClass('disabled')
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
                                amount = $(this).find('td:eq(3)').text().trim();
                                console.log(flag)
                                return false;
                            } else
                                flag = 'deleted';

                            console.log(flag)
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

                            console.log([$(this).children('.id').val(), $(data).find('td:eq(0)').text().trim(), flag])
                        })

                        if (flag == '0')
                            $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(3)').text().trim(), '0', 'new'])

                    })






                    $('#partinfo').val(JSON.stringify($arr));
                    console.log($arr)
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
                        $('#partinfo').val('empty');

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
</script>