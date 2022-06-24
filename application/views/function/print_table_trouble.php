<?php
function f_generate_table_select($data)
{
?>
    <div class="table-responsive table-wrapper border ">
        <div class="d-flex p-2 border-bottom">件数:&nbsp; <div id="amount-sum"><b><?= count($data['troubleList']) ?></b></div>
        </div>
        <table class="table table-striped table-hover" id="trouble_table">
            <thead class="">
                <tr id="search-bar">

                </tr>
                <tr class="border-bottom border-dark">
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
                                    $thead = '発生日';
                                    break;
                                default:
                                    // $thead = 'missing';
                                    break;
                            }

                    ?>
                            <th class=" table-head text-center border-end text-nowrap ">
                                <?= $thead ?>
                            </th>

                    <?php
                        }
                    }
                    ?>
                    <th class=" table-head text-center ">
                        ID
                    </th>
                    <th class="button_column buttons text-center border-start" style="display:none"></th>
                </tr>

            </thead>
            <tbody>
                <?php


                foreach ($data['troubleList'] as $item) {

                ?>
                
                
                    <tr class="data-row" onclick="window.location='<?= base_url()?>item/<?= $item->c_t800_id ?>';">
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_accidentDate ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_processName ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_failMode ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col ID">
                            <?= $item->c_t800_id ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col button_column text-nowrap" style="display: none;">
                            <a class="btn-block btn btn-primary modify-button" href="<?= base_url() ?>editEquipment/<?= intval($item->c_t800_id) ?>" onclick="event.cancelBubble=true;"><?= $data['UPDATE_BUTTON']?></a>
                            <a class="btn-block btn btn-danger modify-button" onclick="event.cancelBubble=true; deleteData(<?= $item->c_t800_id ?>, 'equipment')"><?= $data['DELETE_BUTTON']?></a>
                        </td>
                    </tr>
                
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<?php
}
?>
<style>
    .pointer:hover {
        cursor: pointer;
    }

    .table-wrapper {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }
   

    .table-head {
        z-index: 5;
        box-shadow: 10px 5px rgba(0, 0, 0, .05);
    }
</style>