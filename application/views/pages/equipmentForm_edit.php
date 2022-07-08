
<div class="d-flex justify-content-center pt-3" id="mainForm">


    <div class="row">

        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="pt-3 mb-3">設備のトラブル</h2>
                    </div>
                    <form action="/edit_Equipment/" method="post" class="mt-4 p-4 col" autocomplete="off" id="equipForm" enctype="multipart/form-data">
                        <!-- ID -->
                        <input type="hidden" name="id" id="setsubiId" value="<?= $items->c_t800_id ?>">
                        <!-- For Spare part [Id, Amount] -->
                        <input type="hidden" name="spareParts" id="partinfo" value="">

                        <input type="hidden" name="fmea_id" id="fmea_id" value="">
                        <div class=" d-flex justify-content-md-start">
                            <!-- FMEA TOGGLE -->
                            <div class="row bg-light px-3 pb-2 rounded">

                                <!-- <label class="form-label" for="fmea-toggle-btn">FMEA</label> -->
                                <!-- <span>FMEA</span>
                                <small>FMEAの参考が必要と、「<b>要</b>」選んでください。</small>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="fmea-toggle-btn">

                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary mt-0" for="btnradio1">不要</label>

                                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                    <label class="btn btn-outline-primary mt-0" for="btnradio2">要</label>

                                </div> -->
                            </div>

                        </div>
                        <!-- SECTION_1_Identity -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_1'] ?></b>&nbsp;</p>
                        <div class="inspector row border-top py-3">

                            <div class="col-6 pt-3">
                                <label for="start_day" class="form-label"><?= $this->data['ACCIDENT_DATE'] ?></label>
                                <input required type="date" class="form-control" id="start_day" name="発生日" value="<?= $items->c_accidentDate ?>" required>
                            </div>

                            <div class="col-6 pt-3">
                                <label for="repair_day" class="form-label"><?= $this->data['REPAIR_DATE'] ?></label>
                                <input required type="date" class="form-control" id="repair_day" name="修理日" value="<?= $items->c_repairDate ?>" required>
                            </div>

                            <div class="col-4 pt-3">
                                <label for="time_start" class="form-label"><?= $this->data['HAPPENING_TIME'] ?></label>
                                <input required type="time" class="form-control" id="time_start" name="time_start" value="<?= $items->c_repairStart ?>" required>
                            </div>
                            <div class="col-4 pt-3">
                                <label for="time_end" class="form-label"><?= $this->data['STOP_TIME'] ?></label>
                                <input required type="time" class="form-control" id="time_end" name="time_end" value="<?= $items->c_repairEnd ?>" required>
                            </div>



                            <div class="col-9 pt-3">
                                <div class="col-4">
                                    <label class="form-label" for="tantou"><?= $this->data['PIC'] ?></label>
                                    <select class=" form-control  <?= (form_error('担当者') ? 'is-invalid' : ''); ?>" name="担当者" id="tantou" required>
                                        <?php
                                        foreach ($inspector_ as $i) :
                                            if ($i == $items->c_manager) : ?>
                                                <option value="<?= $i ?>" selected><?= $i ?></option>
                                            <?php else : ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <!-- SECTION_2_EquipmentInfo -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_2'] ?></b>&nbsp;</p>
                        <div class="item row border-top py-3">
                            <div class="col-4 pt-3">
                                <label class="form-label" for="busho"><?= $this->data['DEPARTMENT'] ?></label>
                                <select class="form-control <?= (form_error('部署') ? 'is-invalid' : ''); ?>" name="部署" id="busho" required>

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
                            <!-- Probably connect with each other -->
                            <div class="col-4 pt-3">
                                <label class="form-label" for="setsubi"><?= $this->data['PROCESS_NAME'] ?></label>
                                <select class="form-control <?= (form_error('設備') ? 'is-invalid' : ''); ?>" name="設備" id="setsubi" required>
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
                            <div class="col-4 pt-3">
                                <label class="form-label" for="gouki"><?= $this->data['UNIT'] ?></label>
                                <select class="form-control <?= (form_error('号機') ? 'is-invalid' : ''); ?>" name="号機" id="gouki" required>
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

                            <div class="col pt-3">
                                <label for="kouteiNa" class="form-label"><?= $this->data['PROCESS_NAME'] ?></label>
                                <input required type="text" class="form-control" name="工程名" id="kouteiNa" value="<?= $items->c_processName ?>" required>
                            </div>

                            <div class="col pt-3">
                                <label for="mode" class="form-label"><?= $this->data['FAIL_MODE'] ?></label>
                                <input required type="text" class="form-control" name="故障モード" id="mode" value="<?= $items->c_failMode ?>" required>
                            </div>


                        </div>
                        <!-- SECTION_3_FixDetails  -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_3'] ?></b>&nbsp;</p>
                        <div class="detail row border-top py-3">
                            <div class="col-12 pt-3">
                                <label class="form-label" for="gensho"><?= $this->data['PHENOMENON'] ?></label>
                                <textarea required name="現象" id="gensho" class="form-control" cols="30" rows="10" required><?= $items->c_phenomenon ?></textarea>
                            </div>
                            <div class="col-12 pt-3">
                                <label class="form-label" for="shuriNaiyou"><?= $this->data['REPAIR_DETAIL'] ?></label>
                                <textarea required name="修理内容" id="shuriNaiyou" class="form-control" cols="30" rows="10" required><?= $items->c_repairDet ?></textarea>
                            </div>

                            <div class="col-6 pt-3">
                                <label class="form-label" for="failMech"><?= $this->data['MECHANISM'] ?></label>
                                <textarea required name="fail_mech" id="failMech" class="form-control" cols="30" rows="5" required><?= $items->c_failMech ?></textarea>
                            </div>

                            <div class="col-6 pt-3">
                                <label class="form-label" for="response"><?= $this->data['RESPONSE'] ?></label>
                                <textarea required name="response" id="response" class="form-control" cols="30" rows="5" required><?= $items->c_response ?></textarea>
                            </div>

                            <div class="col-12 pt-3">
                                <!-- FILE input required -->
                                <div class="row gy-4 ">
                                    <div class="col-12">
                                        <input type="hidden" name="oldFile" value="<?= $items->c_countermeasure ?>">
                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col">

                                                    <label class="form-label" for="taisakusho"><?= $this->data['COUNTERMEASURES'] ?></label>
                                                    <input class="form-control" type="file" name="対策書" id="taisakusho" value="<?= $items->c_countermeasure ?>">
                                                </div>
                                                <div class="col">
                                                    <a class="btn btn-outline-secondary card-link" href="<?= base_url() ?>uploads/<?= $items->c_countermeasure ?>" target="_blank" rel="noopener noreferrer" id="old-link"><?= $items->c_countermeasure ?></a>
                                                    <label for="" class="form-label"><?= $this->data['COUNTERMEASURES_OLD'] ?></label><br>
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                </div>
                            </div>

                            <!-- SPARE PART -->
                            <div class="spare row mt-3">
                                <div class="col">
                                    <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#partsSelect_edit"><?= $this->data['SPARE_LIST_BUTTON'] ?></a>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="rounded-2 overflow-hidden p-0">

                                        <table class="table table-hover table-striped text-center" id="equipment_parts_list_edit">
                                            <thead>

                                                <tr class="table-dark">
                                                    <td>部品NO</td>
                                                    <td>部品名</td>
                                                    <td>型式</td>
                                                    <td>数量</td>

                                                </tr>
                                            </thead>

                                            <tbody class="table-stripped table-light">
                                                <?php
                                                if (property_exists($items, 'spare'))
                                                    foreach ($items->spare as $item) {
                                                ?>
                                                    <tr class="border-0">
                                                        <td class="text-center  pointer">
                                                            <?= $item->c_t202_id ?>
                                                        </td>
                                                        <td class="text-center  pointer">
                                                            <?= $item->c_partName ?>
                                                        </td>
                                                        <td class="text-center  pointer">
                                                            <?= $item->c_model ?>
                                                        </td>
                                                        <td style="display: none;"></td>
                                                        <td class="text-center  pointer">
                                                            <?= $item->c_quantity ?>
                                                        </td>


                                                        <td style="display: none;"><a class="btn btn-primary minus">DELETE</a> </td>
                                                    </tr>

                                                    <div class="old_val" hidden>
                                                        <input type="text" class="id" value="<?= $item->c_t202_id ?>">
                                                        <input type="text" class="old_amount" value="<?= $item->c_quantity ?>">
                                                    </div>

                                                <?php } ?>
                                            </tbody>
                                            <tfoot class="table-light">
                                                <?php
                                                if (!property_exists($items, 'spare')) :
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

                                <div class="d-flex justify-content-center mt-2">
                                    <a class="btn btn-warning float-end me-5" href='<?= base_url(); ?>'><?= $this->data['CANCEL_BUTTON'] ?></a>
                                    <button type="submit" name="edit_trouble" class="btn btn-primary float-end me-1" value="登録" id="submitTrouble"><?= $this->data['SUBMIT_BUTTON'] ?></button>


                                </div>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>







<style>
    body {
        background-color: #F5F5F5;
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