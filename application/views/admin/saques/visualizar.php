<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> View Withdraw
                        <small>View Withdraw from user</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Withdraw</li>
                        <li><a href="<?php echo base_url('admin/saques/visualizar/'.$this->uri->segment(4));?>" class="active">View Withdraw</a></li>
                    </ul>
                </div> 
            </div>

            <!--page title and breadcrumb end -->

            <div class="row">
              <div class="col-sm-12">
                  <section class="panel">
                      <div class="panel-body">
                          
                          <?php
                          if($saque->status == 0){
                          ?>
                          <button class="btn btn-success" id="MarcarComoPago" value="<?php echo $this->uri->segment(4);?>"><i class="fa fa-check"></i> Mark as Paid</button>
                          <button class="btn btn-danger" id="Estornar" value="<?php echo $this->uri->segment(4);?>"><i class="fa fa-times"></i> Reverse</button>
                          <?php
                          }
                          ?>

                          <div class="row">
                            <div class="col-sm-6">
                              <h3 class="text-center text-uppercase">Withdraw Data</h3>
                              <table class="table table-striped">
                                <tr>
                                  <td>Login</td>
                                  <td><?php echo InformacoesUsuario('login', $saque->id_usuario);?></td>
                                </tr>
                                <tr>
                                  <td>Withdrawing from</td>
                                  <td><?php echo ($saque->tipo_saque == 1) ? 'Income' : 'Recommendation';?></td>
                                </tr>
                                <tr>
                                  <td>Receive in</td>
                                  <td><?php echo ($saque->local_recebimento == 1) ? 'Ethereum' : 'Ethereum';?></td>
                                </tr>
                                <tr>
                                  <td>Valor</td>
                                  <td><b>USD <?php echo number_format($saque->valor, 2, ",", ".");?></b></td>
                                </tr>
                                <tr>
                                  <td>Status</td>
                                  <td>
                                    <?php
									  
									  
                                      if($saque->status == 0){
                                        echo '<span class="text-warning">Pending</span>';
                                      }elseif($saque->status == 1){
                                        echo '<span class="text-success">Paid out</span>';
                                      }else{
                                        echo '<span class="text-danger">Reversed</span>';
                                      }
                                      ?>
                                  </td>
                                </tr>
								  
								<tr>
									<?php
									$timePay = $saque->time_pay;
									if($timePay==""){
										$timePay="No Data";	
									}
									?>
                                  <td>Time to Pay</td>
                                  <td><b><?php echo $timePay;?></b></td>
                                </tr>  
								  
                                <tr>
                                  <td>Order placed in</td>
                                  <td><?php echo date('d/m/Y H:i:s', strtotime($saque->data_pedido));?></td>
                                </tr>
                              </table>
                            </div>
                            <div class="col-sm-6">
                              <h3 class="text-center text-uppercase">Payment data</h3>
                              <?php
                              $conta = $this->SaquesModel->ContaBancaria($saque->id_conta);

                              if($conta !== false){
                              ?>

                              <?php
                              if($saque->local_recebimento == 1){
                              ?>
                              <table class="table table-striped">
                                <tr>
                                  <td>Banco</td>
                                  <td><?php echo BancoPorID($conta->codigo_banco);?></td>
                                </tr>
                                <tr>
                                  <td>Agência</td>
                                  <td><?php echo $conta->agencia;?> <?php echo (!empty($conta->agencia_digito)) ? '-'.$conta->agencia_digito : '';?></td>
                                </tr>
                                <tr>
                                  <td>Conta</td>
                                  <td><?php echo $conta->conta;?> <?php echo (!empty($conta->conta_digito)) ? '-'.$conta->conta_digito : '';?></td>
                                </tr>
                                <?php
                                if(!empty($conta->operacao)){
                                ?>
                                <tr>
                                  <td>Op</td>
                                  <td><?php echo $conta->operacao;?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                  <td>Tipo de conta</td>
                                  <td><?php echo ($conta->tipo_conta == 1) ? 'Conta Corrente' : 'Poupança';?></td>
                                </tr>
                                <tr>
                                  <td>Titular</td>
                                  <td><?php echo $conta->titular;?></td>
                                </tr>
                                <tr>
                                  <td>CPF/CNPJ</td>
                                  <td><?php echo $conta->documento;?></td>
                                </tr>
                              </table>
                              <?php
                              }elseif($saque->local_recebimento == 2){
                              ?>
                              <table class="table table-striped">
                                <tr>
                                  <td>Carteira Bitcoin</td>
                                  <td><?php echo $conta->carteira_bitcoin;?></td>
                                </tr>
                              </table>
								
								
                              <?php
                                }
                              }else{
								  
								  
								$walletSaqueView = InformacoesUsuario('cpf', $saque->id_usuario);
								 
								  
                                echo "<div class='alert alert-success text-center'>
											Ethereum Wallet<br>
											".$walletSaqueView."<br>
											<a href= 'https://etherscan.io/address/".$walletSaqueView."' target='_blank'>
												<strong>View Wallet Activiy User </strong>  
											</a>
											
									  </div>";
                              }
                              ?>
                            </div>
                          </div>
                      </div>
                  </section>
              </div>

          </div>

        </div>

    </div>
</div>
<!--main content end