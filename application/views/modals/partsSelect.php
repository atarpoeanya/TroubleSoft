<div class="modal kanjifont" id="partsSelect" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">予備品</h5>
            </div>

            <div class="modal-body bg-light" id="partBody">
                <div id="upper"></div>
                <div id="lower">
                    <table>
                        <tbody id="sendhere"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <a id="insertTool" class="btn btn-primary" data-bs-dismiss="modal">足す</a>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>

<script>
    // var _isInit = 0;
    var $arr = [];
    // var myModalEl = document.getElementById('partsSelect')
    // Too detailed probably need to make stand-alone table function
    $('#partsSelect').on('show.bs.modal', function(event) {

        // IF EXIST
        $.ajax({
            url: "<?= base_url(); ?>dashboard/get_sparepartList_lite",
            success: function(response) {
                $("#upper").html(response)
                if ($('#equipment_parts_list tbody tr').length != 0) {
                    
                    // $('#foots tr').clone().prependTo('#equipment_parts_list tbody');
                    // IF EXIST IN BODY, APPEND
                    $('#foots').append($('#equipment_parts_list tbody tr').clone())
                    // CHECK ID for button disabling and color success bg
                    var flag = 0;
                    var itemId = ''
                    var id = ''

                    var amount= ''

                    $('#foots').find('tr').each(function() {
                        itemId = $(this).find("td:eq(0)").text().trim();
                        amount = $(this).find("td:eq(4)").text().trim();
                        $('#bodys').find('tr').each(function() {
                            id = $(this).find("td:eq(0)").text().trim();

                            // $(this).find("td:eq(0)").text().trim();
                            if (id == itemId)
                                flag = 1;
                                else
                                flag = 0;

                            if (flag == 1) {
                                $(this).addClass('table-success')

                                if(parseInt($(this).find("td:eq(4)").text().trim()) <= amount)
                                    $(this).find("td:eq(5)").children('.plus').addClass('disabled')
                            }
                        })
                        // if (id == $(this).find("td:eq(0)").text().trim())
                            

                        $(this).find('td:last-child').show();
                    })
                    // IN BODY





                }
            },
            complete: function() {
                console.log('done')
            }
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

        $('#equipment_parts_list tbody').append($('#foots tr')) //Delete the EMPTY placeholder
        $('#equipment_parts_list tbody').find('td:last-child').hide(); //Delete minus button

        //IF NOT EMPTY INSERT ALL ID AND AMOUNT INTO ARRAY

        if ($('#equipment_parts_list tbody').length != 0) {
            $arr.length = 0;
            $('#equipment_parts_list tbody').find('tr').each(function() {
                $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(4)').text().trim()])
            })
            console.log($arr)
            $('#partinfo').val(JSON.stringify($arr));
        }
        //ELSE SEND EMPTY STATEMENT
        else {
            $('#partinfo').val('empty');
        }


    })
</script>