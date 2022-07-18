<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qualifiedmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function TotalUsuarios(){

        $usuarios = $this->db->get('usuarios');

        if($usuarios->num_rows() > 0){

            return $usuarios->result();
        }
        return false;
    }
    function getQualifiedId($id)
    {
        $query = $this->db->query("select *
                                     from usuarios
                                    where id = ".$id);
        return $query->result();
    }
    function updateQualified()
    {

    }

   
}
?>