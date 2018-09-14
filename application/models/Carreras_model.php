<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class carreras_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nueva_carrera($desc_carrera,            
                           $id_facultad
                                )
    {
        $data = array(
            'desc_carrera' => $desc_carrera,           
            'id_facultad' => $id_facultad

            
        );

        $this->db->insert('carreras',$data);
    }




    public function eliminar($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $this->db->delete('clientes');
    }

    public function obtener_todos(){
        $this->db->select('id_carrera, 
                           desc_carrera,                          
                           id_facultad');
        $this->db->from('carreras');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_carrera){
        $this->db->select('id_carrera,
                            desc_carrera,
                            id_facultad 
                           ');
        $this->db->from('carreras');
        //$this->db->join('asignaturas', 'asignaturas.id_carrera = carreras.id_carrera ');
        $this->db->where('id_carrera',$id_carrera);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function actualizar( $id_carrera,
                                $desc_carrera,
                                $id_facultad){
        $data = array(
            'desc_carrera' => $desc_carrera,
            'id_facultad' => $id_facultad,
           

        );
        if($id_carrera){
            $this->db->where('id_carrera', $id_carrera);
            $this->db->update('carreras', $data);
        }else{
            $this->db->insert('carreras', $data);
        }
    }

    

        public function getEntradas($id_carrera){
                    $this->db->select('*');
                    $this->db->from('carreras');                   
                    $this->db->join('asignaturas', 'asignaturas.id_carrera = carreras.id_carrera ');
                    //$this->db->where('id_carrera',$id_carrera);
                    $consulta = $this->db->get();
                    if($consulta->num_rows()<1){
                        return FALSE;
                    }                  
                    $resultado = $consulta->row();
                    return $resultado;
        }


}