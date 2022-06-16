<br>
<div class="container" id="mainForm">
    <div class="row">
        <div class="col">
            <div class="row">
                <h2 class="pt-3 mb-3">設備のトラブル</h2>
                <form action="/equipment/1" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data">
                    <!-- For Spare part [Id, Amount] -->
                    <input type="hidden" name="spareParts" id="partinfo" value="">

                    <input type="hidden" name="fmea_id" id="fmea_id" value="">
                    <div class=" d-flex justify-content-md-start">
                        <!-- FMEA TOGGLE -->
                        <div class="row bg-light px-3 pb-2 rounded">
                            <!-- <label class="form-label" for="fmea-toggle-btn">FMEA</label> -->
                            <span>FMEA</span>
                            <small>FMEAの参考が必要と、「<b>要</b>」選んでください。</small>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="fmea-toggle-btn">

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                <label class="btn btn-outline-primary mt-0" for="btnradio1">不要</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                <label class="btn btn-outline-primary mt-0" for="btnradio2">要</label>

                            </div>
                        </div>
                    </div>
                    <!-- SECTION_1_Identity -->
                    <p class=" position-relative" style="top: 30px; left: 40px; background-color: #E5E5E5; width: max-content;">
                        &nbsp;SECTION_1_<b>インフォ</b>&nbsp;</p>
                    <div class="inspector row border border-dark py-3 rounded">

                        <div class="col-6">
                            <label for="start_day" class="form-label">発生日</label>
                            <input required type="date" class="form-control" id="start_day" name="発生日">
                        </div>

                        <div class="col-6">
                            <label for="repair_day" class="form-label">修理日</label>
                            <input required type="date" class="form-control" id="repair_day" name="修理日">
                        </div>

                        <div class="col-4">
                            <label for="time_start" class="form-label">発生時間（最初）</label>
                            <input required type="time" class="form-control" id="time_start" name="time_start">
                        </div>
                        <div class="col-4">
                            <label for="time_end" class="form-label">発生時間（最終）</label>
                            <input required type="time" class="form-control" id="time_end" name="time_end">
                        </div>


                        <div class="col-9">
                            <div class="col-4">
                                <label class="form-label" for="tantou">担当者</label>
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
                    <p class=" position-relative" style="top: 30px; left: 40px; background-color: #E5E5E5; width: max-content;">
                        &nbsp;SECTION_2_<b>設備の内容</b>&nbsp;</p>
                    <div class="item row border border-dark py-3 rounded">
                        <div class="col-4">
                            <label class="form-label" for="busho">部署 （設備の）</label>
                            <select class="form-control <?= (form_error('部署') ? 'is-invalid' : ''); ?>" name="部署" id="busho" required>

                                <option value="" <?= set_select('部署', '', true); ?>disabled selected>選び出す</option>
                                <option value="塗装" <?= set_select('部署', '塗装'); ?>>塗装</option>
                            </select>
                        </div>
                        <!-- Probably connect with each other -->
                        <div class="col-4">
                            <label class="form-label" for="setsubi">設備名</label>
                            <select class="form-control <?= (form_error('設備') ? 'is-invalid' : ''); ?>" name="設備" id="setsubi" required>
                                <option value="" <?= set_select('設備', '', true); ?> disabled selected>選び出す</option>
                                <option value="プレス" <?= set_select('設備', 'プレス'); ?>>プレス</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="form-label" for="gouki">号機</label>
                            <select class="form-control <?= (form_error('号機') ? 'is-invalid' : ''); ?>" name="号機" id="gouki" required>
                                <option value="" <?= set_select('号機', '', true); ?> disabled selected>選び出す</option>
                                <option value="1号機" <?= set_select('号機', '1号機'); ?>>1号機</option>
                                <option value="2号機" <?= set_select('号機', '2号機'); ?>>2号機</option>
                            </select>
                        </div>

                        <div class="col">
                            <label for="" class="form-label">工程名</label>
                            <input required type="text" class="form-control" name="工程名" id="kouteiNa">
                        </div>

                        <div class="col">
                            <label for="" class="form-label">故障モード</label>
                            <input required type="text" class="form-control" name="故障モード" id="mode">
                        </div>


                    </div>
                    <!-- SECTION_3_FixDetails  -->
                    <p class=" position-relative" style="top: 30px; left: 40px; background-color: #E5E5E5; width: max-content;">
                        &nbsp;SECTION_3_<b>修理内容</b>&nbsp;</p>
                    <div class="detail row border border-dark  rounded py-3">
                        <div class="col-12">
                            <label class="form-label" for="a">現象・不具合要因詳細</label>
                            <textarea required name="現象" id="gensho" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="a">修理内容</label>
                            <textarea required name="修理内容" id="shuriNaiyou" class="form-control" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="a">故障のメカニズム</label>
                            <textarea required name="fail_mech" id="failMech" class="form-control" cols="30" rows="5"></textarea>
                        </div>

                        <div class="col-6">
                            <label class="form-label" for="a">対応・処置</label>
                            <textarea required name="response" id="response" class="form-control" cols="30" rows="5"></textarea>
                        </div>

                        <div class="col-12">
                            <!-- FILE input required -->
                            <div class="row gy-4 ">
                                <div class="col-12">
                                    <label class="form-label" for="taisakusho">対策書</label>
                                    <input class="form-control" type="file" name="対策書" id="taisakusho">
                                </div>

                            </div>


                        </div>
                    </div>

                    <!-- SPARE PART -->
                    <div class="spare row mt-3">
                        <div class="col  p-0 rounded-2 overflow-hidden mb-2">
                            <table class="table text-center m-0" id="equipment_parts_list">
                                <thead>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td class=" table-light rounded-top shadow-sm" style="width: 200px;">
                                            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#partsSelect">予備部品リース</a>
                                        </td>
                                    </tr>
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


                    <div class="row">
                        <div class="col my-2">
                            <input type="submit" name="add_trouble" class="btn btn-primary float-end" value="登録" id="submitTrouble">
                            <a class="btn btn-warning float-end me-1" href='<?= base_url(); ?>as'>CANCEL</a>


                        </div>


                    </div>
                </form>
            </div>
        </div>

        <div class="col-6" id="FMEA_side">
            <div class="container p-3 border border-dark">
                <a href="" class="btn w-100 btn-light border border-dark" data-bs-toggle="modal" data-bs-target="#fmeaLite">一覧</a>
            </div>
            <br>
            <div class="container border border-dark" id="fmea_place">
                <div class="text-center">
                    FMEA選んでください！
                </div>
                

            </div>
        </div>
    </div>



    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">部署</label>
                            <select class="form-control" name="" id="">
                                <option value="" selected>Default</option>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div> -->

    <style>
        h2 {
            color: #858796;
        }

        .mainForm {
            background-color: #E5E5E5;
            border-radius: 5px;
        }
    </style>


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
                    $('#fmea_place').html('<div class="text-center">'+
                    'FMEA選んでください！</div>')

                }
            })
        })
    </script>