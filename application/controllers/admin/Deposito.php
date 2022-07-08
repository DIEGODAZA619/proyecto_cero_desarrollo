<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposito extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/depositomodel', 'DepositoModel');
        $this->load->helper('bancos');
        $this->load->helper('permisos_helper');

    }

    public function index(){

        $idUsuario = $this->session->userdata('uid_admin');
        $valorOpcionBD = 19;
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
                                        'assets/bower_components/datatables-scroller/js/dataTables.scroller.js',
                                        'assets/pages/admin/deposito.js'
                                      );

            $data['contas'] = $this->DepositoModel->TodasContas();


            //recuperar roles desde la variable de session DIEGO
            $data['rolescero'] = $this->session->userdata('rolescero');
            $data['roles']     = $this->session->userdata('roles');
            $this->template->load('admin/templates/template', 'admin/deposito/contas', $data);
        }
        else
        {
            redirect('admin/dashboard');
        }
    }

    public function adicionar(){

        $idUsuario = $this->session->userdata('uid_admin');
        $valorOpcionBD = 19;
        $valorPermisoBD = 2;
        $permiso = verificarPermisosUsuario($idUsuario,$valorOpcionBD,$valorPermisoBD);
        if($permiso)
        {
            $data['jsLoader'] = array(
                                        'assets/pages/admin/deposito.js'
                                      );
            if($this->input->post('submit')){

                $data['message'] = $this->DepositoModel->NovaConta();
            }
            //recuperar roles desde la variable de session DIEGO
            $data['rolescero'] = $this->session->userdata('rolescero');
            $data['roles']     = $this->session->userdata('roles');
            $this->template->load('admin/templates/template', 'admin/deposito/novo', $data);
        }
        else
        {
            redirect('admin/deposito');
        }
    }

    public function editar($id){

        $idUsuario = $this->session->userdata('uid_admin');
        $valorOpcionBD = 19;
        $valorPermisoBD = 3;
        $permiso = verificarPermisosUsuario($idUsuario,$valorOpcionBD,$valorPermisoBD);
        if($permiso)
        {
            $data['jsLoader'] = array(
                                        'assets/pages/admin/deposito.js'
                                      );

            if($this->input->post('submit')){

                $data['message'] = $this->DepositoModel->EditarConta($id);
            }
            $data['conta'] = $this->DepositoModel->InformacoesConta($id);
            //recuperar roles desde la variable de session DIEGO
            $data['rolescero'] = $this->session->userdata('rolescero');
            $data['roles']     = $this->session->userdata('roles');
            $this->template->load('admin/templates/template', 'admin/deposito/editar', $data);
        }
        else
        {
            redirect('admin/deposito');
        }
    }

    public function excluir($id){
        $idUsuario = $this->session->userdata('uid_admin');
        $valorOpcionBD = 19;
        $valorPermisoBD = 5;
        $permiso = verificarPermisosUsuario($idUsuario,$valorOpcionBD,$valorPermisoBD);
        if($permiso)
        {
            $this->DepositoModel->ExcluirConta($id);
        }
        else
        {
            redirect('admin/deposito');
        }
    }
}