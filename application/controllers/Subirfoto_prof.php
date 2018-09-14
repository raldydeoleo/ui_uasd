<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subirfoto_prof extends CI_Controller  {

    public function __construct()
    {
        parent::__construct();       
        $this->load->model('profesores_model');        
        $this->valoresDefecto = array();
        $this->notificacion = '';
        $this->load->model('upload_model');
    }

    public function index() {       
        $this->mostrarVista('subir_foto_profesor');
    }

    public function do_upload(){  
        $config = array(
        'upload_path'   => './uploads/',
        'allowed_types' => '*',
        'max_size'   => 100000,
        'max_width'  => 1024,
        'max_height' => 768,
    );
        $this->load->library('upload', $config);


        if(!$this->upload->do_upload('userFile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_success_prof',$error);
        }
        else
        {
            //Procesar imagen
           // $nombre_imagen = url_title(convert_accented_characters($_FILES['userfile', 'name']),'_', TRUE);
           // $nombre_imagen = str_replace($nombre_imagen, 'jpg','');
            $file_info = $this->upload->data();
            //USAMOS LA FUNCIÓN create_thumbnail Y LE PASAMOS EL NOMBRE DE LA IMAGEN,
            //ASÍ YA TENEMOS LA IMAGEN REDIMENSIONADA
            $this->_create_thumbnail($file_info['file_name']);
            $data = array('upload_data' => $this->upload->data());
            $titulo = $this->input->post('titulo');
            $imagen = $file_info['full_path'];
            $subir = $this->upload_model->subir_foto_prof($titulo,$imagen);
            $data['titulo'] = $titulo;
            $data['imagen'] = $imagen; //
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success_prof', $data);
         }

}

//FUNCIÓN PARA CREAR LA MINIATURA A LA MEDIDA QUE LE DIGAMOS
    function _create_thumbnail($filename){
        $config['image_library'] = 'gd2';
        //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
        $config['source_image'] = 'uploads/'.$filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
        $config['new_image']='uploads/thumbs/';
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }




    /**
     * Asigna un valor para una variable a ser pasada a la vista
     * @author Raldy De Oleo
     * @version 0.0.3-ALPHA
     * @param string $index - Nombre de la variable en la vista.
     * @param $valor - Valor que tendra la variable en la vista.
     */
    public function asignarDatosVista($index, $valor) {
        $this->vistaData[$index] = $valor;
    }

    /**
     * Carga y muestra una vista especificada.
     * @author Raldy De Oleo
     * @version 0.0.3-ALPHA
     * @param $vista - Ruta relativa de la vista a mostrar
     * @return bool - Retorna true.
     */
    public function  mostrarVista($vista) {
        //$this->vistaData[TEMPLATE_BREADCUMBS] = $this->breadcumbs;
        $this->vistaData[TEMPLATE_VALORES_DEFECTO] = $this->valoresDefecto;
        //$this->vistaData[TEMPLATE_NOTIFICACION] = $this->notificacion;
        //$this->vistaData[TEMPLATE_MEMBRESIA] = $this->obtenerMembresiaSesion();

        // Transformacion de la vista al contenido del template
        $templateData[TEMPLATE_CONTENIDO] = $this->load->view($vista, $this->vistaData, true);

        $this->load->view('templates/backend', $templateData);
        return true;
    }


}
