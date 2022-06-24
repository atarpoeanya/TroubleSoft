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


            if ($('#equipment_parts_list tbody').length != 0) {
                $arr.length = 0;
                $('#equipment_parts_list tbody').find('tr').each(function() {
                    $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(4)').text().trim()])
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

    
</script>