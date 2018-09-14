<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class inscripciones_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

   
    function nueva_inscripcion(
                               $id_estudiante,
                               $id_periodo,
                               $fecha_inscripcion,
                               $hora_inscripcion,                               
                               $desc_inscripcion,
                               $creditos_inscripcion,
                               $precio_credito_inscripcion,
                               $monto_inscripcion,
                               $total_inscripcion,
                               $nota_inscripcion,
                               $subtotal_inscripcion
                               
                                )
    {
        $data = array(
            
            
            'id_estudiante' =>  $id_estudiante,
            'id_periodo' => $id_periodo,
            'fecha_inscripcion' => $fecha_inscripcion,
            'hora_inscripcion' => $hora_inscripcion,
            'desc_inscripcion' => $desc_inscripcion,
            'creditos_inscripcion' => $creditos_inscripcion,
            'precio_credito_inscripcion' =>  $precio_credito_inscripcion,
            'monto_inscripcion' => $monto_inscripcion,
            'total_inscripcion' => $total_inscripcion,
            'nota_inscripcion' => $nota_inscripcion,
            'subtotal_inscripcion' => $subtotal_inscripcion

        );

        $this->db->insert('inscripciones',$data);
    }


        function nuevo_pago(
                $id_inscripcion,               
                $fecha_pago,
                $hora_pago,        
                $monto_pago
                )
        {
        $data = array(

            'id_inscripcion' =>  $id_inscripcion,           
            'fecha_pago' => $fecha_pago,
            'hora_pago' => $hora_pago,        
            'monto_pago' => $monto_pago

        );

        $this->db->insert('pagos',$data);
        }



    public function  actualizar_inscripcion($id_inscripcion,
                                                $id_estudiante,
                                                $id_periodo,
                                                $fecha_inscripcion,
                                                $hora_inscripcion,
                                                $creditos_inscripcion,
                                                $total_inscripcion,
                                                $estatus){
        $data = array(
            'id_estudiante' => $id_estudiante,
            'id_periodo' => $id_periodo,
            'fecha_inscripcion' => $fecha_inscripcion,
            'hora_inscripcion' => $hora_inscripcion,
            'creditos_inscripcion' => $creditos_inscripcion,
            'total_inscripcion' => $total_inscripcion,
            'estatus'=>$estatus
        );
        if($id_inscripcion){
            $this->db->where('id_inscripcion', $id_inscripcion);
            $this->db->update('inscripciones', $data);
        }else{
            //$this->db->insert('compras', $data);
        }
    }

   


    public function obtener_por_id($id_inscripcion){
        $this->db->select('id_inscripcion, 
                            id_estudiante, 
                            id_periodo,  
                            fecha_inscripcion, 
                            hora_inscripcion, 
                            desc_inscripcion,
                            creditos_inscripcion,
                            precio_credito_inscripcion,
                            monto_inscripcion,
                            subtotal_inscripcion,
                            total_inscripcion,
                            nota_inscripcion, 
                            estatus');
        $this->db->from('inscripciones');
        $this->db->where('id_inscripcion', $id_inscripcion);
        // $this->db->join('proveedores', 'proveedores.id_proveedor = ordenescompra.id_proveedor');
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function obtener_inscripciones(){
        $this->db->select('id_inscripcion, 
                           id_estudiante, 
                           id_periodo,  
                           fecha_inscripcion, 
                           hora_inscripcion, 
                           desc_inscripcion,
                           creditos_inscripcion,
                           precio_credito_inscripcion,
                           monto_inscripcion,
                           subtotal_inscripcion,
                           total_inscripcion,
                           nota_inscripcion');
        $this->db->from('inscripciones');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

   
}