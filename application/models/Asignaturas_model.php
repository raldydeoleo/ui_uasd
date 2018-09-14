<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class asignaturas_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nueva_proyeccion( $id_asignatura,
                                $id_periodo, 
                                $id_estudiante                             
                                                )
                        {
                        $data = array(
                        'id_asignatura' => $id_asignatura,
                        'id_periodo' =>  $id_periodo, 
                        'id_estudiante' => $id_estudiante
                        );
                        $this->db->insert('proyecciones',$data);
                        }

    function nueva_asignatura( $id_carrera,
                                $id_profesor, 
                                $nombre_asignatura,
                                $clave_asignatura,
                                $nrc_asignatura,
                                $creditos_asignatura,
                                $horasp_asignatura,
                                $horast_asignatura
                                )
    {
        $data = array(
            'id_carrera' => $id_carrera,
            'id_profesor' =>  $id_profesor, 
            'nombre_asignatura' => $nombre_asignatura,
            'clave_asignatura' => $clave_asignatura,
            'nrc_asignatura' => $nrc_asignatura,
            'creditos_asignatura' => $creditos_asignatura,
            'horasp_asignatura' => $horasp_asignatura,
            'horast_asignatura' => $horast_asignatura,
            

        );

        $this->db->insert('asignaturas',$data);
    }




    public function eliminar($id_asignatura){
        $this->db->where('id_asignatura', $id_asignatura);
        $this->db->delete('asignaturas');
    }

    public function obtener_todos(){
        $this->db->select('id_asignatura,
                            id_carrera,
                            id_profesor,  
                            nombre_asignatura, 
                            clave_asignatura, 
                            nrc_asignatura, 
                            creditos_asignatura, 
                            horasp_asignatura,
                            horast_asignatura');
        $this->db->from('asignaturas');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    
    public function obtener_estados(){
        $this->db->select('id_asignatura,
                            id_estudiante,
                            id_carrera,
                            id_profesor, 
                            nombre_asignatura, 
                            clave_asignatura, 
                            nrc_asignatura, 
                            creditos_asignatura, 
                            horasp_asignatura,
                            horast_asignatura, 
                            estado_asignatura, 
                            calificacion_asignatura');
        $this->db->from('estado_asignaturas');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_asignatura){
        $this->db->select('id_asignatura,
                            id_carrera,
                            id_profesor, 
                            nombre_asignatura, 
                            clave_asignatura, 
                            nrc_asignatura, 
                            creditos_asignatura, 
                            horasp_asignatura,
                            horast_asignatura');
        $this->db->from('asignaturas');
        $this->db->where('id_asignatura',$id_asignatura);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function obtener_estado_por_id($id_asignatura){
        $this->db->select('id_asignatura,
                            id_estudiante,
                            id_carrera,
                            id_profesor, 
                            nombre_asignatura, 
                            clave_asignatura, 
                            nrc_asignatura, 
                            creditos_asignatura, 
                            horasp_asignatura,
                            horast_asignatura, 
                            estado_asignatura, 
                            calificacion_asignatura');
        $this->db->from('estado_asignaturas');
        $this->db->where('id_asignatura',$id_asignatura);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function obtener_secciones($id_asignatura){
        $this->db->select('*');
        $this->db->from('secciones');
        $this->db->where('id_asignatura', $id_asignatura);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_secciones1($id_asignatura){
        $this->db->select('a.nombre_asignatura, b.nombre_seccion, c.nombre_recinto ');
        $this->db->from('asignaturas as a');
        $this->db->join('secciones as b', 'a.id_asignatura = b.id_asignatura ');
        $this->db->join('recintos as c', 'b.id_recinto = c.id_recinto');
        $query = $this->db->get();
    }

    public function asignaturas_por_carrera($id_carrera){
        $this->db->select('*');
        $this->db->from('asignaturas');
        $this->db->where('id_carrera', $id_carrera);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }


    public function actualizar_estado( $id_asignatura,
                                        $estado_asignatura,
                                        $calificacion_asignatura
               ){
            $data = array(
                'estado_asignatura' => $estado_asignatura,
                'calificacion_asignatura' => $calificacion_asignatura                     

            );
            if($id_asignatura){
            $this->db->where('id_asignatura', $id_asignatura);
            $this->db->update('estado_asignaturas', $data);
            }else{
            //$this->db->insert('asignaturas', $data);
            }
        }


    public function actualizar( $id_asignatura,
                                $id_carrera,
                                $id_profesor, 
                                $nombre_asignatura,
                                $clave_asignatura,                                
                                $nrc_asignatura,
                                $creditos_asignatura,
                                $horasp_asignatura,
                                $horast_asignatura){
        $data = array(
            'id_carrera' => $id_carrera,
            'id_profesor' => $id_profesor, 
            'nombre_asignatura' =>   $nombre_asignatura,
            'clave_asignatura' =>  $clave_asignatura,
            'nrc_asignatura' => $nrc_asignatura,
            'creditos_asignatura' =>  $creditos_asignatura,            
            'horasp_asignatura' =>  $horasp_asignatura,
            'horast_asignatura' => $horast_asignatura

        );
        if($id_asignatura){
            $this->db->where('id_asignatura', $id_asignatura);
            $this->db->update('asignaturas', $data);
        }else{
            $this->db->insert('asignaturas', $data);
        }
    }

}