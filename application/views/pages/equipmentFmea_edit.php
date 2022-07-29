<?php
if ($this->session->flashdata('error') != '') {
?>
    <div class="toast start-1 bottom-0 position-fixed fade" role="alert" id="errorNotif" aria-live="assertive" aria-atomic="true" style="z-index: 100;" data-bs-delay="3000">
        <div class="toast-header text-white bg-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="1.25rem" height="1.25rem" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
            </svg>
            <strong class="me-auto fs-5">&nbsp;過去トラブルデータベース</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body fs-5">
            登録に失敗しました
        </div>
    </div>
<?php
}
?>

<div class="d-flex justify-content-center pt-3" id="mainForm">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title ps-2 pt-2">FMEA FORM</h2>
                    <form action="<?= base_url() ?>edit_Equipment_fmea/<?= $items->c_t203_id ?>/post" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data" novalidate>
                        <!-- ID -->
                        <input type="hidden" name="id" id="setsubiId" value="<?= $items->c_t203_id ?>">
                        <!-- For Spare part [Id, Amount] -->
                        <input type="hidden" name="spareParts" id="partinfo" value="">
                        <div class="row">


                            <p class=" position-relative sub-header">
                                &nbsp;<b><?= $this->data['SECTION_1'] ?></b>&nbsp;</p>
                            <div class="row row border-top py-3">

                                <div class="col-4 pt-3">
                                    <label class="form-label" for="busho"><?= $this->data['EQUIPMENT_DEPARTMENT_F'] ?></label>
                                    <?php if (trim(set_value('部署')) != trim($items->c_department) && set_value('部署') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <select class="form-select <?= (form_error('部署') ? 'is-invalid' : ''); ?>" name="部署" id="busho" required>
                                        <?php
                                        foreach ($division as $d) :
                                            if ($d == $items->c_department && ($items->c_department == set_value('部署') || set_value('部署') == '')) : ?>
                                                <option value="<?= $d ?>" selected><?= $d ?></option>

                                            <?php elseif ($d == set_value('部署') && ($items->c_department != set_value('部署') || set_value('部署') != '')) : ?>
                                                <option value="<?= $d ?>" selected><?= $d ?></option>

                                            <?php else : ?>
                                                <option value="<?= $d ?>"><?= $d ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-4 pt-3">
                                    <label class="form-label" for="setsubi"><?= $this->data['EQUIPMENT_FACILITY_F'] ?></label>
                                    <?php if (trim(set_value('設備')) != trim($items->c_facility) && set_value('設備') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <select class="form-select <?= (form_error('設備') ? 'is-invalid' : ''); ?>" name="設備" id="setsubi" required>
                                        <?php
                                        foreach ($tools_name as $t) :
                                            if ($t == $items->c_facility && ($items->c_facility == set_value('設備') || set_value('設備') == '')) : ?>
                                                <option value="<?= $t ?>" selected><?= $t ?></option>

                                            <?php elseif ($t == set_value('設備') && ($items->c_facility != set_value('設備') || set_value('設備') != '')) : ?>
                                                <option value="<?= $t ?>" selected><?= $t ?></option>

                                            <?php else : ?>
                                                <option value="<?= $t ?>"><?= $t ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-4 pt-3">
                                    <label class="form-label" for="gouki"><?= $this->data['EQUIPMENT_UNIT_F'] ?></label>
                                    <?php if (trim(set_value('号機')) != trim($items->c_unit) && set_value('号機') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <select class="form-select <?= (form_error('号機') ? 'is-invalid' : ''); ?>" name="号機" id="gouki" required>
                                        <?php
                                        foreach ($unit as $u) :
                                            if ($u == $items->c_unit && ($items->c_unit == set_value('号機') || set_value('号機') == '')) : ?>
                                                <option value="<?= $u ?>" selected><?= $u ?></option>

                                            <?php elseif ($u == set_value('号機') && ($items->c_unit != set_value('号機') || set_value('号機') != '')) : ?>
                                                <option value="<?= $u ?>" selected><?= $u ?></option>

                                            <?php else : ?>
                                                <option value="<?= $u ?>"><?= $u ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="kouteiNa" class="form-label"><?= $this->data['EQUIPMENT_PROCESS_NAME_F'] ?></label>
                                    <?php if (trim(set_value('工程名')) != trim($items->c_processName) && trim(set_value('工程名')) != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('工程名') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('工程名')) ?></span>
                                    <?php } ?>
                                    <input type="text" class="form-control <?php if (form_error('工程名')) echo 'is-invalid'; ?>" id="kouteiNa" name="工程名" value="<?= set_value('工程名') != '' ? trim(set_value('工程名')) :  trim($items->c_processName) ?>" required>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="mode" class="form-label"><?= $this->data['EQUIPMENT_FAIL_MODE_F'] ?></label>
                                    <?php if (trim(set_value('故障モード')) != trim($items->c_failMode) && set_value('故障モード') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('故障モード') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('故障モード')) ?></span>
                                    <?php } ?>
                                    <input type="text" class="form-control <?php if (form_error('故障モード')) echo 'is-invalid'; ?>" id="mode" name="故障モード" value="<?= set_value('故障モード') != '' ? trim(set_value('故障モード')) :  trim($items->c_failMode) ?>" required>
                                </div>
                            </div>


                            <p class=" position-relative sub-header">
                                &nbsp;<b><?= $this->data['SECTION_3_F'] ?></b>&nbsp;</p>
                            <div class="row row border-top py-3">

                                <div class="col-6 pt-3">
                                    <label for="mech" class="form-label"><?= $this->data['EQUIPMENT_MECHANISM_F'] ?></label>
                                    <?php if (trim(set_value('fail_mech')) != trim($items->c_failMech) && set_value('fail_mech') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('fail_mech') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('fail_mech')) ?></span>
                                    <?php } ?>
                                    <textarea class="form-control <?php if (form_error('fail_mech')) echo 'is-invalid'; ?>" id="mech" name="fail_mech" cols="30" rows="5" required><?= set_value('fail_mech') != '' ? trim(set_value('fail_mech')) :  trim($items->c_failMech) ?></textarea>
                                </div>

                                <div class="col-6 pt-3">
                                    <label for="fail_impact" class="form-label"><?= $this->data['EQUIPMENT_FAIL_IMPACT_F'] ?></label>
                                    <?php if (trim(set_value('故障の影響')) != trim($items->c_failImpact) && set_value('故障の影響') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('故障の影響') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('故障の影響')) ?></span>
                                    <?php } ?>
                                    <textarea class="form-control <?php if (form_error('故障の影響')) echo 'is-invalid'; ?>" cols="30" rows="5" id="fail_impact" name="故障の影響" required><?= set_value('故障の影響') != '' ? trim(set_value('故障の影響')) :  trim($items->c_failImpact) ?></textarea>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="line_effect" class="form-label"><?= $this->data['EQUIPMENT_LINE_EFFECT_F'] ?></label>
                                    <?php if (trim(set_value('ライン停止の可能性')) != trim($items->c_lineEffect) && set_value('ライン停止の可能性') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('ライン停止の可能性') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('ライン停止の可能性')) ?></span>
                                    <?php } ?>
                                    <input id="line_effect" name="ライン停止の可能性" class="form-control <?php if (form_error('ライン停止の可能性')) echo 'is-invalid'; ?>" required value="<?= set_value('ライン停止の可能性') != '' ? trim(set_value('ライン停止の可能性')) :  trim($items->c_lineEffect) ?>">
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="special_char" class="form-label"><?= $this->data['EQUIPMENT_SPECIAL_CHAR_F'] ?></label>
                                    <?php if (trim(set_value('特殊特性等')) != trim($items->c_specialChar) && set_value('特殊特性等') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('特殊特性等') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('特殊特性等')) ?></span>
                                    <?php } ?>
                                    <input type="text" class="form-control <?php if (form_error('特殊特性等')) echo 'is-invalid'; ?>" id="special_char" name="特殊特性等" value="<?= set_value('特殊特性等') != '' ? trim(set_value('特殊特性等')) :  trim($items->c_specialChar) ?>" required>
                                </div>
                            </div>

                            <p class=" position-relative sub-header">
                                &nbsp;<b><?= $this->data['SECTION_4'] ?></b>&nbsp;</p>
                            <div class="row row border-top py-3">

                                <div class="col-4 pt-3">
                                    <label class="form-label" for="pic"><?= $this->data['EQUIPMENT_PIC_SCHEDULE_F'] ?></label>
                                    <?php if (trim(set_value('担当者日程')) != trim($items->c_picSchedule) && set_value('担当者日程') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <select class="form-select <?= (form_error('担当者日程') ? 'is-invalid' : ''); ?>" name="担当者日程" id="pic" required>
                                        <?php
                                        foreach ($inspector_ as $i) :
                                            if ($i == $items->c_picSchedule && ($items->c_picSchedule == set_value('担当者日程') || set_value('担当者日程') == '')) : ?>
                                                <option value="<?= $i ?>" selected><?= $i ?></option>

                                            <?php elseif ($i == set_value('担当者日程') && ($items->c_picSchedule != set_value('担当者日程') || set_value('担当者日程') != '')) : ?>
                                                <option value="<?= $i ?>" selected><?= $i ?></option>

                                            <?php else : ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-2 pt-3">
                                    <label for="period" class="form-label"><?= $this->data['EQUIPMENT_PERIOD_F'] ?></label>
                                    <?php if (trim(set_value('周期')) != trim($items->c_period) && set_value('周期') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('周期') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('周期')) ?></span>
                                    <?php } ?>
                                    <input type="text" class="form-control <?php if (form_error('周期')) echo 'is-invalid'; ?>" id="period" name="周期" value="<?= set_value('周期') != '' ? trim(set_value('周期')) :  trim($items->c_period) ?>" required>
                                </div>
                                <div class="col-2 pt-3">
                                    <label for="month" class="form-label"><?= $this->data['EQUIPMENT_MONTH_F'] ?></label>
                                    <?php if (trim(set_value('月')) != trim($items->c_month) && set_value('月') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('月') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('月')) ?></span>
                                    <?php } ?>
                                    <input type="text" class="form-control <?php if (form_error('月')) echo 'is-invalid'; ?>" id="month" name="月" value="<?= set_value('月') != '' ? trim(set_value('月')) :  trim($items->c_month) ?>" required>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="prevention" class="form-label"><?= $this->data['EQUIPMENT_PREVENTION_F'] ?></label>
                                    <?php if (trim(set_value('予防')) != trim($items->c_prevention) && set_value('予防') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('予防') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('予防')) ?></span>
                                    <?php } ?>
                                    <textarea class="form-control <?php if (form_error('予防')) echo 'is-invalid'; ?>" name="予防" id="prevention" cols="30" rows="5" required><?= set_value('予防') != '' ? trim(set_value('予防')) :  trim($items->c_prevention) ?></textarea>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="detection" class="form-label"><?= $this->data['EQUIPMENT_DETECTION_F'] ?></label>
                                    <?php if (trim(set_value('検出')) != trim($items->c_detection) && set_value('検出') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('検出') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('検出')) ?></span>
                                    <?php } ?>
                                    <textarea class="form-control <?php if (form_error('検出')) echo 'is-invalid'; ?>" name="検出" id="detection" cols="30" rows="5" required><?= set_value('検出') != '' ? trim(set_value('検出')) :  trim($items->c_detection) ?></textarea>
                                </div>
                            </div>


                            <p class=" position-relative sub-header">
                                &nbsp;<b><?= $this->data['SECTION_5'] ?></b>&nbsp;</p>
                            <div class="row row border-top py-3">

                                <div class="col-6 pt-3">
                                    <label for="counter" class="form-label"><?= $this->data['EQUIPMENT_COUNTER_PLAN_F'] ?></label>
                                    <?php if (trim(set_value('対策案')) != trim($items->c_counterPlan) && set_value('対策案') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('対策案') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('対策案')) ?></span>
                                    <?php } ?>
                                    <textarea class="form-control <?php if (form_error('対策案')) echo 'is-invalid'; ?>" name="対策案" id="counter" cols="30" rows="5" required><?= set_value('対策案') != '' ? trim(set_value('対策案')) :  trim($items->c_counterPlan) ?></textarea>
                                </div>

                                <div class="col-6 pt-3">
                                    <label for="measure" class="form-label"><?= $this->data['EQUIPMENT_MEASURE_F'] ?></label>
                                    <?php if (trim(set_value('対策')) != trim($items->c_measure) && set_value('対策') != '') { ?>
                                        <span class="badge bg-success">更新</span>
                                    <?php } ?>
                                    <?php if (form_error('対策') != '') { ?>
                                        <span class="badge bg-danger"><?= trim(form_error('対策')) ?></span>
                                    <?php } ?>
                                    <textarea class="form-control <?php if (form_error('対策')) echo 'is-invalid'; ?>" name="対策" id="measure" cols="30" rows="5" required><?= set_value('対策') != '' ? trim(set_value('対策')) :  trim($items->c_measure) ?></textarea>
                                </div>

                            </div>

                            <div class="spare row mt-3">
                                <div class="col">
                                    <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#partsSelect"><?= $this->data['SPARE_LIST_BUTTON'] ?></a>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="rounded-2 overflow-hidden p-0">
                                        <table class="table text-center m-0 nolimit" id="equipment_parts_list">
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
                                                if (property_exists($items, 'spare'))
                                                    foreach ($items->spare as $num) {
                                                ?>
                                                    <tr>
                                                        <td class="text-center  pointer">
                                                            <?= $num->c_t202_id ?>
                                                        </td>
                                                        <td class="text-center  pointer">
                                                            <?= $num->c_partName ?>
                                                        </td>
                                                        <td class="text-center  pointer">
                                                            <?= $num->c_model ?>
                                                        </td>
                                                        <td style="display: none;"></td>
                                                        <td class="text-center  pointer">
                                                            <?= $num->c_quantity ?>
                                                        </td>

                                                        <td style="display: none;"><a class="btn btn-primary minus"><?= $this->data['DELETE_BUTTON']; ?></a> </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
                                            <tfoot class="table-light">
                                                <?php
                                                if (!property_exists($items, 'spare')) :
                                                ?>
                                                    <tr class="text-white">
                                                        <td style="height: 100px;" colspan="4" class="text-center emptyTab">
                                                            <span><?= $this->data['EMPTY_PLACEHOLDER'] ?></span>
                                                        </td>
                                                    </tr>
                                                <?php else : ?>
                                                    <tr>
                                                        <td style="height: 100px;" colspan="4" class="text-center emptyTab" style="display: none;">
                                                            <span><?= $this->data['EMPTY_PLACEHOLDER'] ?></span>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-center mt-2">
                                    <!-- <input type="submit" name="edit_fmea" class="btn btn-primary float-end" value="登録" id="submitTrouble">
                                <button type="button" class="btn btn-primary" onclick="printName()">CLICK ME</button> -->

                                    <a class="btn btn-warning float-end  me-5" href='<?= base_url(); ?>'><?= $this->data['CANCEL_BUTTON'] ?></a>
                                    <button type="submit" name="edit_fmea" class="btn btn-primary float-end me-1" value="登録" id="submitTrouble"><?= $this->data['SUBMIT_BUTTON']; ?></button>
                                </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


<style>
    body {
        background-color: #F5F5F5
    }

    span p {
        margin-bottom: 0;
    }

    .card-body {
        background-color: #F4F5F6;
    }

    .sub-header {
        top: 30px;
        left: 40px;
        background-color: #F4F5F6;
        width: max-content;
    }
</style>


<script>
    $('input, textarea, select').on('click', function() {
        $(this).removeClass('is-invalid')
        $(this).parent().find('.invalid-feedback').hide()
    })

    $(document).ready(function() {
        $("#errorNotif").toast("show");
    });
</script>