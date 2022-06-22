<main class="container p-sm-2">
<div class="container mt-4">
    <div class="btn-group switch-field text-nowrap">
        <a onclick="buttonSwitch(this);category_switcher(this)" class="btn btn-outline-secondary active topper" aria-current="page">設備</a>
        <a onclick="buttonSwitch(this);category_switcher(this)" class="btn  btn-outline-secondary topper bg-white">品質</a>
        <a onclick="buttonSwitch(this);category_switcher(this)" class="btn  btn-outline-secondary topper bg-white">予備品</a>
    </div>
</div>
</div>
<div class="container">
    <div class="kanjifont  d-flex flex-column" id="dashboard">
    
        <div class="row pt-3 ps-3">
            <div class="col-lg-9 col-md-8 mb-2">
    
                <div class="btn-group switch-field text-nowrap">
                    <a id="real" onclick="buttonSwitch(this);get_troubleList()" class="btn btn-outline-secondary bottm active" aria-current="page">実</a>
                    <a id="fmea-s"  onclick="buttonSwitch(this);get_troubleList_fmea()" class="btn  btn-outline-secondary bottm bg-white">FMEA</a>
                </div>
                <!-- <h1>HELLO</h1> -->
            </div>
            <div class="col-lg-3 col-md">
    
                <div class="">
                    <a href="<?= base_url() ?>as" class=" btn btn-success text-nowrap" id="new_trouble">新しトラブル</a>
                    <button class="m-1 btn btn-success text-nowrap" id="new_spareparts" onclick="" data-bs-toggle="modal" data-bs-target="#addPartsModal" style="display: none;">新し予備品</button>
                    <a onclick="show_button()" class=" btn btn-primary text-nowrap" id="update_trouble">変更</a>
                </div>
    
            </div>
        </div>
    
    
    
        <div class="row p-3 ">
            <div id="list" class="overflow-hidden"></div>
        </div>
        <div id="modalPlaceHolder"></div>
    </div>
</div>

<script>
    function buttonSwitch(el) {
        $(el).siblings().removeClass('active')
        $(el).addClass('active')

        $(el).siblings().addClass('bg-white')
        $(el).removeClass('bg-white')
    }
</script>

<style>
    body {
        background-color: #F5F5F5
    }

    .switch-field a {
        padding-left: 2rem;
        padding-right: 2rem;

    }
    .topper {
        border-radius: 10px 10px 0px 0px/ 10px;
        padding: 0;
        padding-top: 2px;
        height: 30px;
    }

    .btn.active{
        background-color: #1B3384;
        box-shadow: 4px 0px 8px -1px rgba(0,0,0,0.5);
    }

    .btn-outline-secondary:not(.active):hover {
    color: lightgrey;
    filter: brightness(85%);
}


    .dataTables_filter {
        display: none;
    }

    #dashboard {
        background-color: white;
        border-radius: 5px;
        height: calc(100% - 200px) !important;
    }


</style>
</main>