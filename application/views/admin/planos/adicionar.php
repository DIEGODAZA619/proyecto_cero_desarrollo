<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Adicionar Plano
                        <small>adicionar um novo plano</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Planes</li>
                        <li><a href="<?php echo base_url('admin/planos/adicionar');?>" class="active">Adicionar Plan</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->
            
            <!-- page start-->
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <div class="panel-body">

                        <form action="" method="post" class="form-horizontal form-variance">
                          
                          <?php if(isset($message)) echo $message;?>
                          
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Nombre del Plan</label>
                              <div class="col-sm-6">
                                    <input type="text" name="nome" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-3 control-label">Valor</label>
                              <div class="col-sm-6">
                                    <input type="text" name="valor" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-3 control-label">Porcentaje de binário</label>
                              <div class="col-sm-6">
                                    <input type="text" name="binario" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-3 control-label">Puntos para el plan de carreira</label>
                              <div class="col-sm-6">
                                    <input type="text" name="pontos" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-3 control-label">Red de Afiliados</label>
                              <div class="col-sm-6">
                                    <input type="radio" name="rede" value="1" checked> Si
                                    <input type="radio" name="rede" value="0"> No
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-3 control-label">Techo Binário</label>
                              <div class="col-sm-6">
                                    <input type="text" name="teto_binario" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-3 control-label">Ganancias Diárias</label>
                              <div class="col-sm-6">
                                    <input type="text" name="ganhos_diarios" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-3 control-label">Plan Recomendado?</label>
                              <div class="col-sm-6">
                                    <input type="radio" name="recomendado" value="1"> Si
                                    <input type="radio" name="recomendado" value="0" checked> No
                              </div>
                          </div>
							
						  <div class="form-group">
                              <label class="col-sm-3 control-label">Plan Image </label>
                              <div class="col-sm-6">
                                    
                 					<input type="hidden" id="img" name="img_plan" value="" >
                 					<div id="fileuploader">Upload Plan image</div>
									<div id="eventsmessage"></div>
								  
                              </div>
                          </div>		

                          <div class="form-group">
                              <label class="col-sm-3 control-label">&nbsp;</label>
                              <div class="col-sm-6">
                                    <input type="submit" name="submit" class="btn btn-success" value="Registrar Plan">
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