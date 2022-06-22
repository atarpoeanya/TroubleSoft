<div id="main_body" class="pt-3">
    <div class="card">
        <div class="card-body">
            <form action="/equipment_fmea/2" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data">
                <!-- For Spare part [Id, Amount] -->
                <input type="hidden" name="spareParts" id="partinfo" value="">
                <div class="row">
                    <div class="col-4">
                        <label class="form-label" for="">Wreck_date</label>
                        <input type="date" class="form-control" name="発生日">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="">Repair_date</label>
                        <input type="date" class="form-control" name="修理日">
                    </div>

                </div>
                <div class="row">

                    <div class="col">
                        <label class="form-label" for="">time_start</label>
                        <input type="time" class="form-control" name="time_start">
                    </div>
                    <div class="col"><label class="form-label" for="">time_end</label>
                        <input type="time" class="form-control" name="time_end">
                    </div>


                </div>

                <p class=" position-relative sub-header">
                    &nbsp;SECTION_1_<b>設備の内容</b>&nbsp;</p>
                <div class="row row border-top py-3">

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">部署 （設備の）</label>
                        <select class="form-control" name="部署" id="busho">
                            <option value="" selected>Default</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="ATAR">ATAR</option>
                        </select>
                    </div>

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">設備名</label>
                        <select class="form-control" name="設備" id="setsubi">
                            <option value="" selected>Default</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="col pt-3">
                        <label class="form-label" for="">号機</label>
                        <select class="form-control" name="号機" id="gouki">
                            <option value="" selected>Default</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="col-3 pt-3">
                        <label for="start_day" class="form-label">工程名</label>
                        <input type="text" class="form-control" name="工程名">
                    </div>
                    <div class="col-3 pt-3">
                        <label for="start_day" class="form-label">故障モード</label>
                        <input type="text" class="form-control" name="故障モード">
                    </div>
                </div>

                <p class=" position-relative sub-header">
                    &nbsp;SECTION_2_<b>修理内容</b>&nbsp;</p>
                <div class="row row border-top py-3">

                    <div class="col-12 pt-3">
                        <label for="start_day" class="form-label">現象・不具合要因詳細</label>
                        <textarea class="form-control" name="現象" id="gensho" cols="30" rows="5"></textarea>
                    </div>
                    <div class="col-12 pt-3">
                        <label for="start_day" class="form-label">修理内容</label>
                        <textarea class="form-control" name="修理内容" id="repair_detail" cols="30" rows="5"></textarea>
                    </div>
                    <div class="col-12 pt-3">
                        <label for="start_day" class="form-label">対応・処置</label>
                        <textarea class="form-control" name="対応処置" id="response" cols="30" rows="5"></textarea>
                    </div>


                </div>

                <p class=" position-relative sub-header">
                    &nbsp;SECTION_3_<b>影響</b>&nbsp;</p>
                <div class="row row border-top py-3">

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">故障のメカニズム</label>
                        <textarea class="form-control" name="fail_mech" cols="30" rows="5"></textarea>
                    </div>

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">故障の影響</label>
                        <textarea class="form-control" cols="30" rows="6" name="故障の影響"></textarea>
                    </div>
                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">ライン停止の可能性</label>
                        <textarea name="ライン停止の可能性" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">特 殊 特性等</label>
                        <input type="text" class="form-control" name="特殊特性等">
                    </div>
                </div>

                <p class=" position-relative sub-header">
                    &nbsp;SECTION_4_<b>現在の工程管理</b>&nbsp;</p>
                <div class="row border border-dark p-3 rounded my-auto">

                    <div class="col-4 pt-3">
                        <label for="start_day" class="form-label">担当者 日程</label>
                        <select class="form-control" name="担当者日程">
                            <option value="" selected>Default</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="col-2 pt-3">
                        <label for="start_day" class="form-label">周期</label>
                        <input type="text" class="form-control" name="周期">
                    </div>
                    <div class="col-2 pt-3">
                        <label for="start_day" class="form-label">月</label>
                        <input type="text" class="form-control" name="月">
                    </div>
                    <div class="col-12 pt-3">
                        <div class="col">
                            <label for="start_day" class="form-label">予防</label>
                            <textarea class="form-control" name="予防" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col pt-3">
                            <label for="start_day" class="form-label">検出</label>
                            <input type="text" class="form-control" name="検出">
                        </div>
                    </div>

                </div>


                <p class=" position-relative sub-header">
                    &nbsp;SECTION_5_<b>対策</b>&nbsp;</p>
                <div class="row row border-top py-3">

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">対策案</label>
                        <textarea class="form-control" name="対策案" id="" cols="30" rows="5"></textarea>
                    </div>

                    <div class="col-6 pt-3">
                        <label for="start_day" class="form-label">対策</label>
                        <textarea class="form-control" name="対策" id="" cols="30" rows="5"></textarea>
                    </div>

                </div>

                <div class="spare row mt-3">
                    <div class="col">
                        <a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#partsSelect">予備部品リース</a>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="rounded-2 overflow-hidden p-0">
                            <table class="table text-center m-0 nolimit" id="equipment_parts_list">
                                <thead>
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
                </div>

                <div class="d-flex justify-content-center mt-2">
                    <input type="submit" name="add_trouble" class="btn btn-primary float-end me-5" value="登録" id="submitTrouble">
                    <a class="btn btn-warning float-end me-1" href='<?= base_url(); ?>as'>CANCEL</a>


                </div>

            </form>
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

<!-- REMINDIRE TO UNIFY THIS -->
<script>
    function printName() {
        $('form :input').each(function(i, e) {
            console.log(e.name)
        })
    }
</script>