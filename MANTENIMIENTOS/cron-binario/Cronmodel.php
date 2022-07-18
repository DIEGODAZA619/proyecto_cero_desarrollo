<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cronmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
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

    public function PagaBinarioDia(){

        $fp = fopen('cron_execute.txt', 'a+');
        $fw = fwrite($fp, 'PagaBinarioDia - '.date('d/m/Y H:i:s').'\r\n');
        fclose($fp);

        $UsuariosLadoMenor = array();
        ##### Consulta que filtra a patrocinadores con binario activo ##### JVM #####
        $pontos = $this->db->query("SELECT COALESCE(SUM(rp.pontos), 0) as pontos, rp.id_usuario, rp.chave_binaria FROM rede_pontos_binario rp WHERE data <= '" . date('Y-m-d') . " 23:59:59' AND pago = '0' and (SELECT DISTINCTROW id_patrocinador_direto FROM rede WHERE chave_binaria BETWEEN 1 AND 2 and id_patrocinador_direto=rp.id_usuario)>0 GROUP BY chave_binaria,id_usuario");

        if ($pontos->num_rows() > 0) {

            foreach ($pontos->result() as $ponto) {
                echo "<pre>";
                echo "Usuario: " . $ponto->id_usuario . "<br>";
                var_dump(InformacoesUsuario('binario', $ponto->id_usuario));
                echo "</pre>";

                if (InformacoesUsuario('binario', $ponto->id_usuario) == 1) {

                    /* Pega o lado menor e grava em um array */

                    if (!isset($UsuariosLadoMenor[$ponto->id_usuario])) {

                        $LadoEsquerdoZerado = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos, COALESCE(SUM(concho), 0) as conchos FROM rede_pontos_binario WHERE id_usuario = '" . $ponto->id_usuario . "' AND chave_binaria = '1' AND pago = '0'");
                        $LadoDireitoZerado = $this->db->query("SELECT COALESCE(SUM(pontos), 0) as pontos, COALESCE(SUM(concho), 0) as conchos FROM rede_pontos_binario WHERE id_usuario = '" . $ponto->id_usuario . "' AND chave_binaria = '2' AND pago = '0'");

                        if (($LadoEsquerdoZerado->row()->pontos-$LadoEsquerdoZerado->row()->conchos) < ($LadoDireitoZerado->row()->pontos-$LadoDireitoZerado->row()->conchos)) {

                            $lado_menor = 1;
                        } elseif (($LadoDireitoZerado->row()->pontos-$LadoDireitoZerado->row()->conchos) < ($LadoEsquerdoZerado->row()->pontos-$LadoEsquerdoZerado->row()->conchos)) {

                            $lado_menor = 2;
                        } else {
                            $lado_menor = 2;
                        }
                        //}

                        $pagar_por = $UsuariosLadoMenor[$ponto->id_usuario] = $lado_menor;
                    } else {
                        $pagar_por = $UsuariosLadoMenor[$ponto->id_usuario];
                    }
                    echo "Pagar por lado : ";
                    var_dump($pagar_por);
                    echo "<br>";
                    if (isset($pagar_por)) {

                        $this->db->select('p.teto_binario');
                        $this->db->from('faturas AS f');
                        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
                        $this->db->where('f.id_usuario', $ponto->id_usuario);
                        $this->db->where('f.status', 1);
                        $this->db->order_by('f.id_plano', 'DESC');
                        $this->db->limit(1);
                        $plano = $this->db->get();

                        if ($plano->num_rows() > 0) {
                            echo "chave binaria= " . $ponto->chave_binaria . "<br>";
                            if ($ponto->chave_binaria == $pagar_por) {

                                $row = $plano->row();

                                $totalPagamento = (InformacoesUsuario('quantidade_binario', $ponto->id_usuario) / 100) * $ponto->pontos;
                                echo "<br>" . $totalPagamento . " vs " . $row->teto_binario . "<br>";
                                if ($totalPagamento > $row->teto_binario) {

                                    $totalPagamento = $row->teto_binario;
                                    $novoRendimento = $totalPagamento;

                                    $novoSaldoGanancia = InformacoesUsuario('ganancias', $ponto->id_usuario) + $novoRendimento;
                                    $this->db->from('faturas AS f');
                                    $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
                                    $this->db->where('f.id_usuario', $ponto->id_usuario);
                                    $this->db->where('f.status', 1);

                                    $planuser = $this->db->get();
                                    $plan =  $planuser->result();
                                    $ganancia_maxima = $plan[0]->ganhos_maximo;
                                    echo "MAX: " . $ganancia_maxima;

                                    if ($novoSaldoGanancia <= $ganancia_maxima) {
                                        $this->db->where('id', $ponto->id_usuario);
                                        $this->db->update('usuarios', array('saldo_rendimentos' => $novoRendimento, 'ganancias' => $novoSaldoGanancia));
                                        echo "OK";

                                        GravaExtrato($ponto->id_usuario, $totalPagamento, 'Payment binary of day ' . InformacoesUsuario('login', $ponto->id_usuario), 1);
                                    } elseif ($novoSaldoGanancia > $ganancia_maxima) {
                                        $diferencia = $novoSaldoGanancia - $ganancia_maxima;
                                        $novoRendimento -= $diferencia;
                                        $this->db->where('id', $ponto->id_usuario);
                                        $this->db->update('usuarios', array('saldo_rendimentos' => $novoRendimento, 'ganancias' => $ganancia_maxima));
                                        echo "SUPERA";
                                        GravaExtrato($ponto->id_usuario, $novoRendimento, 'Payment binary of day ' . InformacoesUsuario('login', $ponto->id_usuario), 1);
                                    }
                                } else {
                                    $novoRendimento = InformacoesUsuario('saldo_rendimentos', $ponto->id_usuario) + $totalPagamento;

                                    $novoSaldoGanancia = InformacoesUsuario('ganancias', $ponto->id_usuario) + $novoRendimento;
                                    $this->db->from('faturas AS f');
                                    $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
                                    $this->db->where('f.id_usuario', $ponto->id_usuario);
                                    $this->db->where('f.status', 1);

                                    $planuser = $this->db->get();
                                    $plan =  $planuser->result();
                                    $ganancia_maxima = $plan[0]->ganhos_maximo;
                                    echo "MAX: " . $ganancia_maxima;
                                    ##### JVM #####
                                    $LadoEsquerdo = $this->db->query("SELECT COALESCE(sum(pontos), 0) as pontos, COALESCE(sum(concho), 0) as conchos FROM rede_pontos_binario WHERE id_usuario = '" . $ponto->id_usuario . "' AND chave_binaria = '1' and pago=0");
                                    $LadoDireito = $this->db->query("SELECT COALESCE(sum(pontos), 0) as pontos, COALESCE(sum(concho), 0) as conchos FROM rede_pontos_binario WHERE id_usuario = '" . $ponto->id_usuario . "' AND chave_binaria = '2' and pago=0");

                                    ##### JVM #####
                                    if ($novoSaldoGanancia <= $ganancia_maxima) {
                                        $this->db->where('id', $ponto->id_usuario);
                                        $updateSaldo = $this->db->update('usuarios', array('saldo_rendimentos' => $novoRendimento, 'ganancias' => $novoSaldoGanancia));
                                        if ($updateSaldo) {

                                            $this->db->where('pago', 0);
                                            $this->db->where('id_usuario', $ponto->id_usuario);
                                            $this->db->where('chave_binaria', $pagar_por);
                                            $this->db->update('rede_pontos_binario', array('pago' => 1));
                                            ##### JVM #####
                                            if ($pagar_por == 1) {
                                                $concho=$LadoEsquerdo->row()->pontos-$LadoEsquerdo->row()->conchos;
                                                $this->db->where('pago', 0);
                                                $this->db->where('id_usuario', $ponto->id_usuario);
                                                $this->db->where('chave_binaria', 2);
                                                $this->db->update('rede_pontos_binario', array('concho' => $concho));
                                            }else{
                                                $concho=$LadoDireito->row()->pontos-$LadoDireito->row()->conchos;
                                                $this->db->where('pago', 0);
                                                $this->db->where('id_usuario', $ponto->id_usuario);
                                                $this->db->where('chave_binaria', 1);
                                                $this->db->update('rede_pontos_binario', array('concho' => $concho));
                                            }
                                            ##### JVM #####
                                            GravaExtrato($ponto->id_usuario, $totalPagamento, 'Payment binary of day', 1);
                                        }
                                        echo "OK";
                                    } elseif ($novoSaldoGanancia > $ganancia_maxima) {
                                        $diferencia = $novoSaldoGanancia - $ganancia_maxima;
                                        $novoRendimento -= $diferencia;
                                        $this->db->where('id', $ponto->id_usuario);
                                        $updateSaldo = $this->db->update('usuarios', array('saldo_rendimentos' => $novoRendimento, 'ganancias' => $ganancia_maxima));
                                        if ($updateSaldo) {

                                            $this->db->where('pago', 0);
                                            $this->db->where('id_usuario', $ponto->id_usuario);
                                            $this->db->where('chave_binaria', $pagar_por);
                                            $this->db->update('rede_pontos_binario', array('pago' => 1));
                                            ##### JVM #####
                                            if ($pagar_por == 1) {
                                                $concho=$LadoEsquerdo->row()->pontos-$LadoEsquerdo->row()->conchos;
                                                $this->db->where('pago', 0);
                                                $this->db->where('id_usuario', $ponto->id_usuario);
                                                $this->db->where('chave_binaria', 2);
                                                $this->db->update('rede_pontos_binario', array('concho' => $concho));
                                            }else{
                                                $concho=$LadoDireito->row()->pontos-$LadoDireito->row()->conchos;
                                                $this->db->where('pago', 0);
                                                $this->db->where('id_usuario', $ponto->id_usuario);
                                                $this->db->where('chave_binaria', 1);
                                                $this->db->update('rede_pontos_binario', array('concho' => $concho));
                                            }
                                            ##### JVM #####
                                            GravaExtrato($ponto->id_usuario, $totalPagamento, 'Payment binary of day', 1);
                                        }
                                        echo "SUPERA";
                                    }
                                }
                            } else {
                                //GravaExtrato($ponto->id_usuario, 0, 'Payment binary of day', 1);
                            }
                        }
                    }
                }
            }
        }
        ##### Consulta que filtra a patrocinadores con binario activo ##### JVM #####
    }

    public function PagaBonificacao()
    {

        $fp = fopen('cron_execute.txt', 'a+');
        $fw = fwrite($fp, 'PagaBonificação - ' . date('d/m/Y H:i:s') . '\r\n');
        fclose($fp);

        if ((ConfiguracoesSistema('paga_final_semana')) == 0 && (date('w') == 0 || date('w') == 6)) {

            return false;
        }

        $this->db->select('f.id, f.id_usuario, f.data_pagamento, p.valor');
        $this->db->from('faturas AS f');
        $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
        $this->db->where('f.status', 1);
        $this->db->where('p.ganhos_diarios > ', 0);
        $faturas = $this->db->get();

        $porcentagem_dia = ConfiguracoesSistema('porcentagem_dia');

        if ($faturas->num_rows() > 0) {

            foreach ($faturas->result() as $fatura) {

                $expira = date('Y-m-d', strtotime($fatura->data_pagamento) + (60 * 60 * 24 * ConfiguracoesSistema('quantidade_dias')));

                if (ConfiguracoesSistema('paga_final_semana') == 0) {
                    $expira = date('Y-m-d', (strtotime($expira) + (60 * 60 * 24 * (FinalDeSemana($fatura->data_pagamento, $expira)))));
                }

                if (date('Y-m-d') <= $expira) {

                    $pagamento = ($porcentagem_dia / 100) * $fatura->valor;

                    $novo_saldo = InformacoesUsuario('saldo_rendimentos', $fatura->id_usuario) + $pagamento;
                    /*
                    $this->db->where('id', $fatura->id_usuario);
                    $this->db->update('usuarios', array('saldo_rendimentos' => $novo_saldo));
                    
                    GravaExtrato($fatura->id_usuario, $pagamento, 'Pay for bonus day of plan', 1);
                    */
                    ####### control de rendimiento ##### JVM #####
                    $novoSaldoGanancia = InformacoesUsuario('ganancias', $fatura->id_usuario) + $pagamento;
                    $this->db->from('faturas AS f');
                    $this->db->join('planos AS p', 'p.id = f.id_plano', 'inner');
                    $this->db->where('f.id_usuario', $fatura->id_usuario);
                    $this->db->where('f.status', 1);

                    $planuser = $this->db->get();
                    $plan =  $planuser->result();
                    $ganancia_maxima = $plan[0]->ganhos_maximo;
                    echo "MAX: " . $ganancia_maxima . "<br>";
                    echo $fatura->id_usuario . "<br>";


                    if ($novoSaldoGanancia <= $ganancia_maxima) {
                        $this->db->where('id', $fatura->id_usuario);
                        $this->db->update('usuarios', array('saldo_rendimentos' => $novo_saldo, 'ganancias' => $novoSaldoGanancia));
                        echo "OK";

                        GravaExtrato($fatura->id_usuario, $pagamento, 'Pay for bonus day of plan ' . InformacoesUsuario('login', $fatura->id_usuario), 1);
                    } elseif ($novoSaldoGanancia > $ganancia_maxima) {
                        $diferencia = $novoSaldoGanancia - $ganancia_maxima;
                        $novo_saldo -= $diferencia;
                        $this->db->where('id', $fatura->id_usuario);
                        $this->db->update('usuarios', array('saldo_rendimentos' => $novo_saldo, 'ganancias' => $ganancia_maxima));
                        echo "SUPERA";
                        GravaExtrato($fatura->id_usuario, $novo_saldo, 'Pay for bonus day of plan ' . InformacoesUsuario('login', $fatura->id_usuario), 1);
                    }
                    ####### control de rendimiento ##### JVM #####
                } else {

                    $this->db->where('id', $fatura->id);
                    $this->db->update('faturas', array('status' => 0));

                    EnviaNotificacao($fatura->id_usuario, 'Your plan is expired, for more gains, buy new plan now.');
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
}
?>