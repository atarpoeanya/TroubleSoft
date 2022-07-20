<div class=" pt-3" id="mainForm">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title ps-2 pt-2">FMEA FORM</h2>
                    <form action="/equipment_fmea/2" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data" novalidate>
                        <!-- For Spare part [Id, Amount] -->
                        <input type="hidden" name="spareParts" id="partinfo" value="">


                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_1'] ?></b>&nbsp;</p>
                        <div class="row border-top py-3">

                            <div class="col-4 pt-3">
                                <label for="busho" class="form-label"><?= $this->data['EQUIPMENT_DEPARTMENT_F'] ?></label>
                                <select class="form-select" name="部署" id="busho" required>
                                    <option value="" selected>Default</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="ATAR">ATAR</option>
                                </select>
                            </div>

                            <div class="col-4 pt-3">
                                <label for="setsubi" class="form-label"><?= $this->data['EQUIPMENT_FACILITY_F'] ?></label>
                                <select class="form-select" name="設備" id="setsubi" required>
                                    <option value="" selected>Default</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-4 pt-3">
                                <label class="form-label" for="gouki"><?= $this->data['EQUIPMENT_UNIT_F'] ?></label>
                                <select class="form-select" name="号機" id="gouki" required>
                                    <option value="" selected>Default</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-6 pt-3">
                                <label for="kouteiNa" class="form-label"><?= $this->data['EQUIPMENT_PROCESS_NAME_F'] ?></label>
                                <input type="text" name="工程名" id="kouteiNa" class="form-control
                                <?php if (form_error('工程名')) echo 'is-invalid' ?>" value="<?= set_value('工程名'); ?>" required>
                            </div>
                            <div class="col-6 pt-3">
                                <label for="mode" class="form-label"><?= $this->data['EQUIPMENT_FAIL_MODE_F'] ?></label>
                                <input type="text" name="故障モード" id="mode" class="form-control
                                <?php if (form_error('故障モード')) echo 'is-invalid' ?>" value="<?= set_value('故障モード'); ?>" required>
                            </div>
                        </div>

                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_3_F'] ?></b>&nbsp;</p>
                        <div class="row border-top py-3">

                            <div class="col-6 pt-3">
                                <label for="mech" class="form-label"><?= $this->data['EQUIPMENT_MECHANISM_F'] ?></label>
                                <textarea name="fail_mech" id="mech" cols="30" rows="5" class="form-control
                                <?php if (form_error('fail_mech')) echo 'is-invalid' ?>" required><?= set_value('fail_mech') ?></textarea>
                            </div>

                            <div class="col-6 pt-3">
                                <label for="fail_impact" class="form-label"><?= $this->data['EQUIPMENT_FAIL_IMPACT_F'] ?></label>
                                <textarea cols="30" rows="5" name="故障の影響" id="fail_impact" class="form-control
                                <?php if (form_error('故障の影響')) echo 'is-invalid' ?>" required><?= set_value('故障の影響') ?></textarea>
                            </div>
                            <div class="col-6 pt-3">
                                <label for="line_effect" class="form-label"><?= $this->data['EQUIPMENT_LINE_EFFECT_F'] ?></label>
                                <input name="ライン停止の可能性" id="line_effect" class="form-control
                                <?php if (form_error('ライン停止の可能性')) echo 'is-invalid' ?>" value="<?= set_value('ライン停止の可能性') ?>" required>
                            </div>
                            <div class="col-6 pt-3">
                                <label for="special_char" class="form-label"><?= $this->data['EQUIPMENT_SPECIAL_CHAR_F'] ?></label>
                                <input type="text" name="特殊特性等" id="special_char" class="form-control
                                <?php if (form_error('特殊特性等')) echo 'is-invalid' ?>" required value="<?= set_value('特殊特性等') ?>">
                            </div>
                        </div>

                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_4'] ?></b>&nbsp;</p>
                        <div class="row border-top py-3">

                            <div class="col-4 pt-3">
                                <label for="pic" class="form-label"><?= $this->data['EQUIPMENT_PIC_SCHEDULE_F'] ?></label>
                                <select class="form-select" id="pic" name="担当者日程" required >
                                    <option value="" selected>Default</option>
                                    <option value="1">1</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-2 pt-3">
                                <label for="period" class="form-label"><?= $this->data['EQUIPMENT_PERIOD_F'] ?></label>
                                <input type="text" name="周期" id="period" class="form-control
                                <?php if (form_error('周期')) echo 'is-invalid' ?>" required value="<?= set_value('周期') ?>">
                            </div>
                            <div class="col-2 pt-3">
                                <label for="month" class="form-label"><?= $this->data['EQUIPMENT_MONTH_F'] ?></label>
                                <input type="text" name="月" id="month" class="form-control
                                <?php if (form_error('月')) echo 'is-invalid' ?>" required value="<?= set_value('月') ?>">
                            </div>
                            <div class="col-6 pt-3">
                                <label for="prevention" class="form-label"><?= $this->data['EQUIPMENT_PREVENTION_F'] ?></label>
                                <textarea name="予防" cols="30" rows="5" id="prevention" class="form-control
                                <?php if (form_error('予防')) echo 'is-invalid' ?>" required><?= set_value('予防') ?></textarea>
                            </div>
                            <div class="col-6 pt-3">
                                <label for="detection" class="form-label"><?= $this->data['EQUIPMENT_DETECTION_F'] ?></label>
                                <!-- <input type="text" name="検出" id="detection" class="form-control
                                <?php if (form_error('検出')) echo 'is-invalid' ?>" required value="<?= set_value('検出') ?>"> -->
                                <textarea name="検出" cols="30" rows="5" id="detection" class="form-control
                                <?php if (form_error('検出')) echo 'is-invalid' ?>" required><?= set_value('検出') ?></textarea>
                            </div>
                        </div>


                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_5'] ?></b>&nbsp;</p>
                        <div class="row border-top py-3">

                            <div class="col-6 pt-3">
                                <label for="counter" class="form-label"><?= $this->data['EQUIPMENT_COUNTER_PLAN_F'] ?></label>
                                <textarea name="対策案" id="counter" cols="30" rows="5" class="form-control
                                <?php if (form_error('対策案')) echo 'is-invalid' ?>" required><?= set_value('対策案') ?></textarea>
                            </div>

                            <div class="col-6 pt-3">
                                <label for="measure" class="form-label"><?= $this->data['EQUIPMENT_MEASURE_F'] ?></label>
                                <textarea name="対策" id="measure" cols="30" rows="5" required class="form-control
                                <?php if (form_error('対策')) echo 'is-invalid' ?>"><?= set_value('対策') ?></textarea>
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

                                        </tbody>
                                        <tfoot class="table-striped table-light">
                                            <tr>
                                                <td style="height: 100px;" colspan="4" class="text-center emptyTab">
                                                    <span><?= $this->data['EMPTY_PLACEHOLDER'] ?></span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-2">
                            <a class="btn btn-warning float-end me-5" href='<?= base_url(); ?>'><?= $this->data['CANCEL_BUTTON'] ?></a>
                            <button type="submit" name="add_trouble" class="btn btn-primary float-end  me-1" value="登録" id="submitTrouble"><?= $this->data['SUBMIT_BUTTON']; ?></button>
                            <!-- <input type="submit" name="add_trouble" class="btn btn-primary float-end me-5" value="登録" id="submitTrouble"> -->


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

<!-- REMINDIRE TO UNIFY THIS -->
<script>
    $('input, textarea, select').on('click', function() {
        $(this).removeClass('is-invalid')
    })
</script>