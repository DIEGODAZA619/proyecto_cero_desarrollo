<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisosmodel extends CI_Model{

    public function __construct(){
        parent::__construct();
    }   
    
    function verificarRolUsuario($idUsuario,$idOpcion,$valorPermisoBD)
    {
        $query = $this->db->query(" select *
                                      from usuarios_opciones u
                                     where u.id_opcion = ".$idOpcion."
                                       and u.id_usuario = ".$idUsuario."
                                       and permisos like '%".$valorPermisoBD."%'       
                                       and u.estado = 'AC'" ); 
        return $query->result();
    }
    function verificarPermisoUsuario($idUsuario,$idOpcion)
    {
        $query = $this->db->query(" select *
                                      from usuarios_opciones u
                                     where u.id_opcion = ".$idOpcion."
                                       and u.id_usuario = ".$idUsuario."                                       
                                       and u.estado = 'AC'" ); 
        return $query->result();
    }

    function getListaUsuarios()
    {
        $query = $this->db->query(" select *
                                      from usuarios u
                                    where is_admin > 0
                                     "); 
        return $query->result();
    }

    function getPermisosCero()
    {
        $query = $this->db->query(" select *
                                      from opciones 
                                     where estado = 'AC' 
                                       and nivel = 0  
                                     order by id,nivel,orden asc" ); 
        return $query->result();
    }
    function getPermisos()
    {
        $query = $this->db->query(" select *
                                      from opciones 
                                     where estado = 'AC'
                                       and nivel > 0 
                                     order by id,nivel,orden asc" ); 
        return $query->result();
    }

    function getUsuarioId($id)
    {
        $query = $this->db->query(" select *
                                      from usuarios 
                                     where id = ".$id ); 
        return $query->result();
    }
    function getPermisosId($id)
    {
        $query = $this->db->query(" select *
                                      from opciones 
                                     where id = ".$id ); 
        return $query->result();
    }

    function check_opciones($idUsuario,$idPermiso)
    {
        $query = $this->db->query("select 1 
                                             from usuarios_opciones
                                            where id_opcion =". $idPermiso."
                                              and id_usuario =".$idUsuario."
                                              and estado = 'AC'");
        return $query->result();
    }
    function guardarPermisos($data)
    {       
        $this->db->insert('usuarios_opciones',$data); 
        return $this->db->insert_id();
    }
    function actualizarPermisos($idUsuario,$idPermiso,$data)
    {       
        $this->db->where('id_opcion',$idPermiso);
        $this->db->where('id_usuario',$idUsuario);
        return $this->db->update('usuarios_opciones',$data);
    }

}
?>