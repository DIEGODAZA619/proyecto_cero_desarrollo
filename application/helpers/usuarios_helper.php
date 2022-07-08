<?php
function is_logged()
{

  $_this = &get_instance();

  if (!$_this->session->has_userdata('uid')) {

    redirect('login');
    exit;
  }
}

function InformacoesUsuario($coluna, $id_user = false)
{

  $_this = &get_instance();

  if ($id_user === false) {

    $id_user = $_this->session->userdata('uid');
  }

  $_this->db->where('id', $id_user);
  $usuario = $_this->db->get('usuarios'); 

  if ($usuario->num_rows() > 0) {

    return $usuario->row()->$coluna;
  }

  return false;
}


function facturas($id)
{
  $_this = &get_instance();
  $_this->db->where('id', $id);
  $plano = $_this->db->get('faturas');

  if ($plano->num_rows() > 0) {

    return $plano->result();
  }

  return false;
}

function userPlan($id)
{
  $_this = &get_instance();

  $_this->db->where('id', $id);
  $plano = $_this->db->get('planos');

  if ($plano->num_rows() > 0) {

    return $plano->result();
  }

  return false;
} //beto



function partnerRecomendacion($id_usuario)
{
  $_this = &get_instance();

  $_this->db->where('id_usuario', $id_usuario);
  // $_this->db->where('id_patrocinador_direto', $partner);
  $plano = $_this->db->get('redes');

  if ($plano->num_rows() > 0) {

    return $plano->result();
  }

  return false;
} //beto




function CheckUserIsAdmin()
{

  $_this = &get_instance();

  if (!$_this->session->has_userdata('uid_admin')) {

    redirect('admin/login');
    exit;
  }

  $user_is_admin = InformacoesUsuario('is_admin', $_this->session->userdata('uid_admin'));

  if (!$user_is_admin >= 1) {

    redirect('admin/login');
    exit;
  }
}

function PlanoCarreira($id, $coluna)
{

  $_this = &get_instance();

  $_this->db->where('id', $id);
  $plano_carreira = $_this->db->get('plano_carreira');

  if ($plano_carreira->num_rows() > 0) {

    return $plano_carreira->row()->$coluna;
  }

  return false;
}

/*edward*/
function usersPlanActive($id_usuario = false){
    
    $_this =& get_instance();

    if($id_usuario === false){
      $id_usuario = $_this->session->userdata('uid');
    }
    
    
    $_this->db->select('p.nome');
    $_this->db->from('faturas AS f');
    $_this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
    $_this->db->where('f.id_usuario', $id_usuario);
    $_this->db->order_by('f.data_pagamento', 'desc');
    $_this->db->limit(1);
        $planuser = $_this->db->get();

    if($planuser->num_rows() > 0){
		$plan =  $planuser->result();
        return $plan[0]->nome;
		//return $planuser->row();
      
	}

    return false;
	
}
/*edward*/

/*edward*/
function verDirectosID($id_usuario = false){
    
    $_this =& get_instance();

    if($id_usuario === false){
      $id_usuario = $_this->session->userdata('uid');
    }
	
    $_this->db->from('rede');
    $_this->db->where("id_patrocinador = $id_usuario and (chave_binaria=1 or chave_binaria = 2)" );
	$directoID = $_this->db->get();

    if($directoID->num_rows() > 0){
		$directoIDok =  $directoID->result();
        //return true;
		return $directoIDok;
	}

    return false;
	
}

/*edward*/

function consultaPlanGanancias($id_usuario)
{
  $_this = &get_instance();
  $_this->db->from('faturas AS f');
  $_this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
  $_this->db->where('f.id_usuario', $id_usuario);
  $_this->db->order_by('f.id', 'desc');
  $_this->db->limit(1);

  $planuser = $_this->db->get();
  $plan =  $planuser->result();
  return $plan[0]->ganhos_maximo;
}//beto


function verificarLadosBinarios($id_usuario)
{

  $_this = &get_instance();



  $_this->db->where('id_patrocinador_direto', $id_usuario);
  $_this->db->where('chave_binaria', '1');

  $izq = $_this->db->get('rede');




  if ($izq->num_rows() > 0) {
    $_this->db->where('id_patrocinador_direto', $id_usuario);
    $_this->db->where('chave_binaria', '2');
    $der = $_this->db->get('rede');


    if ($der->num_rows() > 0) {
      return 'true';
    } else {
      return 'false';
    }
  } else {
    return 'false';
  }
} //beto





function GravaExtrato($id_usuario, $valor, $mensagem, $tipo, $data = false)
{

  $_this = &get_instance();

  if (!$data) {
    $data = date('Y-m-d H:i:s');
  }

  $dados = array(
    'id_usuario' => $id_usuario,
    'mensagem' => $mensagem,
    'valor' => $valor,
    'tipo' => $tipo,
    'data' => $data
  );

  $_this->db->insert('extrato', $dados);
	
	//if ($valor >= consultaPlanGanancias($id_usuario)) {
  // $gan = array(

   //   'ganancias' => consultaPlanGanancias($id_usuario)
  //  );

 //   $_this->db->where('id', $id_usuario);
 //   $_this->db->update('usuarios', $gan);

//  } else{

// $adicionar = $valor + InformacoesUsuario('ganancias');   
// $datos = array(

 //   'ganancias' => $adicionar
 // );

   // $_this->db->where('id', $id_usuario);
   // $_this->db->update('usuarios', $datos);
      
  
 // }
		
	
}//beto







function consultaPatrocinador($id_usuario)
{
  $_this = &get_instance();
  $_this->db->from('rede AS r');
  $_this->db->join('usuarios AS u', 'u.id = r.id_usuario', 'inner');
  $_this->db->where('r.id_usuario', $id_usuario);

  $planuser = $_this->db->get();
  $plan =  $planuser->result();
  $id_patrocinador = $plan['0']->id_patrocinador_direto;
  return InformacoesUsuario('nome', $id_patrocinador);
}//beto







function EnviaNotificacao($id_usuario, $mensagem, $admin = 0)
{

  $_this = &get_instance();

  $dadosNotificacao = array(
    'for_admin' => $admin,
    'id_usuario' => $id_usuario,
    'icone' => 1,
    'mensagem' => $mensagem,
    'data' => date('Y-m-d H:i:s'),
    'visualizada' => 0
  );

  $_this->db->insert('notificacoes', $dadosNotificacao); 
}

/*
function redesUsuariosRecursividad($userid, $chave_binaria){

        if($chave_binaria !== false){
            $_this->db->where('chave_binaria', $chave_binaria);
        }

        $_this->db->where('chave_binaria', $chave_binaria);
        $_this->db->where('id_patrocinador', $userid);
        $rede = $_this->db->get('rede');

        if($rede->num_rows() > 0){

            foreach($rede->result() as $row){

                $_this->contador++;

                $_this->redesUsuariosRecursividad($row->id_usuario, false);

            }
        }

        return $_this->contador;
}
*/










function EnviarEmail($para, $assunto, $mensagem)
{

  $_this = &get_instance();

  if (ConfiguracoesSistema('smtp_enabled') == 1) {

    $config['protocol']  = 'smtp';
    $config['smtp_host'] = ConfiguracoesSistema('smtp_host');
    $config['smtp_user'] = ConfiguracoesSistema('smtp_user');
    $config['smtp_pass'] = ConfiguracoesSistema('smtp_pass');
    $config['smtp_port'] = ConfiguracoesSistema('smtp_port');
    $config['newline'] = "\r\n";

    if (ConfiguracoesSistema('smtp_encrypt') != '') {
      $config['smtp_crypto'] = ConfiguracoesSistema('smtp_encrypt');
    } else {
      $config['smtp_crypto'] = 'tls';
    }

    $_this->email->initialize($config);
  }










  $_this->email->to($para);
  $_this->email->from(ConfiguracoesSistema('email_remetente'), ConfiguracoesSistema('nome_site'));
  $_this->email->set_mailtype('html');
  $_this->email->subject($assunto);
  $_this->email->message($mensagem);
  $_this->email->send();
}
