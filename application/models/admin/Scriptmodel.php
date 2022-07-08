<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scriptmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function ejecutar()
    {
        $query = $this->db->query(" ALTER TABLE plano_carreira ADD COLUMN bono int;" ); 
        return $query->result();
    }
}
?>