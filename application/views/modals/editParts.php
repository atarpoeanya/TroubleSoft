<?php


?>

<div class="modal kanjifont" id="editPartsModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">予備品更新</h5>
            </div>

            <div class="modal-body bg-light">
                <form action="" id="form-parts-edit" method="post">
                    <div class="row d-flex justify-content-evenly text-nowrap needs-validation">
                        <div class="row">

                            <input type="hidden" name="部品NO_edit" id="partId_edit" value="<?= $spare->c_t202_id ?>">

                            <div class="col-6 pt-3">
                                <label class="form-label" for="purchaseDate_edit"><?= $this->data['PURCHASE_DATE'] ?></label>
                                <span class="must form-check-label">必須</span>
                                <input class="form-control" type="date" name="購入日_edit" id="purchaseDate_edit" value="<?= $spare->c_purchaseDate ?>" required>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col pt-3">
                                    <label class="form-label" for="partName_edit"><?= $this->data['PARTS_NAME'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <input class="form-control" type="text" name="部品名_edit" id="partName_edit" value="<?= $spare->c_partName ?>" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="model_edit"><?= $this->data['MODEL'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <input class="form-control" type="text" name="型式_edit" id="model_edit" value="<?= $spare->c_model ?>" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                
                                <div class="col pt-3">
                                    <label class="form-label" for="quantity_edit"><?= $this->data['QUANTITY'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <input class="form-control" type="number" name="数量_edit" id="quantity_edit" value="<?= floatval($spare->c_quantity) ?>" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="unit_edit"><?= $this->data['UNIT'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <input class="form-control" type="text" name="単位_edit" id="unit_edit" value="<?= $spare->c_unit ?>" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="price_edit"><?= $this->data['PRICE'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">￥</span>
                                        <input class="form-control" type="number" name="金額_edit" id="price_edit" value="<?= floatval($spare->c_price) ?>" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                            <div class="col-6 pt-3">
                                    <label class="form-label " for="maker_edit"><?= $this->data['MAKER_NAME'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <input class="form-control" type="text" name="メーカー名_edit" id="maker_edit" value="<?= $spare->c_maker ?>" required>
                                </div>
                                
                                <div class="col pt-3">
                                    <label class="form-label" for="storage_edit"><?= $this->data['STORAGE'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <input class="form-control " type="text" name="保管" id="storage_edit" value="<?= $spare->c_storage ?>" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="arra_edit"><?= $this->data['ARRANGEMENT'] ?></label>
                                    <span class="must form-check-label">必須</span>
                                    <input class="form-control " type="text" name="必要時" id="arra_edit" value="<?= $spare->c_arrangement ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">



                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->data['CANCEL_BUTTON'] ?></button>
                <button type="submit" name="edit_sapre" form="form-parts" class="btn btn-primary" onclick="editSpare()"><?= $this->data['UPDATE_BUTTON'] ?></button>
            </div>
            <!-- <div id="alert-msg"></div> -->
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