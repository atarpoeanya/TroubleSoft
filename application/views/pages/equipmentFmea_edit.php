<div class="d-flex justify-content-center pt-3" id="mainForm">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                <h2 class="card-title ps-2 pt-2">FMEA FORM</h2>
                    <form action="/edit_Equipment_fmea/" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data">
                        <!-- ID -->
                        <input type="hidden" name="id" id="setsubiId" value="<?= $items->c_t203_id ?>">
                        <!-- For Spare part [Id, Amount] -->
                        <input type="hidden" name="spareParts" id="partinfo" value="">
                        <div class="row">
    
    
                            <p class=" position-relative sub-header">
                                &nbsp;<b><?= $this->data['SECTION_1'] ?></b>&nbsp;</p>
                            <div class="row row border-top py-3">
    
                                <div class="col-4 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_DEPARTMENT_F'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <select class="form-control" name="部署" id="busho" required>
                                        <?php
                                        foreach ($division as $d) :
                                            if ($d == $items->c_department) : ?>
                                                <option value="<?= $d ?>" selected><?= $d ?></option>
                                            <?php else : ?>
                                                <option value="<?= $d ?>"><?= $d ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
    
                                <div class="col-4 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_FACILITY_F'] ?></label>
                                    <select class="form-control" name="設備" id="setsubi" required>
                                        <?php
                                        foreach ($tools_name as $t) :
                                            if ($t == $items->c_facility) : ?>
                                                <option value="<?= $t ?>" selected><?= $t ?></option>
                                            <?php else : ?>
                                                <option value="<?= $t ?>"><?= $t ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-4 pt-3"><label class="form-label" for=""><?= $this->data['EQUIPMENT_UNIT_F'] ?></label>
                                    <select class="form-control" name="号機" id="gouki" required>
                                        <?php
                                        foreach ($unit as $u) :
                                            if ($u == $items->c_unit) : ?>
                                                <option value="<?= $u ?>" selected><?= $u ?></option>
                                            <?php else : ?>
                                                <option value="<?= $u ?>"><?= $u ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_PROCESS_NAME_F'] ?></label>
                                    <input type="text" class="form-control" name="工程名" value="<?= $items->c_processName ?>" required>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_FAIL_MODE_F'] ?></label>
                                    <input type="text" class="form-control" name="故障モード" value="<?= $items->c_failMode ?>" required>
                                </div>
                            </div>
    
    
                            <p class=" position-relative sub-header">
                                &nbsp;<b><?= $this->data['SECTION_3_F'] ?></b>&nbsp;</p>
                            <div class="row row border-top py-3">
    
                                <div class="col-6 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_MECHANISM_F'] ?></label>
                                    <textarea class="form-control" name="fail_mech" cols="30" rows="5" required><?= $items->c_failMech ?></textarea>
                                </div>
    
                                <div class="col-6 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_FAIL_IMPACT_F'] ?></label>
                                    <textarea class="form-control" cols="30" rows="5" name="故障の影響" required><?= $items->c_failImpact ?></textarea>
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_LINE_EFFECT_F'] ?></label>
                                    <input name="ライン停止の可能性" class="form-control" required value="<?= $items->c_lineEffect ?>">
                                </div>
                                <div class="col-6 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_SPECIAL_CHAR_F'] ?></label>
                                    <input type="text" class="form-control" name="特殊特性等" value="<?= $items->c_specialChar ?>" required>
                                </div>
                            </div>
    
                            <p class=" position-relative sub-header">
                                &nbsp;<b><?= $this->data['SECTION_4'] ?></b>&nbsp;</p>
                            <div class="row row border-top py-3">
    
                                <div class="col-4 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_PIC_SCHEDULE_F'] ?></label>
                                    <select class="form-control" name="担当者日程" required>
                                        <?php
                                        foreach ($inspector_ as $i) :
                                            if ($i == $items->c_picSchedule) : ?>
                                                <option value="<?= $i ?>" selected><?= $i ?></option>
                                            <?php else : ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-2 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_PERIOD_F'] ?></label>
                                    <input type="text" class="form-control" name="周期" value="<?= $items->c_period ?>" required>
                                </div>
                                <div class="col-2 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_MONTH_F'] ?></label>
                                    <input type="text" class="form-control" name="月" value="<?= $items->c_month ?>" required>
                                </div>
                                <div class="col-12 pt-3">
                                    <div class="col pt-3">
                                        <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_PREVENTION_F'] ?></label>
                                        <textarea class="form-control" name="予防" id="" cols="30" rows="5" required><?= $items->c_prevention ?></textarea>
                                    </div>
                                    <div class="col pt-3">
                                        <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_DETECTION_F'] ?></label>
                                        <input type="text" class="form-control" name="検出" value="<?= $items->c_detection ?>" required>
                                    </div>
                                </div>
    
                            </div>
    
    
                            <p class=" position-relative sub-header">
                                &nbsp;<b><?= $this->data['SECTION_5'] ?></b>&nbsp;</p>
                            <div class="row row border-top py-3">
    
                                <div class="col-6 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_MEASURE_F'] ?></label>
                                    <textarea class="form-control" name="対策案" id="" cols="30" rows="5" required><?= $items->c_counterPlan ?></textarea>
                                </div>
    
                                <div class="col-6 pt-3">
                                    <label for="start_day" class="form-label"><?= $this->data['EQUIPMENT_DETECTION_F'] ?></label>
                                    <textarea class="form-control" name="対策" id="" cols="30" rows="5" required><?= $items->c_measure ?></textarea>
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
    
                                                        <td style="display: none;"><a class="btn btn-primary minus">DELETE</a> </td>
                                                    </tr>
                                            </tbody>
    
                                        <?php } ?>
                                        <tfoot class="table-light">
                                            <?php
                                            if (!property_exists($items, 'spare')) :
                                            ?>
                                                <tr>
                                                    <td style="height: 100px;" colspan="4" class="text-center emptyTab">
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

    .sub-header {
        top: 30px;
        left: 40px;
        background-color: white;
        width: max-content;
    }

    form .form-control {

        background-color: #EAECF4;

    }

</style>


<script>

</script>