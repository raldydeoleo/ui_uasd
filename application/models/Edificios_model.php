<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edificios_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nuevo_edificio( $nombre_edificio,                        
                         $cantaulas_edificio,
                         $id_recinto
                                )
    {
        $data = array(
            'nombre_edificio' => $nombre_edificio,
            'cantaulas_edificio' =>$cantaulas_edificio,
            'id_recinto' => $id_recinto
            
        );

        $this->db->insert('edificios',$data);
    }




    public function eliminar($id_edificio){
        $this->db->where('id_edificio', $id_edificio);
        $this->db->delete('edificios');
    }

    public function obtener_todos(){
        $this->db->select('id_edificio, 
                            nombre_edificio, 
                            cantaulas_edificio,
                            id_recinto');
        $this->db->from('edificios');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_edificio){
        $this->db->select('id_edificio, 
                            nombre_edificio, 
                            cantaulas_edificio,
                            id_recinto');
        $this->db->from('edificios');
        $this->db->where('id_edificio', $id_edificio);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function actualizar( $id_edificio,
                                $nombre_edificio,
                                $cantaulas_edificio,
                                $id_recinto){
        $data = array(
            'nombre_edificio' =>   $nombre_edificio,
            'cantaulas_edificio' =>  $cantaulas_edificio,
            'id_recinto' => $id_recinto

        );
        if($id_edificio){
            $this->db->where('id_edificio', $id_edificio);
            $this->db->update('edificios', $data);
        }else{
            $this->db->insert('edificios', $data);
        }
    }

    
}