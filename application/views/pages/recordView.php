
<div class="container my-2 py-3 rounded main">
    <div class="container" id="headerRecord">
        <table class="table align-middle text-center table-borderless border border-dark">
            <thead>
                <th colspan="3" class="border-bottom border-dark ">
                    TROUBLE REPORT
                </th>
            </thead>
            <tbody class="table-light">
                <tr>

                    <td class="text-center" colspan="3">Label</td>
                </tr>
                <tr class="text-start align-middle">
                    <td>
                        <h4>
                          
                            <?= $item->c_t800_id ?>
                        </h4>
                    </td>
                    <td>
                        <h4>
                            <?= $item->c_processName ?>
                        </h4>
                    </td>
                    <td>
                        <h4>
                            <?= $item->c_failMode ?>
                        </h4>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>

    <div class="container" id="dateRecord">
        <table class="table align-middle text-center border border-dark">
            <thead class="table-light">
                <th>Day Occured</th>
                <th>Day fixed</th>
                <th>Time to fix</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?= $item->c_accidentDate ?>
                    </td>
                    <td>
                        <?= $item->c_repairDate ?>
                    </td>
                    <td>
                        <?= $item->c_repairTime ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="container" id="makerDetail">
        <table class="table align-middle text-center table-borderless border border-dark">
            <thead class="align-middle table-light border-bottom border-dark">
                <tr class="border border-dark">
                    <th class="border border-dark" colspan="2">Inspector</th>
                    <th class="border border-dark" rowspan="2">Problem Name</th>
                    <th rowspan="2">Problem Mode</th>
                </tr>
                <tr>
                    <th class="border border-dark">Inspector_name</th>
                    <th>Inspector-div</th>
                </tr>
            </thead>
            <tbody id="identity">



                <tr>
                    <td class="border border-dark">
                        <?= $item->c_manager ?>
                    </td>
                    <td>
                        <?= $item->c_department ?>
                    </td>
                    <td class="border border-dark">
                        <?= $item->c_processName ?>
                    </td>
                    <td>
                        <?= $item->c_failMode ?>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>

    <div class="container" id="measureDetail">
        <label for="cause">CAUSE</label>
        <div class="container border border-dark" id="cause">
            <p>
                <?= $item->c_phenomenon ?>
            </p>
        </div>

        <label for="measureTaken">MEASURE TAKEN</label>
        <div id="measureTaken" class="container border border-dark">
            <p>
                <?= $item->c_repairDet ?>
            </p>
        </div>


        <table class="table table-borderless">
            <tbody>
                <tr class="text-nowrap border-1"
                    style="border-color: rgb(236, 234, 234); background-color: rgb(236, 234, 234);">
                    <td class="ps-0" colspan="3"><label for="measure">MEASURE</label></td>
                    <td class="ps-0"> <label for="measureDoc">MEASURE DOC</label></td>
                </tr>


                <tr>

                    <td class="border border-dark" id="measure">
                        <p>
                            <?= $item->c_measures ?>
                        </p>
                    </td>
                    <td class="border-1"
                        style="background-color: rgb(236, 234, 234); border-color: rgb(236, 234, 234);"></td>
                    <td class="border-1"
                        style="background-color: rgb(236, 234, 234); border-color: rgb(236, 234, 234);"></td>
                    <td class="text-center align-middle justify-content-middle p-0" id="measureDoc">
                        <a href="http://" target="_blank" rel="noopener noreferrer" class="card-link">
                            <div class="border border-dark p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60%" fill="red"
                                    class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5.523 12.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.148 21.148 0 0 0 .5-1.05 12.045 12.045 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.881 3.881 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 6.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z" />
                                    <path fill-rule="evenodd"
                                        d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.651 11.651 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.697 19.697 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z" />
                                </svg>
                                <span style="color: black;">
                                    <?= $item->c_countermeasure ?> .pdf
                                </span>
                            </div>
                        </a>
                    </td>
                </tr>



            </tbody>
        </table>

    </div>
</div>

<div class="container" id="partList"></div>

<style>

    table {
        background-color: white;
    }

    .main {
        background-color: rgb(236, 234, 234);
    }

    #measure {
        width: 70%;
    }

    #measure label {
        font-weight: 100;
    }

    #cause {
        background-color: white;
    }

    #measureTaken {
        background-color: white;
    }

    #measureDoc {
        width: 20%;
    }
</style>