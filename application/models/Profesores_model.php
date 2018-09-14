<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Profesores_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }


    function nuevo_profesor( $nombre_profesor,
                              $apellido_profesor,
                              $telefono_profesor,
                              $email_profesor,
                              $ciudad_profesor                              
                             )
    {
        $data = array(

            'nombre_profesor' =>  $nombre_profesor,
            'apellido_profesor' => $apellido_profesor,
            'telefono_profesor' => $telefono_profesor,
            'email_profesor' => $email_profesor,
            'ciudad_profesor' => $ciudad_profesor
        );

        $this->db->insert('profesores',$data);
    }


    public function actualizar($id_profesor,
                            $nombre_profesor,
                            $apellido_profesor,
                            $telefono_profesor,
                            $email_profesor,
                            $ciudad_profesor    
                            ){

            $data = array(
                'nombre_profesor' =>  $nombre_profesor,
                'apellido_profesor' => $apellido_profesor,
                'telefono_profesor' => $telefono_profesor,
                'email_profesor' => $email_profesor,
                'ciudad_profesor' => $ciudad_profesor              
        );

        if($id_profesor){
            $this->db->where('id_profesor', $id_profesor);
            $this->db->update('profesores', $data);
        }else{
           $this->db->insert('profesores', $data);
        }
    }

    public function eliminar($id_profesor){
        $this->db->where('id_profesor', $id_profesor);
        $this->db->delete('profesores');
    }

    public function obtener_todos(){
        $this->db->select('id_profesor, 
                            nombre_profesor, 
                            apellido_profesor,                           
                            telefono_profesor,
                            email_profesor,
                            ciudad_profesor');
        $this->db->from('profesores');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_profesor){
        $this->db->select('id_profesor, 
                            nombre_profesor, 
                            apellido_profesor,
                            telefono_profesor,
                            email_profesor,                           
                            ciudad_profesor                            
                            ');
        $this->db->from('profesores');
        $this->db->where('id_profesor', $id_profesor);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }
}