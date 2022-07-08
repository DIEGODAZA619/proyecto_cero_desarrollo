<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuariosmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function TotalUsuarios(){

        $usuarios = $this->db->get('usuarios');

        return $usuarios->num_rows();
    }

    public function TodosUsuarios(){

        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return $usuarios->result();
        }

        return false;
    }

    public function DadosUsuario($id){

        $dados = array();

        $this->db->where('id', $id);
        $usuario = $this->db->get('usuarios');

        if($usuario->num_rows() > 0){

            $rowUsuario = $usuario->row();

            $dados['usuario'] = $rowUsuario;

            $this->db->where('id_usuario', $id);
            $contasBancarias = $this->db->get('usuarios_contas');

            if($contasBancarias->num_rows() > 0){

                $dados['contas'] = $contasBancarias->result();
            }

            $this->db->select('upc.data, pc.nome');
            $this->db->from('usuarios_plano_carreira AS upc');
            $this->db->join('plano_carreira AS pc', 'pc.id = upc.id_plano_carreira', 'inner');
            $this->db->where('upc.id_usuario', $id);
            $this->db->order_by('upc.id', 'DESC');

            $planoCarreira = $this->db->get();

            if($planoCarreira->num_rows() > 0){

                $dados['plano_carreira'] = $planoCarreira->result();
            }

            $this->db->select_sum('pontos');
            $this->db->from('rede_pontos_binario');
            $this->db->where('id_usuario', $id);
            $this->db->where('chave_binaria', 1);
            $queryBinarioEsquerdo = $this->db->get();

            $this->db->select_sum('pontos');
            $this->db->from('rede_pontos_binario');
            $this->db->where('id_usuario', $id);
            $this->db->where('chave_binaria', 2);
            $queryBinarioDireito = $this->db->get();

            if($queryBinarioEsquerdo->num_rows() > 0){

                $pontosEsquerdo = $queryBinarioEsquerdo->row()->pontos;

                $dados['binario']['esquerdo'] = (!empty($pontosEsquerdo)) ? $pontosEsquerdo : 0;
            }else{
                $dados['binario']['esquerdo'] = 0;
            }

            if($queryBinarioDireito->num_rows() > 0){

                $pontosDireito = $queryBinarioDireito->row()->pontos;

                $dados['binario']['direito'] = (!empty($pontosDireito)) ? $pontosDireito : 0;
            }else{
                $dados['binario']['direito'] = 0;
            }

            
            $this->db->select('p.nome, f.data_pagamento');
            $this->db->from('faturas AS f');
            $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
            $this->db->where('f.status', 1);
            $this->db->where('f.id_usuario', $id);
            $this->db->order_by('f.id', 'DESC');
            $this->db->limit(1);
            $queryPlanoAtual = $this->db->get();

            if($queryPlanoAtual->num_rows() > 0){

                $dados['plano'] = $queryPlanoAtual->row();
            }

            $this->db->where('id_usuario', $id);
            $extratos = $this->db->get('extrato');

            if($extratos->num_rows() > 0){

                $dados['extrato'] = $extratos->result();
            }

            return $dados;
        }

        redirect('admin/usuarios');
    }

    public function AtualizarUsuario($id){

        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
        $cpf = $this->input->post('cpf');
        $celular = $this->input->post('celular');
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');
        $block = $this->input->post('block');
        $is_admin = $this->input->post('is_admin');
        $saldo_rendimentos = $this->input->post('saldo_rendimentos');
        $saldo_indicacoes = $this->input->post('saldo_indicacoes');
        $quantidade_binario = $this->input->post('quantidade_binario');

        $this->db->where('email', $email);
        $userEmail = $this->db->get('usuarios');

        if($userEmail->num_rows() > 0){

            $userEmailRow = $userEmail->row();

            if($id != $userEmailRow->id){

                return '<div class="alert alert-danger text-center">The email provided is already in use. Choose another.</div>';
            }
        }

        $this->db->where('login', $login);
        $userLogin = $this->db->get('usuarios');

        if($userLogin->num_rows() > 0){

            $userLoginRow = $userLogin->row();

            if($id != $userLoginRow->id){

                return '<div class="alert alert-danger text-center">The login provided is already in use. Choose another.</div>';
            }
        }

        $dados = array(
                       'nome'=>$nome,
                       'email'=>$email,
                      // 'cpf'=>$cpf,
                       'celular'=>$celular,
                       'login'=>$login,
                       'block'=>$block,
                       'is_admin'=>$is_admin,
                       'saldo_rendimentos'=>$saldo_rendimentos,
                       'saldo_indicacoes'=>$saldo_indicacoes,
                       'quantidade_binario'=>$quantidade_binario
                       );

        if(!empty($senha)){
            $dados['senha'] = md5($senha);
        }

        $this->db->where('id', $id);
        $update = $this->db->update('usuarios', $dados);

        if($update){

            return '<div class="alert alert-success text-center">User successfully updated!</div>';
        }

        return '<div class="alert alert-danger text-center">Error updating user. Try again.</div>';
    }
}
?>