<div class="modal kanjifont" id="partsSelect" tabindex="-1">
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
                <a id="insertTool" class="btn btn-primary">足す</a>

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>

<script>

    // var myModalEl = document.getElementById('partsSelect')
    // Too detailed probably need to make stand-alone table function
    $('#partsSelect').on('show.bs.modal', function(event) {
        $.ajax({
            url: "<?= base_url(); ?>dashboard/get_sparepartList_lite",
            success: function(response) {
                $("#upper").html(response)
            },
            complete: function() {
                console.log('done')
            }
        });

        function search_all_function() {
            var $rows = $('#gen_table tbody tr');

            $('#table_input').input(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });
        }

        // Clone from modal to main Form
        $('#insertTool').on('click', function print_checked() {
            $('#equipment_parts_list tbody').find('tr:first-child').remove(); //Delete the EMPTY placeholder
            $('#foots tr').clone().prependTo('#equipment_parts_list tbody'); 
            $('#equipment_parts_list tbody').find('tr:first-child').remove(); //Delete the Selected header
            $('#equipment_parts_list tbody').find('td:last-child').remove(); //Delete minus button
        })

    })
</script>