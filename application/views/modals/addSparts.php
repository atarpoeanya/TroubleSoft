<div class="modal kanjifont" id="addPartsModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">予備品</h5>
            </div>

            <div class="modal-body bg-light">
                <form action="" id="form-parts" method="post">
                    <div class="row d-flex justify-content-evenly text-nowrap">
                        <div class="row">
                            <!-- <div class="col">
                                <label class="form-label" for="partId">部品NO</label>
                                <input class="form-control" type="text" name="部品NO" id="partId">
                            </div> -->
                            <div class="col">
                                <label class="form-label" for="purchaseDate">購入日</label>
                                <input class="form-control" type="date" name="購入日" id="purchaseDate">
                            </div>
                            <div class="col">
                                <label class="form-label" for="department">部署名</label>
                                <input class="form-control" type="text" name="部署名" id="department">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="buyer">購入者</label>
                                <input class="form-control" type="text" name="購入者" id="buyer">
                            </div>
                            <div class="col">
                                <label class="form-label" for="placement">使用箇所</label>
                                <input class="form-control" type="text" name="使用箇所" id="placement">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="partName">部品名</label>
                                <input class="form-control" type="text" name="部品名" id="partName">
                            </div>
                            <div class="col">
                                <label class="form-label" for="model">型式</label>
                                <input class="form-control" type="text" name="型式" id="model">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label " for="maker">メーカー名</label>
                                <input class="form-control" type="text" name="メーカー名" id="maker">
                            </div>
                            <div class="col">
                                <label class="form-label" for="quantity">数量</label>
                                <input class="form-control" type="text" name="数量" id="quantity">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for="price">金額</label>
                                <input class="form-control" type="text" name="金額" id="price">
                            </div>
                            <div class="col">
                                <label class="form-label" for="unit">単位</label>
                                <input class="form-control" type="text" name="単位" id="unit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="submit" name="add_sparepart" form="form-parts" class="btn btn-primary" value="足す">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>