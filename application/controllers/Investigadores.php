<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Investigadores
 * @property CI_Session $session
 * @property Investigador $investigador
 */
/**
     * @author: Raldy De Oleo     
     * Controlador que maneja la logica de todos los procesos de la entidad investigadores.
     * 12-09-2018
     */
class Investigadores extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->cargarLibrerias();
        $this->load->model('estudiantes_model');        
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
     * Seguimiento de clientes
     * Vista grupal
     * Muestra un listado de clientes
     */
    public function listaInvestigadores(){
        $estudiantes = $this->estudiantes_model->obtener_todos();
        $this->asignarDatosVista('estudiantes', $estudiantes);
        $this->mostrarVista('panel/secretaria/listaInvestigadores');
    }

    public function listadeEst(){
        //$estudiantes = $this->estudiantes_model->obtener_todos();
        //$this->asignarDatosVista('estudiantes', $estudiantes);
        $this->load->view('panel/secretaria/index');
    }

    public function listaSelecciones(){
        $selecciones = $this->estudiantes_model->obtener_selecciones();
        $this->asignarDatosVista('selecciones', $selecciones);
        $this->mostrarVista('panel/secretaria/listaSelecciones');
    }

    /**
     * @author: Raldy De Oleo
     * Seguimiento de clientes
     * Vista grupal
     * Muestra un listado de clientes
     */
    public function EstudiantesPorcarrera($id_carrera){
        $estudiantesPorcarrera = $this->estudiantes_model->estudiantes_por_carrera($id_carrera);
        $this->asignarDatosVista('estudiantesPorcarrera', $estudiantesPorcarrera);
        $this->mostrarVista('panel/secretaria/estudiantesPorcarrera');
    }


    public function AsignaturasPorAprobar($id_estudiante){
        $asignaturasPorAprobar = $this->estudiantes_model->AsignaturasPorAprobar($id_estudiante);
        $this->asignarDatosVista('asignaturasPorAprobar', $asignaturasPorAprobar);
        $this->mostrarVista('panel/secretaria/asignaturasPoraprobar');
    }

    public function HorarioPorEstudiante($id_estudiante){
       
        $horarioPorEstudiante = $this->estudiantes_model->horario_por_estudiante($id_estudiante);
        $this->asignarDatosVista('horarioPorEstudiante', $horarioPorEstudiante);
        $this->mostrarVista('panel/secretaria/horarioPorestudiante'); 
    } 
    
    public function InscripcionesPorEstudiantes($id_estudiante){
        $inscripcionesPorestudiante = $this->estudiantes_model->inscripciones_por_estudiante($id_estudiante);
        $this->asignarDatosVista('inscripcionesPorestudiante', $inscripcionesPorestudiante);
        $this->mostrarVista('panel/secretaria/inscripcionesPorestudiante');
    }

    public function pagoInscripcion($id){
        $data = array();
        $this->load->model('estudiantes_model');
        if($id){
            $inscripcion = $this->estudiantes_model->obtener_insc_por_id($id);
            $data['id_inscripcion'] = $inscripcion->id_inscripcion;
            $data['id_estudiante'] = $inscripcion->id_estudiante;
            $data['id_periodo'] = $inscripcion->id_periodo;           
            $data['fecha_inscripcion'] = $inscripcion->fecha_inscripcion;
            $data['hora_inscripcion'] = $inscripcion->hora_inscripcion;
            $data['creditos_inscripcion'] = $inscripcion->creditos_inscripcion;
            $data['total_inscripcion'] = $inscripcion->total_inscripcion;
            $data['estatus'] = $inscripcion->estatus;


        }else{
            $data['id_inscripcion'] =null;
            $data['id_estudiante'] =null;
            $data['id_periodo'] =null;           
            $data['fecha_inscripcion'] =null;
            $data['hora_inscripcion'] =null;
            $data['creditos_inscripcion'] =null;
            $data['total_inscripcion'] =null;
            $data['estatus'] =null;

        }

       $this->load->view('panel/secretaria/pagoInscripcion', $data);
      // $this->asignarDatosVista('pagoInscripcion', $data);
      // $this->mostrarVista('panel/secretaria/pagoInscripcion');
    }

    public function estudianteporcarrera(){       
       $this->mostrarVista('panel/secretaria/estudianteConsulta');
    }

    public function nuevo_investigador()
    {   $this->load->model('estudiantes_model');
        //$estudiantes = $this->estudiantes_model->obtener_todos();
        //$this->asignarDatosVista('estudiantes', $estudiantes);
        $this->mostrarVista('panel/secretaria/crear_investigador');

    }




    public function seleccionarAsignaturas($id_estudiante){
        //$this->load->model('estudiantes_model');
        $estudiantes = $this->estudiantes_model->obtener_por_id($id_estudiante);
        $this->asignarDatosVista('estudiantes', $estudiantes);
        $this->mostrarVista('panel/asesor/seleccionAsignaturas');

    }
    
    function insertar_comentario()
    {

        if($this->input->post('submit'))
        {   $nom = $this->input->post('nom');
            $email = $this->input->post('email');
            $asunto = $this->input->post('asunto');
            $mensaje = $this->input->post('mensaje');

            $nueva_insercion = $this->estudiantes_model->nuevo_comentario(
                $nom,
                $email,
                $asunto,
                $mensaje
            );
            redirect(base_url("clientes"), "refresh");
        }

        else
        {

        }
    }


    /**
     * @author: Raldy De Oleo
     * Crear estudiante nuevo.
     * Vista Individual
     * Permite registrar los datos de un estudiante.
     */    
    function insertar_estudiante()
    {

        if($this->input->post('submit'))
        {   $id_categoria = $this->input->post('id_categoria');
            $id_carrera = $this->input->post('id_carrera');
            $nombre_estudiante = $this->input->post('nombre_estudiante');
            $apellido_estudiante = $this->input->post('apellido_estudiante');
            $empresa_estudiante = $this->input->post('empresa_estudiante');
            $matricula_estudiante = $this->input->post('matricula_estudiante');
            $clave_estudiante = $this->input->post('clave_estudiante');
            $direccion_estudiante = $this->input->post('direccion_estudiante');
            $id_ciudad = $this->input->post('id_ciudad');
            $telefono_estudiante = $this->input->post('telefono_estudiante');
            $email_estudiante = $this->input->post('email_estudiante');

            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->estudiantes_model->nuevo_estudiante(
                $id_categoria,
                $id_carrera,
                $nombre_estudiante,
                $apellido_estudiante,
                $empresa_estudiante,
                $matricula_estudiante,
                $clave_estudiante,
                $direccion_estudiante,
                $id_ciudad,
                $telefono_estudiante,
                $email_estudiante
            );
            redirect(base_url("clientes"), "refresh");
        }

        else
        {

        }
    }

    public function guardar($id_estudiante=null){
        $data = array();
        $this->load->model('estudiantes_model');
        if($id_estudiante){
        $estudiante = $this->estudiantes_model->obtener_por_id($id_estudiante);
            $data['id_estudiante'] = $estudiante->id_estudiante;
            $data['nombre_estudiante'] = $estudiante->nombre_estudiante;
            $data['apellido_estudiante'] = $estudiante->apellido_estudiante;
            $data['empresa_estudiante'] = $estudiante->empresa_estudiante;
            $data['matricula_estudiante'] = $estudiante->matricula_estudiante;
            $data['direccion_estudiante'] = $estudiante->direccion_estudiante;
            $data['ciudad_estudiante'] = $estudiante->ciudad_estudiante;
            $data['telefono_estudiante'] = $estudiante->telefono_estudiante;
            $data['email_estudiante'] = $estudiante->email_estudiante;

        }else{
            $data['id_estudiante']=null;
            $data['nombre_estudiante']=null;
            $data['apellido_estudiante']=null;
            $data['empresa_estudiante']=null;
            $data['matricula_estudiante']=null;
            $data['direccion_estudiante']=null;
            $data['ciudad_estudiante']=null;
            $data['telefono_estudiante']=null;
            $data['email_estudiante']=null;

        }
        //$this->asignarDatosVista('estudiantes', $data);
        //$this->mostrarVista('panel/secretaria/editarEstudiante');
        $this->load->view('panel/secretaria/editarEstudiante', $data);

    }



    public function ver($id_estudiante){
        $data = array();        
        $estudiante = $this->estudiantes_model->obtener_por_id($id_estudiante);
        $data['estudiante'] = $estudiante;
        $this->asignarDatosVista('estudiante', $estudiante);
        $this->mostrarVista('panel/asesor/verInvestigador');

    }


    public function buscarPorNombre($id_estudiante){
        $data = array();        
        $estudiantes = $this->estudiantes_model->obtener_por_nombre($id_estudiante);
        $data['estudiante'] = $estudiantes;
        $this->asignarDatosVista('estudiantes', $estudiantes);
        $this->mostrarVista('panel/secretaria/buscarPorNombre');

    }


    public function ver_proyeccion($id_estudiante){
        $data = array();        
        $estudiante = $this->estudiantes_model->obtener_por_id($id_estudiante);
        $data['estudiante'] = $estudiante;
        $this->asignarDatosVista('estudiante', $estudiante);
        $this->mostrarVista('panel/asesor/verProyeccionEstudiante');

    }

    public function eliminar($id_estudiante){        
        $this->estudiantes_model->eliminar($id_estudiante);
        redirect(base_url("clientes"), "refresh");
    }


    public function actualizar($id_estudiante){
        if($this->input->post($id_estudiante)){
            $nombre_estudiante = $this->input->post('nombre_estudiante');
            $apellido_estudiante = $this->input->post('apellido_estudiante');
            $empresa_estudiante = $this->input->post('empresa_estudiante');
            $matricula_estudiante = $this->input->post('matricula_estudiante');
            $direccion_estudiante = $this->input->post('direccion_estudiante');
            $ciudad_estudiante = $this->input->post('ciudad_estudiante');
            $telefono_estudiante = $this->input->post('telefono_estudiante');
            $email_estudiante = $this->input->post('email_estudiante');

            //$this->load->model('estudiantes_model');
            $this->estudiantes_model->actualizar($nombre_estudiante,
                $apellido_estudiante,
                $empresa_estudiante,
                $matricula_estudiante,
                $direccion_estudiante,
                $ciudad_estudiante,
                $telefono_estudiante,
                $email_estudiante);
        }else{
            $this->guardar();
        }
    }

    public function index() {
        $estudiantes = $this->estudiantes_model->obtener_todos();
        $this->asignarDatosVista('estudiantes', $estudiantes);
        $this->mostrarVista('panel/secretaria/listaInvestigadores');
    }



    public function editar($id){
        $data = array();
        $this->load->model('estudiantes_model');
        if($id){
            $estudiante = $this->estudiantes_model->obtener_por_id($id);
            $data['id_estudiante'] = $estudiante->id_estudiante;
            $data['id_categoria'] = $estudiante->id_categoria;
            $data['id_carrera'] = $estudiante->id_carrera;           
            $data['nombre_estudiante'] = $estudiante->nombre_estudiante;
            $data['apellido_estudiante'] = $estudiante->apellido_estudiante;
            $data['empresa_estudiante'] = $estudiante->empresa_estudiante;
            $data['matricula_estudiante'] = $estudiante->matricula_estudiante;
            $data['clave_estudiante'] = $estudiante->clave_estudiante;
            $data['direccion_estudiante'] = $estudiante->direccion_estudiante;
            $data['ciudad_estudiante'] = $estudiante->ciudad_estudiante;
            $data['telefono_estudiante'] = $estudiante->telefono_estudiante;
            $data['email_estudiante'] = $estudiante->email_estudiante;

        }else{
            $data['id_estudiante']=null;
            $data['id_categoria']=null;
            $data['id_carrera']=null;
            $data['nombre_estudiante']=null;
            $data['apellido_estudiante']=null;
            $data['empresa_estudiante']=null;
            $data['matricula_estudiante']=null;
            $data['clave_estudiante']=null;
            $data['direccion_estudiante']=null;
            $data['ciudad_estudiante']=null;
            $data['telefono_estudiante']=null;
            $data['email_estudiante']=null;

        }

       $this->load->view('panel/secretaria/editarInvestigador', $data);
       //$this->asignarDatosVista('estudiantes', $data);
       //$this->mostrarVista('panel/secretaria/editarEstudiante', $data);
    }


        public function guardar_post($id_estudiante){
            if($this->input->post()){
                $id_estudiante = $this->input->post('id_estudiante');
                $id_categoria = $this->input->post('id_categoria');
                $id_carrera = $this->input->post('id_carrera');
                $nombre_estudiante = $this->input->post('nombre_estudiante');
                $apellido_estudiante = $this->input->post('apellido_estudiante');
                $empresa_estudiante = $this->input->post('empresa_estudiante');
                $matricula_estudiante = $this->input->post('matricula_estudiante');
                $clave_estudiante = $this->input->post('clave_estudiante');
                $direccion_estudiante = $this->input->post('direccion_estudiante');
                $ciudad_estudiante = $this->input->post('ciudad_estudiante');
                $telefono_estudiante = $this->input->post('telefono_estudiante');
                $email_estudiante = $this->input->post('email_estudiante');
    
                $this->load->model('estudiantes_model');
                $this->estudiantes_model->actualizar($id_estudiante,
                                                        $id_categoria,
                                                        $id_carrera,
                                                        $nombre_estudiante,
                                                        $apellido_estudiante,
                                                        $empresa_estudiante,
                                                        $matricula_estudiante,
                                                        $clave_estudiante,
                                                        $direccion_estudiante,
                                                        $ciudad_estudiante,
                                                        $telefono_estudiante,
                                                        $email_estudiante);
    
            }
            else{
                $this->insertar_estudiante();
                }
            redirect(base_url("investigadores"), "refresh");
        }

    

        /**
     * @author: Raldy De Oleo
     * Crear estudiante nuevo.
     * Vista Individual
     * Permite registrar los datos de un estudiante.
     */    
    function insertar_seleccion()    {

        if($this->input->post('submit'))

        {   $id_estudiante = $this->input->post('id_estudiante');
            $id_periodo = $this->input->post('id_periodo');
            $fecha_seleccion = $this->input->post('fecha_seleccion');
            //$asignatura1 = $this->input->post('asignatura1');
            $seccion_seleccion = $this->input->post('seccion_seleccion');
            $id_asignatura = $this->input->post('id_asignatura');

           
                     

            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->estudiantes_model->nueva_seleccion(
                                    $id_estudiante,
                                    $id_periodo,
                                    $fecha_seleccion,
                                   // $asignatura1,
                                    $seccion_seleccion,
                                    $id_asignatura 
            );
            redirect(base_url("clientes"), "refresh");
        }

        else
        {

        }
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