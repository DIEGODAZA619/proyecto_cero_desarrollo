<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contamodel extends CI_Model{

    public function __construct(){
        parent::__construct();

        $this->load->helper('email');
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
    
    public function BuscaLadoVazio($id_usuario, $chave_binaria){

        $this->db->where('id_patrocinador', $id_usuario);
        $this->db->where('chave_binaria', $chave_binaria);
        $this->db->where('plano_ativo', 1);
        $rede = $this->db->get('rede');
    
        if($rede->num_rows() > 0){
    
            $row = $rede->row();
    
            return $this->BuscaLadoVazio($row->id_usuario, $chave_binaria);
        }
    
        return $id_usuario;
    }

    public function walletCuentas($data){

        $this->db->where('cpf', $data);
        $usuarios = $this->db->get('usuarios');
    
    
        foreach ($usuarios->result() as $row)
    {
            echo ','.$row->login ;
            
    }
    }

	
	    public function calcularProfit($data){
        

        $this->db->select('f.*,p.*, u.*');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p ', 'p.id = f.id_plano');
        $this->db->join('usuarios AS u ', 'u.id = f.id_usuario');
        $this->db->where('f.id_usuario ', $data);
        $this->db->order_by('f.data_pagamento','desc'); 
    
        $aResult = $this->db->get();
    
        if(!$aResult->num_rows() == 1)
        {
            return false;
        }
    
        return $aResult->result_array();

    }//beto

	
	
	


    public function CheckChaveBinariaVazia($id_patrocinador){

        $this->db->where('id', $id_patrocinador);
        $user = $this->db->get('usuarios');

        if($user->num_rows() > 0){

            $rowUser = $user->row();

            $chaveBinariaAtual = $rowUser->chave_binaria;

            $this->db->where('id_patrocinador', $id_patrocinador);
            $this->db->where('chave_binaria', $chaveBinariaAtual);
            $this->db->where('plano_ativo', 1);
            $patrocinadores = $this->db->get('rede');

            if($patrocinadores->num_rows() > 0){

                return array('id_patrocinador_direto'=>$id_patrocinador, 'id_patrocinador'=>$this->EncontraLadoVazio($id_patrocinador, $chaveBinariaAtual));

            }else{

                return array('id_patrocinador_direto'=>$id_patrocinador, 'id_patrocinador'=>$id_patrocinador);
            }
        }
    }

    public function Deslogar(){

        $this->session->unset_userdata('uid');
        redirect('login');
        exit;
    }

    public function FazerLogin(){

        $login = strtolower($this->input->post('login'));
        $senha = md5($this->input->post('senha'));
        // $cpf =$this->input->post('cpf');
		
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
 
        $userIp=$this->input->ip_address();
     
        $secret = $this->config->item('google_secret');
   
        $url="https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$recaptchaResponse."&remoteip=".$userIp;
 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      
         
        $status= json_decode($output, true);
		
	    if ($status['success']) {			
			
        $this->db->where('login', $login);
        $this->db->where('senha', $senha);
        // $this->db->where('cpf', $cpf);
        $usuario = $this->db->get('usuarios');

        if($usuario->num_rows() > 0){

            $row = $usuario->row();

            if($row->block == 1){

                return '<div class="alert alert-danger text-center">Blocked account. Please contact support.</div>';
            }

            $this->session->set_userdata('uid', $row->id);

            redirect('dashboard');

            exit;
        }

        return '<div class="alert alert-danger text-center">Username or password is invalid!</div>';
			
			
			
			
        }else{
            return '<div class="alert alert-danger text-center">Captcha invalid!</div>';
        }
		
		
		
		
		
		
		

    }

    public function Cadastrar(){

        $patrocinador = $this->input->post('patrocinador');
        $nome = $this->input->post('nome');
        $email = $this->input->post('email');
$country = $this->input->post('country');
        $celular = $this->input->post('celular');
        $login = strtolower(trim($this->input->post('login')));
        $senha = $this->input->post('senha');

        if(valid_email($login) === TRUE){

            return '<div class="alert alert-danger text-center">Do not use your email in your login. Please try again.</div>';
        }
		
		/* => descomentar para que haya un registro con solo un mail
        $this->db->where('email', $email);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return '<div class="alert alert-danger text-center">E-mail already registered. Please use another one.</div>';
        }*/
		
		
		/*
        $this->db->where('cpf', $cpf);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() >= ConfiguracoesSistema('maximo_cpfs')){

            return '<div class="alert alert-danger text-center">Metamask wallet has already reached the maximum number of registrations. Please use another.</div>';
        }*/

        $this->db->where('login', $login);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return '<div class="alert alert-danger text-center">Login already registered. Please choose another.</div>';
        }

        $dadosUsuario = array(
                              'nome'=>$nome,
                              'email'=>$email,
                              'country'=> $country,
                              'celular'=>$celular,
                              'login'=>$login,
                              'senha'=>md5($senha),
                              'saldo_rendimentos'=>0,
                              'saldo_indicacoes'=>0,
                              'plano_carreira'=>1,
                              'binario'=>0,
                              'chave_binaria'=>1,
                              'block'=>0,
                              'data_cadastro'=>date('Y-m-d H:i:s')
                            );

        $cadastraUsuario = $this->db->insert('usuarios', $dadosUsuario);

        if($cadastraUsuario){

            $id_novo_usuario = $this->db->insert_id();

            $dadosPlanoCarreira = array(
                                    'id_usuario'=>$id_novo_usuario,
                                    'id_plano_carreira'=>1,
                                    'data'=>date('Y-m-d H:i:s')
                                   );

            $cadastraPlanoCarreira = $this->db->insert('usuarios_plano_carreira', $dadosPlanoCarreira);
			
			
			
			/*agregar plan gratis | edward*/
			$fecha_actualRegalo = date('Y-m-d H:i:s');
			$fechaRegalo = date("Y-m-d H:i:s",strtotime($fecha_actualRegalo."- 1 days")); 
			$planGratuito = array(
                                    'id_usuario'=>$id_novo_usuario,
                                    'id_plano' => 89327542,
									'comprovante' => "Registered User",
									'status' => 1,
                                    'data_pagamento'=>$fechaRegalo
                                   );
			
			$planGratis = $this->db->insert('faturas', $planGratuito);
			
			/*agregar plan gratis | edward */
			
			 

            $this->db->where('login', $patrocinador);
            $usuarios = $this->db->get('usuarios');

            if($usuarios->num_rows() > 0){

                $row = $usuarios->row();

                $id_patrocinador_direto = $row->id;

                $id_patrocinador = $this->BuscaLadoVazio($id_patrocinador_direto, $row->chave_binaria);
				
				/*cambio de plano_ativo a 1 para aparecer en el arbol | Edward*/
				
				
				
                $array_patrocinador = array(
                                            'id_usuario'=>$id_novo_usuario,
                                            'id_patrocinador'=>$id_patrocinador,
                                            'chave_binaria'=>$row->chave_binaria,
                                            'id_patrocinador_direto'=>$id_patrocinador_direto,
                                            'plano_ativo'=>1
                                            );
				
				/*cambio de plano_ativo a 1 para aparecer en el arbol | Edward*/

                $this->db->insert('rede', $array_patrocinador);
            }

  $mensagem  = 'Hello <b>' . $nome . '</b>, Welcome to ' . ConfiguracoesSistema('nome_site') . ' you are now part of our affiliate group.<br />';
            $mensagem .= 'Below is the access data to your account on our website: <br /><br />';
            $mensagem .= '<b>Login:</b> ' . $login . ' <br />';
            $mensagem .= '<b>Senha:</b> ' . $senha . ' <br /><br />';
            $mensagem .= 'All your information is confidential, so do not share your login and password with anyone.<br />';
            $mensagem .= 'If you need support, go to your backoffice and click on "Support" and open a ticket, we will respond as soon as possible.';


            $mensaje = '<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
style="font-family:"Raleway", "helvetica neue", helvetica, arial, sans-serif">

<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta name="x-apple-disable-message-reformatting">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="telephone=no" name="format-detection">
<title>Nueva plantilla de correo electrC3B3nico 2022-06-26</title>

<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
<link
  href="https://fonts.googleapis.com/css?family=Martel:200,300,400,600,700,800,900%7CRaleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CRoboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
  rel="stylesheet">

<style type="text/css">
  #outlook a {
    padding: 0;
  }

  .es-button {
    mso-style-priority: 100 !important;
    text-decoration: none !important;
  }

  a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
  }

  .es-desk-hidden {
    display: none;
    float: left;
    overflow: hidden;
    width: 0;
    max-height: 0;
    line-height: 0;
    mso-hide: all;
  }

  [data-ogsb] .es-button {
    border-width: 0 !important;
    padding: 15px 40px 15px 40px !important;
  }

  [data-ogsb] .es-button.es-button-1 {
    padding: 15px 40px !important;
  }

  @media only screen and (max-width:600px) {

    p,
    ul li,
    ol li,
    a {
      line-height: 150% !important
    }

    h1,
    h2,
    h3,
    h1 a,
    h2 a,
    h3 a {
      line-height: 120%
    }

    h1 {
      font-size: 25px !important;
      text-align: center
    }

    h2 {
      font-size: 26px !important;
      text-align: center
    }

    h3 {
      font-size: 20px !important;
      text-align: center
    }

    .es-header-body h1 a,
    .es-content-body h1 a,
    .es-footer-body h1 a {
      font-size: 30px !important
    }

    .es-header-body h2 a,
    .es-content-body h2 a,
    .es-footer-body h2 a {
      font-size: 26px !important
    }

    .es-header-body h3 a,
    .es-content-body h3 a,
    .es-footer-body h3 a {
      font-size: 20px !important
    }

    .es-menu td a {
      font-size: 12px !important
    }

    .es-header-body p,
    .es-header-body ul li,
    .es-header-body ol li,
    .es-header-body a {
      font-size: 16px !important
    }

    .es-content-body p,
    .es-content-body ul li,
    .es-content-body ol li,
    .es-content-body a {
      font-size: 16px !important
    }

    .es-footer-body p,
    .es-footer-body ul li,
    .es-footer-body ol li,
    .es-footer-body a {
      font-size: 16px !important
    }

    .es-infoblock p,
    .es-infoblock ul li,
    .es-infoblock ol li,
    .es-infoblock a {
      font-size: 12px !important
    }

    *[class="gmail-fix"] {
      display: none !important
    }

    .es-m-txt-c,
    .es-m-txt-c h1,
    .es-m-txt-c h2,
    .es-m-txt-c h3 {
      text-align: center !important
    }

    .es-m-txt-r,
    .es-m-txt-r h1,
    .es-m-txt-r h2,
    .es-m-txt-r h3 {
      text-align: right !important
    }

    .es-m-txt-l,
    .es-m-txt-l h1,
    .es-m-txt-l h2,
    .es-m-txt-l h3 {
      text-align: left !important
    }

    .es-m-txt-r img,
    .es-m-txt-c img,
    .es-m-txt-l img {
      display: inline !important
    }

    .es-button-border {
      display: block !important
    }

    a.es-button,
    button.es-button {
      font-size: 20px !important;
      display: block !important;
      border-left-width: 0px !important;
      border-right-width: 0px !important
    }

    .es-adaptive table,
    .es-left,
    .es-right {
      width: 100% !important
    }

    .es-content table,
    .es-header table,
    .es-footer table,
    .es-content,
    .es-footer,
    .es-header {
      width: 100% !important;
      max-width: 600px !important
    }

    .es-adapt-td {
      display: block !important;
      width: 100% !important
    }

    .adapt-img {
      width: 100% !important;
      height: auto !important
    }

    .es-m-p0 {
      padding: 0 !important
    }

    .es-m-p0r {
      padding-right: 0 !important
    }

    .es-m-p0l {
      padding-left: 0 !important
    }

    .es-m-p0t {
      padding-top: 0 !important
    }

    .es-m-p0b {
      padding-bottom: 0 !important
    }

    .es-m-p20b {
      padding-bottom: 20px !important
    }

    .es-mobile-hidden,
    .es-hidden {
      display: none !important
    }

    tr.es-desk-hidden,
    td.es-desk-hidden,
    table.es-desk-hidden {
      width: auto !important;
      overflow: visible !important;
      float: none !important;
      max-height: inherit !important;
      line-height: inherit !important
    }

    tr.es-desk-hidden {
      display: table-row !important
    }

    table.es-desk-hidden {
      display: table !important
    }

    td.es-desk-menu-hidden {
      display: table-cell !important
    }

    .es-menu td {
      width: 1% !important
    }

    table.es-table-not-adapt,
    .esd-block-html table {
      width: auto !important
    }

    table.es-social {
      display: inline-block !important
    }

    table.es-social td {
      display: inline-block !important
    }

    .es-m-p5 {
      padding: 5px !important
    }

    .es-m-p5t {
      padding-top: 5px !important
    }

    .es-m-p5b {
      padding-bottom: 5px !important
    }

    .es-m-p5r {
      padding-right: 5px !important
    }

    .es-m-p5l {
      padding-left: 5px !important
    }

    .es-m-p10 {
      padding: 10px !important
    }

    .es-m-p10t {
      padding-top: 10px !important
    }

    .es-m-p10b {
      padding-bottom: 10px !important
    }

    .es-m-p10r {
      padding-right: 10px !important
    }

    .es-m-p10l {
      padding-left: 10px !important
    }

    .es-m-p15 {
      padding: 15px !important
    }

    .es-m-p15t {
      padding-top: 15px !important
    }

    .es-m-p15b {
      padding-bottom: 15px !important
    }

    .es-m-p15r {
      padding-right: 15px !important
    }

    .es-m-p15l {
      padding-left: 15px !important
    }

    .es-m-p20 {
      padding: 20px !important
    }

    .es-m-p20t {
      padding-top: 20px !important
    }

    .es-m-p20r {
      padding-right: 20px !important
    }

    .es-m-p20l {
      padding-left: 20px !important
    }

    .es-m-p25 {
      padding: 25px !important
    }

    .es-m-p25t {
      padding-top: 25px !important
    }

    .es-m-p25b {
      padding-bottom: 25px !important
    }

    .es-m-p25r {
      padding-right: 25px !important
    }

    .es-m-p25l {
      padding-left: 25px !important
    }

    .es-m-p30 {
      padding: 30px !important
    }

    .es-m-p30t {
      padding-top: 30px !important
    }

    .es-m-p30b {
      padding-bottom: 30px !important
    }

    .es-m-p30r {
      padding-right: 30px !important
    }

    .es-m-p30l {
      padding-left: 30px !important
    }

    .es-m-p35 {
      padding: 35px !important
    }

    .es-m-p35t {
      padding-top: 35px !important
    }

    .es-m-p35b {
      padding-bottom: 35px !important
    }

    .es-m-p35r {
      padding-right: 35px !important
    }

    .es-m-p35l {
      padding-left: 35px !important
    }

    .es-m-p40 {
      padding: 40px !important
    }

    .es-m-p40t {
      padding-top: 40px !important
    }

    .es-m-p40b {
      padding-bottom: 40px !important
    }

    .es-m-p40r {
      padding-right: 40px !important
    }

    .es-m-p40l {
      padding-left: 40px !important
    }

    .es-desk-hidden {
      display: table-row !important;
      width: auto !important;
      overflow: visible !important;
      max-height: inherit !important
    }

    .h-auto {
      height: auto !important
    }
  }
</style>
</head>

<body
style="width:100%;font-family:"Raleway", "helvetica neue", helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<div class="es-wrapper-color" style="background-color:#EFEFEF">
  <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;background-color:#EFEFEF">
    <tr>
      <td valign="top" style="padding:0;Margin:0">
        <table cellpadding="0" cellspacing="0" class="es-content" align="center"
          style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
          <tr>
            <td align="center"
              style="padding:0;Margin:0;background-image:url(http://imgfz.com/i/36K8RxS.jpeg);background-repeat:no-repeat;background-position:left top"
              background="http://imgfz.com/i/36K8RxS.jpeg">
              <table class="es-content-body" align="center" cellpadding="0" cellspacing="0"
                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                <tr>
                  <td align="left" style="padding:0;Margin:0">
                    <table cellpadding="0" cellspacing="0" width="100%"
                      style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;color:white !important">
                      <tr>
                        <td align="center" valign="top" style="padding:0;Margin:0;width:600px">
                          <table cellpadding="0" cellspacing="0" width="100%" role="presentation"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tr>
                              <td align="center" class="es-m-p40r es-m-p40l"
                                style="padding:0;Margin:0;padding-top:20px;font-size:0px"><a target="_blank"
                                  href="https://viewstripo.email"
                                  style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:underline;color:#2CB543;font-size:16px"><img
                                    class="adapt-img"
                                    src="https://jpcqbe.stripocdn.email/content/guids/CABINET_0bc6157fafad352735ad3c712c5c8f00/images/logometabizlarge.png"
                                    alt
                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                    width="250"></a></td>
                            </tr>
                            <tr>
                              <td align="center" class="es-m-txt-c es-m-p10t"
                                style="Margin:0;padding-top:20px;padding-bottom:20px;padding-left:30px;padding-right:30px">
                                <h1
                                  style="Margin:0;line-height:46px;mso-line-height-rule:exactly;font-family:"Raleway", "marker felt-thin", arial, sans-serif;font-size:30px;font-style:normal;font-weight:bold;color:white !important">';

								$mensaje .= ' <span style="color:white !important">///WELCOME TO METABIZ///</span>';
								$mensaje .= '</h1>';
								$mensaje .= '</td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="padding:0;Margin:0">
           
                          <table cellpadding="0" cellspacing="0" class="es-left" align="left"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                            <tr>
                              <td class="es-m-p20b" align="left" style="padding:0;Margin:0;width:290px">
                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation"
                                  style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                  <tr>
                                    <td align="center" style="padding:0;Margin:0;font-size:0px"><img class="adapt-img"
                                        src="http://imgfz.com/i/MuOevrS.png" alt
                                        style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                        width="290"></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
      
                          <table cellpadding="0" cellspacing="0" class="es-right" align="right"
                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;color:white !important">
                            <tr>
                              <td align="center" valign="top" style="padding:0;Margin:0;width:290px">
                                <table cellpadding="0" cellspacing="0" width="100%" role="presentation"
                                  style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                  <tr>
                                    <td align="left" class="es-m-p10t"
                                      style="padding:0;Margin:0;padding-bottom:10px;padding-top:30px">
                                      <h2
                                        style="Margin:0;line-height:34px;mso-line-height-rule:exactly;font-family:"Raleway", "marker felt-thin", arial, sans-serif;font-size:28px;font-style:normal;font-weight:bold;color:white !important">';

            $mensaje .= 'Hello <b>' . $nome . '</b>, Welcome to ' . ConfiguracoesSistema('nome_site') . ' you are now part of our affiliate group.<br />';
            $mensaje .= '</td>
            </tr>
            <tr>
              <td align="left" class="es-m-txt-c" style="padding:0;Margin:0">
                <p
                  style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:"Raleway", "helvetica neue", helvetica, arial, sans-serif;line-height:24px;color:white !important;font-size:16px">';


            $mensaje .= 'Below is the access data to your account on our website: <br /><br />';
            $mensaje .= '<b>Login:</b> ' . $login . ' <br />';
            //$mensaje .= '<b>Password:</b> ' . $senha . ' <br /><br />';
			$mensaje .= '<b>Password:</b> **************** <br /><br />';
            $mensaje .= '</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

  </td>
</tr>
<tr>
  <td align="left"
    style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px">
    <table cellpadding="0" cellspacing="0" width="100%"
      style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
      <tr>
        <td align="center" valign="top" style="padding:0;Margin:0;width:560px">
          <table cellpadding="0" cellspacing="0" width="100%" role="presentation"
            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;color:white !important">
            <tr>
              <td align="center" style="padding:0;Margin:0;padding-bottom:5px;padding-top:10px;color:white !important">
                <h2
                  style="Margin:0;line-height:34px;mso-line-height-rule:exactly;font-family:"Raleway", "marker felt-thin", arial, sans-serif;font-size:28px;font-style:normal;font-weight:bold;color:white !important">';

            $mensaje .= 'All your information is confidential, so do not share your login and password with anyone.<br />';
            $mensaje .= 'If you need support, go to your backoffice and click on "Support" and open a ticket, we will respond as soon as possible.';
            $mensaje .= '</td></tr>';
            $mensaje .= '<tr>
            <td align="center" class="es-m-txt-c"
              style="padding:0;Margin:0;padding-top:5px;padding-bottom:30px">
			  
			  <!--<span
                class="es-button-border"
                style="border-style:solid;border-color:#2CB543;background:#ff6e00;border-width:0px;display:inline-block;border-radius:12px;width:auto;display:none;">
				
				<a
                  href="https://app.themetabiz.io" class="es-button es-button-1"
                  target="_blank"
                  style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;color:#FFFFFF;font-size:20px;border-style:solid;border-color:#ff6e00;border-width:15px 40px;display:inline-block;background:#ff6e00;border-radius:12px;font-family:arial, "helvetica neue", helvetica, sans-serif;font-weight:bold;font-style:normal;line-height:24px;width:auto;text-align:center;display:none;">GET START</a></span>--> 
            </td>
          </tr>
          <tr>
            <td align="center"
              style="padding:0;Margin:0;padding-top:10px;padding-bottom:20px;font-size:0px"><img
                src="https://jpcqbe.stripocdn.email/content/guids/CABINET_0bc6157fafad352735ad3c712c5c8f00/images/logometabizlarge.png"
                alt
                style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                width="150"></td>
          </tr>
          <tr>
            <td align="center" style="padding:0;Margin:0;font-size:0">
              <table cellpadding="0" cellspacing="0" class="es-table-not-adapt es-social"
                role="presentation"
                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                <tr>
                  <td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px;"><img
                      title="Facebook"
                      src="https://jpcqbe.stripocdn.email/content/assets/img/social-icons/circle-colored/facebook-circle-colored.png"
                      alt="Fb" height="32"
                      style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic">
                  </td>
                  <td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px;"><img
                      title="Twitter"
                      src="https://jpcqbe.stripocdn.email/content/assets/img/social-icons/circle-colored/twitter-circle-colored.png"
                      alt="Tw" height="32"
                      style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic">
                  </td>
                  <td align="center" valign="top" style="padding:0;Margin:0;padding-right:10px;"><img
                      title="Instagram"
                      src="https://jpcqbe.stripocdn.email/content/assets/img/social-icons/circle-colored/instagram-circle-colored.png"
                      alt="Inst" height="32"
                      style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic">
                  </td>
                  <td align="center" valign="top" style="padding:0;Margin:0;"><img title="Youtube"
                      src="https://jpcqbe.stripocdn.email/content/assets/img/social-icons/circle-colored/youtube-circle-colored.png"
                      alt="Yt" height="32"
                      style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic">
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
</body>

</html>';




            EnviarEmail($email, 'Successfully registered!', $mensaje);

     

            return '<div class="alert alert-success text-center">Registration successful!</div>';
        }

        return '<div class="alert alert-danger text-center">Error registering your account. Try again.</div>';
    }

    public function EnviarEmailRecuperacao($email){

        if(!empty($email)){

            $codigo = md5(time().rand(400, 9999));

            $this->db->where('email', $email);
            $usuarios = $this->db->get('usuarios');

            if($usuarios->num_rows() > 0){

                $row = $usuarios->row();

                $dadosRecuperacao = array(
                                          'id_usuario'=>$row->id,
                                          'codigo'=>$codigo,
                                          'usado'=>0,
                                          'data'=>date('Y-m-d H:i:s')
                                        );

                $this->db->insert('codigos_verificacao', $dadosRecuperacao);

                $mensagem  = 'Hello, we received the password change request. Below is the recovery code: <br />';
                $mensagem .= '<b>Code:</b> '.$codigo.'<br /><br />';
                $mensagem .= 'If you prefer, click on the link below and generate the new password: <br />';
                $mensagem .= '<b>Recovery link:</b> <a href="'.base_url('recover/'.$codigo).'" target="_blank">'.base_url('recover/'.$codigo).'</a><br /><br />';
                
                EnviarEmail($email, 'Password recovery link', $mensagem);

                return array('mensagem'=>'<div class="alert alert-success text-center">Link sent successfully, check your email.</div>', 'status'=>1);            
            }

            return array('mensagem'=>'<div class="alert alert-danger text-center">Email not found. Please inform him again.</div>', 'status'=>0);
        }

        return array('mensagem'=>'<div class="alert alert-danger text-center">Please enter your registration email.</div>', 'status'=>0);
    }

    public function RedirecionaLink($codigo = false){

        if($codigo !== false && !empty($codigo)){

            redirect('recover/'.$codigo);
            return;
        }

        return array('mensagem'=>'<div class="alert alert-danger text-center">Enter verification code.</div>', 'status'=>0);
    }

    public function ResetarSenha($codigo){

        $this->db->where('codigo', $codigo);
        $this->db->where('usado', 0);
        $codigos_verificacao = $this->db->get('codigos_verificacao');

        if($codigos_verificacao->num_rows() > 0){

            $row = $codigos_verificacao->row();

            $nova_senha = mt_rand(9843743, 735248123);

            $mensagem  = 'Hello, your password has been successfully reset, as follows: <br /><br />';
            $mensagem .= '<b>New Password:</b> '.$nova_senha.'<br /><br />';
            $mensagem .= 'Please keep this password with you and do not share it with anyone for your own safety.';

            $this->db->where('id', $row->id_usuario);
            $atualiza = $this->db->update('usuarios', array('senha'=>md5($nova_senha)));

            if($atualiza){

                EnviarEmail(InformacoesUsuario('email', $row->id_usuario), 'Password changed successfully!', $mensagem);

                $this->db->where('codigo', $codigo);
                $this->db->update('codigos_verificacao', array('usado'=>1));

                return '<div class="alert alert-success text-center">Password changed successfully. You will receive a new email with the new password!</div> <br /> <a href="'.base_url('login').'" class="btn btn-primary btn-block">Login</a>';
            }

            return '<div class="alert alert-danger text-center">Sorry, but your password could not be changed. Try again.</div> <br /> <a href="'.base_url('recover').'" class="btn btn-primary btn-block">Voltar</a>';
        }

        return '<div class="alert alert-danger text-center">Code does not exist or has expired.</div> <br /> <a href="'.base_url('recover').'" class="btn btn-primary btn-block">Come back</a>';
    }
}
?>