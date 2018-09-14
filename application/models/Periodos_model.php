<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class periodos_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nuevo_periodo( $nombre_periodo,                        
                         $fechainicio_periodo,
                         $fechafinal_periodo,
                         $id_tipo_periodo
                                )
    {
        $data = array(
            'nombre_periodo' => $nombre_periodo,
            'fechafinal_periodo' => $fechainicio_periodo,
            'fechafinal_periodo' => $fechafinal_periodo,
            'id_tipo_periodo' => $id_tipo_periodo
            
        );

        $this->db->insert('periodos',$data);
    }




        function nuevo_tipo_periodo($descripcion_tipo_periodo)
            {
                $data = array(
                    'descripcion_tipo_periodo' => $descripcion_tipo_periodo
                );

                $this->db->insert('tipo_periodos',$data);
            }




    public function eliminar($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $this->db->delete('clientes');
    }

    public function obtener_todos(){
        $this->db->select('id_periodo, 
                            nombre_periodo, 
                            fechainicio_periodo,
                            fechafinal_periodo,
                            id_tipo_periodo');
        $this->db->from('periodos');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }


     public function obtener_todos_tipos(){
        $this->db->select('id_tipo_periodo, 
                            descripcion_tipo_periodo');

        $this->db->from('tipo_periodos');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }


    public function obtener_por_id($id_periodo){
        $this->db->select('id_periodo, 
                            nombre_periodo, 
                            fechainicio_periodo, 
                            fechafinal_periodo, 
                            id_tipo_periodo');
        $this->db->from('periodos');
        $this->db->where('id_periodo', $id_periodo);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function actualizar( $id_periodo,
                                $nombre_periodo,
                                $fechainicio_periodo,
                                $fechafinal_periodo,
                                $id_tipo_periodo){
        $data = array(
            'nombre_periodo' =>   $nombre_periodo,
            'fechainicio_periodo' =>  $fechainicio_periodo,
            'fechafinal_periodo' => $fechafinal_periodo,
            'id_tipo_periodo' =>  $id_tipo_periodo          

        );
        if($id_periodo){
            $this->db->where('id_periodo', $id_periodo);
            $this->db->update('periodos', $data);
        }else{
            $this->db->insert('periodos', $data);
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