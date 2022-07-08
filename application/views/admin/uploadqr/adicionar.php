<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Add Image Qr
                        
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Uploads QR</li>
                        <li><a href="<?php echo base_url('admin/uploadqr/adicionar');?>" class="active">Add</a></li>
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
                                    <input type="text" name="descripcion" class="form-control" required>
                              </div>
                          </div>
							
						  <div class="form-group">
                              <label class="col-sm-3 control-label">QR Image </label>
                              <div class="col-sm-6">
                                    
                 					<input type="hidden" id="img" name="img_qr" value="" required>
                 					<div id="fileuploader">Upload QR image</div>
									<div id="eventsmessage"></div>
								  
                              </div>
                          </div>		
                          <div class="form-group">
                              <label class="col-sm-3 control-label">Estatus QR</label>
                              <div class="col-sm-6">
                                    <input type="radio" name="estado" value="1" checked> Active
                                    <input type="radio" name="estado" value="0"> Inactive
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-3 control-label">&nbsp;</label>
                              <div class="col-sm-6">
                                    <input type="submit" name="submit" class="btn btn-success" value="Save QR">
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