<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Tickets
                        <small>todos tickets de suporte</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>Tickets</li>
                        <li><a href="<?php echo base_url('admin/tickets');?>" class="active">Todos Tickets</a></li>
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
                                      Asunto
                                  </th>
                                  <th>
                                      Última actualización
                                  </th>
                                  <th>
                                      Fecha de Creación
                                  </th>
                                  <th>
                                      Estado
                                  </th>
                                  <th>
                                      Opciones
                                  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              if($tickets !== false){
                                foreach($tickets as $ticket){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo InformacoesUsuario('login', $ticket->id_usuario);?>
                                  </td>
                                  <td>
                                      <?php echo $ticket->assunto; ?>
                                  </td>
                                  <td>
                                      <?php echo date('d/m/Y H:i:s', strtotime($ticket->ultima_atualizacao)); ?>
                                  </td>
                                  <td>
                                      <?php echo date('d/m/Y H:i:s', strtotime($ticket->data_criado)); ?>
                                  </td>
                                  <td>
                                      <?php
                                      if($ticket->status == 1){
                                        echo '<span class="text-warning">Esperando sua resposta</span>';
                                      }elseif($ticket->status == 2){
                                        echo '<span class="text-success">Respondido pelo suporte</span>';
                                      }else{
                                        echo '<span class="text-danger">Ticket Fechado</span>';
                                      }
                                      ?>
                                  </td>
                                  <td>
                                    <a class="btn btn-success" href="<?php echo base_url('admin/tickets/visualizar/'.$ticket->id);?>"><i class="fa fa-eye"></i> Visualizar</a>
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