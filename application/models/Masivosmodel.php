<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masivosmodel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function getConfiguraciones()
    {
        $query = $this->db->query("select *
                                     from configuracao
                                    where nome_site = 'Metabiz'"); 
        return $query->result();
    }

    function facturasUsuarios()
    {
        $query = $this->db->query(" select f.id, 
                                           f.id_usuario, 
                                           f.data_pagamento, 
                                           p.valor
                                      from faturas f, 
                                           planos p 
                                     where f.id_plano = p.id
                                       and f.status   = 1
                                       and p.ganhos_diarios > 0
                                     order by f.id_usuario asc"); 
        return $query->result();
    }    
    

    function comprasPaqueteFacturaUsuario($idusuario)
    {
        $query = $this->db->query("select *
                                     from faturas
                                    where id_usuario = ".$idusuario."
                                      and status > 0
                                     order by data_pagamento desc
                                     limit 1"); 
        return $query->result();
    }

    function datosPaqueteUsuario($paquete)
    {
        $query = $this->db->query("select *
                                     from planos
                                    where id =".$paquete ); 
        return $query->result();
    }

    function datosPaqueteUsuario($paquete)
    {
        $query = $this->db->query("select *
                                     from planos
                                    where id =".$paquete ); 
        return $query->result();
    }





}
?>