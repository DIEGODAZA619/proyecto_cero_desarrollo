<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Usuários
                        <small>todos usuários cadastrados</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Usuários</li>
                        <li><a href="<?php echo base_url('admin/usuarios');?>" class="active">Todos Usuários</a></li>
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
                                      Nome
                                  </th>
                                  <th>
                                      Login
                                  </th>
                                  <th>
                                      Saldo Rendimentos
                                  </th>
                                  <th>
                                      Saldo Indicaciones
                                  </th>
                                  <th>
                                      Plano de Carreira
                                  </th>
                                  <th>
                                      Tipo Plan
                                  </th>
                                  <th>
                                      Retira
                                  </th>
                                  <th>&nbsp;
                                      
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($usuarios !== false){
                                foreach($usuarios as $usuario){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $usuario->nome;?>
                                  </td>
                                  <td>
                                      <?php echo $usuario->login; ?>
                                  </td>
                                  <td>
                                      $us <?php echo number_format($usuario->saldo_rendimentos, 2, ",", "."); ?>
                                  </td>
                                  <td>
                                      $us <?php echo number_format($usuario->saldo_indicacoes, 2, ",", "."); ?>
                                  </td>
                                  <td>
                                      <?php echo PlanoCarreira($usuario->plano_carreira, 'nome'); ?>
                                  </td>
                                  <td>
                                     <?php echo usersPlanActive($usuario->id); ?>
                                  </td>
                                  <td>
                                     <?php echo $usuario->retira; ?>
                                  </td>
                                  <td>
                                    <a class="btn btn-success" href="<?php echo base_url('admin/usuarios/visualizar/'.$usuario->id);?>"><i class="fa fa-eye"></i> Visualizar</a>
                                    <a class="btn btn-info" href="<?php echo base_url('admin/usuarios/editar/'.$usuario->id);?>"><i class="fa fa-pencil"></i> Editar</a>

                                    <?php if($usuario->retira == 'SI')
                                    {?>
                                      <a class="btn btn-danger" href="<?php echo base_url('admin/usuarios/bloquear/'.$usuario->id);?>"><i class="fa fa-pencil"></i> Bloquear Retiro</a>                                      
                                    <?php }
                                    else{
                                      ?>
                                      <a class="btn btn-warning" href="<?php echo base_url('admin/usuarios/desbloquear/'.$usuario->id);?>"><i class="fa fa-pencil"></i> Desbloquear Retiro</a>
                                    
                                    <?php
                                    } ?>

                                    
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