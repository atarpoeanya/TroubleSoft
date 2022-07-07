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
                  <!-- LIST ON DASHBOARD CONTROLLER  get_trouble_list_tool()-->
                    <th class=" table-head text-center border-end text-nowrap ">
                        <?= $data['title'][0] ?>
                    </th>
                    <th class=" table-head text-center border-end text-nowrap ">
                        <?= $data['title'][1] ?>
                    </th>
                    <th class=" table-head text-center border-end text-nowrap ">
                        <?= $data['title'][2] ?>
                    </th>
                    <th class=" table-head text-center border-end text-nowrap ">
                        <?= $data['title'][3] ?>
                    </th>
                    <th class=" table-head text-center border-end text-nowrap ">
                        <?= $data['title'][4] ?>
                    </th>

                    <th class="button_column buttons text-center border-end text-white" style="min-width: 0;">BUTTON</th>
                </tr>

            </thead>
            <tbody>
                <?php


                foreach ($data['troubleList'] as $item) {

                ?>


                    <tr class="data-row" onclick="window.location='<?= base_url() ?>item/<?= $item->c_t800_id ?>';">
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_accidentDate ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_facility ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_processName ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_failMode ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_manager ?>
                        </td>
                        <!-- <td class=" table-data text-center align-middle border-end  pointer col ID">
                            <?= $item->c_t800_id ?>
                        </td> -->
                        <td class=" table-data text-center align-middle border-end border-top  pointer col button_column text-nowrap" style="width: 150px;">
                            <a class="btn-block btn btn-primary modify-button" href="<?= base_url() ?>editEquipment/<?= intval($item->c_t800_id) ?>" onclick="event.cancelBubble=true;"><?= $data['UPDATE_BUTTON'] ?></a>
                            <a class="btn-block btn btn-danger modify-button" onclick="event.cancelBubble=true; deleteData_tool(<?= $item->c_t800_id ?>)"><?= $data['DELETE_BUTTON'] ?></a>
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