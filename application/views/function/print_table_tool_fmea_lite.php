<?php
function f_generate_table_select($data)
{
    // print_r($data['tool_Fmea'][0]->c_t203_id)
    // if($data == "x"){
?>
    <div class="">

        <table class="table table-striped table-hover" id="trouble_fmea_table_lite">
            <thead class="table-light">
                <tr>
                    <th></th>
                    <?php
                    foreach ($data['title'] as $thead) {
                    ?>
                        <th class=" table-head text-center "><?= $thead ?></th>
                    <?php
                    }
                    ?>
                    <th></th>
                </tr>
                <tr id="search-bar"></tr>
            </thead>
        </table>
    </div>

<?php
    // }
}
?>
<style>
    .pointer:hover {
        cursor: pointer;
    }

    .table-title {
        background: #435d7d;
        color: #fff;
        padding: 6px 6px;
        border-radius: 3px 3px 0 0;
    }

    .table-wrapper {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-wrapper-scrolls {
        width: auto;
        height: 70vh;
        overflow-y: scroll;

    }
</style>