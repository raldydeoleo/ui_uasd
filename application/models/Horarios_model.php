<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class horarios_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nuevo_horario( $dias_horario,                        
                         $horainicio_horario,
                         $horafinal_horario
                                )
    {
        $data = array(
            'dias_horario' => $dias_horario,
            'horainicio_horario' =>$horainicio_horario,
            'horafinal_horario' => $horafinal_horario
            
        );

        $this->db->insert('horarios',$data);
    }




    public function eliminar($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $this->db->delete('clientes');
    }

    public function obtener_todos(){
        $this->db->select('id_horario, 
                            dias_horario, 
                            horainicio_horario,
                            horafinal_horario');
        $this->db->from('horarios');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_cliente){
        $this->db->select('id_cliente, 
                            nombre_cliente, 
                            apellido_cliente, 
                            empresa_cliente, 
                            rnc_cliente, 
                            direccion_cliente,
                            ciudad_cliente,
                            telefono_cliente,
                            email_cliente');
        $this->db->from('clientes');
        $this->db->where('id_cliente', $id_cliente);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function actualizar( $id_cliente,
                                $nombre_cliente,
                                $apellido_cliente,
                                $empresa_cliente,
                                $rnc_cliente,
                                $direccion_cliente,
                                $ciudad_cliente,
                                $email_cliente){
        $data = array(
            'nombre_cliente' =>   $nombre_cliente,
            'apellido_cliente' =>  $apellido_cliente,
            'direccion_cliente' => $direccion_cliente,
            'rnc_cliente' =>  $rnc_cliente,
            'empresa_cliente' => $empresa_cliente,
            'email_cliente' =>  $email_cliente,
            'ciudad_cliente' => $ciudad_cliente,

        );
        if($id_cliente){
            $this->db->where('id_cliente', $id_cliente);
            $this->db->update('clientes', $data);
        }else{
            $this->db->insert('clientes', $data);
        }
    }

    public function editar($id_cliente,
                           $nombre_cliente,
                            $apellido_cliente,
                            $direccion_cliente,
                            $rnc_cliente,
                            $empresa_cliente,
                            $email_cliente,
                            $ciudad_cliente
                            ){
        $data = array(

            'id_cliente' => $id_cliente,
            'nombre_cliente' =>   $nombre_cliente,
            'apellido_cliente' =>  $apellido_cliente,
            'direccion_cliente' => $direccion_cliente,
            'rnc_cliente' =>  $rnc_cliente,
            'empresa_cliente' => $empresa_cliente,
            'email_cliente' =>  $email_cliente,
            'ciudad_cliente' => $ciudad_cliente,

        );
        if($id_cliente){
            $this->db->where('id_cliente', $id_cliente);
            $this->db->update('clientes', $data);
        }else{
            echo 'Cliente No encontrado';
        }




    }
}