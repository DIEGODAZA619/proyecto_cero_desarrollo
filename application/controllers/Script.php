<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Script extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //CheckUserIsAdmin();
        $this->load->model('admin/scriptmodel', 'scriptmodel');
        $this->load->helper('rangos_helper');
    }

    public function ejecutarScript()
    {        
        $datos = $this->scriptmodel->ejecutar();        
        echo json_encode($datos);
    }
}