<div class="modal kanjifont" id="addPartsModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">予備品</h5>
            </div>

            <div class="modal-body bg-light">
                <form action="" id="form-parts" method="post" class="needs-validation" novalidate autocomplete="off">
                    <div class="row d-flex justify-content-evenly text-nowrap">
                        <div class="row">

                            <div class="col pt-3">
                                <label class="form-label" for="purchaseDate"><?= $this->data['PURCHASE_DATE']?></label>
                                <input class="form-control" type="date" name="購入日" id="purchaseDate" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col pt-3">
                                <label class="form-label" for="partName"><?= $this->data['PARTS_NAME']?></label>
                                <input class="form-control" type="text" name="部品名" id="partName" required>
                            </div>
                            <div class="col pt-3">
                                <label class="form-label" for="model"><?= $this->data['MODEL']?></label>
                                <input class="form-control " type="text" name="型式" id="model" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col pt-3">
                                <label class="form-label " for="maker"><?= $this->data['MAKER_NAME']?></label>
                                <input class="form-control " type="text" name="メーカー名" id="maker" required>
                            </div>
                            <div class="col pt-3">
                                <label class="form-label" for="quantity"><?= $this->data['QUANTITY']?></label>
                                <input class="form-control " type="number" name="数量" id="quantity" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col pt-3">
                                <label class="form-label" for="price"><?= $this->data['PRICE']?></label>
                                <input class="form-control " type="number" name="金額" id="price" required>
                            </div>
                            <div class="col pt-3">
                                <label class="form-label" for="unit"><?= $this->data['UNIT']?></label>
                                <input class="form-control " type="text" name="単位" id="unit" required>
                            </div>
                            <div class="col pt-3">
                                <label class="form-label" for="unit"><?= $this->data['STORAGE']?></label>
                                <input class="form-control " type="text" name="単位" id="storage" required>
                            </div>
                            <div class="col pt-3">
                                <label class="form-label" for="unit"><?= $this->data['ARRANGEMENT']?></label>
                                <input class="form-control " type="text" name="単位" id="arra" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->data['CANCEL_BUTTON']?></button>
                <button  type="submit" name="add_sparepart" form="form-parts" class="btn btn-primary" onclick="addSpare()"><?= $this->data['SUBMIT_BUTTON']?></button>

            </div>
            </form>
        </div>
        <div id="alert-msg"></div>
    </div>
</div>
<script>
      $('input').on('click', function name(params) {
    $(this).removeClass('is-invalid')
   })
   $('#addPartsModal').on('hidden.bs.modal', function (e) {
       $('input').removeClass('is-invalid');
       $('input').val('')


   })
</script>