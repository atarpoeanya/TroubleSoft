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
                array_push($head_name, '部品');
                break;
            case 'c_model':
                array_push($head_name, '型式');
                break;
            case 'c_maker':
                array_push($head_name, 'メーカー');
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
    <div class="d-flex p-2 border-bottom">
            <div class="my-auto">件数 :&nbsp;</div>
            <div class="my-auto" id="amount-sum"><b><?= count($data['sparePart']) ?></b></div>
        </div>


        <table class="table table-striped table-hover text-nowrap" id="gen_table">
            <thead>
                <tr id="search-bar-spare">
                </tr>
                <tr class="border-bottom border-dark">
                    <?php
                    foreach ($head_name as $thead) {
                        if ($thead !== '部品NO') {
                    ?>
                            <th class=" table-head text-center  border-end">
                                <?= $thead ?>
                            </th>

                        <?php

                        } else {
                        ?>
                            <th class="id text-center  border-end" style="display:none"></th>
                    <?php
                        }
                    }
                    ?>
                    <th class="button_column text-center  border-end" style="display:none;max-width:150px;width:150px;"></th>
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

                                <td class=" table-data text-center align-middle border-end  pointer col ID" style="display:none">
                                    <?= $id ?>
                                </td>
                            <?php
                            } elseif ($key == 'c_quantity') {
                            ?>
                                <td class=" table-data text-center align-middle border-end  pointer col amount">
                                    <?= $value ?>
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
                        <td class=" table-data text-center align-middle pointer col-md-2 button_column text-nowrap" style="display: none;max-width:150px;width:150px;">
                            <a class="btn-block btn btn-primary modify-button" onclick="editSpare_populate(this)"><?= $data['UPDATE_BUTTON'] ?></a>
                            
                            <a class="btn-block btn btn-danger modify-button delete" onclick="event.cancelBubble=true; deleteData_sparepart(<?= $item->c_t202_id ?>)"><?= $data['DELETE_BUTTON'] ?></a>
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
            $amount = $(this).find("td:eq(5)").text().trim();
            if ($amount == 0) {
                $(this).addClass('bg-warning')
                $(this).find("td:eq(5)").addClass('bg-danger')
            }
        })
    })
</script>