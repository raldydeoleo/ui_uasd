<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Edificios
 * @property CI_Edificio $edificio
 * @property Edificio $edificio
 */
/**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de todos los procesos de la entidad Edificios.
     * 30-07-2018
     */
class Edificios extends CI_Controller {


    public function __construct() {
        parent::__construct();
        //$this->cargarLibrerias();
        $this->load->model('edificios_model');
        $this->valoresDefecto = array();
        $this->notificacion = '';
    }

    /**
     * @author: Raldy De Oleo
     * Seguimiento de edificios
     * Vista grupal
     * Muestra un listado de edificios
     */
    public function listaEdificios(){
        $edificios = $this->edificios_model->obtener_todos();
        $this->asignarDatosVista('edificios', $edificios);
        $this->mostrarVista('citas/listaEdificios');
    }

    public function nuevo_edificio()
    {   $this->load->model('edificios_model');
        //$estudiantes = $this->estudiantes_model->obtener_todos();
        //$this->asignarDatosVista('estudiantes', $estudiantes);
        $this->mostrarVista('citas/crearEdificio');

    }

    /**
     * @author: Raldy De Oleo
     * Crear crea nuevo edificio
     * Vista Individual
     * Permite registrar los datos de un edificio.
     */    
    function insertar_edificio()
    {

        if($this->input->post('submit'))
        {   $nombre_edificio = $this->input->post('nombre_edificio');
            $cantaulas_edificio = $this->input->post('cantaulas_edificio');
            $id_recinto = $this->input->post('id_recinto');

            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->edificios_model->nuevo_edificio(
                $nombre_edificio,
                $cantaulas_edificio,
                $id_recinto
            );
            redirect(base_url("edificios"), "refresh");
        }

        else
        {
            //si hay algun error en el envio de los datos del formulario al controlador
        }
    }


    public function ver($id_edificio){
        $data = array();
        $this->load->model('edificios_model');
        $edificio = $this->edificios_model->obtener_por_id($id_edificio);
        $data['edificio'] = $edificio;
        $this->asignarDatosVista('edificio', $edificio);
        $this->mostrarVista('panel/asesor/verEdificio');

    }
    

    public function eliminar($id_edificio){
        $this->load->model('edificios_model');
        $this->edificios_model->eliminar($id_edificio);
        redirect(base_url("edificios"), "refresh");
    }


    public function index() {
        $edificios = $this->edificios_model->obtener_todos();
        $this->asignarDatosVista('edificios', $edificios);
        $this->mostrarVista('citas/listaEdificios');

    }



    public function editar($id){
        $data = array();
        $this->load->model('edificios_model');
        if($id){
            $edificio = $this->edificios_model->obtener_por_id($id);
            $data['id_edificio'] = $edificio->id_edificio;
            $data['nombre_edificio'] = $edificio->nombre_edificio;
            $data['cantaulas_edificio'] = $edificio->cantaulas_edificio;
            $data['id_recinto'] = $edificio->id_recinto;
           

        }else{
            $data['id_edificio']=null;
            $data['nombre_edificio']=null;
            $data['cantaulas_edificio']=null;
            $data['id_recinto']=null;
             }

        //$this->asignarDatosVista('edificio', $data);
        //$this->mostrarVista('panel/secretaria/editaEdificio', $data);
        $this->load->view('panel/secretaria/editaEdificio', $data);


    }


    public function guardar_post($id_edificio){
        if($this->input->post()){
            $id_edificio = $this->input->post('id_edificio');
            $nombre_edificio = $this->input->post('nombre_edificio');
            $cantaulas_edificio = $this->input->post('cantaulas_edificio');
            $id_recinto = $this->input->post('id_recinto');

            $this->load->model('edificios_model');
            $this->edificios_model->actualizar($id_edificio,
                                                $nombre_edificio,
                                                $cantaulas_edificio,
                                                $id_recinto);

        }else{
            $this->insertar_edificio();
            }
        redirect(base_url("edificios"), "refresh");
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