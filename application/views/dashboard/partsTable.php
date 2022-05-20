<br>
<script type="text/javascript">
    get_sparepart_list();
</script>
<div class="container col-8 kanjifont" id="mainForm" >
    <br>
    <h1>予備品リスト</h1>
    <br>
    <div class="col">
        <div id="spare_part_list"></div>

        <div class="d-flex justify-content-end text-nowrap mt-3">
            <div class="ms-2"><button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addPartsModal"><span>足す</span></button></div>
            <div class="ms-2"><button class="btn btn-danger"><span>削除</span></button></div>
        </div>
    </div>
    <br>
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

    th,
    td {
        background-color: #04AA6D;
        color: #858796;
        font-size: 18px;
    }
</style>
