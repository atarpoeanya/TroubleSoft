
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
                    <div class="card-title">
                        <h2 class="pt-3 mb-3">設備のトラブル</h2>
                    </div>
                    <form action="/edit_Equipment/<?= $items->c_t800_id ?>/post" method="post" class="mt-4 p-4 col" autocomplete="off" id="equipForm" enctype="multipart/form-data" novalidate>
                        <!-- ID -->
                        <input type="hidden" name="id" id="setsubiId" value="<?= $items->c_t800_id ?>">
                        <!-- For Spare part [Id, Amount] -->
                        <input type="hidden" name="spareParts" id="partinfo" value="">

                        <input type="hidden" name="fmea_id" id="fmea_id" value="">
                        <!-- For time -->
                        <input type="hidden" name="duration" id="duration" value="<?= set_value('duration') != '' ? trim(set_value('duration')) :  trim($items->c_stopTime) ?>">




                        <!-- SECTION_1_Identity -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_1'] ?></b>&nbsp;</p>
                        <div class="inspector row border-top py-3">

                            <div class="col-4 pt-3">
                                <div class="d-flex">
                                    <label for="start_day" class="form-label"><?= $this->data['ACCIDENT_DATE'] ?></label>
                                    <?php if (form_error('発生日') != '') { ?>
                                        <span class="invalid-feedback form-label"><?= trim(form_error('発生日')) ?></span>
                                    <?php } ?>
                                </div>
                                <input required type="datetime-local" class="form-control
                                <?php if (form_error('発生日')) echo 'is-invalid' ?>" id="start_day" name="発生日" value="<?= set_value('発生日') != '' ? trim(set_value('発生日')) :  trim($items->c_accidentDate) ?>" required>
                            </div>


                            <div class="col-4 pt-3">
                                <div class="d-flex">
                                    <label for="time_end" class="form-label"><?= $this->data['STOP_TIME'] ?></label>
                                    <?php if (form_error('duration') != '' || form_error('days') != '' || form_error('hours')  != '' || form_error('minutes') != '') { ?>
                                        <span class="invalid-feedback form-label"><?= $this->data['IS_REQUIRED'] ?></span>
                                    <?php } ?>
                                </div>
                                <div class="input-group">
                                    <input type="number" class="form-control <?php if (form_error('days')) echo 'is-invalid' ?>" value="" onchange="durToMin()" name="days" id="days" min="0">
                                    <span class="input-group-text" id="">日</span>

                                    <input type="number" class="form-control <?php if (form_error('hours')) echo 'is-invalid' ?>" value="" onchange="durToMin()" name="hours" id="hours" min="0">
                                    <span class="input-group-text" id="">時間</span>

                                    <input type="number" class="form-control <?php if (form_error('minutes')) echo 'is-invalid' ?>" value="" onchange="durToMin()" name="minutes" id="minutes" min="0">
                                    <span class="input-group-text" id="days">分</span>
                                </div>
                            </div>



                            <div class="col-4 pt-3">
                                <div class="col">
                                    <label class="form-label" for="tantou"><?= $this->data['PIC'] ?></label>
                                    <select class="form-select  <?= (form_error('担当者') ? 'is-invalid' : ''); ?>" name="担当者" id="tantou" required>
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
                                <select class="form-select <?= (form_error('部署') ? 'is-invalid' : ''); ?>" name="部署" id="busho" required>

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
                                <select class="form-select <?= (form_error('設備') ? 'is-invalid' : ''); ?>" name="設備" id="setsubi" required>
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
                                <?php if (trim(set_value('号機')) != trim($items->c_unit) && set_value('号機') != '') { ?>
                                    <span class="edited form-check-label">更新しました</span>
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

                            <div class="col pt-3">

                                <label for="kouteiNa" class="form-label"><?= $this->data['PROCESS_NAME'] ?></label>
                                <span class="must form-check-label">必須</span>
                                <?php if (trim(set_value('工程名')) != trim($items->c_processName) && set_value('工程名') != '') { ?>
                                    <span class="edited form-check-label">更新しました</span>
                                <?php } ?>
                                <?php if (form_error('工程名') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('工程名')) ?></span>
                                <?php } ?>

                                <input required type="text" class="form-control <?php if (form_error('工程名')) echo 'is-invalid'; ?>" name="工程名" id="kouteiNa" value="<?= set_value('工程名') != '' ? trim(set_value('工程名')) :  trim($items->c_processName) ?>" required>
                            </div>

                            <div class="col pt-3">
                                <div class="d-flex">
                                    <label for="mode" class="form-label "><?= $this->data['FAIL_MODE'] ?></label>
                                    <?php if (form_error('故障モード') != '') { ?>
                                        <span class="invalid-feedback form-label"><?= trim(form_error('故障モード')) ?></span>
                                    <?php } ?>
                                </div>
                                <input required type="text" class="form-control <?php if (form_error('故障モード')) echo 'is-invalid' ?>" name="故障モード" id="mode" value="<?= set_value('故障モード') != '' ? trim(set_value('故障モード')) :  trim($items->c_failMode) ?>" required>
                            </div>


                        </div>
                        <!-- SECTION_3_FixDetails  -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_3'] ?></b>&nbsp;</p>
                        <div class="detail row border-top py-3">
                            <div class="col-12 pt-3">
                                <div class="d-flex">
                                    <label class="form-label flex-grow" for="gensho"><?= $this->data['PHENOMENON'] ?></label>
                                    <?php if (form_error('現象') != '') { ?>
                                        <span class="invalid-feedback form-label"><?= trim(form_error('現象')) ?></span>
                                    <?php } ?>
                                </div>
                                <textarea required name="現象" id="gensho" class="form-control <?php if (form_error('現象')) echo 'is-invalid' ?>" cols="30" rows="5" required><?= set_value('現象') != '' ? trim(set_value('現象')) :  trim($items->c_phenomenon) ?></textarea>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="d-flex">
                                    <label class="form-label " for="shuriNaiyou"><?= $this->data['REPAIR_DETAIL'] ?></label>
                                    <?php if (form_error('修理内容') != '') { ?>
                                        <span class="invalid-feedback form-label"><?= trim(form_error('修理内容')) ?></span>
                                    <?php } ?>
                                </div>
                                <textarea required name="修理内容" id="shuriNaiyou" class="form-control <?php if (form_error('修理内容')) echo 'is-invalid' ?>" cols="30" rows="5" required><?= set_value('修理内容') != '' ? trim(set_value('修理内容')) :  trim($items->c_repairDet) ?></textarea>
                            </div>

                            <div class="col-12 pt-3">
                                <div class="d-flex">
                                    <label class="form-label " for="failMech"><?= $this->data['MECHANISM'] ?></label>
                                    <?php if (form_error('fail_mech') != '') { ?>
                                        <span class="invalid-feedback form-label"><?= trim(form_error('fail_mech')) ?></span>
                                    <?php } ?>
                                </div>
                                <textarea required name="fail_mech" id="failMech" class="form-control <?php if (form_error('fail_mech')) echo 'is-invalid' ?>" cols="30" rows="5" required><?= set_value('fail_mech') != '' ? trim(set_value('fail_mech')) :  trim($items->c_failMech) ?></textarea>
                            </div>

                            <div class="col-12 pt-3">
                                <div class="d-flex ">
                                    <label class="form-label " for="response"><?= $this->data['RESPONSE'] ?></label>
                                    <?php if (form_error('response') != '') { ?>
                                        <span class="invalid-feedback form-label"><?= trim(form_error('response')) ?></span>
                                    <?php } ?>
                                </div>
                                <textarea required name="response" id="response" class="form-control <?php if (form_error('response')) echo 'is-invalid' ?>" cols="30" rows="5" required><?= set_value('response') != '' ? trim(set_value('response')) :  trim($items->c_response) ?></textarea>
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
                                                    <div class="input-group">
                                                        <input class="form-control" type="file" name="対策書" id="taisakusho" onchange="fileUpload()" style="display: none;">
                                                        <button id="file_upload" class="btn btn-secondary" type="button" onclick="$('#taisakusho').click();" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"><?= $this->data['FILE_BUTTON'] ?></button>
                                                        <textarea class="form-control" name="" id="taisakusho_file" cols="30" rows="1" style="resize: none;" disabled></textarea>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="" class="form-label"><?= $this->data['COUNTERMEASURES_OLD'] ?></label><br>
                                                    <a class="btn btn-outline-secondary card-link" href="<?= base_url() ?>uploads/<?= $items->c_countermeasure ?>" target="_blank" rel="noopener noreferrer" id="old-link"><?= $items->c_countermeasure ?></a>

                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                </div>
                            </div>

                            <!-- SPARE PART -->
                            <div class="spare mt-3">
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

                                            <?php
                                            if (property_exists($items, 'spare')) {
                                            ?>
                                                <tbody class="table-stripped table-light">
                                                    <?php
                                                    foreach ($items->spare as $item) {
                                                    ?>
                                                        <tr>
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


                                                            <td style="display: none;"><a class="btn btn-primary minus"><?= $this->data['DELETE_BUTTON'] ?></a> </td>
                                                        </tr>

                                                        <div class="old_val" hidden>
                                                            <input type="text" class="id" value="<?= $item->c_t202_id ?>">
                                                            <input type="text" class="old_amount" value="<?= $item->c_quantity ?>">
                                                        </div>

                                                    <?php } ?>
                                                </tbody>
                                            <?php }  else {?>
                                                <tbody class="table-stripped table-light"></tbody>
                                                <?php }?>
                                            <tfoot class="table-light">
                                                <?php
                                                if (!property_exists($items, 'spare')) :
                                                ?>
                                                    <tr>
                                                        <td style="height: 100px;" colspan="4" class="text-center emptyTab">
                                                            <span><?= $this->data['EMPTY_PLACEHOLDER'] ?></span>
                                                        </td>
                                                    </tr>
                                                <?php else : ?>
                                                    <tr>
                                                        <td style="height: 100px; display:none;" colspan="4" class="text-center emptyTab">
                                                            <span><?= $this->data['EMPTY_PLACEHOLDER'] ?></span>
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
            // $("#errorNotif").toast("show");
        });
    </script>
