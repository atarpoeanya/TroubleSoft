<?php
function f_generate_table_select($data)
{
    $head_name = [];
    // ew
    foreach ($data['title'] as $value) {
        switch ($value) {
            case 'c_t202_id':
                array_push($head_name, '部品NO');
                break;
            case 'c_purchaseDate':
                array_push($head_name, '購入日');
                break;
            case 'c_department':
                array_push($head_name, '部署');
                break;
            case 'c_placement':
                array_push($head_name, '使用箇所');
                break;
            case 'c_partName':
                array_push($head_name, '部品名');
                break;
            case 'c_model':
                array_push($head_name, '型式');
                break;
            case 'c_maker':
                array_push($head_name, 'メーカー名');
                break;
            case 'c_quantity':
                array_push($head_name, '数量');
                break;
            case 'c_unit':
                array_push($head_name, '単位');
                break;
            case 'c_price':
                array_push($head_name, '単価');
                break;
            case 'c_storage':
                array_push($head_name, '保管場所');
                break;
            case 'c_arrangement':
                array_push($head_name, '手配先');
                break;

            default:
                array_push($head_name, 'MISSING');
                break;
        }
    }

?>

    <div class="table-responsive table-wrapper border">
        <div class="d-flex p-2 border-bottom">件数:&nbsp; <div id="amount-sum"><b><?= count($data['sparePart']) ?></b></div>
        </div>


        <table class="table table-striped table-hover m-0 text-nowrap" id="gen_table">
            <thead>
                <tr>
                    <div class="p-1 my-2 border-bottom">
                        <input class="form-control" type="text" id="search-bar" placeholder="Search">
                    </div>
                </tr>
                <tr class="border-bottom border-dark bg-light">
                    <?php
                    foreach ($head_name as $thead) {
                    ?>
                        <th class=" table-head text-center border-start">
                            <?= $thead ?>
                        </th>

                    <?php

                    }
                    ?>

                    <th class="button_column text-center border-start" style="display:none"></th>
                </tr>
            </thead>
            <tbody>
                <?php


                foreach ($data['sparePart'] as $item) {
                ?>

                    <tr class="data-row">
                        <?php
                        foreach ($item as $key => $value) {
                            if ($key == 'c_t202_id') {
                                $id = $value;
                        ?>

                                <td class=" table-data text-center align-middle border-end  pointer col ID">
                                    <?= $id ?>
                                </td>
                            <?php
                            } else {
                            ?>
                                <td class=" table-data text-center align-middle border-end  pointer col">
                                    <?= $value ?>
                                </td>

                        <?php
                            }
                        }
                        ?>
                        <td class=" table-data text-center align-middle border-right border-left pointer col-md-2 button_column text-nowrap" style="display: none;">
                            <a class="btn-block btn btn-primary modify-button" onclick="editSpare_populate(this)"><?= $data['UPDATE_BUTTON']?></a>
                            <a class="btn-block btn btn-danger modify-button" onclick="event.cancelBubble=true;deleteData_sparepart(<?= $item->c_t202_id ?>)"><?= $data['DELETE_BUTTON']?></a>
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
    .pointer:hover {
        cursor: pointer;
    }

    .table-wrapper {
        background: #fff;
        border-radius: 5px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-head {
        background-color: #fff;
        box-shadow: 10px 5px rgba(0, 0, 0, .05);
        width: 800px;
    }

    div.dataTables_wrapper {
        width: 100%;
    }


</style>

<script>
    $(document).ready(function() {
        $('#gen_table tbody').find('tr').each(function() {
            // debugger;
            $amount = $(this).find("td:eq(7)").text().trim();
            if ($amount == 0)
                $(this).addClass('bg-warning')
        })
    })
</script>