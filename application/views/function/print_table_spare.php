<?php
function f_generate_table_select($data)
{
?>
    <div class="sticky-top mb-2"><input class="sticky-top form-control" type="text" id="table_input" onkeyup="search_all_function()" placeholder="Search"></div>
    <div class="table-responsive table-wrapper table-wrapper-scroll">
        <table class="table table-striped table-hover" id="gen_table">
            <thead>
                <tr>
                    <?php
                    foreach ($data['title'] as $thead) {
                    ?>
                        <th class="kanjifont table-head text-center border-right border-left">
                            <?= $thead ?>
                        </th>

                    <?php

                    }
                    ?>

                    <th class="button_column" style="display:none"></th>
                </tr>
            </thead>
            <tbody>
                <?php


                foreach ($data['sparePart'] as $item) {
                ?>

                    <tr>
                        <?php
                        foreach ($item as $key => $value) {
                            if ($key == 'c_t202_id'){
                                $id = $value;
                        ?>

                            <td onclick="view_record()" class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3 ID">
                                <?= $id ?>
                            </td>
                        <?php 
                        } else {
                        ?>
                            <td onclick="view_record()" class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-3">
                                <?= $value ?>
                            </td>

                        <?php
                        }
                        }
                        ?>
                        <td class="kanjifont table-data text-center align-middle border-right border-left pointer col-md-2 button_column text-nowrap" style="display: none;">
                            <a class="btn-block btn btn-primary modify-button" onclick="edit_form()">更新</a>
                            <a class="btn-block btn btn-danger modify-button" onclick="event.cancelBubble=true;deleteData(<?=$item->c_t202_id?>,'spareparts')">削除</a>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

<?php
}
?>
<style>


</style>