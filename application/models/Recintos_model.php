<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class recintos_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nuevo_recinto( $nombre_recinto,                        
                         $ciudad_recinto                         
                                )
    {
        $data = array(
            'nombre_recinto' => $nombre_recinto,
            'ciudad_recinto' =>$ciudad_recinto            
        );

        $this->db->insert('recintos',$data);
    }




    public function eliminar($id_recinto){
        $this->db->where('id_recinto', $id_recinto);
        $this->db->delete('recintos');
    }

    public function obtener_todos(){
        $this->db->select('id_recinto, 
                            nombre_recinto, 
                            ciudad_recinto');
        $this->db->from('recintos');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_recinto){
        $this->db->select('id_recinto, 
                            nombre_recinto,                           
                            ciudad_recinto');
        $this->db->from('recintos');
        $this->db->where('id_recinto', $id_recinto);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function actualizar( $id_recinto,
                                $nombre_recinto,
                                $ciudad_recinto
                               ){
        $data = array(
            'nombre_recinto' =>   $nombre_recinto,
            'ciudad_recinto' =>  $ciudad_recinto,           

        );
        if($id_recinto){
            $this->db->where('id_recinto', $id_recinto);
            $this->db->update('recintos', $data);
        }else{
            $this->db->insert('recintos', $data);
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