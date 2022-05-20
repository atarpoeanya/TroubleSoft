


<div class="container kanjifont mt-4 d-flex flex-column" id="dashboard">

    <div class="row my-2 pt-3 ps-3">
        <div class="col-lg-9 col-md-11 mb-2">

            <div class="btn-group switch-field text-nowrap">
                <a onclick="buttonSwitch(this);get_troubleList()" class="btn btn-block btn-outline-primary active" aria-current="page">設備トラブルリースト</a>
                <a onclick="buttonSwitch(this);get_troubleList()" class="btn btn-block btn-outline-secondary">品質トラブルリースト</a>
                <a onclick="buttonSwitch(this);get_sparepartlist()" class="btn btn-block btn-outline-secondary">予備品リスト</a>
            </div>
        </div>
        <div class="col-lg-3 col-md">

            <div class="">
                <a href="<?= base_url() ?>as" class=" btn btn-success text-nowrap" id="new_trouble">新しトラブル</a>
                <button class="m-1 btn btn-success text-nowrap" id="new_spareparts" onclick="" data-bs-toggle="modal" data-bs-target="#addPartsModal" style="display: none;">新し予備品</button>
                <a onclick="show_button()" class=" btn btn-primary text-nowrap" id="update_trouble">変更</a>
            </div>

        </div>
    </div>

    
    
    <div class="row py-2">
        <div id="trouble_list"></div>
        <div id="spare_part_list"></div>
    </div>

</div>

<script>
    function buttonSwitch (el){
        $(el).siblings().removeClass('active')
        $(el).siblings().removeClass('btn-outline-primary')
        $(el).siblings().addClass('btn-outline-secondary')

        $(el).removeClass('btn-outline-secondary')
        $(el).addClass('btn-outline-primary')
        $(el).addClass('active')
    }
</script>

<style>
    .switch-field a{
        padding-left: 2rem;
        padding-right: 2rem;

    }

/*
    

    .switch-field {
        background-color: #e4e4e4;
        color: rgba(0, 0, 0, 0.6);
        font-size: 15px;
        line-height: 1;
        text-align: center;
        padding: 8px 16px;
        margin-right: -1px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
        transition: all 0.1s ease-in-out;
         width: 20vw; 
    }
    */
     /* .switch-field a:not(.active) {
        cursor: pointer;
    } */

    /* .switch-field input:checked+label {
        background-color: #435d7d;
        color: white;
        box-shadow: none;
    }

    .switch-field label:first-of-type {
        border-radius: 4px 0 0 4px;
    }

    .switch-field label:last-of-type {
        border-radius: 0 4px 4px 0;
    }  */

    .kanjifont {
        font-family: BIZ UDGothic;
        size: 22;
    }

    .dataTables_filter {
        display: none;
    }

    #dashboard {
        background-color: #E5E5E5;
        border-radius: 5px;
        height: calc(100% - 200px) !important;
    }

    /* .column-search {} */
</style>