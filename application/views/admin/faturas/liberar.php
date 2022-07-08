<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Invoices to be Released
                        <small>invoices you have to release</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Invoices</li>
                        <li><a href="<?php echo base_url('admin/faturas/liberar');?>" class="active">To Release</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->

            <div class="row">
              <div class="col-sm-12">
                  <section class="panel">
                      <div class="panel-body">
                          <?php if(isset($message)) echo $message; ?>
                          
                          <table class="table responsive-data-table table-striped">
                              <thead>
                              <tr>
                                  <th>
                                      Username
                                  </th>
                                  <th>
                                      Login
                                  </th>
                                  <th>
                                      Plan
                                  </th>
                                  <th>
                                      Value
                                  </th>
                                  <th>
                                      &nbsp;
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($faturas !== false){
                                foreach($faturas as $fatura){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo InformacoesUsuario('nome', $fatura->id_usuario);?>
                                  </td>
                                  <td>
                                      <?php echo InformacoesUsuario('login', $fatura->id_usuario);?>
                                  </td>
                                  <td>
                                      <?php echo $fatura->nome; ?>
                                  </td>
                                  <td>
                                       <?php echo number_format($fatura->valor, 2, ",", "."); ?> USD
                                  </td>
                                  <td>
                                    <a class="btn btn-info" href="https://etherscan.io/tx/<?php echo $fatura->comprovante;?>" target="_blank"><i class="fa fa-picture"></i> Verify on Etherscan</a>

                                    <a class="btn btn-success" href="<?php echo base_url('admin/faturas/liberar/'.$fatura->id);?>"><i class="fa fa-check"></i> Release</a>
                                  </td>
                              </tr>
                              <?php
                                }


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