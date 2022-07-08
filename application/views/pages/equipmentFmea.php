<div class=" pt-3" id="mainForm" >
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">FMEA FORM</h2>
                    <form action="/equipment_fmea/2" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data">
                        <!-- For Spare part [Id, Amount] -->
                        <input type="hidden" name="spareParts" id="partinfo" value="">


                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_1'] ?></b>&nbsp;</p>
                        <div class="row row border-top py-3">

                            <div class="col-6 pt-3">
                                <label for="busho" class="form-label"><?= $this->data['EQUIPMENT_DEPARTMENT_F'] ?></label>
                                <select class="form-control" name="部署" id="busho" required>
                                    <option value="" selected>Default</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="ATAR">ATAR</option>
                                </select>
                            </div>

                            <div class="col-6 pt-3">
                                <label for="setsubi" class="form-label"><?= $this->data['EQUIPMENT_FACILITY_F'] ?></label>
                                <select class="form-control" name="設備" id="setsubi" required>
                                    <option value="" selected>Default</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col pt-3">
                                <label class="form-label" for="gouki"><?= $this->data['EQUIPMENT_UNIT_F'] ?></label>
                                <select class="form-control" name="号機" id="gouki" required>
                                    <option value="" selected>Default</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-3 pt-3">
                                <label for="kouteiNa" class="form-label"><?= $this->data['EQUIPMENT_PROCESS_NAME_F'] ?></label>
                                <input type="text" class="form-control" name="工程名" id="kouteiNa" required>
                            </div>
                            <div class="col-3 pt-3">
                                <label for="mode" class="form-label"><?= $this->data['EQUIPMENT_FAIL_MODE_F'] ?></label>
                                <input type="text" class="form-control" name="故障モード" id="mode" required>
                            </div>
                        </div>

                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_3_F'] ?></b>&nbsp;</p>
                        <div class="row row border-top py-3">

                            <div class="col-6 pt-3">
                                <label for="mech" class="form-label"><?= $this->data['EQUIPMENT_MECHANISM_F'] ?></label>
                                <textarea class="form-control" name="fail_mech" cols="30" rows="5" required id="mech"></textarea>
                            </div>

                            <div class="col-6 pt-3">
                                <label for="fail_impact" class="form-label"><?= $this->data['EQUIPMENT_FAIL_IMPACT_F'] ?></label>
                                <textarea class="form-control" cols="30" rows="6" name="故障の影響" required id="fail_impact"></textarea>
                            </div>
                            <div class="col-6 pt-3">
                                <label for="line_effect" class="form-label"><?= $this->data['EQUIPMENT_LINE_EFFECT_F'] ?></label>
                                <textarea name="ライン停止の可能性" class="form-control" cols="30" rows="5" required id="line_effect"></textarea>
                            </div>
                            <div class="col-6 pt-3">
                                <label for="special_char" class="form-label"><?= $this->data['EQUIPMENT_SPECIAL_CHAR_F'] ?></label>
                                <input type="text" class="form-control" name="特殊特性等" required id="special_char">
                            </div>
                        </div>

                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_4'] ?></b>&nbsp;</p>
                        <div class="row row border-top py-3">

                            <div class="col-4 pt-3">
                                <label for="pic" class="form-label"><?= $this->data['EQUIPMENT_PIC_SCHEDULE_F'] ?></label>
                                <select class="form-control" name="担当者日程" required id="pic">
                                    <option value="" selected>Default</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-2 pt-3">
                                <label for="period" class="form-label"><?= $this->data['EQUIPMENT_PERIOD_F'] ?></label>
                                <input type="text" class="form-control" name="周期" required id="period">
                            </div>
                            <div class="col-2 pt-3">
                                <label for="month" class="form-label"><?= $this->data['EQUIPMENT_MONTH_F'] ?></label>
                                <input type="text" class="form-control" name="月" id="month">
                            </div>
                            <div class="col-12 pt-3">
                                <div class="col">
                                    <label for="prevention" class="form-label"><?= $this->data['EQUIPMENT_PREVENTION_F'] ?></label>
                                    <textarea class="form-control" name="予防" id="" cols="30" rows="5" required id="prevention"></textarea>
                                </div>
                                <div class="col pt-3">
                                    <label for="detection" class="form-label"><?= $this->data['EQUIPMENT_DETECTION_F'] ?></label>
                                    <input type="text" class="form-control" name="検出" required id="detection">
                                </div>
                            </div>

                        </div>


                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_5'] ?></b>&nbsp;</p>
                        <div class="row row border-top py-3">

                            <div class="col-6 pt-3">
                                <label for="counter" class="form-label"><?= $this->data['EQUIPMENT_COUNTER_PLAN_F'] ?></label>
                                <textarea class="form-control" name="対策案" id="counter" cols="30" rows="5" required></textarea>
                            </div>

                            <div class="col-6 pt-3">
                                <label for="measure" class="form-label"><?= $this->data['EQUIPMENT_MEASURE_F'] ?></label>
                                <textarea class="form-control" name="対策" id="measure" cols="30" rows="5" required></textarea>
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
                                                    <span>EMPTY</span>
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

</script>