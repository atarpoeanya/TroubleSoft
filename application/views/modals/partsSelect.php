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

        $.ajax({
            url: "<?= base_url(); ?>dashboard/get_sparepartList_lite",
            success: function(response) {
                $("#upper").html(response)
                if ($('#equipment_parts_list tbody tr').length != 0) {
                    // $('#foots tr').clone().prependTo('#equipment_parts_list tbody');
                    $('#foots').append($('#equipment_parts_list tbody tr').clone())
                    $('#foots').find('td:last-child').show();

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
        // $('#foots tr').clone().prependTo('#equipment_parts_list tbody'); 
        // $('#equipment_parts_list tbody').find('tr:first-child').remove(); //Delete the Selected header
        $('#equipment_parts_list tbody').find('td:last-child').hide(); //Delete minus button

        //IF NOT EMPTY INSERT ALL ID AND AMOUNT INTO ARRAY

        if ($('#equipment_parts_list tbody').length != 0) {
            $arr.length = 0;
            $('#equipment_parts_list tbody').find('tr').each(function() {
                $arr.push( [$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(4)').text().trim()])
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