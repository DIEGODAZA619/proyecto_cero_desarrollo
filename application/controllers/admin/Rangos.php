<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rangos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //CheckUserIsAdmin();
        $this->load->model('admin/Rangomodel', 'Rangomodel');
        $this->load->helper('usuarios_helper');
        $this->load->helper('rangos_helper');
        $this->load->helper('permisos_helper');
    }

     function rangos()
    {
        $idUsuario = $this->session->userdata('uid_admin');
        $idUsuario = 229;
        $datoganancia = 5;
        $tipo = 'REN';
        //$valor = calcularRangos($idUsuario);
        $valor = verificarLimiteGanancias($idUsuario, $datoganancia,$tipo);
        echo "<br><br><br>".$valor;
    }

    
    function calcular()
    {
        $idUsuario = $this->session->userdata('uid_admin');
        $valorOpcionBD = 23;
        $valorPermisoBD = 1;
        $permiso = verificarPermisosUsuario($idUsuario,$valorOpcionBD,$valorPermisoBD);
        if($permiso)
        {
             $data['jsLoader'] = array(
                                        'assets/bower_components/datatables.net/js/jquery.dataTables.min.js',
                                        'assets/bower_components/datatables-tabletools/js/dataTables.tableTools.js',
                                        'assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js',
                                        'assets/bower_components/datatables-colvis/js/dataTables.colVis.js',
                                        'assets/bower_components/datatables-responsive/js/dataTables.responsive.js',
                                        'assets/bower_components/datatables-scroller/js/dataTables.scroller.js'                                        
                                      );
            //$data['usuarios'] = $this->Addplanmodel->TodosUsuarios();
            //recuperar roles desde la variable de session DIEGO
            $data['rolescero'] = $this->session->userdata('rolescero');
            $data['roles']     = $this->session->userdata('roles');

            $fechaCalculo = date('Y-m-d');
            $data['calculos'] = $this->Rangomodel->calculosFecha($fechaCalculo);
            $this->template->load('admin/templates/template', 'admin/rangos/calcular', $data);
        }
        else
        {
            redirect('admin/dashboard');
        }
    }

    function calcularRangos()
    {
        $resul = 1;
        $mensaje = "Se realizo el calculo correctamente!!!!";

        $datos = $this->Rangomodel->getUsuario();
        foreach ($datos as $fila)
        {
            $respuesta = calcularRangos($fila->id);
        }
        
        $resultado ='[{                 
                    "resultado":"'.$resul.'",
                    "mensaje":"'.$mensaje.'"
                    }]';
        echo $resultado;
    }
}