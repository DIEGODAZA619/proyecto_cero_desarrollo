<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comprovante extends CI_Controller {

    public function __construct(){
        parent::__construct();
        is_logged();

        $this->load->model('cliente/comprovantemodel', 'ComprovanteModel');
    }

    public function index(){

        $data['active'] = 'financeiro';

        if($this->input->post('submit')){
            $data['message'] = $this->ComprovanteModel->EnviarComprovante();
        }

        $this->template->load('cliente/templates/template', 'cliente/financeiro/comprovante', $data);
    }
}