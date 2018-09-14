<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class estudiantes_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nuevo_estudiante($id_categoria,
                                $id_carrera,
                                $nombre_estudiante,
                                $apellido_estudiante,
                                $empresa_estudiante,
                                $matricula_estudiante,
                                $clave_estudiante,
                                $direccion_estudiante,
                                $id_ciudad,
                                $telefono_estudiante,
                                $email_estudiante)
    {
        $data = array(
            'id_categoria' => $id_categoria,
            'id_carrera' => $id_carrera,
            'nombre_estudiante' => $nombre_estudiante,
            'apellido_estudiante' => $apellido_estudiante,
            'empresa_estudiante' => $empresa_estudiante,
            'matricula_estudiante' => $matricula_estudiante,
            'clave_estudiante' => $clave_estudiante,
            'direccion_estudiante' => $direccion_estudiante,
            'id_ciudad' => $id_ciudad,
            'telefono_estudiante' => $telefono_estudiante,
            'email_estudiante' => $email_estudiante,

        );

        $this->db->insert('estudiantes',$data);
    }


function nueva_seleccion( $id_estudiante,
                            $id_periodo,
                            $fecha_seleccion,
                            //$asignatura1,
                            $seccion_seleccion,
                            $id_asignatura)
{
$data = array(
            'id_estudiante' => $id_estudiante,
            'id_periodo' => $id_periodo,
            'fecha_seleccion' => $fecha_seleccion,
           // 'asignatura1' => $asignatura1,
            'seccion_seleccion' => $seccion_seleccion,
            'id_asignatura' => $id_asignatura
);

$this->db->insert('selecciones',$data);
}

function nuevo_comentario( $nom,
                            $email,
                            $asunto,                
                            $mensaje)
                {
                $data = array(
                'nom' => $nom,
                'email' => $email,
                'asunto' => $asunto,
                'mensaje' => $mensaje
                );

                $this->db->insert('comentarios',$data);
                }

    public function eliminar($id_estudiante){
        $this->db->where('id_estudiante', $id_estudiante);
        $this->db->delete('estudiantes');
    }


    public function obtener_todos(){
        $this->db->select('id_estudiante,
                            id_categoria,
                            id_carrera, 
                            nombre_estudiante, 
                            apellido_estudiante, 
                            empresa_estudiante,                            
                            matricula_estudiante,
                            clave_estudiante,  
                            direccion_estudiante,
                            ciudad_estudiante,
                            telefono_estudiante,
                            email_estudiante');
        $this->db->from('estudiantes');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }


    
    public function obtener_selecciones(){
        $this->db->select('id_seleccion,
                            id_estudiante,
                            id_periodo,
                            fecha_seleccion,
                            asignatura1,
                            seccion_seleccion,
                            id_asignatura');
        $this->db->from('selecciones');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function estudiantes_por_carrera($id_carrera){
        $this->db->select('*');
        $this->db->from('estudiantes');
        $this->db->where('id_carrera', $id_carrera);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    
    
    public function AsignaturasPorAprobar($id_estudiante){
        $estado = 'por aprobar';
        $this->db->select('*');
        $this->db->from('estado_asignaturas');
        $this->db->where('id_estudiante', $id_estudiante);
        $this->db->where('estado_asignatura', $estado);        
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function inscripciones_por_estudiante($id_estudiante){
        $this->db->select('*');
        $this->db->from('inscripciones');        
        $this->db->where('id_estudiante', $id_estudiante);       
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function pagoInscripcion($id_inscripcion){
        $this->db->select('*');
        $this->db->from('inscripciones');        
        $this->db->where('id_inscripcion', $id_inscripcion);       
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function horario_por_estudiante($id_estudiante){
        $this->db->select('*')
                        ->select('asignaturas.nombre_asignatura,periodos.nombre_periodo')
                        ->from('selecciones')
                        ->where('selecciones.id_estudiante',$id_estudiante)
                        ->join('asignaturas', 'selecciones.id_asignatura = asignaturas.id_asignatura')
                        ->join('periodos','periodos.id_periodo = selecciones.id_periodo');
        //$this->db->from('selecciones');        
       // $this->db->where('id_estudiante', $id_estudiante);       
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    } 
    

    public function obtener_por_nombre($id_estudiante){
        $this->db->select('id_estudiante,
                                id_categoria,
                                id_carrera,
                                nombre_estudiante, 
                                apellido_estudiante, 
                                empresa_estudiante, 
                                matricula_estudiante,
                                clave_estudiante, 
                                direccion_estudiante,
                                ciudad_estudiante,
                                telefono_estudiante,
                                email_estudiante');
        $this->db->from('estudiantes');
        $this->db->where('id_estudiante', $id_estudiante);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }




    public function obtener_por_id($id_estudiante){
        $this->db->select('id_estudiante,
                            id_categoria,
                            id_carrera,
                            nombre_estudiante, 
                            apellido_estudiante, 
                            empresa_estudiante, 
                            matricula_estudiante,
                            clave_estudiante, 
                            direccion_estudiante,
                            ciudad_estudiante,
                            telefono_estudiante,
                            email_estudiante');
        $this->db->from('estudiantes');
        $this->db->where('id_estudiante', $id_estudiante);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function obtener_insc_por_id($id_inscripcion){
        $this->db->select('id_inscripcion,
                            id_estudiante,
                            id_periodo,
                            fecha_inscripcion, 
                            hora_inscripcion, 
                            creditos_inscripcion, 
                            total_inscripcion,
                            estatus');
        $this->db->from('inscripciones');
        $this->db->where('id_inscripcion', $id_inscripcion);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function actualizar( $id_estudiante,
                                $id_categoria,
                                $id_carrera,
                                $nombre_estudiante,
                                $apellido_estudiante,
                                $empresa_estudiante,
                                $matricula_estudiante,
                                $clave_estudiante,
                                $direccion_estudiante,
                                $ciudad_estudiante,
                                $telefono_estudiante,
                                $email_estudiante){
        $data = array(
            'id_categoria' => $id_categoria,
            'id_carrera' =>        $id_carrera,
            'nombre_estudiante' =>   $nombre_estudiante,
            'apellido_estudiante' =>  $apellido_estudiante,
            'empresa_estudiante' => $empresa_estudiante,
            'matricula_estudiante' =>  $matricula_estudiante,
            'clave_estudiante' => $clave_estudiante, 
            'direccion_estudiante' => $direccion_estudiante,           
            'ciudad_estudiante' => $ciudad_estudiante,
            'telefono_estudiante' => $telefono_estudiante,
            'email_estudiante' =>  $email_estudiante            

        );
        if($id_estudiante){
            $this->db->where('id_estudiante', $id_estudiante);
            $this->db->update('estudiantes', $data);
        }else{
            $this->db->insert('estudiantes', $data);
        }
    }

   
}