<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Addplanmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function TodosUsuarios(){

        $query = $this->db->query(" select *
                                      from usuarios
                                     order by id  asc" ); 
        return $query->result();
    }

    

    function getUsuarioId($id)
    {
         $query = $this->db->query(" select *
                                      from usuarios
                                 where id = ".$id."
                                     order by id  asc" ); 
        return $query->result();
    }


    function getPlanes()
    {
         $query = $this->db->query(" select *
                                      from planos
                                 where id != 89327542
                                     order by id  asc" ); 
        return $query->result();
    }
    function getPlanesId($id)
    {
         $query = $this->db->query(" select *
                                      from planos
                                 where id = ".$id); 
        return $query->result();
    }

    function guardarAsingacion()
    {
        $iduser = $this->input->post('iduser');      
        $opcionPlan = $this->input->post('opcionPlan');
        if($opcionPlan > 0)
        {
            $descripcionPlan = $this->getPlanesId($opcionPlan);
            $nomePlan = $descripcionPlan[0]->nome;
            $data = array(
                           
                           'id_usuario'     =>$iduser,
                           'id_plano'       =>$opcionPlan,                      
                           'comprovante'    =>$nomePlan,                                                 
                           'status'         =>0,
                           'data_pagamento' =>date('Y-m-d H:i:s'),                      
                        );
            $insert = $this->db->insert('faturas', $data);

            if($insert){

                return '<div class="alert alert-success text-center">Plan registered successfully</div>';
            }
            return '<div class="alert alert-danger text-center">Error registering plan</div>'; 
        }
        else
        {
            return '<div class="alert alert-danger text-center">Please select a plan </div>'; 
        }
    }



}
?>