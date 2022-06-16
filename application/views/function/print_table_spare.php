<?php
function f_generate_table_select($data)
{
    $head_name = [];
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
                array_push($head_name, '金額');
                break;
            case 'c_storage':
                array_push($head_name, '予備品の保管場所');
                break;
            case 'c_arrangement':
                array_push($head_name, '必要時の手配先');
                break;

            default:
                array_push($head_name, 'MISSING');
                break;
        }
    }

?>
    <div class="sticky-top mb-2"><input class="sticky-top form-control" type="text" id="table_input" oninput="search_all_function()" placeholder="Search"></div>
    <div class="table-responsive table-wrapper table-wrapper-scroll">
        <table class="table table-striped table-hover" id="gen_table">
            <thead>
                <tr>
                    <?php
                    foreach ($head_name as $thead) {
                    ?>
                        <th class=" table-head text-center border-right border-left">
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
                            if ($key == 'c_t202_id') {
                                $id = $value;
                        ?>

                                <td class=" table-data text-center align-middle border-right border-left pointer col ID">
                                    <?= $id ?>
                                </td>
                            <?php
                            } else {
                            ?>
                                <td class=" table-data text-center align-middle border-right border-left pointer col">
                                    <?= $value ?>
                                </td>

                        <?php
                            }
                        }
                        ?>
                        <td class=" table-data text-center align-middle border-right border-left pointer col-md-2 button_column text-nowrap" style="display: none;">
                            <a class="btn-block btn btn-primary modify-button" onclick="editSpare_populate(this)">更新</a>
                            <a class="btn-block btn btn-danger modify-button" onclick="event.cancelBubble=true;deleteData(<?= $item->c_t202_id ?>,'spareparts')">削除</a>
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
    $(document).ready(function() {
        $('#gen_table tbody').find('tr').each(function() {
            // debugger;
            $amount = $(this).find("td:eq(7)").text().trim();
            if($amount == 0)
                $(this).addClass('bg-warning')
        })
    })
</script>