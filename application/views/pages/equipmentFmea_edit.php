<?php
print_r($items)
?>
<div class="d-flex row p-3">
    <div class="col">
        <form action="" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data">
            <!-- ID -->
            <input type="hidden" name="id" id="setsubiId" value="<?= $items->c_t203_id ?>">
                <!-- For Spare part [Id, Amount] -->
                <input type="hidden" name="spareParts" id="partinfo" value="">
            <div class="row">
                <div class="col-4">
                    <label class="form-label" for="">Wreck_date</label>
                    <input type="date" class="form-control" name="発生日" value="<?= $items->c_accidentDate ?>">
                </div>
                <div class="col-6">
                    <label class="form-label" for="">Repair_date</label>
                    <input type="date" class="form-control" name="修理日" value="<?= $items->c_repairDate ?>">
                </div>

            </div>
            <div class="row">

                <div class="col">
                    <label class="form-label" for="">time_start</label>
                    <input type="time" class="form-control" name="time_start" value="<?= $items->c_repairStart ?>">
                </div>
                <div class="col"><label class="form-label" for="">time_end</label>
                    <input type="time" class="form-control" name="time_end" value="<?= $items->c_repairEnd ?>">
                </div>


            </div>

            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                &nbsp;SECTION_1_<b>設備の内容</b>&nbsp;</p>
            <div class="row border border-dark p-3 rounded my-auto">

                <div class="col-6">
                    <label for="start_day" class="form-label">部署 （設備の）</label>
                    <select class="form-control" name="部署" id="busho">
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

                <div class="col-6">
                    <label for="start_day" class="form-label">設備名</label>
                    <select class="form-control" name="設備" id="setsubi">
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
                <div class="col"><label class="form-label" for="">号機</label>
                    <select class="form-control" name="号機" id="gouki">
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
                <div class="col-3">
                    <label for="start_day" class="form-label">工程名</label>
                    <input type="text" class="form-control" name="工程名" value="<?= $items->c_processName ?>">
                </div>
                <div class="col-3">
                    <label for="start_day" class="form-label">故障モード</label>
                    <input type="text" class="form-control" name="故障モード"  value="<?= $items->c_failMode ?>">
                </div>
            </div>

            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                &nbsp;SECTION_2_<b>修理内容</b>&nbsp;</p>
            <div class="row border border-dark p-3 rounded my-auto">

                <div class="col-12">
                    <label for="start_day" class="form-label">現象・不具合要因詳細</label>
                    <textarea class="form-control" name="現象" id="gensho" cols="30" rows="5"><?= $items->c_phenomenon ?></textarea>
                </div>
                <div class="col-12">
                    <label for="start_day" class="form-label">修理内容</label>
                    <textarea class="form-control" name="修理内容" id="repair_detail" cols="30" rows="5"></textarea>
                </div>
                <div class="col-12">
                    <label for="start_day" class="form-label">対応・処置</label>
                    <textarea class="form-control" name="対応処置" id="response" cols="30" rows="5"><?= $items->c_repairDet ?></textarea>
                </div>


            </div>

            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                &nbsp;SECTION_3_<b>影響</b>&nbsp;</p>
            <div class="row border border-dark p-3 rounded my-auto">

                <div class="col-6">
                    <label for="start_day" class="form-label">故障のメカニズム</label>
                    <textarea class="form-control" name="fail_mech" cols="30" rows="5"><?= $items->c_failMech ?></textarea>
                </div>

                <div class="col-6">
                    <label for="start_day" class="form-label">故障の影響</label>
                    <textarea class="form-control" cols="30" rows="6" name="故障の影響"><?= $items->c_failImpact ?></textarea>
                </div>
                <div class="col-6">
                    <label for="start_day" class="form-label">ライン停止の可能性</label>
                    <textarea name="ライン停止の可能性" class="form-control" cols="30" rows="5"><?= $items->c_lineEffect?></textarea>
                </div>
                <div class="col-6">
                    <label for="start_day" class="form-label">特 殊 特性等</label>
                    <input type="text" class="form-control" name="特殊特性等" value="<?= $items->c_specialChar?>">
                </div>
            </div>

            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                &nbsp;SECTION_4_<b>現在の工程管理</b>&nbsp;</p>
            <div class="row border border-dark p-3 rounded my-auto">

                <div class="col-4">
                    <label for="start_day" class="form-label">担当者 日程</label>
                    <select class="form-control" name="担当者日程">
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
                <div class="col-2">
                    <label for="start_day" class="form-label">周期</label>
                    <input type="text" class="form-control" name="周期" value="<?= $items->c_period?>">>
                </div>
                <div class="col-2">
                    <label for="start_day" class="form-label">月</label>
                    <input type="text" class="form-control" name="月" value="<?= $items->c_month?>">
                </div>
                <div class="col-12">
                    <div class="col">
                        <label for="start_day" class="form-label">予防</label>
                        <textarea class="form-control" name="予防" id="" cols="30" rows="5"><?= $items->c_prevention?></textarea>
                    </div>
                    <div class="col">
                        <label for="start_day" class="form-label">検出</label>
                        <input type="text" class="form-control" name="検出" value="<?= $items->c_detection?>">
                    </div>
                </div>

            </div>


            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                &nbsp;SECTION_5_<b>対策</b>&nbsp;</p>
            <div class="row border border-dark p-3 rounded my-auto">

                <div class="col-6">
                    <label for="start_day" class="form-label">対策案</label>
                    <textarea class="form-control" name="対策案" id="" cols="30" rows="5"><?= $items->c_counterPlan?></textarea>
                </div>

                <div class="col-6">
                    <label for="start_day" class="form-label">対策</label>
                    <textarea class="form-control" name="対策" id="" cols="30" rows="5"><?= $items->c_measure?></textarea>
                </div>

            </div>

            <div class="spare row mt-3">
                        <div class="col  p-0 rounded-2 overflow-hidden mb-2">
                            <table class="table table-bordered mb-0 text-center" id="equipment_parts_list_edit">
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
                                <tbody class="table-stripped table-light">
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
                                            <td class="text-center  pointer">
                                                <?= $num->c_quantity ?>
                                            </td>

                                            <td style="display: none;"><a class="btn btn-primary minus">-</a> </td>
                                        </tr>
                                </tbody>

                            <?php } ?>
                            <tfoot>
                                <?php
                                if (!property_exists($items, 'spare')) :
                                ?>
                                    <tr>
                                        <td colspan="6" class="text-center emptyTab">
                                            <span>EMPTY</span>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tfoot>
                            </table>
                        </div>
                    </div>

            <div class="row">
                <div class="col my-2">
                    <input type="submit" name="edit_fmea" class="btn btn-primary float-end" value="登録" id="submitTrouble">
                    <button type="button" class="btn btn-primary" onclick="printName()">CLICK ME</button>
                    <a class="btn btn-warning float-end me-1" href='<?= base_url(); ?>'>CANCEL</a>


                </div>


            </div>
        </form>

    </div>


</div>


<script>
    function printName() {
        $('form :input').each(function(i, e) {
            console.log(e.name)
        })
    }
</script>