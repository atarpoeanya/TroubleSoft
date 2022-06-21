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

                            <div class="col">
                                <label class="form-label" for="purchaseDate">購入日</label>
                                <input class="form-control" type="date" name="購入日" id="purchaseDate" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="partName">部品名</label>
                                <input class="form-control" type="text" name="部品名" id="partName" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="model">型式</label>
                                <input class="form-control " type="text" name="型式" id="model" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label " for="maker">メーカー名</label>
                                <input class="form-control " type="text" name="メーカー名" id="maker" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="quantity">数量</label>
                                <input class="form-control " type="number" name="数量" id="quantity" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="price">金額</label>
                                <input class="form-control " type="number" name="金額" id="price" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="unit">単位</label>
                                <input class="form-control " type="text" name="単位" id="unit" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="unit">stprage</label>
                                <input class="form-control " type="text" name="単位" id="storage" required>
                            </div>
                            <div class="col">
                                <label class="form-label" for="unit">Arra</label>
                                <input class="form-control " type="text" name="単位" id="arra" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                <input type="submit" name="add_sparepart" form="form-parts" class="btn btn-primary" onclick="addSpare()" value="足す">

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
       $('input').not(':last').val('')


   })
</script>