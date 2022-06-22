<?php
// print_r($item);
// printf('=====');
// print_r($fmea);
?>
<nav class="navbar fixed-bottom">

    <a class="btn btn-warning ms-5" href='<?= base_url(); ?>'>Back</a>
    <div class="container-fluid justify-content-center">
    </div>

</nav>
<div class="row p-5 w-100">
    <div class="col">
        <div class="card p-3 m-auto mb-3">
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th colspan="10">設備のトラブルレポート</th>
                            </tr>
        
                        </thead>
                        <tbody>
                            <tr class="table-light">
                                <td>ID</td>
                                <th colspan="1"><?= $item->c_t800_id ?></th>
                                <td>作成月日</td>
                                <th colspan="3">TimeStamp (年月日)</th>
                                <td>担当者</td>
                                <th colspan="3"><?= $item->c_manager ?></th>
                            </tr>
                            <tr>
                                <td>発生日</td>
                                <td><b><?= date("Y年m月d日", strtotime($item->c_accidentDate)) ?>&nbsp; - <?= date("H:i 分頃", strtotime($item->c_repairStart)) ?></b></td>
                                <td>修理日</td>
                                <td colspan="3"><b><?= date("Y年m月d日", strtotime($item->c_repairDate)) ?>&nbsp; - <?= date("H:i 分頃", strtotime($item->c_repairEnd)) ?></b></td>
        
                                <td>修理所要時間</td>
                                <td><b><?= date("h", strtotime($item->c_repairEnd) - strtotime($item->c_repairStart)) ?> 時間</b></td>
                            </tr>
                            <tr>
                                <td>部署場所</td>
                                <td colspan="7"><?= $item->c_department ?></td>
        
                            </tr>
                            <tr>
                                <td class="table-dark" colspan="10">&nbsp;</td>
                            </tr>
                            <tr class=" table-light">
                                <td colspan="3"><small> 設備</small><br> <?= $item->c_facility ?> - <?= $item->c_unit ?></td>
                                <td colspan="3"><small>工程名・工程機能</small><br> <?= $item->c_processName ?></td>
                                <td colspan="3"><small>故障モード</small><br> <?= $item->c_failMode ?></td>
                            </tr>
                            <tr class="table-dark">
                                <td colspan="10"><b>トラブルの内容</b></td>
                            </tr>
                            <tr>
                                <td colspan="1" rowspan="2" class="header_title">原因 と 内容</td>
                                <td colspan="4" class="align-top text">
                                    <small>Phenomena</small>
                                    <div class="container">
                                        <?= $item->c_phenomenon ?>
                                    </div>
                                </td>
                                <td colspan="4" class="align-top text">
                                    <small>Repair Detail</small>
                                    <div class="container">
                                        <?= $item->c_repairDet ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="align-top text">
                                    <small>Response</small>
                                    <div class="container">
                                        <?= $item->c_response ?>
                                    </div>
                                </td>
                                <td colspan="4" class="align-top text">
                                    <small>Fail Mech</small>
                                    <div class="container">
                                        <?= $item->c_failMech ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
        
                                <?php if ($item->c_countermeasure != 'no_file') { ?>
                                    <td colspan="10" class="text"><a href="<?= base_url() ?>uploads/<?= $item->c_countermeasure ?>" target="_blank" rel="noopener noreferrer" class="card-link">
                                            <div class="border border-dark p-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60%" fill="red" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                    <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                    <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                </svg>
                                                <span style="color: black;">
                                                    <?= $item->c_countermeasure ?>
                                                </span>
                                            </div>
                                        </a></td>
                                <?php } else { ?>
                                    <td colspan="10" class="text">
                                        <div class=" p-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60%" fill="currentColor" class="bi bi-file-earmark-x-fill" viewBox="0 0 16 16">
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.854 7.146 8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 1 1 .708-.708z" />
                                            </svg>
                                            <span style="color: black;">
                                                <?= $item->c_countermeasure ?>
                                            </span>
                                        </div>
                                    </td>
        
                                <?php } ?>
        
        
                            </tr>
        
        
                        </tbody>
                    </table>
                </div>
        
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="table-dark">
                            <?php
                            foreach ($title as $thead) {
                                switch ($thead) {
                                    case 'c_t202_id':
                                        $thead = '部品NO';
                                        break;
                                    case 'c_purchaseDate':
                                        $thead = '購入日';
                                        break;
                                    case 'c_partName':
                                        $thead = '部品名';
                                        break;
                                    case 'c_model':
                                        $thead = '型式';
                                        break;
                                    case 'c_maker':
                                        $thead = 'メーカー名';
                                        break;
                                    case 'c_quantity':
                                        $thead = '数量';
                                        break;
                                    case 'c_unit':
                                        $thead = '単位';
                                        break;
                                    case 'c_price':
                                        $thead = '金額';
                                        break;
                                    case 'c_storage':
                                        $thead = '予備品の保管場所';
                                        break;
                                    case 'c_arrangement':
                                        $thead = '必要時の手配先';
                                        break;
        
                                    default:
                                        $thead = 'MISSING';
                                        break;
                                }
                            ?>
                                <th class="text-center ">
                                    <?= $thead ?>
                                </th>
        
                            <?php
        
                            }
                            ?>
                        </thead>
                        <tbody class="table-stripped">
                            <?php
                            if (property_exists($item, 'spare'))
                                foreach ($item->spare as $num) {
                            ?>
                                <tr>
                                    <?php
                                    foreach ($num as $key => $value) {
                                    ?>
                                        <td class="text-center  pointer">
                                            <?= $value ?>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                                }
                            else {
                            ?>
                                <tr class="text-center align-middle" style="height: 150px;">
                                    <td colspan="10">EMPTY</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        
        
            </div>
        </div>

    </div>
                                
    <div class="col-12">
    <?php
if ($fmea != '') {
?>


    <div class="card p-3 m-auto">
        <div class="card-body">
            <div class="col overflow-auto fmea ms-1 p-3 border rounded">
                <h3>FMEA</h3>
                <p class=" position-relative sub-header">
                    &nbsp;SECTION_1_<b>設備の内容</b>&nbsp;</p>
                <div class="row border-top py-3">

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">部署 （設備の）</label>
                        <input required type="text" class="form-control col-6" readonly value="<?= $fmea->c_department ?>">
                    </div>

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">設備名</label>
                        <input required type="text" class="form-control" readonly value="<?= $fmea->c_facility ?>">
                    </div>
                    <div class="col-3 pt-3">
                        <label for="start_day" class="form-label">工程名</label>
                        <input required type="text" class="form-control" readonly value="<?= $fmea->c_processName ?>">
                    </div>
                    <div class="col-3 pt-3">
                        <label for="start_day" class="form-label">故障モード</label>
                        <input required type="text" class="form-control" readonly value="<?= $fmea->c_failMode ?>">
                    </div>
                </div>

                <p class=" position-relative sub-header">
                    &nbsp;SECTION_2_<b>修理内容</b>&nbsp;</p>
                <div class="row border-top py-3">

                    <div class="col-12 pt-3">
                        <label for="start_day" class="form-label">現象・不具合要因詳細</label>
                        <textarea class="form-control" cols="30" rows="4" readonly><?= $fmea->c_phenomenon ?></textarea>
                    </div>
                    <div class="col-12 pt-3">
                        <label for="start_day" class="form-label">修理内容</label>
                        <textarea class="form-control" cols="30" rows="4" readonly><?= $fmea->c_repairDet ?></textarea>
                    </div>
                    <div class="col-12 pt-3">
                        <label for="start_day" class="form-label">対応・処置</label>
                        <textarea class="form-control" cols="30" rows="4" readonly><?= $fmea->c_response ?></textarea>
                    </div>


                </div>

                <p class=" position-relative sub-header">
                    &nbsp;SECTION_3_<b>影響</b>&nbsp;</p>
                <div class="row border-top py-3">

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">故障のメカニズム</label>
                        <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_failMech ?></textarea>
                    </div>

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">故障の影響</label>
                        <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_failImpact ?></textarea>
                    </div>
                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">ライン停止の可能性</label>
                        <input required type="text" class="form-control" readonly value="<?= $fmea->c_lineEffect ?>">
                    </div>
                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">特 殊 特性等</label>
                        <input required type="text" class="form-control" readonly value="<?= $fmea->c_specialChar ?>">
                    </div>
                </div>

                <p class=" position-relative sub-header">
                    &nbsp;SECTION_4_<b>現在の工程管理</b>&nbsp;</p>
                <div class="row border-top py-3">

                    <div class="col-4 pt-3">
                        <label for="start_day" class="form-label">担当者 日程</label>
                        <input required type="text" class="form-control" readonly value="<?= $fmea->c_picSchedule ?>">
                    </div>
                    <div class="col-2 pt-3">
                        <label for="start_day" class="form-label">周期</label>
                        <input required type="text" class="form-control" readonly value="<?= $fmea->c_period ?>">
                    </div>
                    <div class="col-2 pt-3">
                        <label for="start_day" class="form-label">月</label>
                        <input required type="text" class="form-control" readonly value="<?= $fmea->c_month ?>">
                    </div>
                    <div class="col-12 pt-3">
                        <div class="col pt-3">
                            <label for="start_day" class="form-label">予防</label>
                            <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_prevention ?></textarea>
                        </div>
                        <div class="col pt-3">
                            <label for="start_day" class="form-label">検出</label>
                            <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_detection ?></textarea>
                        </div>
                    </div>

                </div>


                <p class=" position-relative sub-header">
                    &nbsp;SECTION_5_<b>対策</b>&nbsp;</p>
                <div class="row border-top py-3">

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">対策案</label>
                        <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_counterPlan ?></textarea>
                    </div>

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">対策</label>
                        <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_measure ?></textarea>
                    </div>

                </div>

                <!-- SPARE PART -->
                <div class="spare row mt-3">
                    <div class="col  p-0 rounded-2 overflow-hidden mb-2">
                        <table class="table text-center m-0" id="equipment_parts_list_fmea">
                            <thead>

                                <tr class="table-dark">
                                    <td>部品NO</td>
                                    <td>部品名</td>
                                    <td>型式</td>
                                    <td>数量</td>
                                </tr>
                            </thead>
                            <tbody class="table-striped table-light">
                                <?php

                                if (property_exists($fmea, 'spare'))
                                    foreach ($fmea->spare as $item) {
                                ?>
                                    <tr>
                                        <td class=" table-data text-center align-middle border-right border-left pointer col-md-3 ID">
                                            <?= $item->c_t202_id ?>
                                        </td>
                                        <td class=" table-data text-center align-middle border-right border-left pointer col-md-3 partname">
                                            <?= $item->c_partName ?>
                                        </td>
                                        <td class=" table-data text-center align-middle border-right border-left pointer col-md-3 partmodel">
                                            <?= $item->c_model ?>
                                        </td>
                                        <td class=" table-data text-center align-middle border-right border-left pointer col-md-3 amount">
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
                                if (!property_exists($fmea, 'spare')) :
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
            </div>
        </div>
    </div>

<?php
}
?>
    </div>
</div>



<div class="wrapper p-4 container" hidden>
    <div class="row">
        <div class="col-12 main-content">
            <div class="container-fluid">
                <div class="row wrapper-inner ">
                    <div class="col me-3">
                        <div class="d-flex">
                            <div class="col me-1">
                                <table class="table table-bordered mb-0 align-middle">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th colspan="10">設備のトラブルレポート</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr class="table-light">
                                            <td>ID</td>
                                            <th colspan="1"><?= $item->c_t800_id ?></th>
                                            <td>作成月日</td>
                                            <th colspan="3">TimeStamp (年月日)</th>
                                            <td>担当者</td>
                                            <th colspan="3"><?= $item->c_manager ?></th>
                                        </tr>
                                        <tr>
                                            <td>発生日</td>
                                            <td><b><?= date("Y年m月d日", strtotime($item->c_accidentDate)) ?>&nbsp; - <?= date("H:i 分頃", strtotime($item->c_repairStart)) ?></b></td>
                                            <td>修理日</td>
                                            <td colspan="3"><b><?= date("Y年m月d日", strtotime($item->c_repairDate)) ?>&nbsp; - <?= date("H:i 分頃", strtotime($item->c_repairEnd)) ?></b></td>

                                            <td>修理所要時間</td>
                                            <td><b><?= date("h", strtotime($item->c_repairEnd) - strtotime($item->c_repairStart)) ?> 時間</b></td>
                                        </tr>
                                        <tr>
                                            <td>部署場所</td>
                                            <td colspan="5"><?= $item->c_department ?></td>

                                        </tr>
                                        <tr>
                                            <td class="table-dark" colspan="10">&nbsp;</td>
                                        </tr>
                                        <tr class=" table-light">
                                            <td colspan="3"><small> 設備</small><br> <?= $item->c_facility ?> - <?= $item->c_unit ?></td>
                                            <td colspan="3"><small>工程名・工程機能</small><br> <?= $item->c_processName ?></td>
                                            <td colspan="3"><small>故障モード</small><br> <?= $item->c_failMode ?></td>
                                        </tr>
                                        <tr class="table-dark">
                                            <td colspan="10"><b>トラブルの内容</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="1" rowspan="2" class="header_title">原因 と 内容</td>
                                            <td colspan="4" class="align-top text">
                                                <small>Phenomena</small>
                                                <div class="container">
                                                    <?= $item->c_phenomenon ?>
                                                </div>
                                            </td>
                                            <td colspan="4" class="align-top text">
                                                <small>Repair Detail</small>
                                                <div class="container">
                                                    <?= $item->c_repairDet ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="align-top text">
                                                <small>Response</small>
                                                <div class="container">
                                                    <?= $item->c_response ?>
                                                </div>
                                            </td>
                                            <td colspan="4" class="align-top text">
                                                <small>Fail Mech</small>
                                                <div class="container">
                                                    <?= $item->c_failMech ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>

                                            <?php if ($item->c_countermeasure != 'no_file') { ?>
                                                <td colspan="10" class="text"><a href="<?= base_url() ?>uploads/<?= $item->c_countermeasure ?>" target="_blank" rel="noopener noreferrer" class="card-link">
                                                        <div class="border border-dark p-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60%" fill="red" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                                                <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                                                <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                                            </svg>
                                                            <span style="color: black;">
                                                                <?= $item->c_countermeasure ?>
                                                            </span>
                                                        </div>
                                                    </a></td>
                                            <?php } else { ?>
                                                <td colspan="10" class="text">
                                                    <div class=" p-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60%" fill="currentColor" class="bi bi-file-earmark-x-fill" viewBox="0 0 16 16">
                                                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.854 7.146 8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 1 1 .708-.708z" />
                                                        </svg>
                                                        <span style="color: black;">
                                                            <?= $item->c_countermeasure ?>
                                                        </span>
                                                    </div>
                                                </td>

                                            <?php } ?>


                                        </tr>


                                    </tbody>
                                </table>

                                <table class="table table-bordered mb-0">
                                    <thead class="table-dark">
                                        <?php
                                        foreach ($title as $thead) {
                                            switch ($thead) {
                                                case 'c_t202_id':
                                                    $thead = '部品NO';
                                                    break;
                                                case 'c_purchaseDate':
                                                    $thead = '購入日';
                                                    break;
                                                case 'c_partName':
                                                    $thead = '部品名';
                                                    break;
                                                case 'c_model':
                                                    $thead = '型式';
                                                    break;
                                                case 'c_maker':
                                                    $thead = 'メーカー名';
                                                    break;
                                                case 'c_quantity':
                                                    $thead = '数量';
                                                    break;
                                                case 'c_unit':
                                                    $thead = '単位';
                                                    break;
                                                case 'c_price':
                                                    $thead = '金額';
                                                    break;
                                                case 'c_storage':
                                                    $thead = '予備品の保管場所';
                                                    break;
                                                case 'c_arrangement':
                                                    $thead = '必要時の手配先';
                                                    break;

                                                default:
                                                    $thead = 'MISSING';
                                                    break;
                                            }
                                        ?>
                                            <th class="text-center ">
                                                <?= $thead ?>
                                            </th>

                                        <?php

                                        }
                                        ?>
                                    </thead>
                                    <tbody class="table-stripped">
                                        <?php
                                        if (property_exists($item, 'spare'))
                                            foreach ($item->spare as $num) {
                                        ?>
                                            <tr>
                                                <?php
                                                foreach ($num as $key => $value) {
                                                ?>
                                                    <td class="text-center  pointer">
                                                        <?= $value ?>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        <?php
                                            }
                                        else {
                                        ?>
                                            <tr class="text-center align-middle" style="height: 150px;">
                                                <td colspan="10">EMPTY</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-3 p-0 " style="width: 10px;">
                                <div class="h-100 p-0">
                                    <a class="btn btn-warning h-100 vertical-text" id="fmea-toggle" style="width: 40px;">FMEAの検索</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FMEA -->
                    <?php
                    if ($fmea != '') {
                    ?>
                        <div class="col overflow-auto fmea ms-1 p-3 border border-dark">
                            <h3>FMEA</h3>
                            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                                &nbsp;SECTION_1_<b>設備の内容</b>&nbsp;</p>
                            <div class="row border border-dark p-3 rounded my-auto">

                                <div class="col-6">
                                    <label for="start_day" class="form-label">部署 （設備の）</label>
                                    <input required type="text" class="form-control col-6" readonly value="<?= $fmea->c_department ?>">
                                </div>

                                <div class="col-6">
                                    <label for="start_day" class="form-label">設備名</label>
                                    <input required type="text" class="form-control" readonly value="<?= $fmea->c_facility ?>">
                                </div>
                                <div class="col-3">
                                    <label for="start_day" class="form-label">工程名</label>
                                    <input required type="text" class="form-control" readonly value="<?= $fmea->c_processName ?>">
                                </div>
                                <div class="col-3">
                                    <label for="start_day" class="form-label">故障モード</label>
                                    <input required type="text" class="form-control" readonly value="<?= $fmea->c_failMode ?>">
                                </div>
                            </div>

                            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                                &nbsp;SECTION_2_<b>修理内容</b>&nbsp;</p>
                            <div class="row border border-dark p-3 rounded my-auto">

                                <div class="col-12">
                                    <label for="start_day" class="form-label">現象・不具合要因詳細</label>
                                    <textarea class="form-control" cols="30" rows="4" readonly><?= $fmea->c_phenomenon ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="start_day" class="form-label">修理内容</label>
                                    <textarea class="form-control" cols="30" rows="4" readonly><?= $fmea->c_repairDet ?></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="start_day" class="form-label">対応・処置</label>
                                    <textarea class="form-control" cols="30" rows="4" readonly><?= $fmea->c_response ?></textarea>
                                </div>


                            </div>

                            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                                &nbsp;SECTION_3_<b>影響</b>&nbsp;</p>
                            <div class="row border border-dark p-3 rounded my-auto">

                                <div class="col-6">
                                    <label for="start_day" class="form-label">故障のメカニズム</label>
                                    <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_failMech ?></textarea>
                                </div>

                                <div class="col-6">
                                    <label for="start_day" class="form-label">故障の影響</label>
                                    <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_failImpact ?></textarea>
                                </div>
                                <div class="col-6">
                                    <label for="start_day" class="form-label">ライン停止の可能性</label>
                                    <input required type="text" class="form-control" readonly value="<?= $fmea->c_lineEffect ?>">
                                </div>
                                <div class="col-6">
                                    <label for="start_day" class="form-label">特 殊 特性等</label>
                                    <input required type="text" class="form-control" readonly value="<?= $fmea->c_specialChar ?>">
                                </div>
                            </div>

                            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                                &nbsp;SECTION_4_<b>現在の工程管理</b>&nbsp;</p>
                            <div class="row border border-dark p-3 rounded my-auto">

                                <div class="col-4">
                                    <label for="start_day" class="form-label">担当者 日程</label>
                                    <input required type="text" class="form-control" readonly value="<?= $fmea->c_picSchedule ?>">
                                </div>
                                <div class="col-2">
                                    <label for="start_day" class="form-label">周期</label>
                                    <input required type="text" class="form-control" readonly value="<?= $fmea->c_period ?>">
                                </div>
                                <div class="col-2">
                                    <label for="start_day" class="form-label">月</label>
                                    <input required type="text" class="form-control" readonly value="<?= $fmea->c_month ?>">
                                </div>
                                <div class="col-12">
                                    <div class="col">
                                        <label for="start_day" class="form-label">予防</label>
                                        <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_prevention ?></textarea>
                                    </div>
                                    <div class="col">
                                        <label for="start_day" class="form-label">検出</label>
                                        <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_detection ?></textarea>
                                    </div>
                                </div>

                            </div>


                            <p class=" position-relative" style="top: 30px; left: 40px; background-color: white; width: max-content;">
                                &nbsp;SECTION_5_<b>対策</b>&nbsp;</p>
                            <div class="row border border-dark p-3 rounded my-auto">

                                <div class="col-6">
                                    <label for="start_day" class="form-label">対策案</label>
                                    <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_counterPlan ?></textarea>
                                </div>

                                <div class="col-6">
                                    <label for="start_day" class="form-label">対策</label>
                                    <textarea class="form-control" cols="30" rows="6" readonly><?= $fmea->c_measure ?></textarea>
                                </div>

                            </div>

                            <!-- SPARE PART -->
                            <div class="spare row mt-3">
                                <div class="col  p-0 rounded-2 overflow-hidden mb-2">
                                    <table class="table text-center m-0" id="equipment_parts_list_fmea">
                                        <thead>

                                            <tr class="table-dark">
                                                <td>部品NO</td>
                                                <td>部品名</td>
                                                <td>型式</td>
                                                <td>数量</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-striped table-light">
                                            <?php

                                            if (property_exists($fmea, 'spare'))
                                                foreach ($fmea->spare as $item) {
                                            ?>
                                                <tr>
                                                    <td class=" table-data text-center align-middle border-right border-left pointer col-md-3 ID">
                                                        <?= $item->c_t202_id ?>
                                                    </td>
                                                    <td class=" table-data text-center align-middle border-right border-left pointer col-md-3 partname">
                                                        <?= $item->c_partName ?>
                                                    </td>
                                                    <td class=" table-data text-center align-middle border-right border-left pointer col-md-3 partmodel">
                                                        <?= $item->c_model ?>
                                                    </td>
                                                    <td class=" table-data text-center align-middle border-right border-left pointer col-md-3 amount">
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
                                            if (!property_exists($fmea, 'spare')) :
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
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-12">
            <nav class="navbar fixed-bottom navbar-light bg-light">

                <a class="btn btn-warning ms-5" href='<?= base_url(); ?>'>Back</a>
                <div class="container-fluid justify-content-center">
                    <div class="copyright text-center">
                        <span>Copyright &copy; Meiwa Industry 2022, Version 1.0.0</span>
                    </div>
                </div>

            </nav>
        </div>
    </div>

</div>


<style>
    .text {

        min-height: 150px;
        height: 150px;
    }

    .header_title {
        width: 50px;
    }

    .wrapper-inner {
        height: 1080px;
    }

    .main-content {
        padding-bottom: 50px;
    }

    .fmea {
        height: inherit;
    }

    .vertical-text {
        /* width:1px; */
        word-wrap: break-word;
        white-space: pre-wrap;
    }

    .sub-header {
        top: 30px;
        left: 40px;
        background-color: white;
        width: max-content;
    }
</style>

<script>
    $(document).ready(function() {
        // $('.fmea').hide();

        if ($('.fmea').length == 0) {
            $('#fmea-toggle').addClass('disabled')
        }
    })

    $('#fmea-toggle').on('click', function() {
        if ($('.fmea').hasClass('active')) {
            $('.fmea').hide();
            $('.fmea').removeClass('active')
        } else {
            $('.fmea').addClass('active')
            $('.fmea').show();
        }
    })
</script>




<div class="container my-2 py-3 rounded main" hidden>
    <div class="container" id="headerRecord">
        <table class="table align-middle text-center table-borderless border border-dark">
            <thead>
                <th colspan="3" class="border-bottom border-dark ">
                    TROUBLE REPORT
                </th>
            </thead>
            <tbody class="table-light">
                <tr>

                    <td class="text-center" colspan="3">Label</td>
                </tr>
                <tr class="text-start align-middle">
                    <td>
                        <h4>

                            <?= $item->c_t800_id ?>
                        </h4>
                    </td>
                    <td>
                        <h4>
                            <?= $item->c_processName ?>
                        </h4>
                    </td>
                    <td>
                        <h4>
                            <?= $item->c_failMode ?>
                        </h4>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>

    <div class="container" id="dateRecord">
        <table class="table align-middle text-center border border-dark">
            <thead class="table-light">
                <th>Day Occured</th>
                <th>Day fixed</th>
                <th>Time to fix</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= $item->c_accidentDate ?>
                    </td>
                    <td>
                        <?= $item->c_repairDate ?>
                    </td>
                    <td>
                        <?= $item->c_repairTime ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="container" id="makerDetail">
        <table class="table align-middle text-center table-borderless border border-dark">
            <thead class="align-middle table-light border-bottom border-dark">
                <tr class="border border-dark">
                    <th class="border border-dark" colspan="2">Inspector</th>
                    <th class="border border-dark" rowspan="2">Problem Name</th>
                    <th rowspan="2">Problem Mode</th>
                </tr>
                <tr>
                    <th class="border border-dark">Inspector_name</th>
                    <th>Inspector-div</th>
                </tr>
            </thead>
            <tbody id="identity">



                <tr>
                    <td class="border border-dark">
                        <?= $item->c_manager ?>
                    </td>
                    <td>
                        <?= $item->c_department ?>
                    </td>
                    <td class="border border-dark">
                        <?= $item->c_processName ?>
                    </td>
                    <td>
                        <?= $item->c_failMode ?>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>

    <div class="container" id="measureDetail">
        <label for="cause">CAUSE</label>
        <div class="container border border-dark" id="cause">
            <p>
                <?= $item->c_phenomenon ?>
            </p>
        </div>

        <label for="measureTaken">MEASURE TAKEN</label>
        <div id="measureTaken" class="container border border-dark">
            <p>
                <?= $item->c_repairDet ?>
            </p>
        </div>


        <table class="table table-borderless">
            <tbody>
                <tr class="text-nowrap border-1" style="border-color: rgb(236, 234, 234); background-color: rgb(236, 234, 234);">
                    <td class="ps-0" colspan="3"><label for="measure">MEASURE</label></td>
                    <td class="ps-0"> <label for="measureDoc">MEASURE DOC</label></td>
                </tr>


                <tr>

                    <td class="border border-dark" id="measure">
                        <p>
                            <?= $item->c_measures ?>
                        </p>
                    </td>
                    <td class="border-1" style="background-color: rgb(236, 234, 234); border-color: rgb(236, 234, 234);"></td>
                    <td class="border-1" style="background-color: rgb(236, 234, 234); border-color: rgb(236, 234, 234);"></td>
                    <td class="text-center align-middle justify-content-middle p-0" id="measureDoc">
                        <a href="<?= base_url() ?>uploads/<?= $item->c_countermeasure ?>" target="_blank" rel="noopener noreferrer" class="card-link">
                            <div class="border border-dark p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60%" fill="red" class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                    <path d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                    <path fill-rule="evenodd" d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                </svg>
                                <span style="color: black;">
                                    <?= $item->c_countermeasure ?>
                                </span>
                            </div>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="container" id="partList">
            <table class="table table-dark">
                <thead>
                    <?php
                    foreach ($title as $thead) {
                    ?>
                        <th class=" table-head text-center border-right border-left">
                            <?= $thead ?>
                        </th>

                    <?php

                    }
                    ?>
                </thead>
                <tbody>
                    <?php
                    if (property_exists($item, 'spare'))
                        foreach ($item->spare as $num) {
                    ?>
                        <tr>
                            <?php
                            foreach ($num as $key => $value) {
                            ?>
                                <td onclick="view_record()" class=" table-data text-center align-middle border-right border-left pointer col-md-3">
                                    <?= $value ?>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php
                        }
                    else {
                    ?>
                        <tr class="text-center align-middle" style="height: 100px;">
                            <td colspan="10">EMPTY</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>


    </div>

</div>