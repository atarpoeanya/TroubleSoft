<br>
<div class="container col-8 kanjifont" id="mainForm">
    <br>
    <h1>品質トラブル</h1>
    <br>
    <form>
        <div class="container">

            <div class="row">
                <div class="col">
                    <label class="form-label" for="startDay">発生日</label>
                    <input class="form-control" type="date" name="発生日" id="startDay">
                </div>

                <div class="col">
                    <label class="form-label" for="issueDate">対策書発行日</label>
                    <input class="form-control" type="date" name="対策書発行日" id="issueDate">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label class="form-label" for="kouteiNa">工程名・工程機能</label>
                    <input class="form-control" type="text" name="工程名・工程機能" id="kouteiNa">
                </div>

                <div class="col">
                    <label class="form-label" for="failCost">Fコスト</label>
                    <input class="form-control" type="text" name="Fコスト" id="failCost">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label class="form-label" for="productMode">品質モード</label>
                    <input class="form-control" type="text" name="品質モード" id="productMode">
                </div>

                <div class="col">
                    <div class="row">
                        <div class="col">
                            <label class="form-label" for="kubun">区分</label>
                            <input class="form-control" type="text" name="区分" id="kubun">
                        </div>

                        <div class="col">
                            <label class="form-label" for="saihatsu">再発</label>
                            <input class="form-control" type="text" name="再発" id="saihatsu">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label class="form-label" for="genshoDet">現象詳細</label>
                    <textarea class="form-control" name="現象詳細" id="genshoDet" cols="30" rows="10"></textarea>
                </div>

                <div class="col">
                    <label class="form-label" for="shininDet">真因詳細</label>
                    <textarea class="form-control" name="真因詳細" id="shininDet" cols="30" rows="10"></textarea>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col">
                    <label class="form-label" for="haseitaisaaku">発生対策</label>
                    <textarea class="form-control" name="発生対策" id="haseitaisaaku" cols="30" rows="10"></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label class="form-label" for="outflowCounter">流出对策</label>
                    <textarea class="form-control" name="流出对策" id="outflowCounter" cols="30" rows="5"></textarea>
                </div>

                <div class="col">
                    <label class="form-label" for="counterDoc">対策書</label>
                    <input class="form-control" type="file" name="対策書" id="counterDoc">
                </div>
            </div>
            <div class="d-flex justify-content-end text-nowrap mt-3">
                <div class="label"><label for="fmea_radio">FMEA</label></div>
                <div class="ms-2 form-check" id="fmea_radio">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label class="form-check-label" for="flexRadioDefault1">
                        要
                    </label>
                </div>
                <br>
                <div class="ms-2 form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        不要
                    </label>
                </div>
                <!-- <div class="ms-2"><button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#scheduleModal"><span>Schedule</span></button></div> -->
                <!-- <div class="ms-2"><button class="btn btn-secondary"><span>FMEA</span></button></div> -->
                <div class="ms-2"><button class="btn btn-secondary" onclick="location.href='<?php echo base_url();?>output'"><span>登録</span></button></div>
            </div>
            <!-- table -->
            <div class="row">
                <div class="col">
                    <table class="table thead-light">
                    <thead>
                        <tr>
                            <td></td>
                            <td>日程</td>
                            <td>対策確認者</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>対策完了</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>現地確認</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>1か月点検</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>3か月点検</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>1年点検</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>

</div>

<style>
    h1 {
        color: #858796;
        font-size: 36px;
    }

    #mainForm {
        background-color: #E5E5E5;
        border-radius: 5px;
    }

    .form-label {
        font-size: 18px;
        color: #858796;
    }

    .kanjifont {
        font-family: BIZ UDGothic;
        size: 22;
    }
</style>