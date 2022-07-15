<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scriptmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function datosTabla($tabla)
    {
        $query = $this->db->query(" select *
                                      from ".$tabla."
                                     order by 1  asc" ); 
        return $query->result();
    }

    function datosUsuarios($tabla,$data)
    {
        //$this->db->where('id',$id_registro);
        return $this->db->update($tabla,$data);
    }
}
?>