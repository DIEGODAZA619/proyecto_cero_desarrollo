<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Enviar Comprovante
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Financeiro</li>
                        <li><a href="<?php echo base_url('comprovante');?>" class="active">Enviar Comprovante</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->
        
            <!-- page start-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <div class="panel-body">

                        <?php
                        if(isset($message)) echo $message;
                        ?>

                        <form action="" method="post" class="form-horizontal form-variance" enctype="multipart/form-data">
                          
                          <p>Para ativar-mos mais rápido seu plano, envie-nos o comprovante de pagamento de sua fatura, escrito a caneta no comprovante o <b>ID da Fatura</b> com a <b>data do pagamento</b>. Caso você envie um novo comprovante, o último será substituido pelo novo.</p>

                          <div class="form-group">
                                <label class="col-sm-3 control-label">Comprovante</label>
                                <div class="col-sm-6">
                                    <input class="form-control u-rounded" type="file" name="comprovante" required>
                                </div>
                          </div>

                          <div class="form-group">
                                <label class="col-sm-3 control-label">&nbsp;</label>
                                <div class="col-sm-6">
                                    <input type="submit" name="submit" class="btn btn-success" value="Enviar comprovante">
                                </div>
                          </div>
                    
                         
                        </form>

                        </div>
                    </section>
                </div>
            </div>

        </div>

    </div>
</div>
<!--main content end-->