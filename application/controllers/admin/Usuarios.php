<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct(){
        parent::__construct();
        CheckUserIsAdmin();

        $this->load->model('admin/usuariosmodel', 'UsuariosModel');
        $this->load->helper('bancos');
        $this->load->helper('permisos_helper');
    }

    public function index(){

        $idUsuario = $this->session->userdata('uid_admin');
        $valorOpcionBD = 2;
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
                                        'assets/pages/admin/usuarios.js'
                                      );

            $data['usuarios'] = $this->UsuariosModel->TodosUsuarios();
            //recuperar roles desde la variable de session DIEGO
            $data['rolescero'] = $this->session->userdata('rolescero');
            $data['roles']     = $this->session->userdata('roles');
            $this->template->load('admin/templates/template', 'admin/usuarios/usuarios', $data);
        }
        else
        {
            redirect('admin/dashboard');
        }
    }

    public function visualizar($id){

        $idUsuario = $this->session->userdata('uid_admin');
        $valorOpcionBD = 2;
        $valorPermisoBD = 4;
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
                                        'assets/pages/admin/usuarios.js'
                                      );

            $data['usuario'] = $this->UsuariosModel->DadosUsuario($id);
            //recuperar roles desde la variable de session DIEGO
            $data['rolescero'] = $this->session->userdata('rolescero');
            $data['roles']     = $this->session->userdata('roles');
            $this->template->load('admin/templates/template', 'admin/usuarios/visualizar', $data);
        }
        else
        {
            redirect('admin/usuarios');
        }
    }

    public function editar($id){

        $idUsuario = $this->session->userdata('uid_admin');
        $valorOpcionBD = 2;
        $valorPermisoBD = 3;
        $permiso = verificarPermisosUsuario($idUsuario,$valorOpcionBD,$valorPermisoBD);
        if($permiso)
        {
            $data['jsLoader'] = array(
                                        'assets/plugins/maskedinput/jquery.maskedinput.min.js',
                                        'assets/pages/admin/usuarios.js'
                                      );

            if($this->input->post('submit')){

                $data['message'] = $this->UsuariosModel->AtualizarUsuario($id);
            }

            $data['usuario'] = $this->UsuariosModel->DadosUsuario($id);
            //recuperar roles desde la variable de session DIEGO
            $data['rolescero'] = $this->session->userdata('rolescero');
            $data['roles']     = $this->session->userdata('roles');
            $this->template->load('admin/templates/template', 'admin/usuarios/editar', $data);
        }
        else
        {
            redirect('admin/usuarios');
        }
    }
}