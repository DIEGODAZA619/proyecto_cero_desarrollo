<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saquemodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    public function MinhasContas($categoria_conta = 1){

        $this->db->where('id_usuario', $this->userid);
        $this->db->where('categoria_conta', $categoria_conta);
        $contas = $this->db->get('usuarios_contas');

        if($contas->num_rows() > 0){

            return $contas->result();
        }

        return false;
    }

    public function CadastrarContaBancaria($banco, $agencia, $agencia_digito, $conta, $conta_digito, $tipo_conta, $operacao, $titular, $documento){

        $dados = array(
                       'id_usuario'=>$this->userid,
                       'codigo_banco'=>$banco,
                       'agencia'=>$agencia,
                       'agencia_digito'=>$agencia_digito,
                       'conta'=>$conta,
                       'conta_digito'=>$conta_digito,
                       'operacao'=>$operacao,
                       'tipo_conta'=>$tipo_conta,
                       'titular'=>$titular,
                       'documento'=>$documento,
                       'categoria_conta'=>1
                       );

        $insert = $this->db->insert('usuarios_contas', $dados);

        if($insert){

            return json_encode(array('status'=>1, 'id'=>$this->db->insert_id()));

        }else{

            return json_encode(array('status'=>0));
        }
    }

    public function ExcluirContaUsuario($id_conta){

        $this->db->where('id', $id_conta);
        $this->db->where('id_usuario', $this->userid);
        $conta = $this->db->get('usuarios_contas');

        if($conta->num_rows() > 0){

            $this->db->where('id', $id_conta);
            $delete = $this->db->delete('usuarios_contas');

            if($delete){

                return json_encode(array('status'=>1));

            }else{
                return json_encode(array('status'=>0));
            }

        }else{

            return json_encode(array('status'=>0));
        }
    }

    public function CadastrarCarteiraBitcoin($carteira){

        $dados = array(
                       'id_usuario'=>$this->userid,
                       'categoria_conta'=>2,
                       'carteira_bitcoin'=>$carteira
                       );

        $insert = $this->db->insert('usuarios_contas', $dados);

        if($insert){

            return json_encode(array('status'=>1, 'id'=>$this->db->insert_id()));

        }else{

            return json_encode(array('status'=>0));
        }
    }

   function FazerRetirada($tipo_saque, $local_recebimento, $id_conta, $valor, $timeSaque, $timeText){

    $retirar_de = ($tipo_saque == 1) ? 'saldo_rendimentos' : 'saldo_indicacoes';
    $valor = str_replace(',', '.', $valor);

    if ($retirar_de == 'saldo_rendimentos' && $valor < ConfiguracoesSistema('valor_minimo_saque_rendimentos')) {

      return json_encode(array('status' => 4));
    }

    if ($retirar_de == 'saldo_indicacoes' && $valor < ConfiguracoesSistema('valor_minimo_saque_indicacoes')) {

      return json_encode(array('status' => 4));
    }

    //$taxa_saque = (ConfiguracoesSistema('taxa_saque') / 100 * $valor);
	
	/*edward*/	 
	$taxa_saque = ($timeSaque / 100 * $valor);
		  
    $valor_desconto = $valor - $taxa_saque;

    $this->db->where('id', $id_conta);
    $this->db->where('id_usuario', $this->userid);
    $contas = $this->db->get('usuarios_contas');
	
	$fechaRetiro = date('Y-m-d H:i:s');   
	   
	if($timeSaque==10){
		$fechaRetiroG = date("Y-m-d H:i:s", strtotime($fechaRetiro. "+1 days" ));
	} 
	   
	if($timeSaque==7){
		$fechaRetiroG = date("Y-m-d H:i:s", strtotime($fechaRetiro. "+7 days" ));
	} 
	   
	if($timeSaque==5){
		$fechaRetiroG = date("Y-m-d H:i:s", strtotime($fechaRetiro. "+15 days" ));
	} 
	   
	if($timeSaque==2){
		$fechaRetiroG = date("Y-m-d H:i:s", strtotime($fechaRetiro. "+30 days" ));
	}    
	
	
	//$fechaRetiroG = date("Y-m-d H:i:s", strtotime($fechaRetiro. "+$timeText days" ));
		  
    $dados = array(
      'id_usuario' => $this->userid,
      'id_conta' => $id_conta,
      'tipo_saque' => $tipo_saque,
      'local_recebimento' => $local_recebimento,
      'valor' => $valor_desconto,
      'valor_solicitado' => $valor,
	  'time_pay' => $timeText,	
      'status' => 0,
      'data_pedido' => $fechaRetiroG
    );

    $insere = $this->db->insert('saques', $dados);

    if ($insere) {

      $mensagem = 'Hello <b>' . InformacoesUsuario('nome') . '</b>, a request to withdraw <b> ' . number_format($valor_desconto, 2, ",", ".") . ' USD</b> has been made to your account.This amount will soon be available in  ' . (($local_recebimento == 1) ? 'Your wallet.' : 'Your wallet.');

      $novo_saldo = InformacoesUsuario($retirar_de) - $valor;

      $this->db->where('id', $this->userid);
      $this->db->update('usuarios', array($retirar_de => $novo_saldo));

      GravaExtrato($this->userid, $valor_desconto, 'Withdraw request', 2);
      GravaExtrato($this->userid, $taxa_saque, 'Withdraw fee', 2);

      EnviarEmail(InformacoesUsuario('email'), 'Withdraw request', $mensagem);

      return json_encode(array('status' => 1));
    } else {

      return json_encode(array('status' => 3, 'error' => '0002'));
    }
  }

    public function PagaSaque($id_saque){

      $this->db->where('id', $id_saque);
      $saques = $this->db->get('saques');

      if($saques->num_rows() > 0){

        $row = $saques->row();

        $this->db->where('id', $id_saque);
        $update = $this->db->update('saques', array('status'=>1));

        if($update){

          EnviaNotificacao($row->id_usuario, 'Your withdrawal has already been sent to your Metamask Wallet!');
          EnviarEmail(InformacoesUsuario('email', $row->id_usuario), 'Withdrawal sent successfully!', 'Your withdrawal has just been sent to your Metamask Wallet. Soon it will be available for you to use.');

          return json_encode(array('status'=>1));
        }
      }

      return json_encode(array('status'=>2));
    }

    public function EstornarSaque($id_saque){

      $this->db->where('id', $id_saque);
      $saques = $this->db->get('saques');

      if($saques->num_rows() > 0){

        $row = $saques->row();

        $this->db->where('id', $id_saque);
        $update = $this->db->update('saques', array('status'=>2));

        if($row->tipo_saque == 1){

          $novo_saldo = InformacoesUsuario('saldo_rendimentos', $row->id_usuario) + $row->valor_solicitado;
          $coluna = 'saldo_rendimentos';
        }else{
          $novo_saldo = InformacoesUsuario('saldo_indicacoes', $row->id_usuario) + $row->valor_solicitado;
          $coluna = 'saldo_indicacoes';
        }

        $this->db->where('id', $row->id_usuario);
        $this->db->update('usuarios', array($coluna=>$novo_saldo));

        if($update){

          GravaExtrato($row->id_usuario, $row->valor_solicitado, 'Withdrawal request reversal.', 1);
          EnviaNotificacao($row->id_usuario, 'Sorry, but we had to reverse your loot.');

          return json_encode(array('status'=>1));
        }
      }

      return json_encode(array('status'=>2));
    }

    public function SaqueLiberado(){

      $hoje = date('w');
      $hora = date('H:i:s');

      $datas = $this->db->get('configuracao_pagamento_saque');

      if($datas->num_rows() > 0){

        foreach($datas->result() as $data){

          if($data->dia_pagamento == $hoje){

            if($hora >= $data->horario_inicio && $hora <= $data->horario_termino){

              return true;
            }
          }
        }

        return false;
      }

      return true;
    }

    public function DiasSaques(){

      $saques = $this->db->get('configuracao_pagamento_saque');

      if($saques->num_rows() > 0){

        return $saques->result();
      }

      return false;
    }
}
?>