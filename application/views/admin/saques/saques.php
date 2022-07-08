<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Withdraw
                        <small>all the withdraws</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Withdraw</li>
                        <li><a href="<?php echo base_url('admin/saques');?>" class="active">Todos Saques</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->

            <div class="row">
              <div class="col-sm-12">
                  <section class="panel">
                      <div class="panel-body">
                          <table class="table responsive-data-table table-striped">
                              <thead>
                              <tr>
                                  <th>
                                      Login  
                                  </th>
								  
								  <th>
                                      Wallet 
                                  </th>
                                  <th>
                                      Receive in
                                  </th>
                                  <th>
                                      Amount
                                  </th>
                                  <th>
                                      Status
                                  </th>
								  
								  <th>
                                      Time to Pay
                                  </th>
								  
                                  <th>
                                      Request Date
                                  </th>
                                  <th>&nbsp;
                                      
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($saques !== false){
                                foreach($saques as $saque){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo InformacoesUsuario('login', $saque->id_usuario);?>
                                  </td>
								  
								  <td>
									  <?php
										$walletSaque = InformacoesUsuario('cpf', $saque->id_usuario);
									  ?>	
									  
									  
									  <a href="https://etherscan.io/address/<?php echo $walletSaque; ?>" 
										 target="_blank">
										  <?php echo $walletSaque;?>
									  </a>
                                      
                                  </td>
								  
                                  <td>
                                      <?php echo ($saque->local_recebimento == 1) ? 'Ethereum' : 'Ethereum'; ?>
                                  </td>
                                  <td>
                                      USD <?php echo number_format($saque->valor, 2, ",", "."); ?>
                                  </td>
                                  <td>
                                      <?php
                                      if($saque->status == 0){
                                        echo '<span class="text-warning">Pending</span>';
                                      }elseif($saque->status == 1){
                                        echo '<span class="text-success">Paid</span>';
                                      }else{
                                        echo '<span class="text-danger">Reversed</span>';
                                      }
                                      ?>
                                  </td>
								  
								  <td>
									<?php
									$timePay = $saque->time_pay;
									if($timePay==""){
										$timePay="No Data";	
									}
									?>
                                    <?php echo $timePay;?>
                                  </td>
								  
                                  <td>
                                    <?php echo date('d/m/Y H:i:s', strtotime($saque->data_pedido));?>
                                  </td>
                                  <td>
                                    <a href="<?php echo base_url('admin/saques/visualizar/'.$saque->id);?>">View</a>
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