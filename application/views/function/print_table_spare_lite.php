<?php
function f_generate_table_select($data)
{
?>
    <div class="sticky-top mb-2"><input class="sticky-top form-control" type="text" id="table_input" onkeyup="search_all_function()" placeholder="Search"></div>
    <div class="table-responsive table-wrapper table-wrapper-scroll">
        <table class="table table-stripped table-bordered" id="gen_table">
            <thead>
                <tr>
                    
                    <?php
                    foreach ($data['title'] as $thead) {
                    ?>
                        <th class="kanjifont table-head text-center border-right border-left">
                            <?= $thead ?>
                        </th>

                    <?php

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
                        <?= $item->partId ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 partname">
                        <?= $item->partName ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 partmodel">
                        <?= $item->model ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 partstorage">
                        <?= $item->placement ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 amount">
                        <?= $item->quantity ?>
                        </td>

                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-2 button_column text-nowrap">
                            <a class="btn-block btn btn-primary modify-button plus"  onclick="event.cancelBubble=true;">+</a>
                            <a class="btn-block btn btn-danger modify-button minus" onclick="event.cancelBubble=true; ">-</a>
                        </td>
                        
                        
                    </tr>
                <?php
                }
                ?>
            </tbody>

            <tfoot id="foots" class="text-center"><tr><th colspan="6">SELECTED</th></tr></tfoot>
            
        </table>
    </div>

<?php
}
?>
<script>
    $('.plus').click(function() {
        var partRow = $(this).parents('tr')
        var partDetails = [
            $(this).parent().siblings('.ID').text().trim(),
            $(this).parent().siblings('.partname').text().trim(),
            $(this).parent().siblings('.partmodel').text().trim(),
            $(this).parent().siblings('.partstorage').text().trim(),
            $(this).parent().siblings('.amount').text().trim()

        ]
        var flag = 0;
        var itemId = ''
        console.log('clicke')
        if($('#foots tr').length == 1){
        partRow.addClass('table-success')
        $('#foots:last-child').append('<tr class="'+partDetails[0] +'"> <td>'+partDetails[0]+'</td> <td>'+partDetails[1]+'</td> <td>'+partDetails[2]+'</td> <td>'+partDetails[3]+'</td> <td>'+1+'</td> <td><a class="btn btn-primary minus">-</a> </td></tr>')
        }else{
        $('#foots').find('tr').each(function() {
            itemId = $(this).find("td:eq(0)").text().trim();
            if(partDetails[0] == itemId)
                flag = 1;
        })
        if(flag == 1) {
            partRow.addClass('table-success')
            var amount = 1;
        $('#foots').find('tr').each(function() {
            itemId = $(this).find("td:eq(0)").text().trim();
            if(partDetails[0] == itemId){
                 amount = parseInt( $(this).find("td:eq(4)").text().trim())
                 amount++
                 $(this).find("td:eq(4)").html(amount)
            }})
        } else {
            partRow.addClass('table-success')
                $('#foots:last-child').append('<tr class="'+partDetails[0] +'"><td>'+partDetails[0]+'</td> <td>'+partDetails[1]+'</td> <td>'+partDetails[2]+'</td> <td>'+partDetails[3]+'</td> <td>'+1+'</td> <td><a class="btn btn-primary minus">-</a></td> </tr>')
                console.log([partDetails[0], itemId])
            }
        }

    })

   $('#foots').on('click', 'a.minus', function(){
       var id = $(this).parent().siblings('td:first').text().trim()
       check(id)
   })

   $('.minus').click(function(){
    var id = $(this).parents('tr').find('.ID').text().trim()
    check(id)
   })

   function check (id){
       var flag = 0;
       var itemId = ''
    $('#foots').find('tr').each(function() {
            itemId = $(this).find("td:eq(0)").text().trim();
            if(id == itemId)
                flag = 1;
        })
        if(flag == 1) {

        var amount = $(this).find("td:eq(4)").text().trim();
        $('#foots').find('tr').each(function() {
            itemId = $(this).find("td:eq(0)").text().trim();
            if(id == itemId){
                 amount = parseInt( $(this).find("td:eq(4)").text().trim())
                 if(amount > 0){
                     amount--;
                     $(this).find("td:eq(4)").html(amount)
                 } else {
                     $(this).remove()
                 }
            }})
        }
   }

    
</script>