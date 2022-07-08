<!--main content start-->
<section id="saque" class="d-flex justify-content-center align-items-center py-5 mt-3 my-auto">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xl-10 p-3">
                <div class="text-center position-relative d-flex align-items-center justify-content-center">
                    <img src="<?php echo base_url(); ?>/assets/template/images/arrow_orange.png" alt="flecha" class=" img-fluid position-absolute start-0" width="100">
                    <h1 class="display-5 text-white fw-bold w-50">Career Plans</h1>
                </div>
                <div class="content py-4 px-4 position-relative">

                    <div class="detalle w-100 position-relative ">
                        <table id="tblDateEx" width='100%' class="w-100">
                            <thead class="">
                                <tr>

                                    <th class="text-nowrap">Career Plains</th>
                                    <th>Points</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($planos !== false) {
                                    foreach ($planos as $plano) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $plano->nome; ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($plano->pontos, 0, ".", "."); ?>
                                            </td>
                                            <td>
                                                <?php echo $plano->premio; ?>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!--main content end-->