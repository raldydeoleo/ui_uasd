<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Carreras
 * @property CI_Session $session
 * @property Carreras $carrera
 */
/**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de todos los procesos de la entidad carreras.
     * 30-07-2018
     */
class Carreras extends CI_Controller {


    public function __construct() {
        parent::__construct();
        //$this->cargarLibrerias();
        $this->load->model('carreras_model');
        $this->valoresDefecto = array();
        $this->notificacion = '';
    }

    
    public function index() {
        $carreras = $this->carreras_model->obtener_todos();
        $this->asignarDatosVista('carreras', $carreras);
        $this->mostrarVista('citas/listaCarreras');
    }

    /**
     * @author: Raldy De Oleo
     * Seguimiento de carreras
     * Vista grupal
     * Muestra un listado de carreras de la universidad
     */
    public function listaCarreras(){
        $carreras = $this->carreras_model->obtener_todos();
        $this->asignarDatosVista('carreras', $carreras);
        $this->mostrarVista('citas/listaCarreras');
    }

    public function nueva_carrera(){   
        $this->mostrarVista('citas/crearCarrera');
    }


    /**
     * @author: Raldy De Oleo
     * Crear carrera nuevo.
     * Vista Individual
     * Permite registrar los datos de una carrera.
     */    
    function insertar_carrera()
    {

        if($this->input->post('submit'))
        {   $desc_carrera = $this->input->post('desc_carrera');
            $id_estudiante = $this->input->post('$id_estudiante');
            $id_asignatura = $this->input->post('id_asignatura');
            $id_facultad = $this->input->post('id_facultad');            

            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->carreras_model->nueva_carrera(
                $desc_carrera,
                $id_estudiante,
                $id_asignatura,                
                $id_facultad
            );
            redirect(base_url("carreras"), "refresh");
        }

        else
        {
             //control de errores del post del formulario.
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

    

    public function ver($id_carrera){
        $data = array();
        $this->load->model('carreras_model');
        $carrera = $this->carreras_model->obtener_por_id($id_carrera);
        //$data['clientes'] = $clientes;
        $this->asignarDatosVista('carrera', $carrera);
        $this->mostrarVista('panel/asesor/verCarrera');

    }


    
    public function getEntradas($id_carrera){
        $data = array();
        $carreras = $this->carreras_model->getEntradas($id_carrera);
        $data['carreras'] = $carreras;
        //$this->load->view('panel/asesor/verCarreraTest', $data);        
        $this->asignarDatosVista('carreras', $carreras);
        $this->mostrarVista('panel/asesor/verCarreraTest');

    }

    

    public function editar($id){
        $data = array();
        $this->load->model('carreras_model');
        if($id){
            $carrera = $this->carreras_model->obtener_por_id($id);
            $data['id_carrera'] = $carrera->id_carrera;
            $data['desc_carrera'] = $carrera->desc_carrera;
            $data['id_facultad'] = $carrera->id_facultad;
           

        }else{
            $data['id_carrera'] = null;
            $data['desc_carrera'] = null;
            $data['id_facultad'] = null;

        }

       $this->load->view('panel/secretaria/editarCarrera', $data);
       //$this->asignarDatosVista('editarCarrera', $data);
       ///$this->mostrarVista('panel/secretaria/editarCarrera', $data);
    }

    public function guardar_post($id_carrera){
        if($this->input->post()){
            $id_carrera = $this->input->post('id_carrera');            
            $desc_carrera = $this->input->post('desc_carrera');
            $id_facultad = $this->input->post('id_facultad');
           

            $this->load->model('carreras_model');
            $this->carreras_model->actualizar($id_carrera,                                                   
                                                    $desc_carrera,
                                                    $id_facultad);
        }
        else{
            $this->insertar_carrera();
            }
        redirect(base_url("carreras"), "refresh");
    }


    public function eliminar($id_cliente){
        $this->load->model('clientes_model');
        $this->clientes_model->eliminar($id_cliente);
        redirect(base_url("clientes"), "refresh");
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