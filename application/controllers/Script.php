<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Script extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //CheckUserIsAdmin();
        $this->load->model('admin/scriptmodel', 'scriptmodel');
        //$this->load->helper('rangos_helper');
    }

    public function ejecutarScript()
    {        
        $this->load->view('script/ejecutar'); 

    }

    public function verdatos($tabla)
    {        
        $data = $this->scriptmodel->datosTabla($tabla);
        $con = 1;
        echo "DATOS TABLA ".$tabla."<BR><BR><BR>";
        foreach($data as $fila)
        {
             echo $con++." - ".json_encode($fila)."<br>";
        }
    }
    public function actualizarDatos()
    {        
        $tabla = 'usuarios';
        $data = array(
            'senha' => 'e10adc3949ba59abbe56e057f20f883e'
        );
        $datos = $this->scriptmodel->datosUsuarios($tabla,$data);
        echo $datos;
    }
}