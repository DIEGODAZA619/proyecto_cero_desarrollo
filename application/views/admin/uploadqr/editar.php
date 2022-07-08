<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Edi Imange QR
                        <small>edit image QR</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Uploads QR</li>
                        <li><a href="<?php echo base_url('admin/uploadqr/editar/'.$this->uri->segment(4));?>" class="active">Edit Image QR</a></li>
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
                              <label class="col-sm-3 control-label">Description</label>
                              <div class="col-sm-6">
                                    <input type="text" name="descripcion" class="form-control" value="<?php echo $datoqr[0]->text_qr;?>" required>
                              </div>
                          </div>
                            
                          <div class="form-group">
                              <label class="col-sm-3 control-label">QR Imagen </label>
                              <div class="col-sm-6">
                                  
                                  <?php
                                  
                                  $imgPlan = $datoqr[0]->img_qr;
                                  
                                  if($imgPlan!=""){
                                      $imgPlan = $datoqr[0]->img_qr;
                                  }else{
                                     $imgPlan = "no-image.jpg"; 
                                  }
                                  
                                  ?>
                                  
                                  
                                    <p>Current image</p>
                                     <img src="<?php echo base_url();?>assets/imgs/plan/<?php echo $imgPlan;?>" height="100" width="100" 
                                           id="img_actual" class="imgEdCar">
                                    <input type="hidden" id="img" name="img_qr" value="<?php echo $imgPlan;?>" >
                                    <div id="fileuploader">Upload QR image</div>
                                    <div id="eventsmessage"></div>
                                  
                              </div>
                          </div>      




                          <div class="form-group">
                              <label class="col-sm-3 control-label">Estatus QR</label>
                              <div class="col-sm-6">
                                    <input type="radio" name="estado" value="1" <?php echo ($datoqr[0]->estado_qr == 1) ? 'checked' : '';?>> Active
                                    <input type="radio" name="estado" value="0" <?php echo ($datoqr[0]->estado_qr == 0) ? 'checked' : '';?>> Inactive
                              </div>
                          </div>


                          

                          <div class="form-group">
                              <label class="col-sm-3 control-label">&nbsp;</label>
                              <div class="col-sm-6">
                                    <input type="submit" name="submit" class="btn btn-success" value="Update Image Qr">
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