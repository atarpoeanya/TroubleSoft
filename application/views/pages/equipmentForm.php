<div id="main_body" class="pt-3">
    <div class="row">
        <!-- Main-Form -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">トラブル報告書 登録</h2>
                    <span>FMEA</span>
                    <div class="d-flex justify-content-start pb-2">

                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="fmea-toggle-btn">

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary mt-0" for="btnradio1"><?= $this->data['FMEA_BUTTON_NOT'] ?></label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary mt-0" for="btnradio2"><?= $this->data['FMEA_BUTTON_NEED'] ?></label>
                        </div>
                    </div>
                    <!-- FORM SECTION -->
                    <form action="<?= base_url() ?>equipment/1" method="post" class="px-3 col " autocomplete="off" id="equipForm" enctype="multipart/form-data" novalidate>

                        <input type="hidden" name="spareParts" id="partinfo" value="">

                        <input type="hidden" name="fmea_id" id="fmea_id" value="<?= set_value('fmea_id'); ?>">

                        <input type="hidden" name="duration" id="duration" onchange="minToDur()" value="<?= set_value('duration'); ?>">

                        <!-- SECTION_1_Identity -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_1'] ?></b>&nbsp;</p>
                        <div class="inspector row border-top py-3">

                            <div class="col-4 pt-3">

                                <label for="start_day" class="form-label"><?= $this->data['ACCIDENT_DATE'] ?></label>
                                <?php if (form_error('発生日') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('発生日')) ?></span>
                                <?php } ?>
                                <input id="start_day" name="発生日" type="datetime-local" class="form-control
                                <?php if (form_error('発生日')) echo 'is-invalid' ?>" value="<?= set_value('発生日'); ?>" required>
                            </div>


                            <div class="col-4 pt-3">
                                <label for="time_end" class="form-label"><?= $this->data['STOP_TIME'] ?></label>
                                <?php if (form_error('duration') != '' || form_error('days') != '' || form_error('hours')  != '' || form_error('minutes') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= $this->data['NO_ZERO'] ?></span>
                                <?php } ?>
                                <div class="input-group">
                                    <input type="number" class="form-control timepick  <?php if (form_error('duration') || form_error('days')) echo 'is-invalid' ?>" value="<?= set_value('days', '0') ?>" onchange="durToMin()" name="days" id="days" min="0">
                                    <span class="input-group-text timepick" id=""><?= $this->data['DAYS'] ?></span>

                                    <input type="number" class="form-control timepick  <?php if (form_error('duration') || form_error('hours')) echo 'is-invalid' ?>" value="<?= set_value('hours', '0'); ?>" onchange="durToMin()" name="hours" id="hours" min="0">
                                    <span class="input-group-text timepick" id=""><?= $this->data['HOURS'] ?></span>

                                    <input type="number" class="form-control timepick  <?php if (form_error('duration') || form_error('minutes')) echo 'is-invalid' ?>" value="<?= set_value('minutes', '0'); ?>" onchange="durToMin()" name="minutes" id="minutes" min="0">
                                    <span class="input-group-text timepick" id="days"><?= $this->data['MINUTES'] ?></span>
                                </div>

                            </div>


                            <div class="col-4 pt-3">

                                <label class="form-label" for="tantou"><?= $this->data['PIC'] ?></label><!-- PERSON IN CHARGE-->
                                <?php if (form_error('担当者') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('担当者')) ?></span>
                                <?php } ?>
                                <select class="form-select <?= (form_error('担当者') ? 'is-invalid' : ''); ?>" name="担当者" id="tantou" required>
                                    <option value="" <?= set_select('担当者', '', true); ?> disabled selected>選び出す</option>
                                    <option value="水上" <?= set_select('担当者', '水上'); ?>>水上</option>
                                    <option value="新宮" <?= set_select('担当者', '新宮'); ?>>新宮</option>
                                    <option value="齋藤" <?= set_select('担当者', '齋藤'); ?>>齋藤</option>
                                </select>


                            </div>
                        </div>
                        <!-- SECTION_2_EquipmentInfo -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_2'] ?></b>&nbsp;</p>
                        <div class="item row border-top py-3">
                            <div class="col-4 pt-3">
                                <label class="form-label" for="busho"><?= $this->data['DEPARTMENT'] ?></label>
                                <?php if (form_error('部署') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('部署')) ?></span>
                                <?php } ?>
                                <select class="form-select <?= (form_error('部署') ? 'is-invalid' : ''); ?>" name="部署" id="busho" required>

                                    <option value="" <?= set_select('部署', '', true); ?>disabled selected>選び出す</option>
                                    <option value="塗装" <?= set_select('部署', '塗装'); ?>>塗装</option>
                                    <option value="生技" <?= set_select('部署', '生技'); ?>>生技</option>
                                    <option value="組付" <?= set_select('部署', '組付'); ?>>組付</option>
                                    <option value="生管" <?= set_select('部署', '生管'); ?>>生管</option>
                                    <option value="品証" <?= set_select('部署', '品証'); ?>>品証</option>
                                    <option value="溶接" <?= set_select('部署', '溶接'); ?>>溶接</option>
                                    <option value="プレス・溶接" <?= set_select('部署', 'プレス・溶接'); ?>>プレス・溶接</option>
                                    <option value="営業" <?= set_select('部署', '営業'); ?>>営業</option>
                                    <option value="その他" <?= set_select('部署', 'その他'); ?>>その他</option>
                                </select>
                            </div>
                            <!-- Probably connect with each other -->
                            <div class="col-4 pt-3">
                                <label class="form-label" for="setsubi"><?= $this->data['FACILITY'] ?></label>
                                <?php if (form_error('設備') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('設備')) ?></span>
                                <?php } ?>
                                <select class="form-select <?= (form_error('設備') ? 'is-invalid' : ''); ?>" name="設備" id="setsubi" required>
                                    <option value="" <?= set_select('設備', '', true); ?> disabled selected>選び出す</option>
                                    <option value="プレス" <?= set_select('設備', 'プレス'); ?>>プレス</option>
                                    <option value="洗浄機" <?= set_select('設備', '洗浄機'); ?>>洗浄機</option>
                                    <option value="塗装設備" <?= set_select('設備', '塗装設備'); ?>>塗装設備</option>
                                </select>
                            </div>
                            <div class="col-4 pt-3">
                                <label class="form-label" for="gouki"><?= $this->data['UNIT'] ?></label>
                                <?php if (form_error('号機') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('号機')) ?></span>
                                <?php } ?>
                                <select class="form-select <?= (form_error('号機') ? 'is-invalid' : ''); ?>" name="号機" id="gouki" required>
                                    <option value="" <?= set_select('号機', '', true); ?> disabled selected>選び出す</option>
                                    <option value="1号機" <?= set_select('号機', '1号機'); ?>>1号機</option>
                                    <option value="2号機" <?= set_select('号機', '2号機'); ?>>2号機</option>
                                    <option value="3号機" <?= set_select('号機', '3号機'); ?>>3号機</option>
                                </select>
                            </div>

                            <div class="col pt-3">
                                <label for="kouteiNa" class="form-label"><?= $this->data['PROCESS_NAME'] ?></label>
                                <?php if (form_error('工程名') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('工程名')) ?></span>
                                <?php } ?>
                                <input type="text" name="工程名" id="kouteiNa" class="form-control
                                <?php if (form_error('工程名')) echo 'is-invalid' ?>" value="<?= set_value('工程名'); ?>" required>
                            </div>

                            <div class="col pt-3">
                                <label for="mode" class="form-label"><?= $this->data['FAIL_MODE'] ?></label>
                                <?php if (form_error('故障モード') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('故障モード')) ?></span>
                                <?php } ?>
                                <input type="text" name="故障モード" id="mode" class="form-control
                                <?php if (form_error('故障モード')) echo 'is-invalid' ?>" value="<?= set_value('故障モード'); ?>" required>
                            </div>


                        </div>
                        <!-- SECTION_3_FixDetails  -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_3'] ?></b>&nbsp;</p>
                        <div class="item row border-top py-3">
                            <div class="col-12 pt-3">
                                <label class="form-label" for="gensho"><?= $this->data['PHENOMENON'] ?></label>
                                <?php if (form_error('現象') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('現象')) ?></span>
                                <?php } ?>
                                <textarea name="現象" id="gensho" class="form-control
                                <?php if (form_error('現象')) echo 'is-invalid' ?>" cols="30" rows="5" required><?= set_value('現象'); ?></textarea>
                            </div>
                            <div class="col-12 pt-3">
                                <label class="form-label" for="shuriNaiyou"><?= $this->data['REPAIR_DETAIL'] ?></label>
                                <?php if (form_error('修理内容') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('修理内容')) ?></span>
                                <?php } ?>
                                <textarea name="修理内容" id="shuriNaiyou" class="form-control
                                <?php if (form_error('修理内容')) echo 'is-invalid' ?>" cols="30" rows="5" required><?= set_value('修理内容'); ?></textarea>
                            </div>

                            <div class="col-12 pt-3">
                                <label class="form-label" for="failMech"><?= $this->data['MECHANISM'] ?></label>
                                <?php if (form_error('fail_mech') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('fail_mech')) ?></span>
                                <?php } ?>
                                <textarea name="fail_mech" id="failMech" class="form-control
                                <?php if (form_error('fail_mech')) echo 'is-invalid' ?>" cols="30" rows="5" required><?= set_value('fail_mech'); ?></textarea>
                            </div>

                            <div class="col-12 pt-3">
                                <label class="form-label" for="response"><?= $this->data['RESPONSE'] ?></label>
                                <?php if (form_error('response') != '') { ?>
                                    <span class="invalid-feedback form-label"><?= trim(form_error('response')) ?></span>
                                <?php } ?>
                                <textarea name="response" id="response" class="form-control
                                <?php if (form_error('response')) echo 'is-invalid' ?>" cols="30" rows="5" required><?= set_value('response'); ?></textarea>
                            </div>

                            <div class="col-12 pt-3">
                                <!-- FILE input required -->
                                <div class="row gy-4 ">
                                    <div class="col-12">
                                        <label class="form-label" for="file_upload"><?= $this->data['COUNTERMEASURES'] ?></label>
                                        <br>
                                        <!-- Questionable -->
                                        <div class="input-group">
                                            <input class="form-control" type="file" name="対策書" id="taisakusho" onchange="fileUpload()" style="display: none;">
                                            <button id="file_upload" class="btn btn-secondary" type="button" onclick="$('#taisakusho').click();" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"><?= $this->data['FILE_BUTTON'] ?></button>
                                            <textarea class="form-control" name="" id="taisakusho_file" cols="30" rows="1" style="resize: none;" disabled></textarea>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <div class="spare row mt-3">
                            <div class="col">
                                <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#partsSelect"><?= $this->data['SPARE_LIST_BUTTON'] ?></a>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="rounded-2 overflow-hidden p-0">

                                    <table class="table table-hover table-striped text-center" id="equipment_parts_list">
                                        <thead>

                                            <tr class="table-dark">
                                                <td>部品NO</td>
                                                <td>部品名</td>
                                                <td>型式</td>
                                                <td>数量</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-striped">

                                        </tbody>
                                        <tfoot class="table-light">
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

                        <div class="d-flex justify-content-center">
                            <a class="btn btn-warning float-end me-5" href='<?= base_url(); ?>'><?= $this->data['CANCEL_BUTTON'] ?></a>
                            <button type="submit" name="add_trouble" class="btn btn-primary float-end  me-1" value="登録" id="submitTrouble"><?= $this->data['SUBMIT_BUTTON'] ?></button>


                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- FMEA -->
        <div class="col-4" id="FMEA_side">
            <div class="card">
                <div class="card-body">
                    <div class="container p-3">
                        <a href="" class="btn btn-success w-50" data-bs-toggle="modal" data-bs-target="#fmeaLite" style="font-size: 16px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            <?= $this->data['FMEA_SEARCH_BUTTON'] ?></a>
                    </div>

                    <!-- FMEA CONTENT PLACEHOLDER -->

                </div>



            </div>
            <div class="card sticky-top h-50 mt-2" style="z-index: 1; top:60px;">
                <div class="card-title p-3 m-0">
                    <h2 class="p-1">FMEA</h2>
                </div>
                <div class="card-body p-2 overflow-scroll">
                    <div class="container" id="fmea_place" style="height: 500px;">
                        <div class="text-center">

                        </div>
                    </div>
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
        background-color: #F4F5F6;
        width: max-content;
    }



    .btn-group>label {
        min-width: 130px;
    }

    .card-title {
        background-color: #F4F5F6;
    }

    .card-body {
        background-color: #F4F5F6;
    }
</style>

<script>
    $('input, textarea, select').on('click', function() {
        $(this).removeClass('is-invalid')
    })
</script>