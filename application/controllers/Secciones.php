<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Secciones
 * @property Seccion $seccion
 *
 */ /**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de los procesos con la entidad sewcciones.
     * 30-07-2018
     */



class Secciones extends BS_Controller {

    public function __construct() {
        parent::__construct();
        $this->valoresDefecto = array();
        $this->notificacion = '';
        $this->load->model('secciones_model');
    }

  

    /**a
     * @author: Raldy De Oleo
     * Lista  de secciones
     * Vista grupal
     * Muestra un listado de secciones
     */
    public function listaSecciones(){
        $secciones = $this->secciones_model->obtener_todos();
        $this->asignarDatosVista('secciones', $secciones);
        $this->mostrarVista('citas/listaSecciones');
    }

    
    /**
     * Creacion de secciones para asignaturas
     * Vista individual
     * Formulario para crear secciones.
     */
    public function nueva_seccion()
    {   //$this->load->model('secciones_model');
        $this->mostrarVista('citas/crearSeccion');
    }

    public function pruebaform($id)
    {   //$this->load->model('secciones_model');
        $secciones = $this->secciones_model->obtener_por_id($id);
        $this->asignarDatosVista('secciones', $secciones);
        $this->mostrarVista('citas/pruebaForm');
    }


    /** 
     * @author: Raldy De Oleo
     * Crear seccion nueva.
     * Vista Individual
     * Permite registrar los datos de una seccion.
     */    
    function insertar_seccion()
    {

        if($this->input->post('submit'))
        {   $nombre_seccion = $this->input->post('nombre_seccion');
            $id_periodo = $this->input->post('id_periodo');
            $id_asignatura = $this->input->post('id_asignatura');
            $id_horario = $this->input->post('id_horario');
            $id_aula = $this->input->post('id_aula');
            $id_profesor = $this->input->post('id_profesor');
            $cantmax_seccion = $this->input->post('cantmax_seccion');
            $lunes_seccion = $this->input->post('lunes_seccion');
            $martes_seccion = $this->input->post('martes_seccion');
            $miercoles_seccion = $this->input->post('miercoles_seccion');
            $jueves_seccion = $this->input->post('jueves_seccion');
            $viernes_seccion = $this->input->post('viernes_seccion');
            $sabado_seccion = $this->input->post('sabado_seccion');
            

          
            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->secciones_model->nueva_seccion(
                $nombre_seccion,
                $id_periodo,
                $id_asignatura,
                $id_horario,
                $id_aula ,
                $id_profesor,
                $cantmax_seccion,
                $lunes_seccion,
                $martes_seccion,
                $miercoles_seccion,
                $jueves_seccion,
                $viernes_seccion,
                $sabado_seccion               
               
            );                    
            
            redirect(base_url("secciones"), "refresh"); 
        }

        else
        {

        }
    }

   

    public function ver($id_seccion){
        $data = array();
        $this->load->model('secciones_model');
        $seccion = $this->secciones_model->obtener_por_id($id_seccion);
        $data['seccion'] = $seccion;
        $this->asignarDatosVista('seccion', $seccion);
        $this->mostrarVista('panel/asesor/verSeccion');

    }

    public function eliminar($id_cliente){
        $this->load->model('clientes_model');
        $this->clientes_model->eliminar($id_cliente);
        redirect(base_url("clientes"), "refresh");
    }



    public function index() {
        $secciones = $this->secciones_model->obtener_todos();
        $this->asignarDatosVista('secciones', $secciones);
        $this->mostrarVista('citas/listaSecciones');
    }


    public function editar($id){
        $data = array();
        $this->load->model('secciones_model');
        if($id){
            $seccion = $this->secciones_model->obtener_por_id($id);
            $data['id_seccion'] = $seccion->id_seccion;
            $data['nombre_seccion'] = $seccion->nombre_seccion;
            $data['id_periodo'] = $seccion->id_periodo;
            $data['id_asignatura'] = $seccion->id_asignatura;
            $data['id_horario'] = $seccion->id_horario;
            $data['id_aula'] = $seccion->id_aula;
            $data['id_profesor'] = $seccion->id_profesor; 
            $data['cantmax_seccion'] = $seccion->cantmax_seccion; 
            $data['lunes_seccion'] = $seccion->lunes_seccion; 
            $data['martes_seccion'] = $seccion->martes_seccion; 
            $data['miercoles_seccion'] = $seccion->miercoles_seccion; 
            $data['jueves_seccion'] = $seccion->jueves_seccion; 
            $data['viernes_seccion'] = $seccion->viernes_seccion;
            $data['sabado_seccion'] = $seccion->sabado_seccion;  
                    

        }else{
            $data['id_seccion']=null;
            $data['nombre_seccion']=null;
            $data['id_periodo']=null;
            $data['id_asignatura']=null;
            $data['id_horario']=null;
            $data['id_aula']=null;
            $data['id_profesor']=null;
            $data['cantmax_seccion']=null;
            $data['lunes_seccion']=null;
            $data['martes_seccion']=null;
            $data['miercoles_seccion']=null;
            $data['jueves_seccion']=null;
            $data['viernes_seccion']=null;
            $data['sabado_seccion']=null;  
        }

        //$this->asignarDatosVista('secciones', $data);
        //$this->mostrarVista('panel/secretaria/editaSeccions');
        $this->load->view('panel/secretaria/editaSeccion', $data);
    }

    public function guardar_post($id_seccion){
        if($this->input->post()){
            $id_seccion = $this->input->post('id_seccion');
            $nombre_seccion = $this->input->post('nombre_seccion');
            $id_periodo = $this->input->post('id_periodo');
            $id_asignatura = $this->input->post('id_asignatura');
            $id_horario = $this->input->post('id_horario');
            $id_aula = $this->input->post('id_aula');
            $id_profesor = $this->input->post('id_profesor');
            $cantmax_seccion = $this->input->post('cantmax_seccion');
            $lunes_seccion = $this->input->post('lunes_seccion');
            $martes_seccion = $this->input->post('martes_seccion');
            $miercoles_seccion = $this->input->post('miercoles_seccion');
            $jueves_seccion = $this->input->post('jueves_seccion');
            $viernes_seccion = $this->input->post('viernes_seccion');
            $sabado_seccion = $this->input->post('sabado_seccion');
            

            $this->load->model('secciones_model');
            $this->secciones_model->actualizar($id_seccion,
                                                $nombre_seccion,
                                                $id_periodo,
                                                $id_asignatura,
                                                $id_horario,
                                                $id_aula ,
                                                $id_profesor,
                                                $cantmax_seccion,
                                                $lunes_seccion,
                                                $martes_seccion,
                                                $miercoles_seccion,
                                                $jueves_seccion,
                                                $viernes_seccion,
                                                $sabado_seccion);

        }
        else
        {
            $this->insertar_seccion();
        }
        redirect(base_url("secciones"), "refresh");
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

    public function mostrar($idCliente=0){
        if ($idCliente==0)
            $this->mostrarVarios();
    }

    public function mostrarVarios(){
        $clientes = $this->cliente->leerTodos();
        echo json_encode($clientes);
    }

}

