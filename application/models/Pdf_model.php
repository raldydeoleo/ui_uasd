<?php

class Pdf_Model extends CI_Model {

    public function obtener_ordenes(){

        $query = $this->db->get('ordenescompra');
        return $query->result();

    }

}