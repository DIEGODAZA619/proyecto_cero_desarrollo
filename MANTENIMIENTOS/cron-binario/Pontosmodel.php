<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pontosmodel extends CI_Model{

    protected $userid;

    public function __construct(){
        parent::__construct();

        $this->userid = InformacoesUsuario('id');
    }

    public function PontosBinario(){

        // $pontosHojeDireito = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos 
        //                                        FROM rede_pontos_binario 
        //                                        WHERE id_usuario = '".$this->userid."' AND data = '".date('Y-m-d')."' AND chave_binaria = '2'");

        $pontosHojeDireito =  $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos 
                                                FROM rede_pontos_binario 
                                                WHERE id_usuario = ".$this->userid." 
                                                AND data BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'
                                                AND chave_binaria = 2");
        

        // $pontosHojeEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND data = '".date('Y-m-d')."' AND chave_binaria = '1'");
        $pontosHojeEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos 
                                                FROM rede_pontos_binario 
                                                WHERE id_usuario = ".$this->userid." 
                                                AND data BETWEEN '".date('Y-m-d')." 00:00:00' AND '".date('Y-m-d')." 23:59:59'
                                                AND chave_binaria = 1");


        $pontosTotalDireito       = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND pago = 1 AND chave_binaria = 2");
        $pontosTotalEsquerdo      = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND pago = 1 AND chave_binaria = 1");

        $pontosTransferirDireito  = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND chave_binaria = 2 AND pago = 0");
        $pontosTransferirEsquerdo = $this->db->query("SELECT COALESCE(SUM(pontos), 0) AS pontos FROM rede_pontos_binario WHERE id_usuario = '".$this->userid."' AND chave_binaria = 1 AND pago = 0");

        $rowPontosHojeDireito = $pontosHojeDireito->row();
        $rowPontosHojeEsquerdo = $pontosHojeEsquerdo->row();

        $rowPontosTotalDireito = $pontosTotalDireito->row();
        $rowPontosTotalEsquerdo = $pontosTotalEsquerdo->row();

        $rowPontosTransferirDireito = $pontosTransferirDireito->row();
        $rowPontosTransferirEsquerdo = $pontosTransferirEsquerdo->row();

        return array(
                     'hoje'=>array(
                                   'direito'=>$rowPontosHojeDireito->pontos,
                                   'esquerdo'=>$rowPontosHojeEsquerdo->pontos
                                   ),
                     'total'=>array(
                                   'direito'=>$rowPontosTotalDireito->pontos,
                                   'esquerdo'=>$rowPontosTotalEsquerdo->pontos
                                   ),
                     'transferir'=>array(
                                   'direito'=>$rowPontosTransferirDireito->pontos,
                                   'esquerdo'=>$rowPontosTransferirEsquerdo->pontos
                                   )
                     );

    }
    ##### Control saldo de puntos ##### JVM #####
    public function SaldoPontosBinario(){        
        $pontosDireito =  $this->db->query("SELECT (r.pontos-r.concho) as pontos, r.pago 
                                                FROM rede_pontos_binario r  
                                                WHERE r.id_usuario = ".$this->userid." 
                                                AND r.chave_binaria = 2 
                                                ORDER BY id desc limit 1");
        $pontosEsquerdo = $this->db->query("SELECT (r.pontos-r.concho) as pontos, r.pago 
                                                FROM rede_pontos_binario r 
                                                WHERE r.id_usuario = ".$this->userid." 
                                                AND r.chave_binaria = 1
                                                ORDER BY id desc limit 1");
        
        $rowpontosDireito = $pontosDireito->row();
        $rowpontosEsquerdo = $pontosEsquerdo->row();
        if($rowpontosDireito->pago==0){
            $diferenciaDireito=$rowpontosDireito->pontos;
        }else{
            $diferenciaDireito=0;
        }
        if($rowpontosEsquerdo->pago==0){
        $direfernciaEsquerdo=$rowpontosEsquerdo->pontos;
        }else{
            $direfernciaEsquerdo=0;
        }
        return array(
                     'transferir'=>array(
                                   'direito'=>$diferenciaDireito,
                                   'esquerdo'=>$direfernciaEsquerdo
                                   )
                     );

    }
    ##### Control saldo de puntos ##### JVM #####
}
?>