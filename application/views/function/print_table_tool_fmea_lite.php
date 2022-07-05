<?php
function f_generate_table_select($data)
{
    // print_r($data['tool_Fmea'][0]->c_t203_id)
    // if($data == "x"){
?>
    <div class="">

        <table class="table table-striped table-hover" id="trouble_fmea_table_lite">
            <thead>
                <tr>
                    <?php
                    foreach ($data['title'] as $thead) {

                        if ($thead == 'c_processName'  || $thead == 'c_failMode' || $thead == 'c_accidentDate') {
                            switch ($thead) {
                                case 'c_processName':
                                    $thead = '工程名・工程機能';
                                    break;
                                case 'c_failMode':
                                    $thead = '故障モード';
                                    break;
                                case 'c_accidentDate':
                                    $thead = '設備名';
                                    break;
                                default:
                                    // $thead = 'missing';
                                    break;
                            }

                    ?>
                            <th class=" table-head text-center border-right border-left"><?= $thead ?></th>

                    <?php
                        }
                    }
                    ?>
                    <th class=" table-head text-center border-right border-left">
                        ID
                    </th>
                    <th class="button_column buttons"></th>
                    
                </tr>
                <tr id="search-bar"></tr>
            </thead>
            
                <tbody >
                    
                    <?php


                    foreach ($data['tool_Fmea'] as $item) {

                    ?>
                        <tr>
                            <td class=" table-data text-center align-middle border-right border-left pointer col"> 
                                <?= $item->c_facility ?>
                            </td>
                            <td class=" table-data text-center align-middle border-right border-left pointer col">
                                <?= $item->c_processName ?>
                            </td>
                            <td class=" table-data text-center align-middle border-right border-left pointer col">
                                <?= $item->c_failMode ?>
                            </td>
                            <td class=" table-data text-center align-middle border-right border-left pointer col ID">
                                <?= $item->c_t203_id ?>
                            </td>
                            <td class=" table-data text-center align-middle border-right border-left pointer col button_column text-nowrap">
                                <a class="btn btn-primary buttons" data-bs-dismiss="modal"><?= $data['SUBMIT_BUTTON'] ?></a>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            
        </table>
    </div>

    <?php
    // } if($data == 'y') {
    ?>

<?php
    // }
}
?>
<style>
    .pointer:hover {
        cursor: pointer;
    }

    .table-title {
        background: #435d7d;
        color: #fff;
        padding: 6px 6px;
        border-radius: 3px 3px 0 0;
    }

    .table-wrapper {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-wrapper-scrolls {
        width: auto;
        height: 70vh;
        overflow-y: scroll;

    }

    .text-nowrap {
        white-space: nowrap;
    }
</style>

<script>
   $('.buttons').on('click', function() {
            $id = $(this).parent().siblings('.ID').html().trim()

            $.ajax({
                url: "<?= base_url(); ?>dashboard/fmea_tool_print/" + $id,

                success: function(response) {
                    $("#fmea_place").html(response);
                    $('#fmea_id').val($id)




                },

            })
        })
</script>