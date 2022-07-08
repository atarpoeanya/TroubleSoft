<nav class="navbar fixed-top" style="margin-left: 90%; width:130px;">
    <a class="btn btn-warning me-5" href='<?= base_url(); ?>'><?= $this->data['BACK_BUTTON'] ?></a>
    <!-- <div class="container-fluid justify-content-center">
    </div> -->

</nav>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0 align-middle">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th colspan="10">
                                    設備のFMEAレポート
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>部署場所</td>
                                <td colspan="7"><?= $fmea->c_department ?></td>

                            </tr>
                            <!-- <tr>
                                <td class="table-dark" colspan="10">&nbsp;</td>
                            </tr> -->
                            <tr class=" table-light">
                                <td colspan="3"><small> 設備</small><br> <?= $fmea->c_facility ?> - <?= $fmea->c_unit ?></td>
                                <td colspan="3"><small>工程名・工程機能</small><br> <?= $fmea->c_processName ?></td>
                                <td colspan="3"><small>故障モード</small><br> <?= $fmea->c_failMode ?></td>
                            </tr>

                            <tr class="table-dark text-center">
                                <td colspan="10"><b>トラブルの内容</b></td>
                            </tr>
                            <tr>
                                <td colspan="1" rowspan="2" class="header_title">原因 と 内容</td>
                                <td colspan="4" class="align-top text">
                                    <small>Mechanism</small>
                                    <div class="container">
                                        <?= $fmea->c_failMech ?>
                                    </div>
                                </td>
                                <td colspan="4" class="align-top text">
                                    <small>Fail Impact</small>
                                    <div class="container">
                                        <?= $fmea->c_failImpact ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="align-top text">
                                    <small>Effect on Line</small>
                                    <div class="container">
                                        <?= $fmea->c_lineEffect ?>
                                    </div>
                                </td>
                                <td colspan="4" class="align-top text">
                                    <small>Special Characteristic</small>
                                    <div class="container">
                                        <?= $fmea->c_specialChar ?>
                                    </div>
                                </td>
                            </tr>

                            <tr class="table-dark text-center">
                                <td colspan="10"><b>現在の工程管理</b></td>
                            </tr>

                            <tr>
                                <td>
                                    担当者 日程
                                </td>
                                <td colspan="9">
                                    <?= $fmea->c_picSchedule ?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="1">周期</td>
                                <td colspan="4"><?= $fmea->c_period ?></td>
                                <td colspan="1">月</td>
                                <td colspan="4"><?= $fmea->c_month ?></td>
                            </tr>

                            <tr>
                                <td colspan="1" rowspan="2" class="header_title">予防 と 検出</td>
                                <td colspan="8" class="align-top text">
                                    <small>Detection</small>
                                    <div class="container">
                                        <?= $fmea->c_detection ?>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="8" class="align-top text">
                                    <small>Prevention</small>
                                    <div class="container">
                                        <?= $fmea->c_prevention ?>
                                    </div>
                                </td>

                            </tr>

                            <tr>
                                <td rowspan="2">対策</td>
                                <td colspan="10">
                                    <small>Counter_plan</small>
                                    <div class="container">
                                        <?= $fmea->c_counterPlan ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="10">
                                    <small>Measure</small>
                                    <div class="container">
                                        <?= $fmea->c_measure ?>
                                    </div>
                                </td>
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

                                        break;
                                    case 'c_purchaseDate':
                                        $thead = '購入日';
                                        break;
                                    case 'c_partName':
                                        $thead = '部品';
                                        break;
                                    case 'c_model':
                                        $thead = '型式';
                                        break;
                                    case 'c_maker':
                                        $thead = 'メーカー';
                                        break;
                                    case 'c_quantity':
                                        $thead = '数量';
                                        break;
                                    case 'c_unit':
                                        $thead = '単位';
                                        break;
                                    case 'c_price':
                                        $thead = '単価';
                                        break;
                                    case 'c_storage':
                                        $thead = '保管場所';
                                        break;
                                    case 'c_arrangement':
                                        $thead = '手配先';
                                        break;

                                    default:
                                        $thead = 'MISSING';
                                        break;
                                }
                                if ($thead !== 'c_t202_id') {
                            ?>
                                    <th class=" table-head text-center border-start">
                                        <?= $thead ?>
                                    </th>

                                <?php

                                } else {
                                ?>
                                    <th class="id text-center border-start" style="display:none"></th>
                            <?php
                                }
                            }
                            ?>
                        </thead>
                        <tbody class="table-stripped">
                            <?php
                            if (property_exists($fmea, 'spare'))
                                foreach ($fmea->spare as $num) {
                            ?>
                                <tr>
                                    <?php
                                    foreach ($num as $key => $value) {
                                        if ($key != 'c_t202_id') {
                                    ?>
                                            <td class="text-center  pointer">
                                                <?= $value ?>
                                            </td>
                                    <?php
                                        }
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
</div>