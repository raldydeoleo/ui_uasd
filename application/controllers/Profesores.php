<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 /**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de los procesos con la entidad profesores.
     * 30-07-2018
     */
class Profesores extends BS_Controller {


    public function __construct() {
        parent::__construct();
        //$this->cargarLibrerias();
        $this->load->model('profesores_model');
    }

    protected function cargarLibrerias(){
        $this->load->model(CLIENTE_MODELO);
        $this->load->model(VEHICULO_MODELO);

    }


    public function index() {
        $profesores = $this->profesores_model->obtener_todos();
        $this->asignarDatosVista('profesores', $profesores);
        $this->mostrarVista('panel/secretaria/listaProfesores');
    }


     /**
     * @author: Raldy De Oleo
     * Lista de todos los profesores
     * Vista grupal
     * Muestra un listado de profesores
     */
    public function listaProfesores(){        
        $profesores = $this->profesores_model->obtener_todos();
        $this->asignarDatosVista('profesores', $profesores);
        $this->mostrarVista('panel/secretaria/listaProfesores');
    }
     

    public function nuevo_profesor()
    {   $this->load->model('profesores_model');
        //$estudiantes = $this->estudiantes_model->obtener_todos();
        //$this->asignarDatosVista('estudiantes', $estudiantes);
        $this->mostrarVista('panel/secretaria/profesorform');

    }


    //funcion para procesar el formulario
    function insertar_profesor()
    {

        if($this->input->post('submit'))
        {   $nombre_profesor = $this->input->post('nombre_profesor');
            $apellido_profesor = $this->input->post('apellido_profesor');
            $telefono_profesor = $this->input->post('telefono_profesor');
            $email_profesor = $this->input->post('email_profesor');
            $ciudad_profesor = $this->input->post('ciudad_profesor');

            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->profesores_model->nuevo_profesor(
                                    $nombre_profesor,
                                    $apellido_profesor,
                                    $telefono_profesor,
                                    $email_profesor,
                                    $ciudad_profesor
           

            );
            redirect(base_url("profesores"), "refresh");
        }

        else
        {

        }
    }


    public function guardar($id_profesor){
        $data = array();
        
        if($id_profesor){
            $profesor = $this->profesores_model->obtener_por_id($id_profesor);
            $data['$id_profesor'] = $profesor->id_profesor;
            $data['nombre_profesor'] = $profesor->nombre_profesor;
            $data['apellido_profesor'] = $profesor->apellido_profesor;            
            $data['telefono_profesor'] = $profesor->telefono_profesor;
            $data['email_profesor'] = $profesor->email_profesor; 
            $data['ciudad_profesor'] = $profesor->ciudad_profesor;           

        }else{
            $data['id_profesor']=null;
            $data['nombre_profesor']=null;
            $data['apellido_profesor']=null;           
            $data['ciudad_profesor']=null;
            $data['telefono_profesor']=null;
            $data['email_profesor']=null;

        }
        //$this->asignarDatosVista('data', $data);
        $this->load->view('panel/secretaria/editarProfesor', $data );

    }



    public function editar($id){
        $data = array();
        $this->load->model('profesores_model');
        if($id){
            $profesor = $this->profesores_model->obtener_por_id($id);
            $data['id_profesor'] = $profesor->id_profesor;
            $data['nombre_profesor'] = $profesor->nombre_profesor;
            $data['apellido_profesor'] = $profesor->apellido_profesor;           
            $data['ciudad_profesor'] = $profesor->ciudad_profesor;
            $data['telefono_profesor'] = $profesor->telefono_profesor;
            $data['email_profesor'] = $profesor->email_profesor;

        }else{
            $data['nombre_profesor']=null;
            $data['apellido_profesor']=null;           
            $data['ciudad_profesor']=null;
            $data['telefono_profesor']=null;
            $data['email_profesor']=null;

            
        }
        $this->load->view('panel/secretaria/editarProfesor', $data);
    }


    public function guardar_post($id_profesor){
        if($this->input->post()){
            $id_profesor = $this->input->post('id_profesor');
            $nombre_profesor = $this->input->post('nombre_profesor');
            $apellido_profesor = $this->input->post('apellido_profesor');
            $telefono_profesor = $this->input->post('telefono_profesor');
            $email_profesor = $this->input->post('email_profesor');
            $ciudad_profesor = $this->input->post('ciudad_profesor');

            $this->load->model('profesores_model');
            $this->profesores_model->actualizar($id_profesor,
                                                $nombre_profesor,
                                                $apellido_profesor,
                                                $telefono_profesor,
                                                $email_profesor,
                                                $ciudad_profesor);

        }else{
            //$this->insertar_profesor();
            }
        redirect(base_url("profesores"), "refresh");
    }



    public function nuevo_proveedor()
    {
        $this->mostrarVista('panel/secretaria/proveedorform');
    }

    public function proveedor_wizard()
    {
        $this->mostrarVista('panel/secretaria/proveedor_wizard');
    }




    public function ver($id_profesor){
        $data = array();       
        $profesor = $this->profesores_model->obtener_por_id($id_profesor);
        $data['profesor'] =  $profesor;
        $this->asignarDatosVista('profesor', $profesor);
        $this->mostrarVista('panel/secretaria/verProfesor');

    }

    public function eliminar($id_profesor){
        //$this->load->model('proveedores_model');
        $this->profesores_model->eliminar($id_profesor);
        redirect(base_url("profesores"), "refresh");
    }



}