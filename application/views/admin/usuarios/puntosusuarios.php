<!--main content start-->
<div id="content" class="ui-content">
    <div class="ui-content-body">
        <div class="ui-container">
            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Usuarios
                        <small>view point user</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li>User</li>
                        <li><a href="<?php echo base_url('admin/puntos');?>" class="active">Puntos Usuarios</a></li>
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
                                      #
                                  </th> 
                                  <th>
                                      Nome
                                  </th>
                                  <th>
                                      Login
                                  </th>
                                  <th>
                                      Lado Izquierdo
                                  </th>
                                  <th>
                                      Lado Derecho
                                  </th>
                                  <th>
                                      Binary Compliant
                                  </th> 
                                  <th>
                                      Options
                                  </th>                                  
                                                                                                    
                                  
                              </tr>
                              </thead>
                              <tbody>
                              <?php $con = 1;
                              if($usuarios !== false){
                                foreach($usuarios as $usuario){
                              ?>
                              <tr>
                                  <td>
                                      <?php echo $con++;?>
                                  </td>
                                  <td>
                                      <?php echo $usuario->nome;?>
                                  </td>
                                  <td>
                                      <?php echo $usuario->login; ?>
                                  </td>
                                   <td>
                                      <?php echo $usuario->izquierda; ?>
                                  </td>
                                  <td>
                                      <?php echo $usuario->derecha;?>
                                  </td>
                                  <td>
                                      <?php if($usuario->cantidadizquierda > 0 && $usuario->cantidadderecha > 0)
                                            {echo "CHECK";}else{echo "NO";}?>
                                  </td>
                                  <td>
                                      <?php if($usuario->cantidadizquierda > 0 && $usuario->cantidadderecha > 0)
                                      {?>
                                         <a class="btn btn-info" href="<?php echo base_url('admin/puntos/verPuntosUsuario/'.$usuario->id);?>" target= '_black'><i class="fa fa-pencil"></i> View Point</a>
                                      <?php
                                      }
                                      ?>
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