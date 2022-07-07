<div>
<nav class="navbar fixed-top" style="margin-left: 90%; width:130px;">
    <a class="btn btn-warning me-5" href='<?= base_url(); ?>'><?= $this->data['BACK_BUTTON'] ?></a>
    <!-- <div class="container-fluid justify-content-center">
    </div> -->

</nav>
    <div class="col-8 m-auto kanjifont">
        <label for="busho_fmea">
            <h5>部署名</h5>
        </label>
        <select class="form-select" onfocus="getAllFmeaList();" onchange="getAllFmeaList()" name="部署" id="busho_fmea" autofocus>
            <option value="全部" selected>全部</option>
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

    </div>
</div>