<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Editar Usuário
                        <small>edite o usuário</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Usuário</li>
                        <li><a href="<?php echo base_url('admin/usuarios/editar/'.$this->uri->segment(4));?>" class="active">Editar Usuário</a></li>
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
                          
                          <input type="submit" name="submit" class="btn btn-success pull-right" value="Atualizar dados do usuário">
                            <div class="clearfix"></div>

                          <ul  class="nav nav-pills">
                            <li class="active">
                              <a  href="#info" data-toggle="tab">Informações do usuário</a>
                            </li>
                            <li><a href="#acesso" data-toggle="tab">Acesso</a>
                            </li>
                            <li><a href="#financeiro" data-toggle="tab">Financeiro</a>
                            </li>
                            <li><a href="#binario" data-toggle="tab">Binário</a>
                            </li>
                            </ul>

                            <?php if(isset($message)) echo '<br />'.$message;?>

                            <div class="tab-content clearfix">
                              <div class="tab-pane active" id="info">
                                
                                <div class="row">
                                  <h3 class="text-center">Informações cadastrais</h3>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Nome</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="nome" value="<?php echo $usuario['usuario']->nome;?>" type="text" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Email</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="email" value="<?php echo $usuario['usuario']->email;?>" type="email" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">WALLET</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="cpf" id="cpf" value="<?php echo $usuario['usuario']->cpf;?>" type="text" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Celular</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="celular" id="celular" value="<?php echo $usuario['usuario']->celular;?>" type="text">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Administrador</label>
                                      <div class="col-sm-6">
                                            <input type="radio" name="is_admin" value="2" <?php echo ($usuario['usuario']->is_admin == 2) ? 'checked' : '';?>> Sim
                                            <input type="radio" name="is_admin" value="0" <?php echo ($usuario['usuario']->is_admin == 0) ? 'checked' : '';?>> Não
                                      </div>
                                  </div>
                                </div>

                              </div>
                              <div class="tab-pane" id="acesso">
                                <div class="row">
                                  <h3 class="text-center">Acesso</h3>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Login</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="login" value="<?php echo $usuario['usuario']->login;?>" type="text" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Senha</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="senha" type="password" value="" autocomplete="off">
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Bloqueado</label>
                                      <div class="col-sm-6">

                                            <input type="radio" name="block" value="1" <?php echo ($usuario['usuario']->block == 1) ? 'checked' : '';?>> Sim
                                            <input type="radio" name="block" value="0" <?php echo ($usuario['usuario']->block == 0) ? 'checked' : '';?>> Não
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="financeiro">
                                <div class="row">
                                  <h3 class="text-center">Financeiro</h3>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Saldo Rendimentos</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="saldo_rendimentos" value="<?php echo $usuario['usuario']->saldo_rendimentos;?>" type="text" required>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Saldo Indicações</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="saldo_indicacoes" value="<?php echo $usuario['usuario']->saldo_indicacoes;?>" type="text" required>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <div class="tab-pane" id="binario">
                                <div class="row">
                                  <h3 class="text-center">Binário</h3>
                                  
                                  <div class="form-group">
                                      <label class="col-sm-3 control-label">Quantidade Binário</label>
                                      <div class="col-sm-6">
                                            <input class="form-control u-rounded" name="quantidade_binario" value="<?php echo $usuario['usuario']->quantidade_binario;?>" type="text" required>
                                            <span class="help-text">porcentagem do binário sem <b>%</b></span>
                                      </div>
                                  </div>
                                </div>
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