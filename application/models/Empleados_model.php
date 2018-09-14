<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Empleados_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function nuevo_empleado($nombre_empleado,
                            $apellido_empleado,
                            $cargo_empleado,
                            $id_departamento,
                            $direccion_empleado,
                            $ciudad_empleado,
                            $telefono_empleado,
                            $celular_empleado,
                            $email_empleado,
                            $cedula_empleado,
                            $sueldo_empleado,
                            $nss_empleado,
                            $id_arsempleado,
                            $comentario_empleado,
                            $fechaingreso_empleado,
                            $id_tipoempleado,
                            $edad_empleado,
                            $estado_empleado)
    {
        $data = array(
            'nombre_empleado' => $nombre_empleado,
            'apellido_empleado' => $apellido_empleado,
            'cargo_empleado' => $cargo_empleado,
            'id_departamento' => $id_departamento,
            'direccion_empleado' => $direccion_empleado,
            'ciudad_empleado' => $ciudad_empleado,
            'telefono_empleado' => $telefono_empleado,
            'celular_empleado' => $celular_empleado,
            'email_empleado'=>$email_empleado,
            'cedula_empleado'=>$cedula_empleado,
            'sueldo_empleado'=>$sueldo_empleado,
            'nss_empleado' => $nss_empleado,
            'id_arsempleado'=>$id_arsempleado,
            'comentario_empleado'=> $comentario_empleado,
            'fechaingreso_empleado'=>$fechaingreso_empleado,
            'id_tipoempleado'=>$id_tipoempleado,
            'edad_empleado'=>$edad_empleado,
            'estado_empleado'=>$estado_empleado);

        $this->db->insert('empleados',$data);
    }


    function actualizar($id_empleado,
                        $nombre_empleado,
                        $apellido_empleado,
                        $cargo_empleado,
                        //$id_departamento,
                        $direccion_empleado,
                        $ciudad_empleado,
                        $telefono_empleado,
                        $celular_empleado,
                        $email_empleado,
                        $cedula_empleado,
                        $sueldo_empleado,
                        $nss_empleado,
                        $comentario_empleado,
                        $fechaingreso_empleado,
                        $edad_empleado,
                        $estado_empleado)
    {
        $data = array(
            'nombre_empleado' => $nombre_empleado,
            'apellido_empleado' => $apellido_empleado,
            'cargo_empleado' => $cargo_empleado,
            'direccion_empleado' => $direccion_empleado,
            'ciudad_empleado' => $ciudad_empleado,
            'telefono_empleado' => $telefono_empleado,
            'celular_empleado' => $celular_empleado,
            'email_empleado'=>$email_empleado,
            'cedula_empleado'=>$cedula_empleado,
            'sueldo_empleado'=>$sueldo_empleado,
            'nss_empleado'=>$nss_empleado,
            'comentario_empleado'=>$comentario_empleado,
            'fechaingreso_empleado'=>$fechaingreso_empleado,
            'edad_empleado'=>$edad_empleado,
            'estado_empleado'=>$estado_empleado

        );
        if($id_empleado){
            $this->db->where('id_empleado', $id_empleado);
            $this->db->update('empleados', $data);
        }else{
            $this->db->insert('empleados', $data);
        }

    }

   public function obtener_por_id($id_empleado){
       $this->db->select('*');
       $this->db->from('percepciones');
       $this->db->join('empleados','empleados.id_empleado = percepciones.id_empleado');
       $query = $this->db->get();
       $consulta = $query->row();
       return $consulta;


        //$this->db->where('id_empleado', $id_empleado);
        //$consulta = $this->db->get();
        //$resultado = $consulta->row();
        //return $resultado;
    }

    public function obtener_recibo_por_id($id_empleado){
        $this->db->select('*');
        $this->db->from('empleados');
        $this->db->join('percepciones','empleados.id_empleado = percepciones.id_empleado');
        $query = $this->db->get();
        $consulta = $query->row();
        return $consulta;


    }


    public function obtener_empleado_por_id($id_empleado){
        $this->db->select('id_empleado, 
                            nombre_empleado,
                            apellido_empleado,
                            cargo_empleado,
                            direccion_empleado,
                            ciudad_empleado,
                            telefono_empleado,
                            celular_empleado,
                            email_empleado,
                            cedula_empleado,
                            sueldo_empleado,
                            nss_empleado,                            
                            fechaingreso_empleado,                            
                            edad_empleado,
                            estado_empleado,
                            comentario_empleado
                            
                            ');
        $this->db->from('empleados');
        $this->db->where('id_empleado', $id_empleado);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function obtener_emp_por_id($id_empleado){
        $this->db->select('id_empleado, 
                            nombre_empleado,
                            apellido_empleado,
                            cargo_empleado,
                            direccion_empleado,
                            ciudad_empleado,
                            telefono_empleado,
                            celular_empleado,
                            email_empleado,
                            cedula_empleado,
                            sueldo_empleado,
                            nss_empleado,
                            fechaingreso_empleado,
                            id_tipoempleado,
                            id_departamento,
                            id_arsempleado,
                            edad_empleado,
                            estado_empleado
                            
                            ');
        $this->db->from('empleados');
        //$this->db->join('percepciones','empleados.id_empleado = percepciones.id_empleado');
        $this->db->where('id_empleado', $id_empleado);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function obtener_todos(){
        $this->db->select();
        $this->db->from('empleados');
        $query = $this->db->get();
        return $query->result();
    }

    function insertar_percepydeduc($id_empleado,
                                    $id_proyecto,
                                    $id_asociado,
                                   $sueldo_bruto,
                                   $he_empleado,
                                   $comision_empleado,
                                   $total_percepcion,
                                   $ars_empleado,
                                   $afp_empleado,
                                   $prestamo_empleado,
                                    $isr_empleado,
                                   $total_deduccion,
                                   $bono,
                                   $sueldo_vacaciones,
                                   $sueldo_navidad,
                                   $total_otras_perc,
                                   $porciento_asociado,
                                   $sueldo_neto,
                                   $fecha_percepcion)
    {
        $data = array('id_empleado' => $id_empleado,
                        'id_proyecto' =>$id_proyecto,
                        'id_asociado' =>$id_asociado,
                    'sueldo_bruto' => $sueldo_bruto,
                    'he_empleado' => $he_empleado,
                    'comision_empleado' => $comision_empleado,
                    'total_percepcion' => $total_percepcion,
                    'ars_empleado' => $ars_empleado,
                    'afp_empleado' => $afp_empleado,
                    'prestamo_empleado' => $prestamo_empleado,
                    'isr_empleado' =>$isr_empleado,
                    'total_deduccion'=>$total_deduccion,
                    'bono'=>$bono,
                    'sueldo_vacaciones'=>$sueldo_vacaciones,
                    'sueldo_navidad'=>$sueldo_navidad,
                    'total_otras_perc'=>$total_otras_perc,
                    'porciento_asociado'=>$porciento_asociado,
                    'sueldo_neto' => $sueldo_neto,
                    'fecha_percepcion' => $fecha_percepcion);

            $this->db->insert('percepciones', $data);
    }



    public function obtener_nomina(){
        $this->db->select('*');
        $this->db->from('percepciones');
        //$this->db->where('fecha_percepcion BETWEEN "'.$fecha_desde'" AND "'.$fecha_hasta'"');
        $this->db->join('empleados','empleados.id_empleado = percepciones.id_empleado');
        $query = $this->db->get();
        return $query->result();
    }

public function obtener_nomina_por_fecha($fecha_nomina){
    
        $this->db->select('*');
        $this->db->from('percepciones');
        $this->db->where('fecha_percepcion', $fecha_nomina);
        $this->db->join('empleados','empleados.id_empleado = percepciones.id_empleado');
        $query = $this->db->get();
        return $query->result();
}


public function obtener_nomina_entre_fechas()
    {
        $from = $this->input->post('fecha_desde');
        $to = $this->input->post('fecha_hasta');

       /* $this->db->select('users.first_name, users.last_name, users.email, groups.name as designation, dailyinfo.amount as Total_Fine, dailyinfo.date as Date_of_Fine, dailyinfo.desc as Description')
                    ->from('users')
                    ->where('dailyinfo.date >= ',$from)
                    ->where('dailyinfo.date <= ',$to)
                    ->join('users_groups','users.id = users_groups.user_id')
                    ->join('dailyinfo','users.id = dailyinfo.userid')
                    ->join('groups','groups.id = users_groups.group_id');
        */
        
        $this->db->select('*')
                 ->from('percepciones')
                 ->where('fecha_percepcion >= ',$from)
                 ->where('fecha_percepcion <= ',$to);
        

        $query = $this->db->get();
        return $query->result();
    }



public function get_dates($fecha_desde, $fecha_hasta)
    {
        $from = $this->input->post('fecha_desde');
        $to = $this->input->post('fecha_hasta');

        $this->db->select('*')
                    ->from('percepciones');
        //$this->db->where('fecha_percepcion "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');

        /*
        $this->db->select('date, amount, desc')
                 ->from('dailyinfo')
                 ->where('dailyinfo.date >= ',$from)
                 ->where('dailyinfo.date <= ',$to);
        */

        $q = $this->db->get();

        $array['percepcionesNomina'] = $q->result();
        return $array;
    }
}
