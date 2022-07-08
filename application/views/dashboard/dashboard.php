<main class="container-fluid p-2 mb-4">
    <div class="container-fluid">
        <div class="btn-group switch-field text-nowrap">
            <a name="設備" onclick="buttonSwitch(this);category_switcher(this)" class="btn btn-white active topper" aria-current="page"><?= $this->data['RADIO_A_EQUIPMENT'] ?></a>
            <a name="品質" onclick="buttonSwitch(this);category_switcher(this)" class="btn  btn-white topper bg-white disabled"><?= $this->data['RADIO_A_PRODUCT'] ?></a>
            <a name="予備品" onclick="buttonSwitch(this);category_switcher(this)" class="btn  btn-white topper bg-white"><?= $this->data['RADIO_A_SPARE'] ?></a>
        </div>
    </div>
    </div>
    <div class="container-fluid" style="height: 100%;" id="main-content">
        <div class="d-flex flex-column" style="height:100%;" id="dashboard" >

            <div class="row py-3 px-3">
                <div class="col-lg-9 col-md-8 mb-2">

                    <div class="btn-group switch-field text-nowrap">
                        <a id="real" onclick="buttonSwitch(this);get_troubleList();$('#new_trouble').attr('href', '<?= base_url() ?>equipment')" class="btn btn-outline-secondary bottm active" aria-current="page"><?= $this->data['RADIO_B_REAL'] ?></a>

                        <a id="fmea-s" onclick="buttonSwitch(this);get_troubleList_fmea();$('#new_trouble').attr('href', '<?= base_url() ?>equipment_fmea')" class="btn  btn-outline-secondary bottm bg-white"><?= $this->data['RADIO_B_FMEA'] ?></a>
                    </div>


                    <a href="<?= base_url(); ?>dashboard/all_fmea_list" id="fmea-s" class="btn btn-primary">FMEA一覧表</a>
                </div>
                <div class="col-lg-3 col-md">

                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url() ?>equipment" class="me-1 btn btn-success text-nowrap" id="new_trouble"><?= $this->data['INSERT_BUTTON_TROUBLE'] ?></a>

                        <button class="me-1 btn btn-success text-nowrap" id="new_spareparts" onclick="" data-bs-toggle="modal" data-bs-target="#addPartsModal" style="display: none;"><?= $this->data['INSERT_BUTTON_SPARE'] ?></button>

                        <button onclick="show_button()" class=" btn btn-primary text-nowrap" id="update_trouble"><?= $this->data['UPDATE_BUTTON'] ?></button>
                    </div>

                </div>
            </div>


            <!-- Table goes here -->
            <div class="row px-3" id="list-wrapper">
                <div class="container-fluid" id="list"></div>
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
            background-color: #F5F5F5;
            min-height: 450px;
            
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

        .btn.active {
            background-color: #1B3384;
            color: white;
            box-shadow: 4px 0px 8px -1px rgba(0, 0, 0, 0.5);
        }

        .btn-outline-secondary:not(.active):hover {
            color: lightgrey;
            filter: brightness(85%);
        }

        main {
            min-width: 0;
            min-height: 450px;
        }

        #dashboard {
            background-color: white;
            border-radius: 5px;
            min-height: 400px;
            /* height: calc(100% - 50px) !important;
             */
        }

        .table-data {
            height: 40px;
        }

        .dataTables_wrapper .dataTables_scroll div.dataTables_scrollBody {
            overflow-y: scroll !important;
            min-height: 200px;
        }
    </style>
</main>