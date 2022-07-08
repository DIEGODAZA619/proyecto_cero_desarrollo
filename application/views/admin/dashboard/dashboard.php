<!--main content start-->
<div id="content" class="ui-content ui-content-aside-overlay">
    <div class="ui-content-body">

        <div class="container">

            <!--page title and breadcrumb start -->
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title"> Dashboard
                        <small>resumen de información del sistema</small>
                    </h1>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb pull-right">
                        <li>Home</li>
                        <li><a href="<?php echo base_url('admin/dashboard');?>" class="active">Dashboard</a></li>
                    </ul>
                </div>
            </div>
            <!--page title and breadcrumb end -->

            <!--states start-->
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="panel short-states">
                        <div class="panel-title">
                            <h4> <span class="label label-danger pull-right">Entradas hoje</span></h4>
                        </div>
                        <div class="panel-body">
                            <h1>$us <?php echo $rendimentos_hoje;?></h1>
                            <small>Valores que entraram hoje</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel short-states">
                        <div class="panel-title">
                            <h4> <span class="label label-info pull-right">Usuários</span></h4>
                        </div>
                        <div class="panel-body">
                            <h1><?php echo $total_usuarios;?></h1>
                            <small>Usuários no sistema</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel short-states">
                        <div class="panel-title">
                            <h4> <span class="label label-warning pull-right">Pacotes Ativos</span></h4>
                        </div>
                        <div class="panel-body">
                            <h1><?php echo $planos_ativos;?></h1>
                            <small>Pacotes comprados e ativos</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="panel short-states">
                        <div class="panel-title">
                            <h4> <span class="label label-success pull-right">Saque Pendentes</span></h4>
                        </div>
                        <div class="panel-body">
                            <h1><?php echo $saques_pendentes;?></h1>
                            <small>Total de Saques pendentes</small>
                        </div>
                    </div>
                </div>
            </div>
            <!--states end-->

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <header class="panel-heading">
                            Últimas 20 notificaciones para administrador
                            <span class="tools pull-right">
                                <a class="close-box fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Notificação</th>
                                        <th>Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if($notificacoes !== false){
                                        foreach($notificacoes as $notificacao){
                                    ?>
                                    <tr>
                                        <td><?php echo $notificacao->mensagem;?></td>
                                        <td><?php echo date('d/m/Y H:i:s', strtotime($notificacao->data));?></td>
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
    </div>
</div>
<!--main content end-->