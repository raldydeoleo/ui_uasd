<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Aulas
 * @property Aulas $aula
 *
 */
/**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de todos los procesos de la entidad aulas.
     * 30-07-2018
     */

class Aulas extends BS_Controller {

    public function __construct() {
        parent::__construct();
        //$this->cargarLibrerias();
        $this->load->model('aulas_model');
    }

    protected function cargarLibrerias() {
        $this->load->model(CLIENTE_MODELO);
        $this->load->model(VEHICULO_MODELO);
        $this->load->model(ORDEN_TRABAJO_MODELO);
    }


     /**
    * @author: Raldy De Oleo
     * Registro de informacion sobre una aula determinada
     * Vista individual
     * Formulario para crear una aula.
     */
    public function index(){
    $aulas = $this->aulas_model->obtener_todos();
    $this->asignarDatosVista('aulas', $aulas);
    $this->mostrarVista('citas/listaAulas', $aulas);
    }


    /**
    * @author: Raldy De Oleo
     * Registro de informacion sobre una aula determinada
     * Vista individual
     * Formulario para crear una aula.
     */
    public function ver($id_aula){     
      
        $data = array();        
        $aula = $this->aulas_model->obtener_por_id($id_aula);
        $data['aula'] = $aula;
        $this->asignarDatosVista('aula', $aula);
        $this->mostrarVista('panel/asesor/verAula', $aula);
    }

/**
     * Creacion de secciones para asignaturas
     * Vista individual
     * Formulario para crear secciones.
     */
    public function nueva_aula()
    {   //$this->load->model('secciones_model');
        $this->mostrarVista('citas/crearAula');
    }


    /**
     * @author: Raldy De Oleo
     * Crear seccion nueva.
     * Vista Individual
     * Permite registrar los datos de una seccion.
     */    
    function insertar_aula()
    {

        if($this->input->post('submit'))
        {   $nombre_aula = $this->input->post('nombre_aula');
            $capacidad_aula = $this->input->post('capacidad_aula');
            $id_edificio = $this->input->post('id_edificio');
            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->aulas_model->nueva_aula(
                $nombre_aula,
                $capacidad_aula,
                $id_edificio
               
            );
            redirect(base_url("aulas"), "refresh");
        }

        else
        {
            // Lo que quiero que pase si hay un error al recibir los datos del formulario.
        }
    }

    public function listaAulas(){
        //$this->load->model('asociados_model');
        $aulas = $this->aulas_model->obtener_todos();
        $this->asignarDatosVista('aulas', $aulas);
        $this->mostrarVista('citas/listaAulas');
    }



    public function editar($id){
        $data = array();
        $this->load->model('aulas_model');
        if($id){
            $aula = $this->aulas_model->obtener_por_id($id);
            $data['id_aula'] = $aula->id_aula;
            $data['nombre_aula'] = $aula->nombre_aula;            
            $data['capacidad_aula'] = $aula->capacidad_aula; 
            $data['id_edificio'] = $aula->id_edificio;                    

        }else{
            $data['id_aula']=null;
            $data['nombre_aula']=null;
            $data['capacidad_aula']=null;
            $data['id_edificio']=null;           
        }

        //$this->asignarDatosVista('secciones', $data);
        //$this->mostrarVista('panel/secretaria/editaAula');
        $this->load->view('panel/secretaria/editaAula', $data);
    }

    public function guardar_post($id_aula){
        if($this->input->post()){
            $$id_aula = $this->input->post('id_aula');
            $nombre_aula = $this->input->post('nombre_aula');
            $capacidad_aula = $this->input->post('capacidad_aula');
            $id_edificio = $this->input->post('id_edificio');

            $this->load->model('aulas_model');
            $this->aulas_model->actualizar($id_aula,
                                                $nombre_aula,
                                                $capacidad_aula,
                                                $id_edificio);

        }
        else
        {
            $this->insertar_aula();
        }
        redirect(base_url("aulas"), "refresh");
    }




    public function eliminar($id_aula){       
        $this->aulas_model->eliminar($id_aula);
        redirect(base_url("aulas"), "refresh");
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
        $this->vistaData[TEMPLATE_VALORES_DEFECTO] = $this->valoresDefecto;
        $templateData[TEMPLATE_CONTENIDO] = $this->load->view($vista, $this->vistaData, true);
        $this->load->view('templates/backend', $templateData);
        return true;
    }

    
}

