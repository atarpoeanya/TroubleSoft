<div class="h-100 d-flex flex-column align-items-center justify-content-center">
    <div>
        <div class="p-2 flex-row"><button class="btn btn-secondary" type="button" id="mainButton" onclick="location.href='<?= base_url(); ?>equipment'">設備・工程</button></div>
        <div class="p-2 flex-row"><button class="btn btn-secondary" type="button" id="mainButton" onclick="location.href='<?= base_url(); ?>product'">製品</button></div>
    </div>
</div>

<style>
    #mainButton {
        width: auto;
        min-width: 20vw;
        min-height: 8vh;
        /* max-width: 25rem; */
        margin: 2rem;
        font-size: 5vh;
    }
</style>