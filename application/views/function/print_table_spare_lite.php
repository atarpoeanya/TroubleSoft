<?php
function f_generate_table_select($data)
{
?>
    <div class="sticky-top mb-2"><input class="sticky-top form-control" type="text" id="table_input" oninput="search_all_function()" placeholder="Search"></div>
    <div class="table-responsive table-wrapper table-wrapper-scroll">
        <table class="table table-stripped table-bordered" id="gen_table">
            <thead>
                <tr>

                    <?php
                    foreach ($data['title'] as $thead) {
                        if ($thead != '使用箇所') {
                    ?>
                            <th class="kanjifont table-head text-center border-right border-left">
                                <?= $thead ?>
                            </th>

                    <?php
                        }
                    }
                    ?>
                    <th class="button_column"></th>
                </tr>
            </thead>
            <tbody id="bodys">
                <?php


                foreach ($data['sparePart'] as $item) {

                ?>

                    <tr class="">


                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 ID">
                            <?= $item->c_t202_id ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer partname">
                            <?= $item->c_partName ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer partmodel">
                            <?= $item->c_model ?>
                        </td>
                        <!-- <td class="kanjifont table-data text-center align-middle border-right border-left pointer partstorage">
                            <?= $item->c_placement ?>
                        </td> -->
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer  amount">
                            <?= $item->c_quantity ?>
                        </td>

                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-2 button_column text-nowrap">
                            <?php if ($item->c_quantity == 0 && base_url()) { ?>
                                <a class="btn-block btn btn-primary modify-button plus disabled" onclick="event.cancelBubble=true;">+</a>
                                <a class="btn-block btn btn-danger modify-button minus disabled" onclick="event.cancelBubble=true; ">-</a>
                            <?php } else { ?>
                                <a class="btn-block btn btn-primary modify-button plus" onclick="event.cancelBubble=true;">+</a>
                                <a class="btn-block btn btn-danger modify-button minus" onclick="event.cancelBubble=true; ">-</a>
                            <?php } ?>
                        </td>


                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tbody>
                <tr class="text-center">
                    <th colspan="6">SELECTED</th>
                </tr>

            </tbody>
            <tfoot id="foots" class="text-center"></tfoot>

        </table>
    </div>

<?php
}
?>
<script>
    $(document).ready(function() {
      if($('table').hasClass('nolimit')) 
        $('.plus, .minus').removeClass('disabled')
    })
    $('.plus').click(function plus() {
        var the_button = $(this)
        var partRow = $(this).parents('tr')
        var partDetails = [
            $(this).parent().siblings('.ID').text().trim(),
            $(this).parent().siblings('.partname').text().trim(),
            $(this).parent().siblings('.partmodel').text().trim(),
            // $(this).parent().siblings('.partstorage').text().trim(),
            $(this).parent().siblings('.amount').text().trim()

        ]

        var flag = 0;
        var itemId = ''
        console.log('clicke')
        if ($('#foots tr').length == 0) {
            partRow.addClass('table-success')
            console.log('newest item')
            $('#foots:last-child').append('<tr class="' + partDetails[0] + '"> <td>' + partDetails[0] + '</td> <td>' + partDetails[1] + '</td> <td>' + partDetails[2] + '</td> <td>' + 1 + '</td> <td><a class="btn btn-primary minus">-</a> </td></tr>')
            if (parseInt($('#foots:last-child').find("td:eq(4)").text().trim()) >= parseInt(partDetails[4]))
                the_button.addClass('disabled')
        } else {
            $('#foots').find('tr').each(function() {
                // debugger;
                itemId = $(this).find("td:eq(0)").text().trim();
                if (partDetails[0] == itemId)
                    flag = 1;
            })
            if (flag == 1) {
                partRow.addClass('table-success')
                var amount = 1;
                $('#foots').find('tr').each(function() {
                    itemId = $(this).find("td:eq(0)").text().trim();
                    if (partDetails[0] == itemId) {
                        // if (parseInt($(this).find("td:eq(4)").html()) < parseInt(partDetails[4])) {
                        // the_button.attr('disable', false); 
                        amount = parseInt($(this).find("td:eq(3)").text().trim())

                        amount++
                        $(this).find("td:eq(3)").html(amount)
                        // console.log([$(this).find("td:eq(3)").html(), parseInt(partDetails[ 4]), amount])
                        if (!$('table').hasClass('nolimit'))
                            if (amount >= parseInt(partDetails[3]) && !$('#equipment_parts_list_edit').length) {

                                the_button.addClass('disabled')
                            }
                        // the_button.removeClass('btn-primary')
                        // the_button.addClass('btn-secondary')

                        // }
                    }


                })
            } else {
                partRow.addClass('table-success')
                $('#foots:last-child').append('<tr class="' + partDetails[0] + '"><td>' + partDetails[0] + '</td> <td>' + partDetails[1] + '</td> <td>' + partDetails[2] + '</td> <td>' + 1 + '</td> <td><a class="btn btn-primary minus">-</a></td> </tr>')
                if (!$('table').hasClass('nolimit'))
                    if (parseInt(partDetails[3]) == 1 || parseInt(partDetails[3]) == 0) {
                        the_button.addClass('disabled')
                    }

            }
        }

    })

    $('#foots').on('click', 'a.minus', function() {
        var id = $(this).parent().siblings('td:first').text().trim()
        check(id)
    })

    $('.minus').click(function() {
        var id = $(this).parents('tr').find('.ID').text().trim()
        check(id)
    })

    function check(id) {
        var flag = 0;
        var itemId = ''


        $('#foots').find('tr').each(function() {
            itemId = $(this).find("td:eq(0)").text().trim();
            if (id == itemId)
                flag = 1;
        })
        if (flag == 1) {
            $('#bodys').find('tr').each(function() {
                // $(this).find("td:eq(0)").text().trim();
                if (id == $(this).find("td:eq(0)").text().trim())
                    $(this).find("td:eq(5)").children('.plus').removeClass('disabled')
            })

            var amount = $(this).find("td:eq(3)").text().trim();
            $('#foots').find('tr').each(function() {
                itemId = $(this).find("td:eq(0)").text().trim();
                if (id == itemId) {
                    amount = parseInt($(this).find("td:eq(3)").text().trim())
                    if (amount > 0) {
                        amount--;
                        $(this).find("td:eq(3)").html(amount)


                    } else {
                        $(this).remove()
                        $('#bodys').find('tr').each(function() {
                            // $(this).find("td:eq(0)").text().trim();
                            if (id == $(this).find("td:eq(0)").text().trim())
                                $(this).removeClass('table-success')
                        })
                    }
                }
            })
        }
    }
</script>