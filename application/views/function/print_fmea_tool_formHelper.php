<?php
function f_generate_table_select($data)
{
?>
    <!-- Probably generate this with function -->
    <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
        &nbsp;SECTION_1_<b>設備の内容</b>&nbsp;</p>
    <div class="row border-top p-3 rounded my-auto">

        <div class="col-6 mt-3">
            <label for="start_day" class="form-label">部署 （設備の）</label>
            <input required type="text" class="form-control col-6" readonly value="<?= $data['fmea_tool']->c_department ?>">
        </div>

        <div class="col-6 mt-3">
            <label for="start_day" class="form-label">設備名</label>
            <input required type="text" class="form-control" readonly value="<?= $data['fmea_tool']->c_facility ?>">
        </div>
        <div class="col mt-3">
            <label for="start_day" class="form-label">工程名</label>
            <input required type="text" class="form-control" readonly value="<?= $data['fmea_tool']->c_processName ?>">
        </div>
        <div class="col mt-3">
            <label for="start_day" class="form-label">故障モード</label>
            <input required type="text" class="form-control" readonly value="<?= $data['fmea_tool']->c_failMode ?>">
        </div>
    </div>

    <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
        &nbsp;SECTION_2_<b>修理内容</b>&nbsp;</p>
    <div class="row border-top p-3 rounded my-auto">

        <div class="col-12 mt-3">
            <label for="start_day" class="form-label">現象・不具合要因詳細</label>
            <textarea class="form-control" cols="30" rows="4" readonly><?= $data['fmea_tool']->c_phenomenon ?></textarea>
        </div>
        <div class="col-12 mt-3">
            <label for="start_day" class="form-label">修理内容</label>
            <textarea class="form-control" cols="30" rows="4" readonly><?= $data['fmea_tool']->c_repairDet ?></textarea>
        </div>
        <div class="col-12 mt-3">
            <label for="start_day" class="form-label">対応・処置</label>
            <textarea class="form-control" cols="30" rows="4" readonly><?= $data['fmea_tool']->c_response ?></textarea>
        </div>


    </div>

    <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
        &nbsp;SECTION_3_<b>影響</b>&nbsp;</p>
    <div class="row border-top p-3 rounded my-auto">

        <div class="col-6 mt-3">
            <label for="start_day" class="form-label">故障のメカニズム</label>
            <textarea class="form-control" cols="30" rows="6" readonly><?= $data['fmea_tool']->c_failMech ?></textarea>
        </div>

        <div class="col-6 mt-3">
            <label for="start_day" class="form-label">故障の影響</label>
            <textarea class="form-control" cols="30" rows="6" readonly><?= $data['fmea_tool']->c_failImpact ?></textarea>
        </div>
        <div class="col-6 mt-3">
            <label for="start_day" class="form-label">ライン停止の可能性</label>
            <input required type="text" class="form-control" readonly value="<?= $data['fmea_tool']->c_lineEffect ?>">
        </div>
        <div class="col-6 mt-3">
            <label for="start_day" class="form-label">特 殊 特性等</label>
            <input required type="text" class="form-control" readonly value="<?= $data['fmea_tool']->c_specialChar ?>">
        </div>
    </div>

    <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
        &nbsp;SECTION_4_<b>現在の工程管理</b>&nbsp;</p>
    <div class="row border-top p-3 rounded my-auto">

        <div class="col-lg-5 col-5 mt-3">
            <label for="start_day" class="form-label">担当者 日程</label>
            <input required type="text" class="form-control" readonly value="<?= $data['fmea_tool']->c_picSchedule ?>">
        </div>
        <div class="col-lg-3 col-4 mt-3">
            <label for="start_day" class="form-label">周期</label>
            <input required type="text" class="form-control" readonly value="<?= $data['fmea_tool']->c_period ?>">
        </div>
        <div class="col-lg-3 col-4 mt-3">
            <label for="start_day" class="form-label">月</label>
            <input required type="text" class="form-control" readonly value="<?= $data['fmea_tool']->c_month ?>">
        </div>
        <div class="col-12">
            <div class="col mt-3">
                <label for="start_day" class="form-label">予防</label>
                <textarea class="form-control" cols="30" rows="6" readonly><?= $data['fmea_tool']->c_prevention ?></textarea>
            </div>
            <div class="col mt-3">
                <label for="start_day" class="form-label">検出</label>
                <textarea class="form-control" cols="30" rows="6" readonly><?= $data['fmea_tool']->c_detection ?></textarea>
            </div>
        </div>

    </div>


    <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
        &nbsp;SECTION_5_<b>対策</b>&nbsp;</p>
    <div class="row border-top p-3 rounded my-auto">

        <div class="col-6 mt-3">
            <label for="start_day" class="form-label">対策案</label>
            <textarea class="form-control" cols="30" rows="6" readonly><?= $data['fmea_tool']->c_counterPlan ?></textarea>
        </div>

        <div class="col-6 mt-3">
            <label for="start_day" class="form-label">対策</label>
            <textarea class="form-control" cols="30" rows="6" readonly><?= $data['fmea_tool']->c_measure ?></textarea>
        </div>

    </div>

    <!-- SPARE PART -->
    <div class="spare row mt-3">
        <div class="col  p-0 rounded-2 overflow-hidden mb-2">
            <table class="table text-center m-0" id="equipment_parts_list_fmea">
                <thead>

                    <tr class="table-dark">
                        <td>部品NO</td>
                        <td>部品名</td>
                        <td>型式</td>
                        <td>数量</td>
                    </tr>
                </thead>
                <tbody class="table-striped table-light">
                    <?php

                    if (property_exists($data['fmea_tool'], 'spare'))
                        foreach ($data['fmea_tool']->spare as $item) {
                    ?>
                        <tr>
                            <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 ID">
                                <?= $item->c_t202_id ?>
                            </td>
                            <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 partname">
                                <?= $item->c_partName ?>
                            </td>
                            <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 partmodel">
                                <?= $item->c_model ?>
                            </td>
                            <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 amount">
                                <?= $item->c_quantity ?>
                            </td>

                            <td style="display: none;"><a class="btn btn-primary minus">-</a> </td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot class="table-striped table-light">

                    <?php
                    if (!property_exists($data['fmea_tool'], 'spare')) :
                    ?>
                        <tr>
                            <td style="height: 100px;" colspan="4" class="text-center emptyTab">
                                <span>EMPTY</span>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tfoot>
            </table>

        </div>
    </div>
<?php
}
?>