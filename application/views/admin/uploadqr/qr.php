<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Image
                        <small>QR</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>UploadsQR</li>
                        <li><a href="<?php echo base_url('admin/uploadqr');?>" class="active">All the Images QR</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->

            <div class="row">
              <div class="col-sm-12">
                  <section class="panel">
                      <div class="panel-body">
                          
                          <a href="<?php echo base_url('admin/uploadqr/adicionar');?>" class="btn btn-success pull-right"><i class="fa fa-plus"></i> New Image QR</a>
                          <div class="clearfix"></div>

                          <table class="table responsive-data-table table-striped">
                              <thead>
                              <tr>
                                  <th>
                                      #
                                  </th>
                                   <th>
                                      Image
                                  </th>
                                  <th>
                                      Description
                                  </th>
                                 
                                  <th>
                                      Estatus
                                  </th>                                  
                                  <th>
                                      Options
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php $con = 1;
                            
                                foreach($datoqr as $fila){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $con++;?>
                                  </td>
                                  <td>
                                       <img src="<?php echo base_url();?>assets/imgs/plan/<?php echo $fila->img_qr;?>" height="50" width="50" 
                                           id="img_actual" class="imgEdCar">
                                  </td>
                                  <td>
                                      <?php echo $fila->text_qr;?>
                                  </td>
                                  
                                  <td>
                                      <?php echo $fila->estado_qr;?>
                                  </td>
                                  
                                  <td>
                                    <a class="btn btn-info" href="<?php echo base_url('admin/uploadqr/editar/'.$fila->cod_qr);?>"><i class="fa fa-pencil"></i> Edit</a>
                                    <a class="btn btn-danger" href="<?php echo base_url('admin/uploadqr/excluir/'.$fila->cod_qr);?>"><i class="fa fa-times"></i> Remove</a>
                                  </td>
                              </tr>
                              <?php
                                }
                              
                              ?>
                              </tbody>
                          </table>
                      </div>
                  </section>
              </div>

          </div>

        </div>

    </div>
</div>
<!--main content end-->