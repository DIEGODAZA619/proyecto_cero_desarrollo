<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Rangomodel', 'Rangomodel'); //DIEGO
    }

    public function getPrevKey($key, $hash = array()){
        $keys = array_keys($hash);
        $found_index = array_search($key, $keys);
        if ($found_index === false || $found_index === 0)
            return false;
        return $keys[$found_index-1];
    }

    public function VerificaQualificadorRede($id_usuario, $qualificador_quantidade, $qualificador_plano){

        $quantidade = 0;

        $this->db->where('id_patrocinador', $id_usuario);
        $this->db->where('plano_ativo', 1);
        $rede = $this->db->get('rede');

        if($rede->num_rows() > 0){

            foreach($rede->result() as $resultRede){

                $this->db->where('id_usuario', $resultRede->id_usuario);
                $this->db->where('id_plano_carreira', $qualificador_plano);
                $planos_carreira_ganhos = $this->db->get('usuarios_plano_carreira');

                if($planos_carreira_ganhos->num_rows() > 0){

                    $quantidade++;
                }
            }

            if($quantidade >= $qualificador_quantidade){

                return true;

            }else{

                foreach($rede->result() as $resultRede){

                    $retorno = $this->VerificaQualificadorRede($resultRede->id_usuario, $qualificador_quantidade, $qualificador_plano);
                    
                    if($retorno){

                        return true;
                    }
                }
            }
        }

        return false;
    }

    function PagaBinarioDia($id_usuario) {
        $directo_izq = $this->getDirecto($id_usuario, 1);
        $directo_der = $this->getDirecto($id_usuario, 2);
        if (is_object($directo_der) && is_object($directo_izq)) {
            $puntosizquierdo = $this->getPuntoUsario($id_usuario, 1);
            $puntosderecho = $this->getPuntoUsario($id_usuario, 2);
            $izquierdo = 0;
            $derecho = 0;

        foreach ($puntosizquierdo as $fila) {
            $izquierdo = $izquierdo + $fila->pontos;
        }
        foreach ($puntosderecho as $fila) {
            $derecho = $derecho + $fila->pontos;
        }

        if ($izquierdo < $derecho) {
            $valor = $izquierdo;
            $lado = 1;
        } elseif ($derecho < $izquierdo) {
            $valor = $derecho;
            $lado = 2;
        } else {
            $valor = $izquierdo;
            $lado = 1;
        }

        if ($valor > 0) {
            $pocentaje = $valor * 0.07;

            $ganancias = $this->verificarLimiteGanancias($id_usuario, $pocentaje, 'REN');

            if ($ganancias > 0) {
                GravaExtrato($id_usuario, $ganancias, 'Binary payment today', 1);
                $data = array('pago' => 1);
                $restarPuntos = $valor;
                if ($lado == 1) {
                    foreach ($puntosizquierdo as $fila) {
                        $id = $fila->id;
                        $actualizarLados = $this->updatePuntosLado($id, $data);
                    }
                    //restar puntos
                    foreach ($puntosderecho as $fila) {
                        if ($restarPuntos > 0) {
                            //valor - quitar
                            //10 - 20
                            if ($fila->pontos > $restarPuntos) { // cuando los puntos son mayores
                                $valorActualizar = $fila->pontos - $restarPuntos;
                                $restarPuntos = 0;
                                //valor - quitar
                                //10 - 20
                            } elseif ($fila->pontos < $restarPuntos) { //cuando los puntos son menores
                                $valorActualizar = 0;
                                $restarPuntos = $restarPuntos - $fila->pontos;
                                $id = $fila->id;
                                $this->updatePuntosLado($id, $data);
                                $data2 = array('pontos' => 0);
                                $actualizarLados = $this->updatePuntosLado($id, $data2);
                                //valor - quitar
                                //10 - 20
                            } else { //cuando los puntos son iguales
                                $valorActualizar = 0;
                                $restarPuntos = 0;
                                $id = $fila->id;
                                $this->updatePuntosLado($id, $data);
                                $data2 = array('pontos' => 0);
                                $actualizarLados = $this->updatePuntosLado($id, $data2);
                            }
                            $id = $fila->id;
                            if ($valorActualizar > 0) {
                                $data2 = array('pontos' => $valorActualizar);
                                $actualizarLados = $this->updatePuntosLado($id, $data2);
                            }
                        }
                    }
                } else {
                    foreach ($puntosderecho as $fila) {
                        $id = $fila->id;
                        $actualizarLados = $this->updatePuntosLado($id, $data);
                    }

                        //restar puntos
                        foreach ($puntosizquierdo as $fila) {
                            if ($restarPuntos > 0) {
                                if ($fila->pontos > $restarPuntos) { // cuando los puntos son mayores
                                    $valorActualizar = $fila->pontos - $restarPuntos;
                                    $restarPuntos = 0;
                                } elseif ($fila->pontos < $restarPuntos) { //cuando los puntos son menores
                                    $valorActualizar = 0;
                                    $restarPuntos = $restarPuntos - $fila->pontos;
                                    $id = $fila->id;
                                    $data2 = array('pontos' => 0);
                                    $actualizarLados = $this->updatePuntosLado($id, $data2);
                                    $this->updatePuntosLado($id, $data);
                                } else { //cuando los puntos son iguales
                                    $valorActualizar = 0;
                                    $restarPuntos = 0;
                                    $id = $fila->id;
                                    $this->updatePuntosLado($id, $data);
                                    $data2 = array('pontos' => 0);
                                    $actualizarLados = $this->updatePuntosLado($id, $data2);
                                }
                                $id = $fila->id;
                                if ($valorActualizar > 0) {
                                    $data2 = array('pontos' => $valorActualizar);
                                    $actualizarLados = $this->updatePuntosLado($id, $data2);
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    function getPuntoUsario($id, $lado) {
        $query = $this->db->query("select *
                                     from rede_pontos_binario
                                    where id_usuario =" . $id . "
                                      and chave_binaria = " . $lado . "
                                      and pago = 0
                                    order by id asc");
        return $query->result();
    }

    public function getDirecto($id_patrocinador, $llave) {
        $query = $this->db->query('select * from rede 
        inner join faturas f on f.id_usuario = rede.id_usuario
        inner join planos p on p.id = f.id_plano
        where rede.id_patrocinador_direto = ' . $id_patrocinador . ' and f.status = 1  and p.valor > 0 and chave_binaria = ' . $llave . ' limit 1');
        return $query->row();
    }

    function updatePuntosLado($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('rede_pontos_binario', $data);
    }


    public function PagaBinarioDia_antiguo() {

        $fp = fopen('cron_execute.txt', 'a+');
        $fw = fwrite($fp, 'PagaBinarioDia - '.date('d/m/Y H:i:s').'\r\n');
        fclose($fp);

        $UsuariosLadoMenor = array();

        $pontos = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos, id_usuario, chave_binaria FROM rede_pontos_binario WHERE  pago = '0' GROUP BY chave_binaria,id_usuario");
        
        echo "SELECT COALESCE(SUM(pontos), 0) as pontos, id_usuario, chave_binaria FROM rede_pontos_binario WHERE  pago = '0' GROUP BY chave_binaria,id_usuario";
        
        print_r($pontos);

        if($pontos->num_rows() > 0){
            echo "<br>".$pontos->num_rows();
            
            foreach($pontos->result() as $ponto){

                if(InformacoesUsuario('binario', $ponto->id_usuario) == 1){
                    
                    /* Pega o lado menor e grava em um array */
                    if(!isset($UsuariosLadoMenor[$ponto->id_usuario])){
                        
                        echo "id user: puntos ".$ponto->id_usuario;
                        
                        $LadoEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '1' AND pago = '0'");
                        
                        echo "<br>SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '1' AND pago = '1'";
                        
                        $LadoDireito = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '2' AND pago = '0'");
                        
                        echo "<br>SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '2' AND pago = '1'";
                        
                        echo "<br>--- puntos derechos Pag. ".$LadoEsquerdo->row()->pontos;
                        
                        echo "<br>--- puntos izquierdos Pag. ".$LadoDireito->row()->pontos;
                        
                        echo "<br>//***-- Pagar por Der --** ".$puntosDerechoPagar = $LadoEsquerdo->row()->pontos;
                        echo "<br>//***-- Pagar por Izq --** ".$puntosIzquierdaPagar = $LadoDireito->row()->pontos;

                        if($LadoEsquerdo->row()->pontos > $LadoDireito->row()->pontos){
                            $lado_menorBueno = 2;
                        }elseif($LadoDireito->row()->pontos > $LadoEsquerdo->row()->pontos){
                            $lado_menorBueno = 1;
                        }else{

                            $LadoEsquerdoZerado = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '1' AND pago = '0'");
                            
                            
                            echo "<br>SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '1' AND pago = '0'";
                            
                            
                            
                            $LadoDireitoZerado = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '2' AND pago = '0'");
                            
                            echo "<br>SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '2' AND pago = '0'";
                            
                            echo "<br>***-- Pagar por Der --** ".$puntosDerechoPagar = $LadoDireitoZerado->row()->pontos;
                            echo "<br>***-- Pagar por Izq --** ".$puntosIzquierdaPagar = $LadoEsquerdoZerado->row()->pontos;
                            
                            if($LadoEsquerdoZerado->row()->pontos < $LadoDireitoZerado->row()->pontos){

                                echo "<br>Pagar por Izq".$lado_menorBueno = 1; 

                            }elseif($LadoDireitoZerado->row()->pontos < $LadoEsquerdoZerado->row()->pontos){

                                echo "<br>Pagar por Der".$lado_menorBueno = 2; 

                            }else{

                                echo "<br>Pagar por Cualquiera".$lado_menorBueno = 1; 
                            }
                        }

                        echo "<br> pagar por lado menor ".$pagar_por = $UsuariosLadoMenor[$ponto->id_usuario] = $lado_menorBueno;
                    }else{
                        echo "<br> pagar por defecto".$pagar_por = $UsuariosLadoMenor[$ponto->id_usuario];
                    }
                    
                    
                    /*restringimos el pago sino tiene piernas*/
                    
                    if($puntosDerechoPagar>1 and $puntosIzquierdaPagar>1 ){
                    
                        //inicio funcion pagar

                        if(isset($pagar_por)){

                            //var_dump($pagar_por);

                            $this->db->select('p.teto_binario');
                            $this->db->from('faturas AS f');
                            $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
                            $this->db->where('f.id_usuario', $ponto->id_usuario);
                            $this->db->where('f.status', 1);
                            $this->db->order_by('f.data_pagamento', 'DESC');
                            $this->db->limit(1);
                            $plano = $this->db->get();
                            echo "<pre>";

                            //print_r($plano);

                            echo "</pre>";
                            if($plano->num_rows() > 0){



                                echo "<br>";


                                echo "<br>";
                                echo "p X ".$pagar_por;

                                if(isset($pagar_por)){

                                    $row = $plano->row();
                                    /*
                                    $ponto->pontos == 100%
                                          ???         == InformacoesUsuario('quantidade_binario', $ponto->id_usuario) 
                                    
                                    */
                                    $puntosDerechoPagar;
                                    $puntosIzquierdaPagar;
                                    
                                    
                                    /*conditional less*/
                                    
                                    if($puntosDerechoPagar<$puntosIzquierdaPagar){
                                        $puntosParaPagar =$puntosDerechoPagar;
                                    }elseif($puntosDerechoPagar>$puntosIzquierdaPagar){
                                        $puntosParaPagar =$puntosIzquierdaPagar;
                                    }else{
                                        $puntosParaPagar =$puntosIzquierdaPagar;
                                    }
                                    
                                    /*conditional less*/
                                    
                                    
                                    echo "<br>informacion ".InformacoesUsuario('quantidade_binario', $ponto->id_usuario);
                                    echo "<br> pontos ".$ponto->pontos;
                                    
                                    
                                    echo "<br>Pago total ".$totalPagamento = (InformacoesUsuario('quantidade_binario', $ponto->id_usuario)*$puntosParaPagar) / 100 ; 

                                    echo "<br>Pago totalPagamento ".$totalPagamento;
                                    echo "<br>Pago teto_binario ".$row->teto_binario;

                                    if($totalPagamento > $row->teto_binario){

                                        echo "<br>Pago teto Binario ".$totalPagamento = $row->teto_binario;
                                    }
                                    echo "<br>ID usuario: ".$ponto->id_usuario; 
                                    echo "<br>****** novoRendimento".$novoRendimento = InformacoesUsuario('saldo_rendimentos', $ponto->id_usuario) + $totalPagamento;

                                    $this->db->where('id', $ponto->id_usuario);
                                    $updateSaldo = $this->db->update('usuarios', array('saldo_rendimentos'=>$novoRendimento));

                                    if($updateSaldo){

                                        echo "<br> Pago";
                                        
                                        
                                        /*
                                        
                                        falta la condicional para saber si ya atiene un registro,
                                        para asi insertar o actualizar OJO CON ESTO
                                        ES SOLO LOGICA MATEMATICA PARA LUEGO RESTAR CON ESTOS DATOS
                                        DE LE BASE DE DATOS A LOS PUNTOS QUE NO SE MOSTRARAN
                                        YA QUE LOS PUNTOS QUE SE REGISTRAN O ACTUALIZAN SON DE LA OTRA PIERNA
                                        
                                        
                                        */
                                        
                                        if($pagar_por == 1){
                                            $corteIzquierda= $puntosParaPagar;
                                            $corteDerecha= 0;
                                        }
                                        
                                        if($pagar_por == 2){
                                            $corteDerecha= $puntosParaPagar;
                                            $corteIzquierda= 0;
                                        }
                                        
                                        /*verificar y si ya tiene registro solo actualizar*/
                                        $corteAct = array(                           
                                           'id_usuario'=>$ponto->id_usuario,
                                           'corteIzquierda'=>$corteIzquierda,
                                           'corteDerecha'=>$corteDerecha,
                                            
                                        );
                                        
                                        $this->db->update('cortes', $corteAct);
                                        
                                        /*verificar y si ya tiene registro solo actualizar*/
                                        
                                        
                                        /*insertando corte*/
                                        
                                        
                                        
                                        $corte = array(                           
                                           'id_usuario'=>$ponto->id_usuario,
                                           'corteIzquierda'=>$corteIzquierda,
                                           'corteDerecha'=>$corteDerecha,
                                            
                                        );
                                        
                                        $this->db->insert('cortes', $corte);
                                        /*insertando corte*/
                                        
                                        
                                        

                                        $this->db->where('pago', 0);
                                        $this->db->where('id_usuario', $ponto->id_usuario);
                                        $this->db->where('chave_binaria', $pagar_por);
                                        $this->db->update('rede_pontos_binario', array('pago'=>1));

                                        GravaExtrato($ponto->id_usuario, $totalPagamento, 'Pagamento do binário do dia', 1);

                                        echo "<hr>";
                                    }
                                }
                            }

                        }//fin funcion pagar
                        
                        
                    }else{
                        
                        
                        echo "No tiene una de las piernas";
                        echo "<hr>";
                    }   
                    
                    
                    /*restringimos el pago sino tiene piernas*/
                }
            }
        }
    }

    public function PagaBonificacao(){

        $fp = fopen('cron_execute.txt', 'a+');
        $fw = fwrite($fp, 'PagaBonificação - '.date('d/m/Y H:i:s').'\r\n');
        fclose($fp);

        /*if((ConfiguracoesSistema('paga_final_semana')) == 0 && (date('w') == 0 || date('w') == 6)){
            
            return false;
        }*/
        
        $this->db->select('f.id, f.id_usuario, f.data_pagamento, p.valor');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->where('f.status', 1);
        $this->db->where('p.ganhos_diarios > ', 0);
        $faturas = $this->db->get();

        $porcentagem_dia = ConfiguracoesSistema('porcentagem_dia');

        if($faturas->num_rows() > 0){

            foreach($faturas->result() as $fatura){

                $expira = date('Y-m-d', strtotime($fatura->data_pagamento) + (60*60*24*ConfiguracoesSistema('quantidade_dias')));
                
                if(ConfiguracoesSistema('paga_final_semana') == 0){
                    $expira = date('Y-m-d', (strtotime($expira) + (60*60*24*(FinalDeSemana($fatura->data_pagamento, $expira)))));
                }

                if(date('Y-m-d') <= $expira){

                    $pagamento = ($porcentagem_dia/100) * $fatura->valor;

                    $novo_saldo = InformacoesUsuario('saldo_rendimentos', $fatura->id_usuario) + $pagamento;

                    $this->db->where('id', $fatura->id_usuario);
                    $this->db->update('usuarios', array('saldo_rendimentos'=>$novo_saldo));

                    GravaExtrato($fatura->id_usuario, $pagamento, 'Pagamento do rendimento do plano', 1);
                
                }else{

                    $this->db->where('id', $fatura->id);
                    $this->db->update('faturas', array('status'=>0));

                    EnviaNotificacao($fatura->id_usuario, 'Seu plano expirou, para continuar ganhando, compre outro agora.');
                }
            }
        }
    }

    public function GanhoPlanoCarreira(){

        $fp = fopen('cron_execute.txt', 'a+');
        $fw = fwrite($fp, 'GanhoPlanoCarreira - '.date('d/m/Y H:i:s').'\r\n');
        fclose($fp);

        $quantidadePontos = array();
        $administradores = array();
        $UsuariosLados = array();

        $this->db->order_by('pontos', 'ASC');
        $planos = $this->db->get('plano_carreira');

        if($planos->num_rows() > 0){

            foreach($planos->result() as $plano){

                $quantidadePontos[$plano->id] = array('pontos'=>$plano->pontos, 'plano'=>$plano->nome);
            }
        }

        $this->db->where('is_admin', 1);
        $usuariosAdministradores = $this->db->get('usuarios');

        if($usuariosAdministradores->num_rows() > 0){

            foreach($usuariosAdministradores->result() as $resultAdministradores){

                $administradores[] = $resultAdministradores->id;
            }
        }

        $pontos = $this->db->query("SELECT SUM(pontos) as pontos, id_usuario FROM rede_pontos_binario GROUP BY id_usuario");

        if($pontos->num_rows() > 0){

            foreach($pontos->result() as $ponto){

                $anterior = 0;

                if(!isset($UsuariosLados[$ponto->id_usuario])){

                    $PontosLadoEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '1' AND pago = '1'");
                    $PontosLadoDireito = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos FROM rede_pontos_binario WHERE id_usuario = '".$ponto->id_usuario."' AND chave_binaria = '2' AND pago = '1'");
                    $UsuariosLados[$ponto->id_usuario] = array('esquerdo'=>$PontosLadoEsquerdo->row()->pontos, 'direito'=>$PontosLadoDireito->row()->pontos);
                }

                foreach($quantidadePontos as $id=>$pontosCadastrado){

                    if($pontosCadastrado['pontos'] > 0){

                        $LadoEsquerdo = $UsuariosLados[$ponto->id_usuario]['esquerdo'];
                        $LadoDireito = $UsuariosLados[$ponto->id_usuario]['direito'];
                        $QuantidadePlanoAnterior = $quantidadePontos[$this->getPrevKey($id, $quantidadePontos)];
                        
                        if(($LadoEsquerdo >= $QuantidadePlanoAnterior['pontos'] && ($pontosCadastrado['pontos']-1) <= $LadoEsquerdo) && ($LadoDireito >= $QuantidadePlanoAnterior['pontos'] && ($pontosCadastrado['pontos']-1) <= $LadoDireito)){


                            if($pontosCadastrado['pontos'] > $quantidadePontos[InformacoesUsuario('plano_carreira', $ponto->id_usuario)]['pontos']){

                                if(InformacoesUsuario('plano_carreira', $ponto->id_usuario) != $id){

                                    /* Não remova o comentário abaixo */

                                    // $check = $this->VerificaQualificadorRede($ponto->id_usuario, $pontosCadastrado['qualificador_quantidade'], $pontosCadastrado['qualificador_plano']);
                                    
                                    if(true){
                                        
                                        $this->db->where('id_plano_carreira', $id);
                                        $this->db->where('id_usuario', $ponto->id_usuario);
                                        $registros = $this->db->get('usuarios_plano_carreira');

                                        if($registros->num_rows() <= 0){

                                            $dadosPlanoCarreira = array(
                                                                        'id_usuario'=>$ponto->id_usuario,
                                                                        'id_plano_carreira'=>$id,
                                                                        'data'=>date('Y-m-d H:i:s')
                                                                    );

                                            $this->db->where('id', $ponto->id_usuario);
                                            $this->db->update('usuarios', array('plano_carreira'=>$id));

                                            $this->db->insert('usuarios_plano_carreira', $dadosPlanoCarreira);


                                            if(!empty($administradores)){

                                                foreach($administradores as $administrador){

                                                    EnviaNotificacao($administrador, 'O usuário '.InformacoesUsuario('login', $ponto->id_usuario).' entrou no plano de carreira: '.$quantidadePontos[$id]['plano'], 1);
                                                    EnviaNotificacao($ponto->id_usuario, 'Parabéns, você subiu em seu plano de carreira, agora você é '.$quantidadePontos[$id]['plano']);
                                                }
                                            }
                                        }
                                    }

                                    break;
                                }
                            }
                        }

                        // (5545 >= 0 && 499 <= 5545) && (750 >= 0 && 499 <= 750)
                        // (5545 >= 500 && 2499 <= 5545) && (750 >= 500 && 2499 <= 750)
                        // (5545 >= 2500 && 4999 <= 5545) && (5000 >= 2500 && 4999 <= 5000)
                        

                        // if($ponto->pontos-1 <= $pontosCadastrado['pontos']){

                        //     $plano_id = $this->getPrevKey($id, $quantidadePontos); 

                        //     break;
                        // }

                        // echo 'Previus: '..'<br />';

                        // echo $id.' => '.$pontosCadastrado['pontos'].'<br />';

                    }

                }

                // echo 'ID do Plano: '.$plano_id.'<br />';
            }
        }
    }

    //DIEGO BEGIN
    function verificarLimiteGanancias($id_usuario, $datoganancia, $tipo) {
        $valorpuntos = $this->Rangomodel->comprasPaqueteFacturaUsuario($id_usuario);
        $idPaquete = $valorpuntos[0]->id_plano;
        $datosPaquete = $this->Rangomodel->datosPaqueteUsuario($idPaquete);
        if ($datosPaquete) {
            $valorPaquete = $datosPaquete[0]->valor;
            $valorMaximoGanancia = $valorPaquete * 2.75;

            $datosUsuarios = $this->Rangomodel->getUsuarioId($id_usuario);
            $saldo_rendimentos = $datosUsuarios[0]->saldo_rendimentos;
            $saldo_indicacoes = $datosUsuarios[0]->saldo_indicacoes;
            $ganancias = $saldo_rendimentos + $saldo_indicacoes; //$datosUsuarios[0]->ganancias;

            $totalGanancias = $ganancias + $datoganancia;

            if ($totalGanancias <= $valorMaximoGanancia) {
                if ($tipo == 'REN') {
                    $saldo_rendimentos = $saldo_rendimentos + $datoganancia;
                } else {
                    $saldo_indicacoes = $saldo_indicacoes + $datoganancia;
                }
                $ganancias = $ganancias + $datoganancia;
            } else {
                if ($valorMaximoGanancia < $ganancias) {
                    $datoganancia = 0;
                } else {
                    $datoganancia = $valorMaximoGanancia - $ganancias;
                }

                if ($tipo == 'REN') {
                    $saldo_rendimentos = $saldo_rendimentos + $datoganancia;
                } else {
                    $saldo_indicacoes = $saldo_indicacoes + $datoganancia;
                }
                $ganancias = $ganancias + $datoganancia;
            }
            $data = array(
                'saldo_rendimentos' => $saldo_rendimentos,
                'saldo_indicacoes' => $saldo_indicacoes,
                'ganancias' => $ganancias
            );

            $this->db->where('id', $id_usuario);
            $this->db->update('usuarios', $data);
        } else {
            $datoganancia = 0;
        }

        return $datoganancia;
    }

    function TodosUsuarios() {
        $query = $this->db->query(" select *
                                      from usuarios
                                     order by id  asc" ); 
        return $query->result();
    }
    function obtenerPagosDiarios($id_usuario,$valorPlan,$ganancias)
    {
        //4663
        $query = $this->db->query("select sum(valor)as valorTotal
                                     from extrato 
                                    where id_usuario = ".$id_usuario."
                                     AND data between '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'" ); 
        $resultado =  $query->result();
        if($resultado)
        {
            $acumulado = $resultado[0]->valorTotal;
            $total     = $acumulado + $ganancias;
            if($total > $valorPlan)
            {
                $ganancias = $valorPlan - $acumulado;
            }
            return  $ganancias;
        }
        else
        {
            return $ganancias;
        }
    }
    //DIEGO END
}
?>