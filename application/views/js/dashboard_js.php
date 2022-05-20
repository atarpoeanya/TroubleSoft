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

    function delete_sparepart() {
        partId = [];
        $(document).on('click', '.form-check-input', function() {

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


    function view_record(el){
        var $id =  $(el).children('.ID').text().trim();
        var url = 'item/' + $id;
        console.log(url)
        window.location.replace(<?php base_url() ?>url)   
    }
    document.addEventListener("DOMContentLoaded", DATA.onLoad)
</script>