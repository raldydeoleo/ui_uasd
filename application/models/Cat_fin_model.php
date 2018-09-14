<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class cat_fin_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }

    function nueva_categoriafin( 
                         $descripcion_categoria,                        
                         $preciocredito_categoria
                                )
    {
        $data = array(
            'descripcion_categoria' => $descripcion_categoria,
            'preciocredito_categoria' =>$preciocredito_categoria            
        );

        $this->db->insert('categoria_financiera',$data);
    }




    public function eliminar($id_cliente){
        $this->db->where('id_cliente', $id_cliente);
        $this->db->delete('clientes');
    }

    public function obtener_todos(){
        $this->db->select('id_categoria, 
                            descripcion_categoria, 
                            preciocredito_categoria');
        $this->db->from('categoria_financiera');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function obtener_por_id($id_categoria){
        $this->db->select('id_categoria, 
                            descripcion_categoria, 
                            preciocredito_categoria');
        $this->db->from('categoria_financiera');
        $this->db->where('id_categoria', $id_categoria);
        $consulta = $this->db->get();
        $resultado = $consulta->row();
        return $resultado;
    }

        public function actualizar($id_categoria,
               $descripcion_categoria,
               $preciocredito_categoria){
            $data = array(           
            'descripcion_categoria' => $descripcion_categoria,
            'preciocredito_categoria' =>  $preciocredito_categoria       

            );
                if($id_categoria){
                $this->db->where('id_categoria', $id_categoria);
                $this->db->update('categoria_financiera', $data);
                }else{
                $this->db->insert('categoria_financiera', $data);
                }
            }

}