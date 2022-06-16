<div class="modal fade" id="fmeaLite" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FMEA選ぶの画面</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


            </div>
            <div class="modal-body">
                <div class="col-12">

                    <label for="recipient-name" class="col-form-label">部署</label>
                    <select class="form-control" name="" id="">
                        <option value="" selected>Default</option>
                    </select>


                </div>
                <div class="mb-3">
                    <div id="fmeaUpper"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#fmeaLite').on('show.bs.modal', function(event) {
        $.ajax({
            url: "<?= base_url(); ?>dashboard/get_troubleList_fmea_lite",

            success: function(response) {
                $("#fmeaUpper").html(response)

            }
        })
    })
</script>