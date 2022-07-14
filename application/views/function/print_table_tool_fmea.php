<?php
function f_generate_table_select($data)
{
?>
    <div class="table-responsive table-wrapper border">
        <div class="d-flex p-2 border-bottom">
            <div class="my-auto">件数 :&nbsp;</div>
            <div class="my-auto" id="amount-sum"><b><?= count($data['tool_Fmea']) ?></b></div>
            <button class="btn btn-sm btn-info ms-auto align-items-end" id="clear-button" onclick="clearSearchBar()"><?= $data['CLEAR_BUTTON'] ?></button>
        </div>
        <table class="table table-striped table-hover" id="trouble_fmea_table">
            <thead>
                <tr id="search-bar">

                </tr>
                
                <!-- HEAD HERE -->
                <!-- LIST ON DASHBOARD CONTROLLER  get_trouble_list_tool()-->
                <tr class="border-bottom border-dark">
                    <?php foreach ($data['title'] as $title) { ?>
                        <th class=" table-head text-center border-end text-nowrap ">
                            <?= $title ?>
                        </th>
                    <?php } ?>

                    <th class="button_column buttons text-center border-start border-end" style="display:none;max-width:150px;width: 150px;"></th>
                </tr>

            </thead>
            <!-- BODY HERE -->
            <tbody>
                <?php


                foreach ($data['tool_Fmea'] as $item) {

                ?>
                    <tr class="fmea-tools data-row" onclick="window.location='<?= base_url() ?>item_fmea/<?= $item->c_t203_id ?>';">
                        <td class="kanjifont table-data text-center align-middle border-end pointer col">
                            <?= $item->c_facility ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-end pointer col">
                            <?= $item->c_processName ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-end pointer col">
                            <?= $item->c_failMode ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-end pointer col ID" style="max-width:90px;">
                            <?= $item->c_picSchedule ?>
                        </td>
                        <td class="kanjifont table-data text-center align-middle border-end pointer col button_column text-nowrap" style="display: none;width:150px;max-width:150px;">
                            <a class="btn btn-primary" href="<?= base_url() ?>editEquipment_fmea/<?= intval($item->c_t203_id) ?>" onclick="event.cancelBubble=true;"><?= $data['MODIFY_BUTTON'] ?></a>
                            <a class="btn btn-danger " onclick="event.cancelBubble=true; deleteData_tool_fmea(<?= $item->c_t203_id ?>)"><?= $data['DELETE_BUTTON'] ?></a>

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
        overflow: hidden;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-head {
        z-index: 5;
        box-shadow: 10px 5px rgba(0, 0, 0, .05);
    }

    #clear-button {
        min-height: 32px;
        color: #fff;
    }
</style>

<!-- <th class=" table-head text-center border-end text-nowrap ">
<?= $data['title'][0] ?>
                    </th>
                    <th class=" table-head text-center border-end text-nowrap ">
                        <?= $data['title'][1] ?>
                    </th>
                    <th class=" table-head text-center border-end text-nowrap ">
                        <?= $data['title'][2] ?>
                    </th>
                    <th class=" table-head text-center border-end text-nowrap " style="max-width:90px;">
                        <?= $data['title'][3] ?>
                    </th>

                    <th class="button_column buttons text-center border-start border-end" style="display:none;max-width:150px;width: 150px;"></th>
                </tr> -->