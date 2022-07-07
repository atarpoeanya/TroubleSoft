<div id="main_body" class="pt-3">
    <div class="row">
        <!-- Main-Form -->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">REAL TROUBLE FORM</h2>
                    <div class="d-flex flex-column justify-content-between pb-2">
                        <!-- <label class="form-label" for="fmea-toggle-btn">FMEA</label> -->
                        <span>FMEA</span>
                        
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="fmea-toggle-btn">

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary mt-0" for="btnradio1"><?= $this->data['FMEA_BUTTON_NOT'] ?></label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary mt-0" for="btnradio2"><?= $this->data['FMEA_BUTTON_NEED'] ?></label>
                        </div>
                    </div>
                    <!-- FORM SECTION -->
                    <form action="/equipment/1" method="post" class="px-3 col " autocomplete="off" id="equipForm" enctype="multipart/form-data">

                        <input type="hidden" name="spareParts" id="partinfo" value="">

                        <input type="hidden" name="fmea_id" id="fmea_id" value="">

                        <!-- SECTION_1_Identity -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_1'] ?></b>&nbsp;</p>
                        <div class="inspector row border-top py-3">

                            <div class="col-6 pt-3">
                                <label for="start_day" class="form-label"><?= $this->data['ACCIDENT_DATE'] ?></label>
                                <input required type="date" class="form-control" id="start_day" name="発生日" required>
                            </div>

                            <div class="col-6 pt-3">
                                <label for="repair_day" class="form-label"><?= $this->data['REPAIR_DATE'] ?></label>
                                <input required type="date" class="form-control" id="repair_day" name="修理日" required>
                            </div>

                            <div class="col-4 pt-3">
                                <label for="time_start" class="form-label"><?= $this->data['HAPPENING_TIME'] ?></label>
                                <input required type="time" class="form-control" id="time_start" name="time_start" required>
                            </div>
                            <div class="col-4 pt-3">
                                <label for="time_end" class="form-label"><?= $this->data['STOP_TIME'] ?></label>
                                <input required type="time" class="form-control" id="time_end" name="time_end" required>
                            </div>


                            <div class="col-9 pt-3">
                                <div class="col-4">
                                    <label class="form-label" for="tantou"><?= $this->data['PIC'] ?></label><!-- PERSON IN CHARGE-->
                                    <select class=" form-control  <?= (form_error('担当者') ? 'is-invalid' : ''); ?>" name="担当者" id="tantou" required>
                                        <option value="" <?= set_select('担当者', '', true); ?> disabled selected>選び出す</option>
                                        <option value="水上" <?= set_select('担当者', '水上'); ?>>水上</option>
                                        <option value="新宮" <?= set_select('担当者', '新宮'); ?>>新宮</option>
                                        <option value="齋藤" <?= set_select('担当者', '齋藤'); ?>>齋藤</option>
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

                                    <option value="" <?= set_select('部署', '', true); ?>disabled selected>選び出す</option>
                                    <option value="塗装" <?= set_select('部署', '塗装'); ?>>塗装</option>
                                </select>
                            </div>
                            <!-- Probably connect with each other -->
                            <div class="col-4 pt-3">
                                <label class="form-label" for="setsubi"><?= $this->data['FACILITY'] ?></label>
                                <select class="form-control <?= (form_error('設備') ? 'is-invalid' : ''); ?>" name="設備" id="setsubi" required>
                                    <option value="" <?= set_select('設備', '', true); ?> disabled selected>選び出す</option>
                                    <option value="プレス" <?= set_select('設備', 'プレス'); ?>>プレス</option>
                                </select>
                            </div>
                            <div class="col-4 pt-3">
                                <label class="form-label" for="gouki"><?= $this->data['UNIT'] ?></label>
                                <select class="form-control <?= (form_error('号機') ? 'is-invalid' : ''); ?>" name="号機" id="gouki" required>
                                    <option value="" <?= set_select('号機', '', true); ?> disabled selected>選び出す</option>
                                    <option value="1号機" <?= set_select('号機', '1号機'); ?>>1号機</option>
                                    <option value="2号機" <?= set_select('号機', '2号機'); ?>>2号機</option>
                                </select>
                            </div>

                            <div class="col pt-3">
                                <label for="" class="form-label"><?= $this->data['PROCESS_NAME'] ?></label>
                                <input required type="text" class="form-control" name="工程名" id="kouteiNa">
                            </div>

                            <div class="col pt-3">
                                <label for="" class="form-label"><?= $this->data['FAIL_MODE'] ?></label>
                                <input required type="text" class="form-control" name="故障モード" id="mode">
                            </div>


                        </div>
                        <!-- SECTION_3_FixDetails  -->
                        <p class=" position-relative sub-header">
                            &nbsp;<b><?= $this->data['SECTION_3'] ?></b>&nbsp;</p>
                        <div class="item row border-top py-3">
                            <div class="col-12 pt-3">
                                <label class="form-label" for="a"><?= $this->data['PHENOMENON'] ?></label>
                                <textarea required name="現象" id="gensho" class="form-control" cols="30" rows="10" required></textarea>
                            </div>
                            <div class="col-12 pt-3">
                                <label class="form-label" for="a"><?= $this->data['REPAIR_DETAIL'] ?></label>
                                <textarea required name="修理内容" id="shuriNaiyou" class="form-control" cols="30" rows="10" required></textarea>
                            </div>

                            <div class="col-6 pt-3">
                                <label class="form-label" for="a"><?= $this->data['MECHANISM'] ?></label>
                                <textarea required name="fail_mech" id="failMech" class="form-control" cols="30" rows="5" required></textarea>
                            </div>

                            <div class="col-6 pt-3">
                                <label class="form-label" for="a"><?= $this->data['RESPONSE'] ?></label>
                                <textarea required name="response" id="response" class="form-control" cols="30" rows="5" required></textarea>
                            </div>

                            <div class="col-12 pt-3">
                                <!-- FILE input required -->
                                <div class="row gy-4 ">
                                    <div class="col-12">
                                        <label class="form-label" for="taisakusho"><?= $this->data['COUNTERMEASURES'] ?></label>
                                        <input class="form-control" type="file" name="対策書" id="taisakusho">
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
                                            <!-- <tr>
                                       <td class="text-start" style="width: 200px;">
                                         
                                       </td>
                                       <td colspan="3"></td>
                                   </tr> -->
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
                                                    <span>EMPTY</span>
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
                <div class="card-title p-3">
                    <div class="">
                        <h2 class="p-1">FMEA</h2>
                    </div>
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
        background-color: white;
        width: max-content;
    }

    form .form-control {

        background-color: #EAECF4;

    }
</style>



<!-- REMINDER TO UNIFY THIS
<script>
    $(document).ready(function() {
        var btn_1 = $('#btnradio1')
        var btn_2 = $('#btnradio2')

        if (btn_1.prop('checked')) {
            $('#FMEA_side').hide()

        }
        if (btn_2.prop('checked')) {
            $('#FMEA_side').show()
        }


        $('input[type=radio]').change(function() {
            if (btn_1.prop('checked')) {
                $('#FMEA_side').hide()
                $('#fmea_id').val('');

            }
            if (btn_2.prop('checked')) {
                $('#FMEA_side').show()

            }
        })
    })
</script> -->