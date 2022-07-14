<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardmodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    public function AlterarDadosCadastrais(){

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $celular = $this->input->post('celular');
        $nova_senha = $this->input->post('nova_senha');
		$oldtf = InformacoesUsuario('active_twofactor');//Christopher Flores
        $tf=0;//Christopher Flores
        if($this->input->post('twofactor') == 1){
            $tf=1;
        }//Christopher Flores


        if(InformacoesUsuario('email') != $email){

            $this->db->where('email', $email);
            $usuario = $this->db->get('usuarios');

            if($usuario->num_rows() > 0){

                return '<div class="alert alert-danger text-center">The email provided is already in use, please try again.</div>';
            }
        }

        if(InformacoesUsuario('cpf') != $cpf){

            $this->db->where('cpf', $cpf);
            $usuario = $this->db->get('usuarios');

            if($usuario->num_rows() == 1 && ConfiguracoesSistema('maximo_cpfs') == 1){

                return '<div class="alert alert-danger text-center">Metamask wallet has already been registered, please use another one.</div>';
            }

            if($usuario->num_rows() >= ConfiguracoesSistema('maximo_cpfs')){

                return '<div class="alert alert-danger text-center">This wallet has already exceeded the maximum number of records in the system.</div>';
            }
        }

        $dados = array(
                       'nome'=>$nome,
                       'email'=>$email,
                       'cpf'=>$cpf,
                       'celular'=>$celular,
                       'active_twofactor' => $tf
                      );

        if(!empty($nova_senha)){
            $dados['senha'] = md5($nova_senha);
        }

        $this->db->where('id', $this->userid);
        $update = $this->db->update('usuarios', $dados);

        if($update){
			
			//christopher flores
            if($tf == 1 && $oldtf == 0){
                redirect('two-factor-authentication');
            }//christopher flores

            return '<div class="alert alert-success text-center">Successfully changed data!</div>';
        }

        return '<div class="alert alert-danger text-center">Error changing data. Try again.</div>';
    }

    public function PlanoAtivo(){

        $this->db->select('f.data_pagamento');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->where('f.id_usuario', $this->userid);
        $this->db->where('f.status', 1);
		$this->db->order_by('f.id', 'desc');
        $plano = $this->db->get();

        if($plano->num_rows() > 0){

            $row = $plano->row();

            $vencimento = strtotime($row->data_pagamento) + (60*60*24*ConfiguracoesSistema('quantidade_dias'));
            
            return date('Y-m-d H:i:s', $vencimento);
        }

        return false;
    }
	
	
	public function directReferrals(){
		
		$this->db->select('id_usuario');
        $this->db->from('rede');
        $this->db->order_by('id', 'DESC');
        $this->db->where('id_patrocinador_direto', $this->userid);
		
        $directuser = $this->db->get();

        if($directuser->num_rows() > 0){
			
			return $directuser->result();
			
        }

        return false;
    }
	
	
	public function usersPlanActive($id_usuario){
		
		$this->db->select('p.nome');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->where('f.id_usuario', $id_usuario);
        $this->db->order_by('f.data_pagamento', 'desc');
		$this->db->limit(1);
        $planuser = $this->db->get();

        if($planuser->num_rows() > 0){
			
			return $planuser->result();
			//return $planuser->row();
			
        }

        return false;
    }
	
	
}
?>