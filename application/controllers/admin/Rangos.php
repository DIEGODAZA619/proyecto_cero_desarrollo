<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rangos extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //CheckUserIsAdmin();
        $this->load->helper('rangos_helper');
    }

    public function rangos()
    {
        $idUsuario = $this->session->userdata('uid_admin');
        $idUsuario = 10;
        $valor = calcularRangos($idUsuario);
        echo $valor;
    }
}