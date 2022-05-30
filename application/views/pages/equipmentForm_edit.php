
<div class="container col-8 kanjifont" id="mainForm">
    <div class="container">
        <!-- small screen -->
        <h2 class="pt-3 mb-3">設備トラブル</h2>


        <form action="" method="post" class="mt-4" autocomplete="off" id="equipForm" enctype="multipart/form-data">
            <input type="hidden" name="id" id="setsubiId" value="<?= $items->c_t800_id ?>">
            <input type="hidden" name="spareParts" id="partinfo" value="">
            <!-- Date -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="startDay">発生日</label>
                    <input class="form-control" type="date" name="発生日" id="startDay" value="<?= $items->c_accidentDate ?>">

                    <?php if (form_error('発生日')) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= form_error('発生日'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col">
                    <label class="form-label" for="repairDay">修理日</label>
                    <input class="form-control" type="date" name="修理日" id="repairDay" value="<?= $items->c_repairDate ?>">
                </div>
            </div>

            <!-- inspector -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="busho">部署</label>
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
                <div class="col">
                    <label class="form-label" for="tantou">担当者 </label>
                    <select class="form-control" name="担当者" id="tantou">
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

            <!-- Equipment -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="setsubi">設備</label>
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
                <div class="col">
                    <label class="form-label" for="gouki">号機 </label>
                    <select class="form-control" name="号機" id="gouki">
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
            </div>
            <!-- process & fix time -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="kouteiNa">工程名・工程機能</label>
                    <input class="form-control" type="text" name="工程名・工程機能" id="kouteiNa" value="<?= $items->c_processName ?>">
                </div>
                <div class="col">
                    <label class="form-label" for="shuriJikan">修理所要時間</label>
                    <input class="form-control" type="text" name="修理所要時間" id="shuriJikan" value="<?= $items->c_repairTime ?>">
                </div>
            </div>

            <!-- mode & classification -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="mode">故障モード</label>
                    <input class="form-control" type="text" name="故障モード" id="mode" value="<?= $items->c_failMode ?>">
                </div>
                <div class="col">
                    <label class="form-label" for="kubun">区分</label>
                    <input class="form-control" type="text" name="区分" id="kubun" value="<?= $items->c_classification ?>">
                </div>
            </div>

            <!-- TEXT AREA -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="gensho">現象・不具合要因詳細</label>
                    <textarea class="form-control" name="現象・不具合要因詳細" id="gensho" cols="30" rows="10"><?= $items->c_phenomenon ?></textarea>
                </div>
                <div class="col">
                    <label class="form-label" for="shuriNaiyou">修理内容</label>
                    <textarea class="form-control" name="修理内容" id="shuriNaiyou" cols="30" rows="10"><?= $items->c_repairDet ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label" for="taisaku">対策</label>
                    <textarea class="form-control" name="対策" id="taisaku" cols="30" rows="5"><?= $items->c_measures ?></textarea>
                </div>
                <div class="col">
                    <label class="form-label" for="taisakusho">対策書</label>
                    <div class="input-group">
                        <input class="form-control" type="file" name="対策書" id="taisakusho">
                        <input type="hidden" name="oldFile" value="<?= $items->c_countermeasure ?>">
                        <a class=" input-group-text btn btn-info" href="<?= base_url() ?>uploads/<?= $items->c_countermeasure ?>" target="_blank" rel="noopener noreferrer" class="card-link"><?=$items->c_countermeasure ?></a>
                    </div>




                    <span>FMEA</span>
                    <input disabled class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="0" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        不要
                    </label>


                    <input disabled class="form-check-input" type="radio" name="flexRadioDefault" value="1" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        要
                    </label>
                </div>
            </div>


    </div>
    <!-- FEMA PART -->
    <div id="fmea_Form" class="p-2 rounded" style="background-color: rgb(196, 196, 196)">
        <div class="row">
            <div class="col">
                <label class="form-label" for="detail">故障の影響</label>
                <textarea class="form-control" name="故障の影響" id="detail" cols="30" rows="10"></textarea>
            </div>
            <div class="col">
                <label class="form-label" for="shuriJikan">ライン停止の可能性</label>
                <input class="form-control" type="text" name="ライン停止の可能性">

                <label class="form-label" for="shuriJikan">特 殊 特性等</label>
                <input class="form-control" type="text" name="特殊特性等">
            </div>
        </div>


        <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
            &nbsp;現在の工程管理&nbsp;</p>
        <div class="row border border-dark rounded mx-1 pt-3 pb-3">
            <div class="col-6">
                <label class="form-label" for="shuriJikan">予防</label>
                <input class="form-control" type="text" name="予防">
            </div>

            <div class="col-3">
                <label class="form-label" for="shuriJikan">周期</label>
                <input class="form-control" type="text" name="周期">
            </div>

            <div class="col-3">
                <label class="form-label" for="shuriJikan">月</label>
                <input class="form-control" type="text" name="月">
            </div>


            <div class="col-6">
                <label class="form-label" for="shuriJikan">検出</label>
                <input class="form-control" type="text" name="検出">
            </div>



        </div>

        <div class="row">
            <div class="col-6">
                <label class="form-label" for="detail">対策案</label>
                <textarea class="form-control" name="対策案" id="detail" cols="30" rows="10"></textarea>
            </div>
            <div class="col-3">
                <label class="form-label" for="shuriJikan">担当者日程</label>
                <input class="form-control" type="text" name="担当者日程">
            </div>
            <div class="col-3">
                <label class="form-label" for="shuriJikan">対応・処置</label>
                <input class="form-control" type="text" name="対応処置">
            </div>
        </div>

    </div>
    <!-- Table -->
    <table class="table table-light text-center" id="equipment_parts_list">
        <thead>
            <tr>
                <td>部品NO</td>
                <td>部品名</td>
                <td>型式</td>
                <td>使用箇所</td>
                <td>数量</td>
  
            </tr>
        </thead>
        <tbody>
        <?php
        if(property_exists($items, 'spare'))
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
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 partstorage">
                            <?= $item->c_placement ?>
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
        <tfoot>
            <?php 
            if(!property_exists($items, 'spare')):
            ?>
        <tr>
                <td colspan="6" class="text-center emptyTab">
                    <span>EMPTY</span>
                </td>
            </tr>
            <?php endif; ?>
        </tfoot>
    </table>

    <!-- Button -->
    <div class="row p-3">
        <div class="col-6 mb-2">
        <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#partsSelect"><span>部品</span></button>
            <input type="submit" name="edit_trouble" class="btn btn-secondary" value="登録">

        </div>


    </div>

    </form>
</div>
</div>


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
        $('#fmea_Form').hide()
        $('input[name=flexRadioDefault]').change(function() {
            var val = $(this).val()
            if (val == 0) {
                $('#fmea_Form').hide();
                $('#equipForm').attr('action', 'dashboard/postEquipment/1');
            } else {
                $('#fmea_Form').show();
                $('#equipForm').attr('action', 'dashboard/postEquipment/2');
            }


        })

        if ($('#equipment_parts_list tbody').length != 0) {
            $arr.length = 0;
            $('#equipment_parts_list tbody').find('tr').each(function() {
                $arr.push([$(this).find('td:eq(0)').text().trim(), $(this).find('td:eq(4)').text().trim()])
            })
            console.log($arr)
            $('#partinfo').val(JSON.stringify($arr));
        }
        //ELSE SEND EMPTY STATEMENT
        else {
            $('#partinfo').val('empty');
        }
    })
</script>