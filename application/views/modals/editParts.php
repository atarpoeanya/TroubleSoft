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
                    <div class="row d-flex justify-content-evenly text-nowrap needs-validation">
                        <div class="row">

                            <input type="hidden" name="部品NO_edit" id="partId_edit" value="<?= $spare->c_t202_id ?>">

                            <div class="col pt-3">
                                <label class="form-label" for="purchaseDate"><?= $this->data['PURCHASE_DATE'] ?></label>
                                <input class="form-control" type="date" name="購入日_edit" id="purchaseDate_edit" value="<?= $spare->c_purchaseDate ?>" required>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col pt-3">
                                    <label class="form-label" for="partName"><?= $this->data['PARTS_NAME'] ?></label>
                                    <input class="form-control" type="text" name="部品名_edit" id="partName_edit" value="<?= $spare->c_partName ?>" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="model"><?= $this->data['MODEL'] ?></label>
                                    <input class="form-control" type="text" name="型式_edit" id="model_edit" value="<?= $spare->c_model ?>" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col pt-3">
                                    <label class="form-label " for="maker"><?= $this->data['MAKER_NAME'] ?></label>
                                    <input class="form-control" type="text" name="メーカー名_edit" id="maker_edit" value="<?= $spare->c_maker ?>" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="quantity"><?= $this->data['QUANTITY'] ?></label>
                                    <input class="form-control" type="text" name="数量_edit" id="quantity_edit" value="<?= $spare->c_quantity ?>" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col pt-3">
                                    <label class="form-label" for="price"><?= $this->data['PRICE'] ?></label>
                                    <input class="form-control" type="text" name="金額_edit" id="price_edit" value="<?= $spare->c_price ?>" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="unit"><?= $this->data['UNIT'] ?></label>
                                    <input class="form-control" type="text" name="単位_edit" id="unit_edit" value="<?= $spare->c_unit ?>" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="unit"><?= $this->data['STORAGE'] ?></label>
                                    <input class="form-control " type="text" name="単位" id="storage" required>
                                </div>
                                <div class="col pt-3">
                                    <label class="form-label" for="unit"><?= $this->data['ARRANGEMENT'] ?></label>
                                    <input class="form-control " type="text" name="単位" id="arra" required>
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