<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Asignaturas
 * @property CI_Session $session
 * @property Asignaturas $asignatura
 */
/**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de todos los procesos de la entidad asignaturas.
     * 30-07-2018
     */
class Asignaturas extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->cargarLibrerias();        
        $this->load->model('asignaturas_model');
        $this->valoresDefecto = array();        
        $this->notificacion = '';
    }

/**
     * @author: Raldy De Oleo
     * Consulta de asignaturas por carrera
     * Vista grupal
     * Muestra un listado de asignaturas por carrera
     */
    public function AsignaturasPorcarrera($id_carrera){
        $asignaturasPorcarrera = $this->asignaturas_model->asignaturas_por_carrera($id_carrera);
        $this->asignarDatosVista('asignaturasPorcarrera', $asignaturasPorcarrera);
        $this->mostrarVista('panel/secretaria/asignaturasPorcarrera');
    }


   /**a
     * @author: Raldy De Oleo
     * Lista  de asignaturas
     * Vista grupal
     * Muestra un listado de asignaturas
     */
    public function listaEstadoAsignaturas(){
        $asignaturas = $this->asignaturas_model->obtener_estados();
        $this->asignarDatosVista('asignaturas', $asignaturas);
        $this->mostrarVista('panel/secretaria/listaEstadoAsignaturas');
    }

    /**a
     * @author: Raldy De Oleo
     * Lista  de asignaturas
     * Vista grupal
     * Muestra un listado de asignaturas
     */
    public function listaAsignaturas(){
        $asignaturas = $this->asignaturas_model->obtener_todos();
        $this->asignarDatosVista('asignaturas', $asignaturas);
        $this->mostrarVista('panel/secretaria/listaAsignaturas');
    }

    public function nueva_asignatura(){  
        $this->mostrarVista('panel/secretaria/asignaturaform');
    }

    public function seccionesPorAsignatura($id_asignatura){
        $secciones = $this->asignaturas_model->obtener_secciones($id_asignatura);
        $this->asignarDatosVista('secciones', $secciones);  
        $this->mostrarVista('panel/secretaria/seccionesPorAsignatura');
    }

    public function proyectarAsignatura(){  
        $this->mostrarVista('panel/secretaria/proyectarAsinatura');
    }

    /**
     * @author: Raldy De Oleo
     * Crear asignatura nueva.
     * Vista Individual
     * Permite registrar los datos de una asignatura.
     */    
    function insertar_asignatura()
    {

        if($this->input->post('submit'))
        {   $id_carrera = $this->input->post('id_carrera');
            $id_profesor = $this->input->post('id_profesor');
            $nombre_asignatura = $this->input->post('nombre_asignatura');           
            $clave_asignatura = $this->input->post('clave_asignatura');
            $nrc_asignatura = $this->input->post('nrc_asignatura');
            $creditos_asignatura = $this->input->post('creditos_asignatura');
            $horasp_asignatura = $this->input->post('horasp_asignatura');
            $horast_asignatura = $this->input->post('horast_asignatura');
            
            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->asignaturas_model->nueva_asignatura(
                $id_carrera,
                $id_profesor,
                $nombre_asignatura,
                $clave_asignatura,
                $nrc_asignatura,                
                $creditos_asignatura,
                $horasp_asignatura,
                $horast_asignatura
               
            );
            redirect(base_url("asignaturas"), "refresh");
        }

        else
        {

        }
    }

    /**
     * @author: Raldy De Oleo
     * Crear asignatura nueva.
     * Vista Individual
     * Permite registrar los datos de una asignatura.
     */    
    function insertar_proyeccion()
    {

        if($this->input->post('submit'))
        {   $id_asignatura = $this->input->post('id_asignatura');
            $id_periodo = $this->input->post('id_periodo');
            $id_estudiante = $this->input->post('id_estudiante');
            //ahora procesamos los datos hacía el modelo que debemos crear
            $nueva_insercion = $this->asignaturas_model->nueva_proyeccion(
                $id_asignatura,
                $id_periodo,
                $id_estudiante
                
            );
            redirect(base_url("asignaturas"), "refresh");
        }

        else
        {

        }
    }

    public function guardar($id_asignatura=null){
        $data = array();
        //$this->load->model('clientes_model');
        if($id_asignatura){
            $asignatura = $this->asignaturas_model->obtener_por_id($id_asignatura);
            $data['id_asignatura'] =  $asignatura->id_asignatura;
            $data['nombre_asignatura'] =  $asignatura->nombre_asignatura;
            $data['clave_asignatura'] =  $asignatura->clave_asignatura;
            $data['nrc_asignatura'] = $asignatura->nrc_asignatura;
            $data['creditos_asignatura'] =  $asignatura->creditos_asignatura;
            $data['horasp_asignatura'] =  $asignatura->horasp_asignatura;
            $data['horast_asignatura'] =  $asignatura->horast_asignatura;           

        }else{
            $data['id_asignatura']=null;
            $data['nombre_asignatura']=null;
            $data['clave_asignatura']=null;
            $data['nrc_asignatura']=null;
            $data['creditos_asignatura']=null;
            $data['horasp_asignatura']=null;
            $data['horast_asignatura']=null;

        }
        //$this->asignarDatosVista('clientes', $data);
        // $this->mostrarVista('panel/secretaria/editarCliente');
        $this->load->view('panel/secretaria/editarAsignatura', $data);
    }



    public function ver($id_asignatura){
        $data = array();        
        $asignatura = $this->asignaturas_model->obtener_por_id($id_asignatura);
        $data['asignatura'] = $asignatura;
        $this->asignarDatosVista('asignatura', $asignatura);
        $this->mostrarVista('panel/asesor/verAsignatura');
    }

    public function eliminar($id_asignatura){
        $this->asignaturas_model->eliminar($id_asignatura);
        redirect(base_url("asignaturas"), "refresh");
    }


    public function index() {       
        $asignaturas = $this->asignaturas_model->obtener_todos();
        $this->asignarDatosVista('asignaturas', $asignaturas);
        $this->mostrarVista('panel/secretaria/listaAsignaturas');
    }



    public function editar($id){
        $data = array();
        $this->load->model('asignaturas_model');
        if($id){
            $asignatura = $this->asignaturas_model->obtener_por_id($id);
            $data['id_asignatura'] = $asignatura->id_asignatura;
            $data['id_carrera'] = $asignatura->id_carrera;
            $data['id_profesor'] = $asignatura->id_profesor;
            $data['nombre_asignatura'] = $asignatura->nombre_asignatura;
            $data['clave_asignatura'] = $asignatura->clave_asignatura;
            $data['nrc_asignatura'] = $asignatura->nrc_asignatura;
            $data['creditos_asignatura'] = $asignatura->creditos_asignatura;
            $data['horasp_asignatura'] = $asignatura->horasp_asignatura;
            $data['horast_asignatura'] = $asignatura->horast_asignatura;          

        }else{
            $data['id_asignatura']=null;
            $data['id_carrera']=null;
            $data['id_profesor']=null;
            $data['nombre_asignatura']=null;
            $data['clave_asignatura']=null;
            $data['nrc_asignatura']=null;
            $data['creditos_asignatura']=null;
            $data['horasp_asignatura']=null;
            $data['horast_asignatura']=null; 
        }

        //$this->asignarDatosVista('asignaturas', $data);
        //$this->mostrarVista('panel/secretaria/editaAsignatura', $data);
        $this->load->view('panel/secretaria/editaAsignatura', $data);
    }


    public function editarEstado($id){
        $data = array();
        $this->load->model('asignaturas_model');
        if($id){
            $asignatura = $this->asignaturas_model->obtener_estado_por_id($id);
            $data['id_asignatura'] = $asignatura->id_asignatura;
            $data['id_estudiante'] = $asignatura->id_estudiante;
            $data['id_carrera'] = $asignatura->id_carrera;
            $data['id_profesor'] = $asignatura->id_profesor;
            $data['nombre_asignatura'] = $asignatura->nombre_asignatura;
            $data['clave_asignatura'] = $asignatura->clave_asignatura;
            $data['nrc_asignatura'] = $asignatura->nrc_asignatura;
            $data['creditos_asignatura'] = $asignatura->creditos_asignatura;
            $data['horasp_asignatura'] = $asignatura->horasp_asignatura;
            $data['horast_asignatura'] = $asignatura->horast_asignatura; 
            $data['estado_asignatura'] = $asignatura->estado_asignatura; 
            $data['calificacion_asignatura'] = $asignatura->calificacion_asignatura;          

        }else{
            $data['id_asignatura']=null;
            $data['id_estudiante']=null; 
            $data['id_carrera']=null;
            $data['id_profesor']=null;
            $data['nombre_asignatura']=null;
            $data['clave_asignatura']=null;
            $data['nrc_asignatura']=null;
            $data['creditos_asignatura']=null;
            $data['horasp_asignatura']=null;
            $data['horast_asignatura']=null; 
            $data['estado_asignatura']=null; 
            $data['cafificacion_asignatura']=null; 
        }

        //$this->asignarDatosVista('asignaturas', $data);
        //$this->mostrarVista('panel/secretaria/editaAsignatura', $data);
        $this->load->view('panel/asesor/editaAsignatura', $data);
    }


    public function guardar_post($id_asignatura){
        if($this->input->post()){
            $id_asignatura = $this->input->post('id_asignatura');
            $id_carrera = $this->input->post('id_carrera');
            $id_profesor = $this->input->post('id_profesor');
            $nombre_asignatura = $this->input->post('nombre_asignatura');
            $clave_asignatura = $this->input->post('clave_asignatura');
            $nrc_asignatura = $this->input->post('nrc_asignatura');           
            $creditos_asignatura = $this->input->post('creditos_asignatura');
            $horasp_asignatura = $this->input->post('horasp_asignatura');
            $horast_asignatura = $this->input->post('horast_asignatura');

            $this->load->model('asignaturas_model');
            $this->asignaturas_model->actualizar($id_asignatura,
                                                    $id_carrera,
                                                    $id_profesor,
                                                    $nombre_asignatura,
                                                    $clave_asignatura,
                                                    $nrc_asignatura,                                                   
                                                    $creditos_asignatura,
                                                    $horasp_asignatura,
                                                    $horast_asignatura);

        }else{
            $this->insertar_asignatura();
            }
        redirect(base_url("asignaturas"), "refresh");
    }


    public function guardar_estado($id_asignatura){
        if($this->input->post()){
            $id_asignatura = $this->input->post('id_asignatura');
            $estado_asignatura = $this->input->post('estado_asignatura');
            $calificacion_asignatura = $this->input->post('calificacion_asignatura');
           // $nombre_asignatura = $this->input->post('nombre_asignatura');
            //$clave_asignatura = $this->input->post('clave_asignatura');
           // $nrc_asignatura = $this->input->post('nrc_asignatura');           
           // $creditos_asignatura = $this->input->post('creditos_asignatura');
           // $horasp_asignatura = $this->input->post('horasp_asignatura');
           // $horast_asignatura = $this->input->post('horast_asignatura');

            $this->load->model('asignaturas_model');
            $this->asignaturas_model->actualizar_estado($id_asignatura,
                                                    $estado_asignatura,
                                                    $calificacion_asignatura
                                                    //$nombre_asignatura,
                                                    //$clave_asignatura,
                                                    //$nrc_asignatura,                                                   
                                                    //$creditos_asignatura,
                                                    //$horasp_asignatura,
                                                    //$horast_asignatura
                                                );

        }else{
           // $this->insertar_asignatura();
            }
        redirect(base_url("asignaturas/listaEstadoAsignaturas"), "refresh");
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