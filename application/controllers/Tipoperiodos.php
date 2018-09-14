<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Tipoperiodos
 * @property CI_Session $session
 * @property Tipoperiodo $tipoperiodo
 */
 /**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de los procesos con la entidad tipo de periodos.
     * 30-07-2018
     */
class Tipoperiodos extends CI_Controller {


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
    public function listaTipoPeriodos(){
        $tipo_periodos = $this->periodos_model->obtener_todos_tipos();
        $this->asignarDatosVista('tipo_periodos', $tipo_periodos);
        $this->mostrarVista('citas/listaTipoperiodos');
    }


     public function nuevo_tipo_periodo()
    {   //$this->load->model('estudiantes_model');
        $this->mostrarVista('citas/crearTipoPeriodo');
    }


    /**
     * @author: Raldy De Oleo
     * Crear periodo nuevo.
     * Vista Individual
     * Permite registrar los datos de un periodo.
     */    
    function insertar_tipo_periodo()
    {

        if($this->input->post('submit'))
        {   $descripcion_tipo_periodo = $this->input->post('descripcion_tipo_periodo');
           
           
            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->periodos_model->nuevo_tipo_periodo(
                $descripcion_tipo_periodo               
            );
            redirect(base_url("periodos"), "refresh");
        }

        else
        {

        }
    }

    public function guardar($id_cliente=null){
        $data = array();
        $this->load->model('clientes_model');
        if($id_cliente){
            $cliente = $this->clientes_model->obtener_por_id($id_cliente);
            $data['id_cliente'] = $cliente->id_cliente;
            $data['nombre_cliente'] = $cliente->nombre_cliente;
            $data['apellido_cliente'] = $cliente->apellido_cliente;
            $data['empresa_cliente'] = $cliente->empresa_cliente;
            $data['rnc_cliente'] = $cliente->rnc_cliente;
            $data['direccion_cliente'] = $cliente->direccion_cliente;
            $data['ciudad_cliente'] = $cliente->ciudad_cliente;
            $data['telefono_cliente'] = $cliente->telefono_cliente;
            $data['email_cliente'] = $cliente->email_cliente;

        }else{
            $data['id_cliente']=null;
            $data['nombre_cliente']=null;
            $data['apellido_cliente']=null;
            $data['empresa_cliente']=null;
            $data['rnc_cliente']=null;
            $data['direccion_cliente']=null;
            $data['ciudad_cliente']=null;
            $data['telefono_cliente']=null;
            $data['email_cliente']=null;

        }
        //$this->asignarDatosVista('clientes', $data);
       // $this->mostrarVista('panel/secretaria/editarCliente');
        $this->load->view('panel/secretaria/editarCliente', $data);

    }

    public function ver($id_cliente){
        $data = array();
        $this->load->model('clientes_model');
        $clientes = $this->clientes_model->obtener_por_id($id_cliente);
        $data['clientes'] = $clientes;
        $this->asignarDatosVista('clientes', $clientes);
        $this->mostrarVista('panel/asesor/verCliente');

    }

    public function eliminar($id_cliente){
        $this->load->model('clientes_model');
        $this->clientes_model->eliminar($id_cliente);
        redirect(base_url("clientes"), "refresh");
    }


    public function actualizar($id_cliente){
        if($this->input->post($id_cliente)){
            $nombre_cliente = $this->input->post('nombre_cliente');
            $apellido_cliente = $this->input->post('apellido_cliente');
            $empresa_cliente = $this->input->post('empresa_cliente');
            $rnc_cliente = $this->input->post('rnc_cliente');
            $direccion_cliente = $this->input->post('direccion_cliente');
            $ciudad_cliente = $this->input->post('ciudad_cliente');
            $telefono_cliente = $this->input->post('telefono_cliente');
            $email_cliente = $this->input->post('email_cliente');

            $this->load->model('clientes_model');
            $this->clientes_model->actualizar($nombre_cliente,
                $apellido_cliente,
                $empresa_cliente,
                $rnc_cliente,
                $direccion_cliente,
                $ciudad_cliente,
                $telefono_cliente,
                $email_cliente);
        }else{
            $this->guardar();
        }
    }

    public function index() {
       $periodos = $this->periodos_model->obtener_todos();
        $this->asignarDatosVista('periodos', $periodos);
        $this->mostrarVista('citas/listaPeriodos');
    }



    public function editar($id_cliente=null){
        $data = array();
        $this->load->model('clientes_model');
        if($id_cliente){
            $cliente = $this->clientes_model->obtener_por_id($id_cliente);
            $data['id_cliente'] = $cliente->id_cliente;
            $data['nombre_cliente'] = $cliente->nombre_cliente;
            $data['apellido_cliente'] = $cliente->apellido_cliente;
            $data['empresa_cliente'] = $cliente->empresa_cliente;
            $data['rnc_cliente'] = $cliente->rnc_cliente;
            $data['rnc_cliente'] = $cliente->direccion_cliente;
            $data['ciudad_cliente'] = $cliente->ciudad_cliente;
            $data['telefono_cliente'] = $cliente->telefono_cliente;
            $data['email_cliente'] = $cliente->email_cliente;

        }else{
            $data['id_cliente']=null;
            $data['nombre_cliente']=null;
            $data['apellido_cliente']=null;
            $data['empresa_cliente']=null;
            $data['rnc_cliente']=null;
            $data['direccion_cliente']=null;
            $data['ciudad_cliente']=null;
            $data['telefono_cliente']=null;
            $data['email_cliente']=null;

        }

        $this->asignarDatosVista('clientes', $data);
        $this->mostrarVista('panel/secretaria/clienteform', $data);


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