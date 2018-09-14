<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class aulas_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nueva_aula( $nombre_aula,                        
                         $capacidad_aula,
                         $id_edificio
                                )
    {
        $data = array(
            'nombre_aula' => $nombre_aula,
            'capacidad_aula' =>$capacidad_aula,
            'id_edificio' => $id_edificio
            
        );

        $this->db->insert('aulas',$data);
    }


    public function eliminar($id_aula){
        $this->db->where('id_aula', $id_aula);
        $this->db->delete('aulas');
    }

    public function obtener_todos(){
        $this->db->select('id_aula, 
                            nombre_aula, 
                            capacidad_aula,
                            id_edificio');
        $this->db->from('aulas');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_aula){
        $this->db->select('id_aula, 
                            nombre_aula, 
                            capacidad_aula,
                            id_edificio');
        $this->db->from('aulas');
        $this->db->where('id_aula', $id_aula);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function actualizar( $id_aula,
                                $nombre_aula,                        
                                $capacidad_aula,
                                $id_edificio){
        $data = array(
            'nombre_aula' => $nombre_aula,
            'capacidad_aula' =>$capacidad_aula,
            'id_edificio' => $id_edificio

        );
        if($id_aula){
            $this->db->where('id_aula', $id_aula);
            $this->db->update('aulas', $data);
        }else{
            $this->db->insert('aulas', $data);
        }
    }

   
    
}