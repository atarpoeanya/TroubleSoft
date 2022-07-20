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
                    <!-- <th class=" table-head text-center ID" hidden> -->
                    <!-- </th> -->
                    <th></th>
                    <?php
                    foreach ($data['title'] as $thead) {

                    ?>
                        <th class=" table-head text-center "><?= $thead ?></th>

                    <?php

                    }
                    ?>

                    <!-- <th class="button_column buttons table-head text-center border-end table-light;"></th -->
                    <th></th>

                </tr>

                <tr id="search-bar"></tr>
            </thead>

            <tbody>

                <?php


                foreach ($data['tool_Fmea'] as $item) {

                ?>
                    <tr>
                        <td class=" table-data text-center align-middle  pointer col ID" hidden>
                            <?= $item->c_t203_id ?>
                        </td>

                        <td class=" table-data text-center align-middle  pointer col">
                            <?= $item->c_facility ?>
                        </td>
                        <td class=" table-data text-center align-middle  pointer col">
                            <?= $item->c_processName ?>
                        </td>
                        <td class=" table-data text-center align-middle  pointer col">
                            <?= $item->c_failMode ?>
                        </td>

                        <td class=" table-data text-center align-middle  pointer col button_column text-nowrap">
                            <a class="btn btn-primary buttons" data-bs-dismiss="modal"><?= $data['SUBMIT_BUTTON'] ?></a>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>

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

    .text-nowrap {
        white-space: nowrap;
    }
</style>

<script>
    $('.buttons').on('click', function() {
        $id = $(this).parent().siblings('.ID').html().trim()

        $.ajax({
            url: "<?= base_url(); ?>dashboard/fmea_tool_print/" + $id,

            success: function(response) {
                $("#fmea_place").html(response);
                $('#fmea_id').val($id)




            },

        })
    })
</script>