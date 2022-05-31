<br>
<div class="container col-8 kanjifont" id="mainForm">
    <div class="container">
        <!-- small screen -->
        <h2 class="pt-3 mb-3">設備トラブル</h2>


        <form action="" method="post" class="mt-4" autocomplete="off" id="equipForm" enctype="multipart/form-data">
            <input type="hidden" name="spareParts" id="partinfo" value="">
            <!-- Date -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="startDay">発生日</label>
                    <input class="form-control <?= (form_error('発生日') ? 'is-invalid' : ''); ?>" type="date" name="発生日" id="startDay" value="<?php echo set_value('発生日'); ?>">
                </div>
                <div class="col">
                    <label class="form-label" for="repairDay">修理日</label>
                    <input class="form-control <?= (form_error('修理日') ? 'is-invalid' : ''); ?>" type="date" name="修理日" id="repairDay" value="<?php echo set_value('修理日'); ?>">
                </div>
            </div>

            <!-- inspector -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="busho">部署</label>
                    <select class="form-control <?= (form_error('部署') ? 'is-invalid' : ''); ?>" name="部署" id="busho">
                    
                        <option value="" disabled selected>選び出す</option>
                        <option value="塗装">塗装</option>
                        <option value="生技">生技</option>
                        <option value="組付">組付</option>
                        <option value="生管">生管</option>
                        <option value="品証">品証</option>
                        <option value="プレス・溶接">プレス・溶接</option>
                        <option value="営業">営業</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label" for="tantou">担当者 </label>
                    <select class="form-control  <?= (form_error('担当者') ? 'is-invalid' : ''); ?>" name="担当者" id="tantou">
                        <option value="" disabled selected>選び出す</option>
                        <option value="水上">水上</option>
                        <option value="新宮">新宮</option>
                        <option value="齋藤">齋藤</option>
                    </select>
                </div>
            </div>

            <!-- Equipment -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="setsubi">設備</label>
                    <select class="form-control <?= (form_error('設備') ? 'is-invalid' : ''); ?>" name="設備" id="setsubi">
                        <option value="" disabled selected>選び出す</option>
                        <option value="プレス">プレス</option>
                        <option value="洗浄機">洗浄機</option>
                        <option value="塗装設備">塗装設備</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label" for="gouki">号機 </label>
                    <select class="form-control <?= (form_error('号機') ? 'is-invalid' : ''); ?>" name="号機" id="gouki">
                        <option value="" disabled selected>選び出す</option>
                        <option value="1号機">1号機</option>
                        <option value="2号機">2号機</option>
                        <option value="3号機">3号機</option>
                    </select>
                </div>
            </div>
            <!-- process & fix time -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="kouteiNa">工程名・工程機能</label>
                    <input class="form-control <?= (form_error('工程名・工程機能') ? 'is-invalid' : ''); ?>" type="text" name="工程名・工程機能" id="kouteiNa" value="<?php echo set_value('工程名・工程機能'); ?>">
                </div>
                <div class="col">
                    <label class="form-label" for="shuriJikan">修理所要時間</label>
                    <input class="form-control <?= (form_error('修理所要時間') ? 'is-invalid' : ''); ?>" type="text" name="修理所要時間" id="shuriJikan" value="<?php echo set_value('修理所要時間'); ?>">
                </div>
            </div>

            <!-- mode & classification -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="mode">故障モード</label>
                    <input class="form-control <?= (form_error('故障モード') ? 'is-invalid' : ''); ?>" type="text" name="故障モード" id="mode" value="<?php echo set_value('故障モード'); ?>">
                </div>
                <div class="col">
                    <label class="form-label" for="kubun">区分</label>
                    <input class="form-control <?= (form_error('区分') ? 'is-invalid' : ''); ?>" type="text" name="区分" id="kubun" value="<?php echo set_value('区分'); ?>">
                </div>
            </div>

            <!-- TEXT AREA -->
            <div class="row">
                <div class="col">
                    <label class="form-label" for="gensho">現象・不具合要因詳細</label>
                    <textarea class="form-control <?= (form_error('現象・不具合要因詳細') ? 'is-invalid' : ''); ?>" name="現象・不具合要因詳細" id="gensho" cols="30" rows="10"><?php echo set_value('現象・不具合要因詳細'); ?></textarea >
                </div>
                <div class="col">
                    <label class="form-label" for="shuriNaiyou">修理内容</label>
                    <textarea class="form-control <?= (form_error('修理内容') ? 'is-invalid' : ''); ?>" name="修理内容" id="shuriNaiyou" cols="30" rows="10"><?php echo set_value('修理内容'); ?></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label" for="taisaku">対策</label>
                    <textarea class="form-control <?= (form_error('対策') ? 'is-invalid' : ''); ?>" name="対策" id="taisaku" cols="30" rows="5"><?php echo set_value('対策'); ?></textarea>
                </div>

                <div class="col">
                    <label class="form-label" for="taisakusho">対策書</label>
                    <input class="form-control mb-2 <?= (form_error('対策書') ? 'is-invalid' : ''); ?>" type="file" name="対策書" id="taisakusho" value="<?php echo set_value('対策書'); ?>">

                    <span>FMEA</span>
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="0" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        不要
                    </label>


                    <input class="form-check-input" type="radio" name="flexRadioDefault" value="1" id="flexRadioDefault1">
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
                <textarea class="form-control <?= (form_error('故障の影響') ? 'is-invalid' : ''); ?>" name="故障の影響" id="detail" cols="30" rows="10"><?php echo set_value('故障の影響'); ?></textarea>
            </div>
            <div class="col">
                <label class="form-label" for="shuriJikan">ライン停止の可能性</label>
                <input class="form-control <?= (form_error('ライン停止の可能性') ? 'is-invalid' : ''); ?>" type="text" name="ライン停止の可能性" value="<?php echo set_value('ライン停止の可能性'); ?>">

                <label class="form-label" for="shuriJikan">特 殊 特性等</label>
                <input class="form-control <?= (form_error('特殊特性等') ? 'is-invalid' : ''); ?>" type="text" name="特殊特性等" value="<?php echo set_value('特殊特性等'); ?>">
            </div>
        </div>


        <p class=" position-relative" style="top: 30px; left: 40px; background-color: #c4c4c4; width: max-content;">
            &nbsp;現在の工程管理&nbsp;</p>
        <div class="row border border-dark rounded mx-1 pt-3 pb-3">
            <div class="col-6">
                <label class="form-label" for="shuriJikan">予防</label>
                <input class="form-control <?= (form_error('予防') ? 'is-invalid' : ''); ?>" type="text" name="予防" value="<?php echo set_value('予防'); ?>">
            </div>

            <div class="col-3">
                <label class="form-label" for="shuriJikan">周期</label>
                <input class="form-control <?= (form_error('周期') ? 'is-invalid' : ''); ?>" type="text" name="周期" value="<?php echo set_value('周期'); ?>">
            </div>

            <div class="col-3">
                <label class="form-label" for="shuriJikan">月</label>
                <input class="form-control  <?= (form_error('月') ? 'is-invalid' : ''); ?>" type="text" name="月" value="<?php echo set_value('月'); ?>">
            </div>


            <div class="col-6">
                <label class="form-label" for="shuriJikan">検出</label>
                <input class="form-control <?= (form_error('検出') ? 'is-invalid' : ''); ?>" type="text" name="検出" value="<?php echo set_value('検出'); ?>">
            </div>



        </div>

        <div class="row">
            <div class="col-6">
                <label class="form-label" for="detail">対策案</label>
                <textarea class="form-control <?= (form_error('対策案') ? 'is-invalid' : ''); ?>" name="対策案" id="detail" cols="30" rows="10" ><?php echo set_value('対策案'); ?></textarea>
            </div>
            <div class="col-3">
                <label class="form-label" for="shuriJikan">担当者日程</label>
                <input class="form-control <?= (form_error('担当者日程') ? 'is-invalid' : ''); ?>" type="text" name="担当者日程" value="<?php echo set_value('担当者日程'); ?>"> 
            </div>
            <div class="col-3">
                <label class="form-label" for="shuriJikan">対応・処置</label>
                <input class="form-control <?= (form_error('対応処置') ? 'is-invalid' : ''); ?>" type="text" name="対応処置" value="<?php echo set_value('対応処置'); ?>">
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
            
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="text-center emptyTab">
                    <span>EMPTY</span>
                </td>
            </tr>
        </tfoot>
    </table>

    <!-- Button -->
    <div class="row p-3">
        <div class="col-6 mb-2">
            <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#partsSelect"><span>部品</span></button>
            <input type="submit" name="add_trouble" class="btn btn-secondary" value="登録">


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

        if ($('input[name=flexRadioDefault]').val() == 0) {
                $('#fmea_Form').hide();
                $('#equipForm').attr('action', '/equipment/1');
            } else {
                $('#fmea_Form').show();
                $('#equipForm').attr('action', '/equipment/2');
            }

        $('input[name=flexRadioDefault]').change(function() {
            var val = $(this).val()
            if (val == 0) {
                $('#fmea_Form').hide();
                $('#equipForm').attr('action', '/equipment/1');
            } else {
                $('#fmea_Form').show();
                $('#equipForm').attr('action', '/equipment/2');
            }


        })

    })
</script>