<div>
    <nav class="navbar fixed-top" style="margin-left: 90%; width:130px;">
        <a class="btn btn-warning me-5" href='<?= base_url(); ?>'><?= $this->data['BACK_BUTTON'] ?></a>
        <!-- <div class="container-fluid justify-content-center">
    </div> -->

    </nav>
    <div class="col-8 m-auto kanjifont select-bar">
        <label for="busho_fmea">
            <h5>部署名</h5>
        </label>
        <select class="form-select" onfocus="" onchange="" name="部署" id="busho_fmea" autofocus>
            <option value="" selected>全部</option>
            <option value="生技">生技</option>
            <option value="塗装">塗装</option>
            <option value="組付">組付</option>
            <option value="生管">生管</option>
            <option value="品証">品証</option>
            <option value="プレス・溶接">プレス・溶接</option>
            <option value="営業">営業</option>
            <option value="その他"><b>その他</b></option>
        </select>
    </div>
    <br>
    <div class="container-fluid" id="all_fmea_list">
        <table class="table table-sm table-striped-columns table-responsive " id="all_trouble_table">
            <thead class="table-dark">
                <tr>
                    <th></th>
                    <th>設備</th>
                    <th>号機</th>
                    <th>工程名・工程機能</th>
                    <th>故障モード</th>
                    <th>故障の影響</th>
                    <th>ライン停止の可能性</th>
                    <th>特殊特性等</th>
                    <th>故障の潜在原因メカニズム</th>
                    <th>予防</th>
                    <th>周期</th>
                    <th>月</th>
                    <th>検出</th>
                    <th>対策案</th>
                    <th>担当者日程</th>
                    <th>対策</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script>
    
    $(document).ready(function() {
        getAllFmeaList();
    })
    window.addEventListener('beforeprint', (event) => {
        $('header, nav, .select-bar').hide();
    });
    window.addEventListener('afterprint', (event) => {
        $('header, nav, .select-bar').show();
    });
</script>

<style>
    body {
        padding: 0;
    }
    #all_fmea_list {
        padding: 0;
        margin: 0;
    }
</style>