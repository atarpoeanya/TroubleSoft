<div class="d-flex row">
    <div class="col">
    <form action="/equipment_fmea/2" method="post" class="mt-4 p-4 col mainForm" autocomplete="off" id="equipForm" enctype="multipart/form-data">
        <!-- For Spare part [Id, Amount] -->
        <input type="hidden" name="spareParts" id="partinfo" value="">

            <div class="container">
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

            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="">department</label>
                        <select class="form-control" name="部署" id="busho">
                            <option value="" selected>Default</option>
                            <option value="1">1</option>
                        </select>
                    </div>

                    <div class="col">
                        <label class="form-label" for="">Tools_name</label>
                        <select class="form-control" name="設備" id="setsubi">
                            <option value="" selected>Default</option>
                            <option value="1">1</option>
                        </select>
                    </div>

                    <div class="col"><label class="form-label" for="">Unit</label>
                        <select class="form-control" name="号機" id="gouki">
                            <option value="" selected>Default</option>
                            <option value="1">1</option>
                        </select>
                    </div>

                    <div class="col">
                        <label class="form-label" for="">Processs_Name</label>
                        <input type="text" class="form-control" name="工程名">
                    </div>

                    <div class="col">
                        <label class="form-label" for="">Fail_Mode</label>
                        <input type="text" class="form-control" name="故障モード">
                    </div>


                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="">Phenomenon</label>
                        <textarea class="form-control" name="現象" id="gensho" cols="30" rows="5"></textarea>
                    </div>

                    <div class="col">
                        <label class="form-label" for="">Repair_detail</label>
                        <textarea class="form-control" name="修理内容" id="repair_detail" cols="30" rows="5"></textarea>
                    </div>

                    <div class="col">
                        <label class="form-label" for="">Response</label>
                        <textarea class="form-control" name="対応処置" id="response" cols="30" rows="5"></textarea>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col"><label class="form-label" for="">Fail_Mech</label><input type="text" class="form-control" name="fail_mech"></div>
                    <div class="col"><label class="form-label" for="">Line_effect</label><input type="text" class="form-control" name="ライン停止の可能性"></div>
                    <div class="col"><label class="form-label" for="">Impact</label><input type="text" class="form-control" name="故障の影響"></div>
                    <div class="col"><label class="form-label" for="">Special_Characteristic</label><input type="text" class="form-control" name="特殊特性等"></div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <label class="form-label" for="">Prevention</label>
                        <textarea class="form-control" name="予防" id="" cols="30" rows="5"></textarea>
                    </div>
                    <div class="col">
                        <label class="form-label" for="">Detection</label><input type="text" class="form-control" name="検出">
                    </div>
                    <div class="col">
                        <label class="form-label" for="">Period</label><input type="text" class="form-control" name="周期">
                    </div>
                    <div class="col">
                        <label class="form-label" for="">Month</label>
                        <input type="text" class="form-control"
                        name="月">

                    </div>

                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col"><label class="form-label" for="">Manager</label><select class="form-control" name="担当者日程">
                            <option value="" selected>Default</option>
                            <option value="1">1</option>
                        </select></div>
                    <div class="col"><label class="form-label" for="">Counter_plan</label> <textarea class="form-control" name="対策案" id="" cols="30" rows="5"></textarea></div>
                    <div class="col"><label class="form-label" for="">Measure</label> <textarea class="form-control" name="対策" id="" cols="30" rows="5"></textarea></div>
                </div>
            </div>
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

            <div class="row">
                <div class="col my-2">
                    <input type="submit" name="add_trouble" class="btn btn-primary float-end" value="登録" id="submitTrouble" >
                    <button type="button" class="btn btn-primary" onclick="printName()">CLICK ME</button>
                    <a class="btn btn-warning float-end me-1" href='<?= base_url(); ?>as'>CANCEL</a>


                </div>


            </div>
        </form>
        
    </div>

    <div class="col-5"></div>
</div>


<script>
    function printName() {
        $('form :input').each(function (i, e) {
            console.log(e.name)
        })
    }
</script>