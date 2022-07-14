<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/notificacoesmodel', 'NotificacoesModel');
        $this->load->model('admin/dashboardmodel', 'DashboardModel');
        $this->load->model('admin/usuariosmodel', 'UsuariosModel');
        $this->load->model('admin/faturasmodel', 'FaturasModel');
        $this->load->model('admin/saquesmodel', 'SaquesModel');
        $this->load->helper('permisos_helper');
    }

    public function index(){

        $data['rendimentos_hoje'] = $this->DashboardModel->TotalRendimento(true);
        $data['total_usuarios'] = $this->UsuariosModel->TotalUsuarios();
        $data['planos_ativos'] = $this->FaturasModel->PlanosAtivos();
        $data['saques_pendentes'] = $this->SaquesModel->TotalSaquesPendentes();
        $data['notificacoes'] = $this->NotificacoesModel->NotificacoesAdmin(20);

        //recuperar roles desde la variable de session DIEGO
        $data['rolescero'] = $this->session->userdata('rolescero');
        $data['roles']     = $this->session->userdata('roles');
        $this->template->load('admin/templates/template', 'admin/dashboard/dashboard', $data);
    }
}