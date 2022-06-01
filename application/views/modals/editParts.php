<?php


?>

<div class="modal kanjifont" id="editPartsModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">予備品</h5>
            </div>

            <div class="modal-body bg-light">
                <form action="" id="form-parts-edit" method="post">
                    <div class="row d-flex justify-content-evenly text-nowrap needs-validation" novalidate>
                        <div class="row">
                            
                                <input type="hidden" name="部品NO_edit" id="partId_edit" value="<?=$spare->c_t202_id?>">
                            
                            <div class="col">
                                <label class="form-label" for="purchaseDate">購入日</label>
                                <input class="form-control" type="date" name="購入日_edit" id="purchaseDate_edit" value="<?=$spare->c_purchaseDate ?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="department">部署名</label>
                                <input class="form-control" type="text" name="部署名_edit" id="department_edit" value="<?=$spare->c_department ?>"
                                required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="placement">使用箇所</label>
                                <input class="form-control" type="text" name="使用箇所_edit" id="placement_edit" value="<?=$spare->c_placement ?>" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="partName">部品名</label>
                                <input class="form-control" type="text" name="部品名_edit" id="partName_edit" value="<?=$spare->c_partName ?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="model">型式</label>
                                <input class="form-control" type="text" name="型式_edit" id="model_edit" value="<?=$spare->c_model?>" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label " for="maker">メーカー名</label>
                                <input class="form-control" type="text" name="メーカー名_edit" id="maker_edit" value="<?=$spare->c_maker?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="quantity">数量</label>
                                <input class="form-control" type="text" name="数量_edit" id="quantity_edit" value="<?=$spare->c_quantity?>"  required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="price">金額</label>
                                <input class="form-control" type="text" name="金額_edit" id="price_edit" value="<?=$spare->c_price?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="unit">単位</label>
                                <input class="form-control" type="text" name="単位_edit" id="unit_edit" value="<?=$spare->c_unit?>" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <input type="submit" name="edit_sparepart" form="form-parts" class="btn btn-primary" value="足す"> -->
                <!-- <button class="btn btn-primary" type="submit" onclick="editSpare()">足す</button> -->
                <input type="submit" name="edit_sapre" form="form-parts" class="btn btn-primary" onclick="editSpare()" value="足す">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
            <div id="alert-msg"></div>
        </div>
    </div>
</div>

<script>
     $('input').on('click', function name(params) {
    $(this).removeClass('is-invalid')
   })
    $('#editPartsModal').on('hidden.bs.modal', function() {
        $('#modalPlaceHolder').empty()
    })
</script>