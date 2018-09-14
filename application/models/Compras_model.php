<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Compras_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    function nueva_compra($fecha_compra, $vencimiento_compra, $hora_compra,$cantidad_compra,$desc_compra,$unidad_compra, $precio_compra)
    {
        $data = array(
            'fecha_compra' => $fecha_compra,
            'vencimiento_compra' => $vencimiento_compra,
            'hora_compra' => $hora_compra,
            'cantidad_compra' => $cantidad_compra,
            'desc_compra' => $desc_compra,
            'unidad_compra' => $unidad_compra,
            'precio_compra' => $precio_compra,
        );

        $this->db->insert('compras',$data);
    }

    function nueva_ordencompra($numero_ordencompra,
                               $fecha_ordencompra,
                               $fecha_vence,
                               $condicion_ordencompra,
                               $id_proveedor,
                               $id_proyecto,
                               $id_asociado,
                               $item_ordencompra,
                               $desc_ordencompra,
                               $unidad_ordencompra,
                               $cantidad_ordencompra,
                               $precio_ordencompra,
                               $monto_ordencompra,
                               $nota_ordencompra,
                               $subtotal_ordencompra,
                               $itebis_ordencompra,
                               $total_ordencompra
                                )
    {
        $data = array(
            'numero_ordencompra' =>  $numero_ordencompra,
            'fecha_ordencompra' => $fecha_ordencompra,
            'fecha_vence' => $fecha_vence,
            'condicion_ordencompra' => $condicion_ordencompra,
            'id_proveedor' =>  $id_proveedor,
            'id_proyecto' => $id_proyecto,
            'id_asociado' => $id_asociado,
            'item_ordencompra' => $item_ordencompra,
            'desc_ordencompra' => $desc_ordencompra,
            'unidad_ordencompra' => $unidad_ordencompra,
            'cantidad_ordencompra' => $cantidad_ordencompra,
            'precio_ordencompra' =>  $precio_ordencompra,
            'monto_ordencompra' => $monto_ordencompra,
            'nota_ordencompra' => $nota_ordencompra,
            'subtotal_ordencompra' => $subtotal_ordencompra,
            'itebis_ordencompra' => $itebis_ordencompra,
            'total_ordencompra' => $total_ordencompra

        );

        $this->db->insert('ordenescompra',$data);
    }

    public function guardar($desc_compra,
                            $cantidad_compra,
                            $precio_compra,
                            $fecha_compra,
                            $id_compra=null){
        $data = array(

            'desc_compra'=> $desc_compra,
            'cantidad_compra'=> $cantidad_compra,
            'precio_compra' => $precio_compra,
            'fecha_compra' =>  $fecha_compra,



        );
        if($id_compra){
            $this->db->where('id_compra', $id_compra);
            $this->db->update('compras', $data);
        }else{
            $this->db->insert('compras', $data);
        }
    }

    public function eliminar($id_compra){
        $this->db->where('id_compra', $id_compra);
        $this->db->delete('compras');
    }

    public function obtener_todos(){
        $this->db->select('id_compra, desc_compra, cantidad_compra, precio_compra, fecha_compra,vencimiento_compra');
        $this->db->from('compras');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_compras_proveedor(){
        $this->db->select('*');
        $this->db->from('compras');
        //$this->db->join('proveedores', 'proveedores.id_proveedor = compras.id_proveedor');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_compra){
        $this->db->select('id_compra, desc_compra, cantidad_compra, precio_compra, fecha_compra');
        $this->db->from('compras');
        $this->db->where('id_compra', $id_compra);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }


    public function obtener_orden_por_id($id_ordencompra){
        $this->db->select('id_ordencompra, 
                            numero_ordencompra, 
                            fecha_ordencompra,
                              id_proveedor,
                              id_proyecto,
                            item_ordencompra,  
                            desc_ordencompra, 
                            cantidad_ordencompra, 
                            unidad_ordencompra, 
                            precio_ordencompra, 
                            monto_ordencompra,
                            nota_ordencompra,
                            subtotal_ordencompra, 
                            itebis_ordencompra,
                            total_ordencompra
                            ');
        $this->db->from('ordenescompra ');
        $this->db->where('id_ordencompra', $id_ordencompra);
       // $this->db->join('proveedores', 'proveedores.id_proveedor = ordenescompra.id_proveedor');
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

    public function obtener_ordenes(){
        $this->db->select('id_ordencompra, numero_ordencompra, desc_ordencompra, total_ordencompra, fecha_ordencompra, id_proveedor, id_proyecto');
        $this->db->from('ordenescompra');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_ordenes_proveedor($id_proveedor){
        $this->db->select('*');
        $this->db->from('ordenescompra');
        $this->db->where('id_proveedor', $id_proveedor);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    public function obtener_ordenes_proyecto($id_proyecto){
        $this->db->select('*');
        $this->db->from('ordenescompra');
        $this->db->where('id_proyecto', $id_proyecto);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_ordenes_asociado($id_asociado){
        $this->db->select('*');
        $this->db->from('asociado');
        $this->db->where('id_asociado', $id_asociado);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
}