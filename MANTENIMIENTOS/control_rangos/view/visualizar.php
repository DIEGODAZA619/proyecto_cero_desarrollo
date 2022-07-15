<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Visualizar Usuário
                        <small>visualizar usuário cadastrado</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Usuários</li>
                        <li><a href="<?php echo base_url('admin/usuarios/visualizar/'.$this->uri->segment(4));?>" class="active">Visualizar Usuário</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->

            <div class="row">
              <div class="col-sm-12">
                  <section class="panel">
                      <div class="panel-body">

                        <ul  class="nav nav-pills">
                              <li class="active">
                                <a  href="#info" data-toggle="tab">Información de usuario</a>
                              </li>
                              <li><a href="#contas" data-toggle="tab">Contas de pagamento</a>
                              </li>
                              <li><a href="#plano" data-toggle="tab">Plano de Carreira</a>
                              </li>
                              <li><a href="#binario" data-toggle="tab">Binário</a>
                              </li>
                              <li><a href="#extrato" data-toggle="tab">Extracto</a>
                              </li>
                            </ul>

                              <div class="tab-content clearfix">
                                <div class="tab-pane active" id="info">
                                  
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h3 class="text-center">Cadastro/Informações Pessoais</h3>

                                      <table class="table table-striped">
                                        <tr>
                                          <td>Login</td>
                                          <td><?php echo $usuario['usuario']->login;?></td>
                                        </tr>
                                        <tr>
                                          <td>Nome</td>
                                          <td><?php echo $usuario['usuario']->nome;?></td>
                                        </tr>
                                        <tr>
                                          <td>Email</td>
                                          <td><?php echo $usuario['usuario']->email;?></td>
                                        </tr>
                                        <tr>
                                          <td>Wallet</td>
                                          <td><?php echo $usuario['usuario']->cpf;?></td>
                                        </tr>
                                        <tr>
                                          <td>Celular</td>
                                          <td><?php echo $usuario['usuario']->celular;?></td>
                                        </tr>
                                        <tr>
                                          <td>Bloqueado?</td>
                                          <td><?php echo ($usuario['usuario']->block == 1) ? 'Sim' : 'Não';?></td>
                                        </tr>
                                        <tr>
                                          <td>Membro desde</td>
                                          <td><?php echo date('d/m/Y H:i:s', strtotime($usuario['usuario']->data_cadastro));?></td>
                                        </tr>
                                      </table>

                                    </div>
                                    <div class="col-md-6">
                                      <h3 class="text-center">Financeiro</h3>

                                      <table class="table table-striped">
                                        <tr>
                                          <td>Saldo Rendimentos</td>
                                          <td>$us <?php echo number_format($usuario['usuario']->saldo_rendimentos, 2, ",", ".");?></td>
                                        </tr>
                                        <tr>
                                          <td>Saldo Indicações</td>
                                          <td>$us <?php echo number_format($usuario['usuario']->saldo_indicacoes, 2, ",", ".");?></td>
                                        </tr>
                                      </table>

                                    </div>
                                  </div>

                                </div>
                                <div class="tab-pane" id="contas">
                                  <?php
                                  if(isset($usuario['contas'])){
                                    foreach($usuario['contas'] as $conta){
                                  ?>
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading_<?php echo $conta->id;?>">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $conta->id;?>" aria-expanded="false" aria-controls="collapse_<?php echo $conta->id;?>">
                                          <?php
                                          if($conta->categoria_conta == 1){
                                            echo BancoPorID($conta->codigo_banco);
                                          }else{
                                            echo 'Depósito via Bitcoin';
                                          }
                                          ?>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapse_<?php echo $conta->id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?php echo $conta->id;?>">
                                      <div class="panel-body">
                                        <?php
                                          if($conta->categoria_conta == 1){
                                            echo 'Banco: '.BancoPorID($conta->codigo_banco).'<br />';
                                            echo 'Agência: '.$conta->agencia.' '.((!empty($conta->agencia_digito)) ? '-'.$conta->agencia_digito : '').'<br />';
                                            echo 'Conta: '.$conta->conta.' '.((!empty($conta->conta_digito)) ? '-'.$conta->conta_digito : '').'<br />';
                                            if(!empty($conta->operacao) && !is_null($conta->operacao)){
                                                echo 'Op: '.$conta->operacao.'<br />';
                                            }
                                            
                                            echo 'Tipo de conta: ';
                                            echo ($conta->tipo_conta == 1) ? 'Conta Corrente <br />' : 'Poupança <br />';

                                            echo 'Documento: '.$conta->documento.'<br />';
                                          }else{
                                            echo 'Endereço Bitcoin: '.$conta->carteira_bitcoin;
                                          }
                                          ?>
                                      </div>
                                    </div>
                                  </div>
                                  <?php
                                    }
                                  }else{
                                    echo '<div class="alert alert-danger text-center">Usuário ainda não cadastrou contas para recebimento.</div>';
                                  }
                                  ?>
                                </div>
                                <div class="tab-pane" id="plano">
                                  <?php
                                  if(isset($usuario['plano_carreira'])){
                                  ?>
                                  <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th>Plano de Carreira</th>
                                        <th>Data</th>
                                      </tr>
                                    </thead>

                                    <tbody>

                                      <?php
                                      foreach($usuario['plano_carreira'] as $plano){
                                      ?>
                                      <tr>
                                        <td><?php echo $plano->nome;?></td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($plano->data));?></td>
                                      </tr>
                                      <?php
                                      }
                                      ?>
                                    </tbody>
                                  </table>
                                  <?php
                                  }else{
                                    echo '<div class="alert alert-danger text-center">Nenhum plano de carreira registro para esse usuário. Contate o programador.</div>';
                                  }
                                  ?>
                                </div>
                                  <div class="tab-pane" id="binario">
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>Lado Esquerdo</th>
                                            <th>Lado Direito</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td><?php echo $usuario['binario']['esquerdo'];?> ponto(s)</td>
                                            <td><?php echo $usuario['binario']['direito'];?> ponto(s)</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="col-sm-6">
                                      <?php
                                      if(isset($usuario['plano'])){
                                      ?>
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>Plano</th>
                                            <th>Data Pagamento</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td><?php echo $usuario['plano']->nome;?></td>
                                            <td><?php echo date('d/m/Y', strtotime($usuario['plano']->data_pagamento));?></td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <?php
                                      }else{
                                        echo '<div class="alert alert-danger text-center">Nenhum plano ativo no momento.</div>';
                                      }
                                      ?>
                                    </div>
                                  </div>
                                </div>
                                <div class="tab-pane" id="extrato">
                                  <?php
                                  if(isset($usuario['extrato'])){
                                  ?>
                                  <table class="table responsive-data-table tableExtrato table-striped">
                                      <thead>
                                      <tr>
                                          <th>
                                              #
                                          </th>
                                          <th>
                                              Descrição
                                          </th>
                                          <th>
                                              Valor
                                          </th>
                                          <th>
                                              Data
                                          </th>
                                          
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                        foreach($usuario['extrato'] as $extrato){
                                      ?>
                                      <tr>
                                          <td>
                                              #<?php echo $extrato->id;?>
                                          </td>
                                          <td>
                                              <span class="text-<?php echo ($extrato->tipo == 1) ? 'success' : 'danger';?>"><?php echo $extrato->mensagem;?></span>
                                          </td>
                                          <td>
                                              <span class="text-<?php echo ($extrato->tipo == 1) ? 'success' : 'danger';?>"><?php echo ($extrato->tipo == 1) ? '+' : '-';?> $us <?php echo number_format($extrato->valor, 2, ",", ".");?></span>
                                          </td>
                                          <td>
                                              <?php echo date('d/m/Y H:i:s', strtotime($extrato->data));?>
                                          </td>
                                      </tr>
                                      <?php
                                      }
                                      ?>
                                      </tbody>
                                  </table>
                                  <?php
                                  }else{
                                    echo '<div class="alert alert-danger text-center">Nenhuma movimentação de conta para esse usuário.</div>';
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
<!--main content end-->