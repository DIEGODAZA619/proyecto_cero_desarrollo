<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('cliente/contamodel', 'ContaModel');
    }

    public function logout(){

      $this->ContaModel->Deslogar();
    }

    public function login(){

        $data = array();

        if($this->input->post('submit')){

          $this->form_validation->set_rules('login', 'Login', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('senha', 'Senha', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe sua %s.</div>'));
          // $this->form_validation->set_rules('cpf', 'Cpf', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe sua %s.</div>'));



          if ($this->form_validation->run() !== FALSE) {

            $data['message'] = $this->ContaModel->FazerLogin();

          }else{

            $data['message'] = validation_errors();
          }
        }

        $this->load->view('cliente/login', $data);
    }

    public function cadastrar($patrocinador = false){

        if($this->input->post('submit')){

          $this->form_validation->set_rules('patrocinador', 'Patrocinador', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe um %s.</div>'));
          $this->form_validation->set_rules('nome', 'Nome', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('celular', 'Celular', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('login', 'Login', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          $this->form_validation->set_rules('senha', 'Senha', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
			          $this->form_validation->set_rules('country', 'Country', 'trim|required', array('required' => '<div class="alert alert-danger text-center">Informe seu %s.</div>'));
          
          if ($this->form_validation->run() !== FALSE) {

            $data['message'] = $this->ContaModel->Cadastrar();

          }else{

            $data['message'] = validation_errors();
          }
        }

        $data['patrocinador'] = $patrocinador;

        $this->load->view('cliente/cadastrar', $data);
    }

    public function mostrarcuentas()
    {
      $data = $_POST['wallet'];
      $this->ContaModel->walletCuentas($data);
      // echo $data;
    }
  

    public function recuperar_senha($codigo = false){

        $data['codigo'] = $codigo;

        if($this->input->post('email')){

          $data['message'] = $this->ContaModel->EnviarEmailRecuperacao($this->input->post('email'));
        
        }

        if($this->input->post('codigo')){

          $data['message'] = $this->ContaModel->RedirecionaLink($this->input->post('codigo'));
        }

        $this->load->view('cliente/recuperar', $data);
    }
}