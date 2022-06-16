<?php
print_r($items);
echo "<hr>";
print_r($FMEA);
?>
<div class="container col-8 kanjifont mt-4" id="mainForm">

    <div class="container">
        <form action="" method="post" class="mt-4" autocomplete="off" id="equipForm" enctype="multipart/form-data">
            <h2 class="pt-3 mb-3">MAIN_HEADER</h2>
            <!-- item ID -->
            <input type="hidden" name="id" id="setsubiId" value="<?= $items->c_t800_id ?>">
            <!-- For Spare part [Id, Amount] -->
            <input type="hidden" name="spareParts" id="partinfo" value="">

            <!-- SECTION_1_Identity -->
            <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
                &nbsp;SECTION_1_Identity&nbsp;</p>
            <div class="inspector row border border-dark pb-3 rounded">

                <div class="col-6">
                    <label for="start_day" class="form-label">start_day</label>
                    <input type="date" class="form-control" id="start_day" name="発生日" value="<?= $items->c_accidentDate ?>">
                </div>

                <div class="col-6">
                    <label for="repair_day" class="form-label">repair_day</label>
                    <input type="date" class="form-control" id="repair_day" name="修理日" value="<?= $items->c_repairDate ?>">
                </div>

                <div class="col-3">
                    <label for="time_start" class="form-label">repair_time_start</label>
                    <input type="time" class="form-control" id="time_start">
                </div>
                <div class="col-3">
                    <label for="time_end" class="form-label">repair_time_end</label>
                    <input type="time" class="form-control" id="time_end">
                </div>
                <div class="col-3">
                    <label for="time_duration" class="form-label">repair_time_duration</label>
                    <input type="text" class="form-control" name="修理時間" id="time_duration" value="<?= $items->c_repairTime ?>">
                </div>

                <div class="col-9">
                    <div class="col-4">
                        <label class="form-label" for="tantou">inspector_name </label>
                        <select class="form-control" name="担当者" id="tantou" required>
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
            <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
                &nbsp;SECTION_2_EquipmentInfo&nbsp;</p>
            <div class="item row border border-dark pb-3 rounded">
                <div class="col-4">
                    <label class="form-label" for="busho">equipment_departmen</label>
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
                <!-- Probably connect with each other -->
                <div class="col-4">
                    <label class="form-label" for="setsubi">equipment_name</label>
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
                <div class="col-4">
                    <label class="form-label" for="gouki">Unit </label>
                    <select class="form-control" name="号機" id="gouki" required>
                        <?php
                        foreach ($unit as $u) :
                            if ($u == $items->c_facility) : ?>
                                <option value="<?= $u ?>" selected><?= $u ?></option>
                            <?php else : ?>
                                <option value="<?= $u ?>"><?= $u ?></option>
                        <?php endif;
                        endforeach; ?>
                    </select>
                </div>

                <div class="col">
                    <label for="" class="form-label">Process_Name</label>
                    <input type="text" class="form-control" name="工程名" id="kouteiNa" value="<?= $items->c_processName ?>">
                </div>

                <div class="col">
                    <label for="" class="form-label">Failure_mode</label>
                    <input type="text" class="form-control" name="故障モード" id="mode" value="<?= $items->c_failMode ?>">
                </div>

                <div class="col-12">
                    <div class="col-4">
                        <label for="" class="form-label">Classificaion</label>
                        <input type="text" class="form-control" name="区分" id="kubun" value="<?= $items->c_classification ?>">
                    </div>
                </div>
            </div>
            <!-- SECTION_3_FixDetails  -->
            <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
                &nbsp;SECTION_3_FixDetails&nbsp;</p>
            <div class="detail row border border-dark  rounded">
                <div class="col-12">
                    <label class="form-label" for="a">現象・不具合要因詳細</label>
                    <textarea name="現象" id="gensho" class="form-control" cols="30" rows="10"><?= $items->c_phenomenon ?></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label" for="a">修理内容</label>
                    <textarea name="修理内容" id="shuriNaiyou" class="form-control" cols="30" rows="10"><?= $items->c_repairDet ?></textarea>
                </div>
                <div class="col-7">
                    <label class="form-label" for="a">対策</label>
                    <textarea name="対策" id="taisaku" class="form-control" cols="30" rows="5"><?= $items->c_measures ?></textarea>
                </div>
                <div class="col">
                    <!-- FILE INPUT -->
                    <div class="row gy-4 ">
                        <!-- old file placeholder -->
                        <input type="hidden" name="oldFile" value="<?= $items->c_countermeasure ?>">
                        <div class="col-12">
                            <label class="form-label" for="taisakusho">対策書</label>
                            <input class="form-control" type="file" name="対策書" id="taisakusho" value="<?= $items->c_countermeasure ?>">
                            <!-- <label class="form-label" for="old-link">OLD_LINK</label> -->
                            <a class=" card-link" href="<?= base_url() ?>uploads/<?= $items->c_countermeasure ?>" target="_blank" rel="noopener noreferrer" id="old-link"><?= $items->c_countermeasure ?></a>
                        </div>



                        <div class="col pt-3 position-relative" style="background-color:#E5E5E5; top:1px; left:1.3px;border-top-left-radius: 5px; border: 1px solid ;border-color: black #E5E5E5 #E5E5E5 black">
                            <div class="bg-light px-3 pb-2 rounded">
                                <!-- FMEA TOGGLE -->
                                <?php if (isset($FMEA)) : ?>
                                    <input type="text" hidden readonly value="<?= $FMEA->c_t800_id ?>" id="fmea-id" name="fmea-Id">
                                <?php endif ?>

                                <div class="row">
                                    <!-- <label class="form-label" for="fmea-toggle-btn">FMEA</label> -->
                                    <span>FMEA</span>
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="fmea-toggle-btn">

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                        <label class="btn btn-outline-primary mt-0 disabled" for="btnradio1">NO NEED</label>

                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                        <label class="btn btn-outline-primary mt-0 disabled" for="btnradio2">NEED</label>

                                    </div>
                                </div>
                            </div>
                            <small>＊FMEA必要の時</small>
                        </div>
                    </div>


                </div>
            </div>

            <!-- SPARE PART -->
            <div class="spare row mt-3">
                <div class="col  p-0 rounded-2 overflow-hidden mb-2">
                    <table class="table text-center m-0" id="equipment_parts_list_edit">
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
                            <?php

                            if (property_exists($items, 'spare'))
                                foreach ($items->spare as $item) {
                            ?>
                                <tr>
                                    <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 ID">
                                        <?= $item->c_t202_id ?>
                                    </td>
                                    <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 partname">
                                        <?= $item->c_partName ?>
                                    </td>
                                    <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 partmodel">
                                        <?= $item->c_model ?>
                                    </td>
                                    <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 amount">
                                        <?= $item->c_quantity ?>
                                    </td>

                                    <td style="display: none;"><a class="btn btn-primary minus">-</a> </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot class="table-striped table-light">

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
           
        <div class="row">
            <div class="col mb-2">
                <input type="submit" name="edit_trouble" class="btn btn-primary float-end" value="登録">
                <a class="btn btn-warning float-end me-1" href='<?= base_url(); ?>'>CANCEL</a>


            </div>


        </div>
        </form>
    </div>
</div>


<!-- NEEEE -->




<style>
    h2 {
        color: #858796;
    }

    #mainForm {
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
        // console.log($('#partinfo').val())
        // $('#fmea_Form').hide()
        // $('input[name=flexRadioDefault]').change(function() {
        //     var val = $(this).val()
        //     if (val == 0) {
        //         $('#fmea_Form').hide();
        //         $('#equipForm').attr('action', 'dashboard/postEquipment/1');
        //     } else {
        //         $('#fmea_Form').show();
        //         $('#equipForm').attr('action', 'dashboard/postEquipment/2');
        //     }


        // })




        if ($('#fmea-id').length != 0) {
            $('.fmea-group').show()
            $("#fmea-group :input").attr("disabled", false);
            $('#btnradio2').attr('checked', true)
        } else {
            $('.fmea-group').hide()
            $("#fmea-group :input").attr("disabled", true);
        }





        if ($('#equipment_parts_list_edit tbody').length != 0) {
            $arr.length = 0;
            $('#equipment_parts_list_edit tbody').find('tr').each(function() {
                $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(3)').text().trim()])
            })

            $('#partinfo').val(JSON.stringify($arr));
        }
        //ELSE SEND EMPTY STATEMENT
        else {
            $('#partinfo').val('empty');
        }
    })
</script>