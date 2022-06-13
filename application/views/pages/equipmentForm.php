<br>
<div class="container kanjifont" id="mainForm">

    <div class="container">
        <div class="row">
            <h2 class="pt-3 mb-3">MAIN_HEADER</h2>
            <form action="" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data">
                <!-- For Spare part [Id, Amount] -->
                <input type="hidden" name="spareParts" id="partinfo" value="">
                <div class=" d-flex justify-content-md-start">
                    <!-- FMEA TOGGLE -->
                    <div class="row bg-light px-3 pb-2 rounded">
                        <!-- <label class="form-label" for="fmea-toggle-btn">FMEA</label> -->
                        <span>FMEA</span>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="fmea-toggle-btn">

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary mt-0" for="btnradio1">NO NEED</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary mt-0" for="btnradio2">NEED</label>

                        </div>
                    </div>
                </div>
                <!-- SECTION_1_Identity -->
                <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
                    &nbsp;SECTION_1_Identity&nbsp;</p>
                <div class="inspector row border border-dark pb-3 rounded">

                    <div class="col-6">
                        <label for="start_day" class="form-label">start_day</label>
                        <input required type="date" class="form-control" id="start_day" name="発生日">
                    </div>

                    <div class="col-6">
                        <label for="repair_day" class="form-label">repair_day</label>
                        <input required type="date" class="form-control" id="repair_day" name="修理日">
                    </div>

                    <div class="col-3">
                        <label for="time_start" class="form-label">repair_time_start</label>
                        <input required type="time" class="form-control" id="time_start">
                    </div>
                    <div class="col-3">
                        <label for="time_end" class="form-label">repair_time_end</label>
                        <input required type="time" class="form-control" id="time_end">
                    </div>
                    <div class="col-3">
                        <label for="time_duration" class="form-label">repair_time_duration</label>
                        <input required type="text" class="form-control" name="修理時間" id="time_duration">
                    </div>

                    <div class="col-9">
                        <div class="col-4">
                            <label class="form-label" for="tantou">inspector_name </label>
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
                <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
                    &nbsp;SECTION_2_EquipmentInfo&nbsp;</p>
                <div class="item row border border-dark pb-3 rounded">
                    <div class="col-4">
                        <label class="form-label" for="busho">equipment_department</label>
                        <select class="form-control <?= (form_error('部署') ? 'is-invalid' : ''); ?>" name="部署" id="busho" required>

                            <option value="" <?= set_select('部署', '', true); ?>disabled selected>選び出す</option>
                            <option value="塗装" <?= set_select('部署', '塗装'); ?>>塗装</option>
                        </select>
                    </div>
                    <!-- Probably connect with each other -->
                    <div class="col-4">
                        <label class="form-label" for="setsubi">equipment_name</label>
                        <select class="form-control <?= (form_error('設備') ? 'is-invalid' : ''); ?>" name="設備" id="setsubi" required>
                            <option value="" <?= set_select('設備', '', true); ?> disabled selected>選び出す</option>
                            <option value="プレス" <?= set_select('設備', 'プレス'); ?>>プレス</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="form-label" for="gouki">Unit </label>
                        <select class="form-control <?= (form_error('号機') ? 'is-invalid' : ''); ?>" name="号機" id="gouki" required>
                            <option value="" <?= set_select('号機', '', true); ?> disabled selected>選び出す</option>
                            <option value="1号機" <?= set_select('号機', '1号機'); ?>>1号機</option>
                            <option value="2号機" <?= set_select('号機', '2号機'); ?>>2号機</option>
                        </select>
                    </div>

                    <div class="col">
                        <label for="" class="form-label">Process_Name</label>
                        <input required type="text" class="form-control" name="工程名" id="kouteiNa">
                    </div>

                    <div class="col">
                        <label for="" class="form-label">Failure_mode</label>
                        <input required type="text" class="form-control" name="故障モード" id="mode">
                    </div>

                    <div class="col-12">
                        <div class="col-4">
                            <label for="" class="form-label">Classificaion</label>
                            <input required type="text" class="form-control" name="区分" id="kubun">
                        </div>
                    </div>
                </div>
                <!-- SECTION_3_FixDetails  -->
                <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
                    &nbsp;SECTION_3_FixDetails&nbsp;</p>
                <div class="detail row border border-dark  rounded">
                    <div class="col-12">
                        <label class="form-label" for="a">現象・不具合要因詳細</label>
                        <textarea required name="現象" id="gensho" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="a">修理内容</label>
                        <textarea required name="修理内容" id="shuriNaiyou" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-7">
                        <label class="form-label" for="a">対策</label>
                        <textarea required name="対策" id="taisaku" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="col">
                        <!-- FILE input required -->
                        <div class="row gy-4 ">
                            <div class="col-12">
                                <label class="form-label" for="taisakusho">対策書</label>
                                <input class="form-control" type="file" name="対策書" id="taisakusho">
                            </div>

                            <div class="col pt-3 position-relative" style="background-color:#E5E5E5; top:1px; left:1.3px;border-top-left-radius: 5px; border: 1px solid ;border-color: black #E5E5E5 #E5E5E5 black">

                                <small>＊FMEA必要の時</small>
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
                                    <td class=" table-light rounded-top shadow-sm" style="width: 150px;">
                                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#partsSelect">SPARE PART</a>
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
                <!-- FMEA -->
                <h3 class="fmea-group position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
                    &nbsp;FMEA&nbsp;</h3>
                <div id="fmea-group" class="fmea-group pt-4 pb-3 px-3 border border-dark rounded">


                    <div class="row">
                        <div class="col">
                            <label class="form-label" for="detail">故障の影響</label>
                            <textarea class="form-control <?= (form_error('故障の影響') ? 'is-invalid' : ''); ?>" name="故障の影響" id="detail" cols="30" rows="10"><?= set_value('故障の影響'); ?></textarea>
                        </div>
                        <div class="col">
                            <label class="form-label" for="shuriJikan">ライン停止の可能性</label>
                            <input class="form-control <?= (form_error('ライン停止の可能性') ? 'is-invalid' : ''); ?>" type="text" name="ライン停止の可能性" value="<?= set_value('ライン停止の可能性'); ?>">

                            <label class="form-label" for="shuriJikan">特 殊 特性等</label>
                            <input class="form-control <?= (form_error('特殊特性等') ? 'is-invalid' : ''); ?>" type="text" name="特殊特性等" value="<?= set_value('特殊特性等'); ?>">
                        </div>
                    </div>


                    <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
                        &nbsp;現在の工程管理&nbsp;</p>
                    <div class="row border border-dark rounded mx-1 pt-3 pb-3">
                        <div class="col-6">
                            <label class="form-label" for="shuriJikan">予防</label>
                            <input class="form-control <?= (form_error('予防') ? 'is-invalid' : ''); ?>" type="text" name="予防" value="<?= set_value('予防'); ?>">
                        </div>

                        <div class="col-3">
                            <label class="form-label" for="shuriJikan">周期</label>
                            <input class="form-control <?= (form_error('周期') ? 'is-invalid' : ''); ?>" type="text" name="周期" value="<?= set_value('周期'); ?>">
                        </div>

                        <div class="col-3">
                            <label class="form-label" for="shuriJikan">月</label>
                            <input class="form-control  <?= (form_error('月') ? 'is-invalid' : ''); ?>" type="text" name="月" value="<?= set_value('月'); ?>">
                        </div>


                        <div class="col-6">
                            <label class="form-label" for="shuriJikan">検出</label>
                            <input class="form-control <?= (form_error('検出') ? 'is-invalid' : ''); ?>" type="text" name="検出" value="<?= set_value('検出'); ?>">
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label class="form-label" for="detail">対策案</label>
                            <textarea class="form-control <?= (form_error('対策案') ? 'is-invalid' : ''); ?>" name="対策案" id="detail" cols="30" rows="10"><?= set_value('対策案'); ?></textarea>
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="shuriJikan">担当者日程</label>
                            <input class="form-control <?= (form_error('担当者日程') ? 'is-invalid' : ''); ?>" type="text" name="担当者日程" value="<?= set_value('担当者日程'); ?>">
                        </div>
                        <div class="col-3">
                            <label class="form-label" for="shuriJikan">対応・処置</label>
                            <input class="form-control <?= (form_error('対応処置') ? 'is-invalid' : ''); ?>" type="text" name="対応処置" value="<?= set_value('対応処置'); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col my-2">
                        <input type="submit" name="add_trouble" class="btn btn-primary float-end" value="登録">
                        <a class="btn btn-warning float-end me-1" href='<?= base_url(); ?>as'>CANCEL</a>


                    </div>


                </div>
            </form>

            <div class="col-5 mt-4 mx-2 p-4 h-25 mainForm" id="a">
                <a data-bs-toggle="modal" data-bs-target="#fema" class="btn btn-light text-dark w-100 text-start border border-dark">一覧</a>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="fema" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FMEA LOOK UP MENU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form">
                        <div class="mb-3">

                            <label for="departement">設備の部署</label>
                            <select name="departement" class="form-control" id="departement">
                                <option value="">プレス</option>
                                <option value="">塗装</option>
                                <option value="">他の部署</option>

                            </select>
                            <div class="form-group mt-3">
                                <label for="floatingInput">FMEAの内容</label>
                                <input type="email" class="form-control" id="floatingInput" placeholder="検索">
                            </div>
                        </div>
                        <div class="mb-3" id="upper">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        h2 {
            color: #858796;
        }

        .mainForm {
            background-color: #E5E5E5;
            border-radius: 5px;
        }

        label {
            margin-top: 1rem;
        }


        .form-label {
            font-size: 18px;
            color: #858796;
        }

        .form-check-label {
            margin-top: 0;
        }

        .kanjifont {
            font-family: BIZ UDGothic;
            size: 22;
        }
    </style>


    <script>
        $(document).ready(function() {
            var btn_1 = $('#btnradio1')
            var btn_2 = $('#btnradio2')

            if (btn_1.prop('checked')) {
                $('#a').hide()
                $('.fmea-group').hide()
                $("#fmea-group :input").attr("disabled", true);
                $("#fmea-group :input").attr("required", false);
                $('#equipForm').attr('action', '/equipment/1');
            }
            if (btn_2.prop('checked'))
                $('#a').show()
            $('.fmea-group').show()
            $("#fmea-group :input").attr("disabled", false);
            $("#fmea-group :input").attr("required", true);
            $('#equipForm').attr('action', '/equipment/2');

            $('input[type=radio]').change(function() {
                if (btn_1.prop('checked')) {
                    $('#a').hide()
                    $('.fmea-group').hide()
                    $("#fmea-group :input").attr("disabled", true);
                    $("#fmea-group :input").attr("required", false);
                    $('#equipForm').attr('action', '/equipment/1');
                }
                if (btn_2.prop('checked')) {
                    $('.fmea-group').show()
                    $('#a').show()
                    $("#fmea-group :input").attr("disabled", false);
                    $("#fmea-group :input").attr("required", true);
                    $('#equipForm').attr('action', '/equipment/2');
                }
            })
        })

        $('#fema').on('show.bs.modal', function(event) {

            // IF EXIST
            $.ajax({
                url: "<?= base_url(); ?>dashboard/get_troubleList",
                success: function(response) {
                    $("#upper").html(response)

                },
                complete: function() {
                    console.log('done')
                }
            });


        })





        // $(document).ready(function() {
        //     $('#fmea_Form').hide()

        //     if ($('input[name=flexRadioDefault]:checked').val() == 0) {
        //         $('#fmea_Form').hide();
        //         $("#fmea_Form :input").attr("disabled", true);
        //         $('#equipForm').attr('action', '/equipment/1');
        //     } else {
        //         $('#fmea_Form').show();
        //         $("#fmea_Form :input").attr("disabled", false);
        //         $('#equipForm').attr('action', '/equipment/2');
        //     }

        //     $('input[name=flexRadioDefault]').change(function() {
        //         var val = $(this).val()
        //         if (val == 0) {
        //             $('#fmea_Form').hide();
        //             $("#fmea_Form :input").attr("disabled", true);
        //             $('#equipForm').attr('action', '/equipment/1');
        //         } else {
        //             $('#fmea_Form').show();
        //             $("#fmea_Form :input").attr("disabled", false);
        //             $('#equipForm').attr('action', '/equipment/2');
        //         }


        //     })

        //     $('input, textarea').on('focus', function name(params) {
        //         $(this).removeClass('is-invalid')
        //     })

        // })

        // $(document).ready(function() {
        //     'use strict'

        //     // Fetch all the forms we want to apply custom Bootstrap validation styles to
        //     var forms = document.querySelectorAll('.needs-validation')

        //     // Loop over them and prevent submission
        //     Array.prototype.slice.call(forms)
        //         .forEach(function(form) {
        //             form.addEventListener('submit', function(event) {
        //                 if (!form.checkValidity()) {
        //                     event.preventDefault()
        //                     event.stopPropagation()
        //                 }

        //                 form.classList.add('was-validated')
        //             }, false)
        //         })


        // })
    </script>