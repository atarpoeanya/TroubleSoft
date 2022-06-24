<div class="modal kanjifont" id="partsSelect" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">予備品</h5>
            </div>

            <div class="modal-body bg-light" id="partBody">
                <div id="upper"></div>
                <div id="lower">
                    <table>
                        <tbody id="sendhere"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> <?= $this->data['CANCEL_BUTTON'] ?></button>
                <a id="insertTool" class="btn btn-primary" data-bs-dismiss="modal"> <?= $this->data['SUBMIT_BUTTON'] ?></a>

            </div>
        </div>
    </div>
</div>

<script>
  
</script>