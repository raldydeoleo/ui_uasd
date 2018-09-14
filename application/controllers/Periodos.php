<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Periodos
 * @property CI_Session $session
 * @property Periodo $periodo
 */

  /**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de los procesos con la entidad periodos.
     * 30-07-2018
     */
class Periodos extends CI_Controller {


    public function __construct() {
        parent::__construct();
        //$this->cargarLibrerias();
        $this->load->model('periodos_model');
        $this->valoresDefecto = array();
        $this->notificacion = '';
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

    /**
     * @author: Raldy De Oleo
     * Seguimiento de periodos
     * Vista grupal
     * Muestra un listado de periodos
     */
    public function listaPeriodos(){
        $periodos = $this->periodos_model->obtener_todos();
        $this->asignarDatosVista('periodos', $periodos);
        $this->mostrarVista('citas/listaPeriodos');
    }

    public function nuevo_periodo()
    {   //$this->load->model('estudiantes_model');
        $this->mostrarVista('citas/crearPeriodo');
    }


    /**
     * @author: Raldy De Oleo
     * Crear periodo nuevo.
     * Vista Individual
     * Permite registrar los datos de un periodo.
     */    
    function insertar_periodo()
    {

        if($this->input->post('submit'))
        {   $nombre_periodo = $this->input->post('nombre_periodo');
            $fechainicio_periodo = $this->input->post('fechainicio_periodo');
            $fechafinal_periodo = $this->input->post('fechafinal_periodo');
            $id_tipo_periodo = $this->input->post('id_tipo_periodo');
           
            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->periodos_model->nuevo_periodo(
                $nombre_periodo,
                $fechainicio_periodo,
                $fechafinal_periodo,
                $id_tipo_periodo
            );
            redirect(base_url("periodos"), "refresh");
        }

        else
        {

        }
    }

    public function ver($id_periodo){
        $data = array();
        $this->load->model('periodos_model');
        $periodos = $this->periodos_model->obtener_por_id($id_periodo);
        $data['periodos'] = $periodos;
        $this->asignarDatosVista('periodos', $periodos);
        $this->mostrarVista('panel/asesor/verPeriodo');

    }



    public function editar($id){
        $data = array();
        $this->load->model('periodos_model');
        if($id){
            $periodo = $this->periodos_model->obtener_por_id($id);
            $data['id_periodo'] = $periodo->id_periodo;
            $data['nombre_periodo'] = $periodo->nombre_periodo;
            $data['fechainicio_periodo'] = $periodo->fechafinal_periodo;
            $data['fechafinal_periodo'] = $periodo->fechafinal_periodo;
            $data['id_tipo_periodo'] = $periodo->id_tipo_periodo;
           

        }else{
            $data['id_periodo'] = null;
            $data['nombre_periodo'] = null;
            $data['fechainicio_periodo'] = null;
            $data['fechafinal_periodo'] = null;
            $data['id_tipo_periodo'] = null;

        }

       // $this->asignarDatosVista('periodos', $data);
        $this->load->view('panel/secretaria/editarPeriodo', $data);


    }



    public function guardar_post($id_periodo){
        if($this->input->post()){
            $id_periodo = $this->input->post('id_periodo');            
            $nombre_periodo = $this->input->post('nombre_periodo');
            $fechainicio_periodo = $this->input->post('fechainicio_periodo');
            $fechafinal_periodo = $this->input->post('fechafinal_periodo');
            $id_tipo_periodo = $this->input->post('id_tipo_periodo');
           

            $this->load->model('periodos_model');
            $this->periodos_model->actualizar($id_periodo,                                                   
                                                    $nombre_periodo,
                                                    $fechainicio_periodo,
                                                    $fechafinal_periodo,
                                                    $id_tipo_periodo);
        }
        else{
            $this->insertar_periodo();
            }
        redirect(base_url("periodos"), "refresh");
    }



    public function eliminar($id_cliente){
        $this->load->model('clientes_model');
        $this->clientes_model->eliminar($id_cliente);
        redirect(base_url("clientes"), "refresh");
    }



    public function index() {
       $periodos = $this->periodos_model->obtener_todos();
        $this->asignarDatosVista('periodos', $periodos);
        $this->mostrarVista('citas/listaPeriodos');
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