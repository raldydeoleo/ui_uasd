<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class secciones_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nueva_seccion( $nombre_seccion,
                            $id_periodo,
                            $id_asignatura,
                            $id_horario,
                            $id_aula,
                            $id_profesor,
                            $cantmax_seccion,                            
                            $lunes_seccion,
                            $martes_seccion,
                            $miercoles_seccion,
                            $jueves_seccion,
                            $viernes_seccion,
                            $sabado_seccion                                
                
                                )
    {
        $data = array(
            'nombre_seccion' => $nombre_seccion,
            'id_periodo' => $id_periodo,
            'id_asignatura' => $id_asignatura,
            'id_horario' =>$id_horario,
            'id_aula' => $id_aula,
            'id_profesor' => $id_profesor,
            'cantmax_seccion' =>$cantmax_seccion,
            'lunes_seccion' =>$lunes_seccion,
            'martes_seccion' =>$martes_seccion,
            'miercoles_seccion' =>$miercoles_seccion,
            'jueves_seccion' =>$jueves_seccion,
            'viernes_seccion' =>$viernes_seccion,
            'sabado_seccion' =>$sabado_seccion     
        );

        $this->db->insert('secciones',$data);
    }




    public function eliminar($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $this->db->delete('clientes');
    }

    public function obtener_todos(){
        $this->db->select('secciones.id_seccion, 
                            secciones.nombre_seccion, 
                            secciones.id_periodo, 
                            asignaturas.nombre_asignatura, 
                            secciones.id_recinto, 
                            secciones.id_aula,
                            profesores.nombre_profesor,
                            profesores.apellido_profesor,
                            secciones.cantmax_seccion,
                            secciones.lunes_seccion,
                            secciones.martes_seccion, 
                            secciones.miercoles_seccion, 
                            secciones.jueves_seccion,
                            secciones.viernes_seccion,
                            secciones.sabado_seccion')
       ->from('secciones')
       ->join('asignaturas', 'secciones.id_asignatura = asignaturas.id_asignatura')
       ->join('profesores','secciones.id_profesor = profesores.id_profesor');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_seccion){
                $this->db->select('secciones.id_seccion, 
                                secciones.nombre_seccion, 
                                secciones.id_periodo, 
                                asignaturas.nombre_asignatura, 
                                secciones.id_recinto, 
                                secciones.id_aula,
                                profesores.nombre_profesor,
                                profesores.apellido_profesor,
                                secciones.cantmax_seccion,
                                secciones.lunes_seccion,
                                secciones.martes_seccion, 
                                secciones.miercoles_seccion, 
                                secciones.jueves_seccion,
                                secciones.viernes_seccion,
                                secciones.sabado_seccion')
                        ->from('secciones')
                        ->join('asignaturas', 'secciones.id_asignatura = asignaturas.id_asignatura')
                        ->join('profesores','secciones.id_profesor = profesores.id_profesor');
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function actualizar( $id_seccion,
                                $nombre_seccion,
                                $id_periodo,
                                $id_asignatura,
                                $id_horario,
                                $id_aula,
                                $id_profesor,
                                $cantmax_seccion,
                                $lunes_seccion,
                                $martes_seccion,
                                $miercoles_seccion,
                                $jueves_seccion,
                                $viernes_seccion,
                                $sabado_seccion){
        $data = array(
            'nombre_seccion' => $nombre_seccion,
            'id_periodo' => $id_periodo,
            'id_asignatura' => $id_asignatura,
            'id_horario' =>$id_horario,
            'id_aula' => $id_aula,
            'id_profesor' => $id_profesor,
            'cantmax_seccion' =>$cantmax_seccion,
            'lunes_seccion' =>$lunes_seccion,                                                
            'martes_seccion' =>$martes_seccion,
            'miercoles_seccion' =>$miercoles_seccion,
            'jueves_seccion' =>$jueves_seccion,
            'viernes_seccion' =>$viernes_seccion,
            'sabado_seccion' =>$sabado_seccion

        );
        if($id_seccion){
            $this->db->where('id_seccion', $id_seccion);
            $this->db->update('secciones', $data);
        }else{
            $this->db->insert('secciones', $data);
        }
    }

    
}