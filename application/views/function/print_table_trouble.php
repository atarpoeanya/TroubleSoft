<?php
function f_generate_table_select($data)
{
?>
    <div class="table-responsive table-wrapper border ">
        <div class="d-flex p-2 border-bottom justify-content-center">
            <div class="my-auto">件数 :&nbsp;</div>
            <div class="my-auto" id="amount-sum"><b><?= count($data['troubleList']) ?></b></div>
            <button id="clear-button" class="btn btn-sm btn-info ms-auto align-items-end" onclick="clearSearchBar()"><?= $data['CLEAR_BUTTON'] ?></button>
        </div>
        <table class="table table-striped table-hover" id="trouble_table">
            <thead class="">
                <tr id="search-bar">

                </tr>
                <tr class="border-bottom border-dark">
                    <?php foreach ($data['title'] as $title) { ?>
                        <th class=" table-head text-center border-end text-nowrap ">
                            <?= $title ?>
                        </th>
                    <?php } ?>

                    <th class="button_column buttons border-end" style="display:none"></th>
                </tr>

            </thead>
            <tbody>
                <?php


                foreach ($data['troubleList'] as $item) {

                ?>


                    <tr class="data-row" onclick="window.location='<?= base_url() ?>item/<?= $item->c_t800_id ?>';">
                    <td class=" table-data text-center align-middle border-end  pointer col" style="max-width:90px;">
                          <?= date("Y/m/d H:i", strtotime($item->c_accidentDate)) ?>
                        <td class=" table-data text-center align-middle border-end  pointer col">
                        <?= $item->c_stopTime ?>
                        </td> 
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_department ?>
                        <td class=" table-data text-center align-middle border-end  pointer col" style="max-width:100px;">
                            <?= $item->c_facility ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?= $item->c_unit ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col" style="max-width:200px;">
                            <?= $item->c_processName ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col" style="max-width:200px;">
                            <?= $item->c_failMode ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end  pointer col" style="max-width: 90px;">
                            <?= $item->c_manager ?>
                        </td>

                        <td class=" table-data text-center align-middle border-end  pointer col">
                            <?php if (isset($item->c_t203_id)) {
                                echo '●';
                            } ?>
                        </td>
                        <td class=" table-data text-center align-middle border-end pointer col button_column text-nowrap" style="display: none;">
                            <a class="btn-block btn btn-primary modify-button" href="<?= base_url() ?>edit_Equipment/<?= intval($item->c_t800_id) ?>" onclick="event.cancelBubble=true;"><?= $data['MODIFY_BUTTON'] ?></a>

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

    #clear-button {
        min-height: 32px;
        color: #fff;
    }
</style>