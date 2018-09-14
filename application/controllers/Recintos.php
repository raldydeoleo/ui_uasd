<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Recintos
 * @property CI_Session $session
 * @property Recinto $recinto
 */

  /**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de los procesos con la entidad recintos.
     * 30-07-2018
     */
class Recintos extends CI_Controller {


    public function __construct() {
        parent::__construct();
        //$this->cargarLibrerias();
        $this->load->model('recintos_model');
        $this->valoresDefecto = array();
        $this->notificacion = '';
    }


    public function index(){
        $recintos = $this->recintos_model->obtener_todos();
        $this->asignarDatosVista('recintos', $recintos);
        $this->mostrarVista('citas/listaRecintos');
    }

    /**
     * @author: Raldy De Oleo
     * Seguimiento de recintos
     * Vista grupal
     * Muestra un listado de recintos
     */
    public function listaRecintos(){
        $recintos = $this->recintos_model->obtener_todos();
        $this->asignarDatosVista('recintos', $recintos);
        $this->mostrarVista('citas/listaRecintos');
    }

    public function nuevo_recinto()
    {   $this->load->model('recintos_model');
        $this->mostrarVista('citas/crearRecinto');
    }


    /**
     * @author: Raldy De Oleo
     * Crear estudiante nuevo.
     * Vista Individual
     * Permite registrar los datos de un estudiante.
     */    
    function insertar_recinto()
    {

        if($this->input->post('submit'))
        {   
            $nombre_recinto = $this->input->post('nombre_recinto');
            $ciudad_recinto = $this->input->post('ciudad_recinto');
            
            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->recintos_model->nuevo_recinto(
                $nombre_recinto,
                $ciudad_recinto
            );
            redirect(base_url("recintos"), "refresh");
        }

        else
        {

        }
    }


    public function ver($id_recinto){
        $data = array();
        $this->load->model('recintos_model');
        $recinto = $this->recintos_model->obtener_por_id($id_recinto);
        //$data['recinto'] = $recinto;
        $this->asignarDatosVista('recinto', $recinto);
        $this->mostrarVista('panel/asesor/verRecinto');

    }


    public function eliminar($id_recinto){
        $this->load->model('recintos_model');
        $this->recintos_model->eliminar($id_recinto);
        redirect(base_url("recintos"), "refresh");
    }


    public function editar($id){
        $data = array();
        $this->load->model('recintos_model');
        if($id){
            $recinto = $this->recintos_model->obtener_por_id($id);
            $data['id_recinto'] = $recinto->id_recinto;
            $data['nombre_recinto'] = $recinto->nombre_recinto;
            $data['ciudad_recinto'] = $recinto->ciudad_recinto;           

        }else{
            $data['id_recinto']=null;
            $data['nombre_recinto']=null;
            $data['ciudad_recinto']=null;  
        }

        //$this->asignarDatosVista('clientes', $data);
        //$this->mostrarVista('panel/secretaria/clienteform', $data);
        $this->load->view('panel/secretaria/editaRecinto', $data);


    }


    public function guardar_post($id_recinto){
        if($this->input->post()){
            $id_recinto = $this->input->post('id_recinto');
            $nombre_recinto = $this->input->post('nombre_recinto');
            $ciudad_recinto = $this->input->post('ciudad_recinto');
           

            $this->load->model('recintos_model');
            $this->recintos_model->actualizar($id_recinto,
                                                $nombre_recinto,
                                                $ciudad_recinto
                                               );

        }else{
            $this->insertar_recinto();
            }
        redirect(base_url("recintos"), "refresh");
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


    protected function cargarLibrerias(){
        //$this->load->model(CLIENTE_MODELO);
        //$this->load->model(VEHICULO_MODELO);

    }

    public function mostrar($idCliente=0){
        if ($idCliente==0)
            $this->mostrarVarios();
    }

    public function mostrarVarios(){
        $clientes = $this->cliente->leerTodos();
        echo json_encode($clientes);
    }



}