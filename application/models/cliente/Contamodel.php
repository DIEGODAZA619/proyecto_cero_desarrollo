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
		
	    /*if ($status['success']) 
        {	*/		
			
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
    			
    			
    			
			
        /*}
        else{
            return '<div class="alert alert-danger text-center">Captcha invalid!</div>';
        }*/
		
		
		
		
		
		
		

    }

    public function Cadastrar(){

        $patrocinador = $this->input->post('patrocinador');
        $nome = $this->input->post('nome');
        $email = $this->input->post('email');

        $celular = $this->input->post('celular');
        $login = strtolower(trim($this->input->post('login')));
        $senha = $this->input->post('senha');

        if(valid_email($login) === TRUE){

            return '<div class="alert alert-danger text-center">Do not use your email in your login. Please try again.</div>';
        }

        $this->db->where('email', $email);
        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return '<div class="alert alert-danger text-center">E-mail already registered. Please use another one.</div>';
        }
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
									'comprovante' => "Plan Gratuito",
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

            $mensagem  = 'Hello <b>'.$nome.'</b>, Welcome to '.ConfiguracoesSistema('nome_site').' you are now part of our affiliate group.<br />';
            $mensagem .= 'Below is the access data to your account on our website: <br /><br />';
            $mensagem .= '<b>Login:</b> '.$login.' <br />';
            $mensagem .= '<b>Senha:</b> '.$senha.' <br /><br />';
            $mensagem .= 'All your information is confidential, so do not share your login and password with anyone.<br />';
            $mensagem .= 'If you need support, go to your backoffice and click on "Support" and open a ticket, we will respond as soon as possible.';

            EnviarEmail($email, 'Successfully registered!', $mensagem);

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
                $mensagem .= '<b>Recovery link:</b> <a href="'.base_url('recuperar/'.$codigo).'" target="_blank">'.base_url('recuperar/'.$codigo).'</a><br /><br />';
                
                EnviarEmail($email, 'Password recovery link', $mensagem);

                return array('mensagem'=>'<div class="alert alert-success text-center">Link sent successfully, check your email.</div>', 'status'=>1);            
            }

            return array('mensagem'=>'<div class="alert alert-danger text-center">Email not found. Please inform him again.</div>', 'status'=>0);
        }

        return array('mensagem'=>'<div class="alert alert-danger text-center">Please enter your registration email.</div>', 'status'=>0);
    }

    public function RedirecionaLink($codigo = false){

        if($codigo !== false && !empty($codigo)){

            redirect('recuperar/'.$codigo);
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

            return '<div class="alert alert-danger text-center">Sorry, but your password could not be changed. Try again.</div> <br /> <a href="'.base_url('recuperar').'" class="btn btn-primary btn-block">Voltar</a>';
        }

        return '<div class="alert alert-danger text-center">Code does not exist or has expired.</div> <br /> <a href="'.base_url('recuperar').'" class="btn btn-primary btn-block">Come back</a>';
    }
}
?>