<!--main content start-->
<section id="saque" class="d-flex justify-content-center align-items-center py-5 mt-3 my-auto">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 p-3">
                <div class="text-center position-relative d-flex align-items-center justify-content-center">
                    <img src="<?php echo base_url(); ?>/assets/template/images/arrow_orange.png" alt="flecha" class=" img-fluid position-absolute start-0" width="100">
                    <h1 class="display-5 text-white fw-bold w-50">Earnings Report </h1>
                </div>
                <div id="msj" class="alert alert-bg-danger"></div>
                <div class="content py-4 px-4 position-relative">
                    <?php if (isset($message)) echo $message; ?><br><br>
                    <div class="detalle w-100 position-relative ">
                        <table id="tblDateEx" width='100%' class="w-100">
                        <thead class="">
                <tr>
     
                    <th>
                      Description
                    </th>
                    <th>
                      Price
                    </th>
                    <th>
                      Date
                    </th>
                </tr>
              </thead>
              <tbody>
              <?php
                  if ($extratos !== false) {
                    foreach ($extratos as $extrato) {
                  ?>
                      <tr>
        
                        <td>
                          <span class="text-<?php echo ($extrato->tipo == 1) ? 'success' : 'danger'; ?>"><?php echo $extrato->mensagem; ?></span>
                        </td>
                        <td>
                          <span class="text-<?php echo ($extrato->tipo == 1) ? 'success' : 'danger'; ?>"><?php echo ($extrato->tipo == 1) ? '+' : '-'; ?> USD <?php echo number_format($extrato->valor, 2, ",", "."); ?></span>
                        </td>
                        <td>
                          <?php echo date('d/m/Y H:i:s', strtotime($extrato->data)); ?>
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

            <!-- Modal -->
            <div class="modal fade" id="pagamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pagamento da sua fatura</h4>
                  </div>
                  <div class="modal-body">
                    <?php
                    if($formas_pagamento !== false){
                    ?>

                    <p>Após o pagamento, envie-nos o comprovante com a <b>data do pagamento</b> e <b>ID da fatura</b> <u>escrita a caneta</u> para ativarmos o seu plano. Para enviar, clique no menu <b>Financeiro</b> e clique no link <b>Enviar Comprovante</b></p>

                    <!-- start accordion -->
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      
                      <?php
                      foreach($formas_pagamento as $pagamento){
                      ?>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading_<?php echo $pagamento->id;?>">
                          <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $pagamento->id;?>" aria-expanded="false" aria-controls="collapse_<?php echo $pagamento->id;?>">
                              <?php
                              if($pagamento->categoria_conta == 1){
                                echo BancoPorID($pagamento->banco);
                              }else{
                                echo 'Depósito via Bitcoin';
                              }
                              ?>
                            </a>
                          </h4>
                        </div>
                        <div id="collapse_<?php echo $pagamento->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $pagamento->id;?>">
                          <div class="panel-body">
                            <?php
                              if($pagamento->categoria_conta == 1){
                                echo 'Banco: '.BancoPorID($pagamento->banco).'<br />';
                                echo 'Agência: '.$pagamento->agencia.'<br />';
                                echo 'Conta: '.$pagamento->conta.'<br />';
                                if(!empty($pagamento->operacao) && !is_null($pagamento->operacao)){
                                    echo 'Op: '.$pagamento->operacao.'<br />';
                                }
                                
                                echo 'Tipo de conta: ';
                                echo ($pagamento->tipo == 1) ? 'Conta Corrente <br />' : 'Poupança <br />';

                                echo 'Documento: '.$pagamento->documento.'<br />';
                              }else{
                                echo 'Endereço Bitcoin: '.$pagamento->carteira_bitcoin;
                              }
                              ?>
                          </div>
                        </div>
                      </div>
                      <?php
                      }
                      ?>
                    </div>
                    <!-- .end-accordion-->
                    <?php
                    }else{
                        echo '<div class="alert alert-danger text-center">Nenhuma forma de pagamento disponível no momento. Por favor, volte mais tarde.</div>';
                    }
                    ?>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>