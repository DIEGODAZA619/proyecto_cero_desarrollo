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
                                 where valor != 0
                                     order by id  asc" ); 
        return $query->result();
    }
	
	function getPlanesId($id){
         $query = $this->db->query(" select *
                                      from planos
                                 where id = ".$id); 
        return $query->result();
    }
	
	function getPlanesFree($nome){
         $query = $this->db->query(" SELECT * FROM planos WHERE nome = '$nome' and valor = 0"); 
        return $query->result();
    }

    function guardarAsingacion()
    {
        $iduser = $this->input->post('iduser');      
        $opcionPlan = $this->input->post('opcionPlan');
		
		$tipoPlan = $this->input->post('tipoPlan');
		
		
        if($opcionPlan > 0){
			
			$descripcionPlan = $this->getPlanesId($opcionPlan);
            $nomePlan = $descripcionPlan[0]->nome;
			
			if($tipoPlan == 1){
			
				$data = array(                           
							   'id_usuario'=>$iduser,
							   'id_plano'=>$opcionPlan,
							   'comprovante'=>$nomePlan, 	
							   'status'=>0,
							);
				
			}else{
				
				$descripcionPlan = $this->getPlanesId($opcionPlan);
            	$nomePlan = $descripcionPlan[0]->nome;
				
				/*edward cuentas free SIN PAGOS*/
				
				$descripcionPlanFree = $this->getPlanesId($opcionPlan);
				$nomePlanFree = $descripcionPlanFree[0]->nome;
				
				/*==*/
				$descripcionPlanFreeResult = $this->getPlanesFree($nomePlanFree);
				$nomePlanFreeResult = $descripcionPlanFreeResult[0]->nome;
				$idPlanFreeResult = $descripcionPlanFreeResult[0]->id;
				
				/*==*/
				
				/*edward cuentas free SIN PAGOS*/
				
				
				$data = array(                           
							   'id_usuario'=>$iduser,
							   'id_plano'=>$idPlanFreeResult,
							   'comprovante'=>$nomePlanFreeResult,	
							   'data_pagamento'=>date('Y-m-d H:i:s'),	
							   'status'=>1,
							);
				
			}	
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