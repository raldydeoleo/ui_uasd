<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function construct() {
        parent::__construct();
    }

    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA DEL ESTUDIANTE
    function subir($titulo, $imagen)
    {
        $data = array(
            'titulo' => $titulo,
            'ruta' => $imagen
        );
        return $this->db->insert('foto_estudiante', $data);
    }

     //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA DEL PROFESOR
     function subir_foto_prof($titulo, $imagen)
     {
         $data = array(
             'titulo' => $titulo,
             'ruta' => $imagen
         );
         return $this->db->insert('foto_profesor', $data);
     }
}