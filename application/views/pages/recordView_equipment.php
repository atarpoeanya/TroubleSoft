<?php
// print_r($item);
// printf('=====');
// print_r($fmea);
?>
<nav class="navbar fixed-top" style="margin-left: 90%; width:130px;">

    <a class="btn btn-warning me-5" href='<?= base_url(); ?>'><?= $this->data['BACK_BUTTON'] ?></a>
    <!-- <div class="container-fluid justify-content-center">
    </div> -->

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
                                <!-- <td>ID</td>
                                <th colspan="1"><?= $item->c_t800_id ?></th>
                                <td>作成月日</td>
                                <th colspan="3">TimeStamp (年月日)</th> -->
                                <td>担当者</td>
                                <th colspan="9"><?= $item->c_manager ?></th>
                            </tr>
                            <tr>
                                <td>発生日</td>
                                <td><b><?= date("Y年m月d日", strtotime($item->c_accidentDate)) ?>&nbsp;</b></td>
                                <!-- Change this to line stop -->
                                <td>修理時間</td>
                                <td colspan="5"><b id="stopTime"><?= $item->c_stopTime ?></b></td>
                            </tr>
                            <tr>
                                <td>部署場所</td>
                                <td colspan="7">
                                    <?= $item->c_department ?>
                                </td>

                            </tr>
                            <!-- <tr>
                                <td class="table-dark" colspan="10">&nbsp;</td>
                            </tr> -->
                            <tr class=" table-light text-nowrap">
                                <td colspan="3"><small> 設備</small><br>
                                    <div class="container">
                                        <?= $item->c_facility ?> - <?= $item->c_unit ?>
                                    </div>
                                </td>
                                <td colspan="3"><small>工程名・工程機能</small><br>
                                    <div class="container">
                                        <?= $item->c_processName ?>
                                    </div>
                                </td>
                                <td colspan="3"><small>故障モード</small><br>
                                    <div class="container">
                                        <?= $item->c_failMode ?>
                                    </div>
                                </td>
                            </tr>
                            <tr class="table-dark text-center">
                                <td colspan="10"><b>トラブルの内容</b></td>
                            </tr>
                            <tr>
                                <td colspan="1" rowspan="2" class="header_title">原因 と 内容</td>
                                <td colspan="4" class="align-top text">
                                    <small>現象・不具合要因詳細</small>
                                    <div class="container">
                                        <?= $item->c_phenomenon ?>
                                    </div>
                                </td>
                                <td colspan="4" class="align-top text">
                                    <small>修理内容</small>
                                    <div class="container">
                                        <?= $item->c_repairDet ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" class="align-top text">
                                    <small>対応・処置</small>
                                    <div class="container">
                                        <?= $item->c_response ?>
                                    </div>
                                </td>
                                <td colspan="4" class="align-top text">
                                    <small>故障の潜在原因 メカニズム</small>
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
                            if (property_exists($item, 'spare'))
                                foreach ($item->spare as $num) {
                            ?>
                                <tr>
                                    <?php
                                    foreach ($num as $key => $value) {
                                        if ($key != 'c_t202_id' && $key != 'c_price') {
                                    ?>
                                            <td class="text-center">
                                                <?= $value ?>
                                            </td>
                                        <?php
                                        } elseif ($key == 'c_price') {
                                        ?>
                                            <td class="text-center">
                                                <?= preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", floatval($value)) . ' 円' ?>
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
                                    <td colspan="10"><?= $this->data['EMPTY_PLACEHOLDER'] ?></td>
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


            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 align-middle text-nowrap">
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

                                <tr class=" table-light">
                                    <td colspan="3"><small> 設備</small><br>
                                        <div class="container">
                                            <?= $fmea->c_facility ?> - <?= $fmea->c_unit ?>
                                        </div>
                                    </td>
                                    <td colspan="3"><small>工程名・工程機能</small><br>
                                        <div class="container">
                                            <?= $fmea->c_processName ?>
                                        </div>
                                    </td>
                                    <td colspan="3"><small>故障モード</small><br>
                                        <div class="container">

                                            <?= $fmea->c_failMode ?>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="table-dark text-center">
                                    <td colspan="10"><b>トラブルの内容</b></td>
                                </tr>
                                <tr>
                                    <td colspan="1" rowspan="2" class="header_title">原因 と 内容</td>
                                    <td colspan="4" class="align-top text">
                                        <small> 故障の潜在原因 メカニズム</small>
                                        <div class="container">
                                            <?= $fmea->c_failMech ?>
                                        </div>
                                    </td>
                                    <td colspan="4" class="align-top text">
                                        <small>故障の影響</small>
                                        <div class="container">
                                            <?= $fmea->c_failImpact ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="align-top text">
                                        <small>ライン停止の可能性</small>
                                        <div class="container">
                                            <?= $fmea->c_lineEffect ?>
                                        </div>
                                    </td>
                                    <td colspan="4" class="align-top text">
                                        <small>特 殊 特性等</small>
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
                                        <small>検出</small>
                                        <div class="container">
                                            <?= $fmea->c_detection ?>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="8" class="align-top text">
                                        <small>予防</small>
                                        <div class="container">
                                            <?= $fmea->c_prevention ?>
                                        </div>
                                    </td>

                                </tr>

                                <tr>
                                    <td rowspan="2">対策</td>
                                    <td colspan="10">
                                        <small>対策案</small>
                                        <div class="container">
                                            <?= $fmea->c_counterPlan ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="10">
                                        <small>対策</small>
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
                                <!-- Fix this part -->
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
                                            if ($key != 'c_t202_id' && $key != 'c_price') {
                                        ?>
                                                <td class="text-center">
                                                    <?= $value ?>
                                                </td>
                                            <?php
                                            } elseif ($key == 'c_price') {
                                            ?>
                                                <td class="text-center">
                                                    <?= preg_replace("/\B(?=(\d{3})+(?!\d))/", ",", floatval($value)) . ' 円' ?>
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
                                        <td colspan="10"><?= $this->data['EMPTY_PLACEHOLDER'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            <?php
        }
            ?>
            </div>
    </div>





    <style>
        .text {

            min-height: 150px;
            height: 150px;
        }

        small {
            font-weight: bold;
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

            renderTime()

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

        function renderTime() {
            var data = $('#stopTime').html()
            var result = ''

            var days = Math.floor(data / 1440)
            var rem_days = data % 1440
            var hours = Math.floor(rem_days / 60)
            var minutes = data - days * 1440 - hours * 60

            if (days != 0) {
                result += days + '日 '
            }

            if (hours != 0) {
                result += hours + '時間 '
            }

            if (minutes != 0) {
                result += minutes + '分'
            }

            $('#stopTime').html(result)
        }
    </script>