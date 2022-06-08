<?php
function f_generate_table_select($data)
{
?>
    <div class="table-responsive table-wrapper table-wrapper-scroll overflow-hidden">
        <table class="table table-striped table-hover" id="trouble_table">
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
                                    $thead = '発生日';
                                    break;
                                default:
                                // $thead = 'missing';
                                    break;
                            }

                    ?>
                            <th class="kanjifont table-head text-center border-right border-left">
                                <?= $thead ?>
                            </th>

                    <?php
                        }
                    }
                    ?>
                    <th class="kanjifont table-head text-center border-right border-left">
                                ID
                            </th>
                    <th class="button_column" style="display:none"></th>
                </tr>
            </thead>
            <tbody>
                <?php


                foreach ($data['troubleList'] as $item) {

                ?>
                    <tr onclick="view_record(this)" >
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col">
                            <?= $item->c_accidentDate ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col">
                            <?= $item->c_processName ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col">
                            <?= $item->c_failMode ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col ID">
                            <?= $item->c_t800_id ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col button_column text-nowrap" style="display: none;">
                            <a class="btn-block btn btn-primary modify-button" href="<?=base_url()?>editEquipment/<?=intval($item->c_t800_id)?>" onclick="event.cancelBubble=true;">更新</a>
                            <a class="btn-block btn btn-danger modify-button"  onclick="event.cancelBubble=true; deleteData(<?=$item->c_t800_id?>, 'equipment')">削除</a>
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