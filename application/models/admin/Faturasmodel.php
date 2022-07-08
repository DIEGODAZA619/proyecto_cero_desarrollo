<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Faturasmodel extends CI_Model{

    protected $rede_total = array();
    protected $todos_niveis = array();

    public function __construct(){
        parent::__construct();
    }

    public function ProcuraPatrocinador($id_usuario, $id_patrocinador, $chave_binaria){
        
        $this->db->where('id_patrocinador', $id_patrocinador);
        $this->db->where('chave_binaria', $chave_binaria);
        $this->db->where('id_usuario != ', $id_usuario);
        $this->db->where('plano_ativo', 1);
        $this->db->order_by('id', 'ASC');
        $rede = $this->db->get('rede');
        
        if($rede->num_rows() > 0){
            
            $row = $rede->row();
            
            return $this->ProcuraPatrocinador($id_usuario, $row->id_usuario, $chave_binaria);
            
        }
        
        return $id_patrocinador;
    }
    
    public function AtualizaPatrocinador($id_usuario){
        
        $this->db->where('id_usuario', $id_usuario);
        $rede = $this->db->get('rede');
        
        if($rede->num_rows() > 0){
            
            $row = $rede->row();
            
            $id_patrocinador_atual = $row->id_patrocinador;
            $posicao_atual = $row->chave_binaria;
            
            return $this->ProcuraPatrocinador($id_usuario, $id_patrocinador_atual, $posicao_atual);
        }
    }

    public function VerificaBinarioAtivo($id_fatura){

        $this->db->select('f.*, p.binario');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->where('f.id', $id_fatura);
        $fatura = $this->db->get();
    
        if($fatura->num_rows() > 0){
    
            $row = $fatura->row();
    
            $this->rede_total = array();
            $this->LinhaIndicacao($row->id_usuario, 1000000);
    
            if(!empty($this->rede_total)){
    
                foreach($this->rede_total as $patrocinadores){
    
                    $this->db->where('id_usuario', $patrocinadores);
                    $this->db->where('plano_ativo', 1);
                    $rede = $this->db->get('rede');
    
                    if($rede->num_rows() > 0){
                        
                        if(InformacoesUsuario('binario', $patrocinadores) == 0){
    
                            $this->db->where('id_patrocinador_direto', $patrocinadores);
                            $this->db->where('chave_binaria', 1);
                            $this->db->where('plano_ativo', 1);
                            $LadoEsquerdo = $this->db->get('rede');
    
                            $this->db->where('id_patrocinador_direto', $patrocinadores);
                            $this->db->where('chave_binaria', 2);
                            $this->db->where('plano_ativo', 1);
                            $LadoDireito = $this->db->get('rede');
    
                            if($LadoEsquerdo->num_rows() > 0 && $LadoDireito->num_rows() > 0){
    
                                $this->db->where('id', $patrocinadores);
                                $this->db->update('usuarios', array('binario'=>1));
                            }
                        }
                    }
                }
            }
        }
    }

    public function CriaTodosNiveis(){

        $this->db->order_by('nivel', 'ASC');
        $niveis = $this->db->get('configuracao_nivel_indicacoes');

        if($niveis->num_rows() > 0){

            foreach($niveis->result() as $nivel){

                $this->todos_niveis[$nivel->nivel] = $nivel->porcentagem;
            }
        }
    }

    public function LinhaIndicacao($id, $niveis, $bonus = false){

        if($niveis > 0){

            $this->db->where('id_usuario', $id);
            $patrocinadores = $this->db->get('rede');

            if($patrocinadores->num_rows() > 0){

                $row = $patrocinadores->row();

                if(!$bonus){
                    $id = $row->id_patrocinador;
                }else{
                    $id = $row->id_patrocinador_direto;
                }

                $this->rede_total[] = $id;

                $this->LinhaIndicacao($id, $niveis-1, $bonus);
            }
        }
    }
    
    public function EncontraLadoVazio($id_usuario, $chave_binaria){

        $this->db->order_by('id', 'ASC');
        $this->db->where('id_patrocinador', $id_usuario);
        $this->db->where('chave_binaria', $chave_binaria);
        $this->db->where('plano_ativo', 1);
        $patrocinadoresSearch = $this->db->get('rede');

        foreach($patrocinadoresSearch->result() as $resultPatrocinadores){

            $this->db->where('id_patrocinador', $resultPatrocinadores->id_usuario);
            $this->db->where('chave_binaria', $chave_binaria);
            $this->db->where('plano_ativo', 1);
            $patrocinadorEncontrado = $this->db->get('rede');

            if($patrocinadorEncontrado->num_rows() > 0){

                 return $this->EncontraLadoVazio($resultPatrocinadores->id_usuario, $chave_binaria);

            }else{

                return $resultPatrocinadores->id_usuario;
            }
        }
    }

    public function CheckChaveBinariaVazia($id_usuario, $id_patrocinador, $chave_binaria){

            $this->db->where('id_patrocinador', $id_patrocinador);
            $this->db->where('chave_binaria', $chave_binaria);
            $this->db->where('plano_ativo', 1);
            $patrocinadores = $this->db->get('rede');

            if($patrocinadores->num_rows() > 0){

                $row = $patrocinadores->row();

                if($row->id_usuario != $id_usuario){

                    return array('id_patrocinador'=>$this->EncontraLadoVazio($id_patrocinador, $chave_binaria));

                }else{
                    return array('id_patrocinador'=>$id_patrocinador);
                }
                
            }else{

                return array('id_patrocinador'=>$id_patrocinador);
            }
        
    }

    public function PlanosAtivos(){

        $this->db->where('status', !0);
        $planos = $this->db->get('faturas');

        return $planos->num_rows();
    }      

    public function TodasFaturas($status = false){

        $this->db->select('f.comprovante, f.id, f.id_usuario, p.nome, p.valor');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->order_by('f.data_pagamento', 'ASC');
        if($status === false){
            $this->db->where('f.comprovante IS NOT NULL', null, false);
            $this->db->where('f.data_pagamento IS NULL', null, false);
            $this->db->where('f.status', 0);
        }else{
            $this->db->where('f.status', $status);

            if($status === 0){
                $this->db->where('f.comprovante IS NULL', null, false);
                $this->db->where('f.data_pagamento IS NULL', null, false);
            }
        }
        
        $query = $this->db->get();

        if($query->num_rows() > 0){

            return $query->result();
        }

        return false;
    }

    public function LiberarFatura($id){

        $this->db->select('f.id_usuario, p.valor, p.plano_carreira, p.binario');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->where('f.id', $id);
        $this->db->where('f.status', 0);
        $fatura = $this->db->get();

        if($fatura->num_rows() > 0){

            $row = $fatura->row();

            $this->db->where('id_usuario', $row->id_usuario);
            $this->db->where('status', 0);
            

            $this->db->where('id', $id);
            $update = $this->db->update('faturas', array('status'=>1, 'data_pagamento'=>date('Y-m-d H:i:s')));//edward

            if($update){

                $this->db->where('id_usuario', $row->id_usuario);
                $redeAfiliado = $this->db->get('rede');

                if($redeAfiliado->num_rows() > 0){

                    $rowAfiliado = $redeAfiliado->row();

                    $conta_niveis = $this->db->get('configuracao_nivel_indicacoes');

                    if($conta_niveis->num_rows() > 0){

                        $this->rede_total = array();
                        $this->LinhaIndicacao($row->id_usuario, $conta_niveis->num_rows(), true);
                        $this->CriaTodosNiveis();

                        if(!empty($this->rede_total)){

                            foreach($this->rede_total as $nivel=>$patrocinador){

                                if(isset($this->todos_niveis[$nivel+1])){

                                    $bonusIndicacao = ($this->todos_niveis[$nivel+1]/100) * $row->valor;

                                    $novoSaldoIndicacao = InformacoesUsuario('saldo_indicacoes', $patrocinador) + $bonusIndicacao;
	


                                    $this->db->where('id', $patrocinador);
                                    $this->db->update('usuarios', array('saldo_indicacoes'=>$novoSaldoIndicacao));

                                    GravaExtrato($patrocinador, $bonusIndicacao, 'User Referral Bonus '.InformacoesUsuario('login', $row->id_usuario), 1);

                                }
                            }
                        }
					
						
                    }

                    $this->db->where('id_usuario', $row->id_usuario);
                    $this->db->where('plano_ativo', 1);
                    $redeCheck = $this->db->get('rede');
                    
                    if($redeCheck->num_rows() <= 0){
                    
                        $id_patrocinador = $this->AtualizaPatrocinador($row->id_usuario);
    
                        $this->db->where('id_usuario', $row->id_usuario);
                        $this->db->update('rede', array('id_patrocinador'=>$id_patrocinador, 'plano_ativo'=>1));
                    
                    }
                }

                $this->rede_total = array();
                $this->LinhaIndicacao($row->id_usuario, 1000000);

                if(!empty($this->rede_total)){

                    if(isset($rowAfiliado)){
                        $LadoChaveBinaria = $rowAfiliado->chave_binaria;
                    }else{
                        $LadoChaveBinaria = 1;
                    }

                    foreach($this->rede_total as $patrocinadores){

                        $this->db->where('id_usuario', $patrocinadores);
                        $rede = $this->db->get('rede');

                        if($rede->num_rows() > 0){

                            $rowRede = $rede->row();

                            $dadosBinario = array(
                                                  'id_usuario'=>$patrocinadores,
                                                  'pontos'=>$row->plano_carreira,
                                                  'chave_binaria'=>$LadoChaveBinaria,
                                                  'pago'=>0,
                                                  'data'=>date('Y-m-d H:i:s')
                                                );

                            $this->db->insert('rede_pontos_binario', $dadosBinario);

                            $LadoChaveBinaria = $rowRede->chave_binaria;
                        
                        }else{

                            $dadosBinario = array(
                                                  'id_usuario'=>$patrocinadores,
                                                  'pontos'=>$row->plano_carreira,
                                                  'chave_binaria'=>1,
                                                  'pago'=>0,
                                                  'data'=>date('Y-m-d H:i:s')
                                                );

                            $this->db->insert('rede_pontos_binario', $dadosBinario);
                        }
                    }
                }

                $this->db->where('id', $row->id_usuario);
                $usuario = $this->db->get('usuarios');

                if($usuario->num_rows() > 0){

                    $rowUser = $usuario->row();

                    if($rowUser->quantidade_binario < $row->binario){

                        $this->db->where('id', $row->id_usuario);
                        $this->db->update('usuarios', array('quantidade_binario'=>$row->binario));
                    }
                }

                EnviaNotificacao($row->id_usuario, 'Plan activated successfully!');

                $this->VerificaBinarioAtivo($id);
redirect('admin/faturas/liberar');
                return '<div class="alert alert-success text-center">Invoice released successfully!</div>';
            }else{

                return '<div class="alert alert-danger text-center">Sorry, but there was an error releasing the invoice. Try again.</div>';
            }
        }

        return '<div class="alert alert-danger text-center">Sorry, but the invoice has already been released or does not exist. Try again.</div>';
    }
}
?>