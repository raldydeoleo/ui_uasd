<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Categoria_financiera
 * @property CI_Session $session
 * @property Categoria_Financiera $cat_fin
 */
/**
     * @author: Raldy De Oleo
     * Matricula: 94-3032
     * Controlador que maneja la logica de todos los procesos de la entidad Categorias Financieras.
     * 30-07-2018
     */
class Categorias extends CI_Controller {


    public function __construct() {
        parent::__construct();
        //$this->cargarLibrerias();
        $this->load->model('cat_fin_model');
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
     * Seguimiento de categorias
     * Vista grupal
     * Muestra un listado de categorias financieras
     */
    public function listaCategoriasfin(){
        $categoriasfin = $this->cat_fin_model->obtener_todos();
        $this->asignarDatosVista('categoriasfin', $categoriasfin);
        $this->mostrarVista('citas/listaCategoriasfin');
    }

    /**
    * @author: Raldy De Oleo
     * Registro de informacion sobre una categoria financiera
     * Vista individual
     * Formulario para crear una aula.
     */
    public function nueva_categoriafin(){
        $this->mostrarVista('citas/crearCategoriafin');
    }

    /**
     * @author: Raldy De Oleo
     * Crear estudiante nuevo.
     * Vista Individual
     * Permite registrar los datos de un estudiante.
     */    
    function insertar_categoriafin()
    {

        if($this->input->post('submit'))
        {   
            $descripcion_categoria = $this->input->post('descripcion_categoria');
            $preciocredito_categoria = $this->input->post('preciocredito_categoria');           

            //ahora procesamos los datos hacía el modelo que debemos crear

            $nueva_insercion = $this->cat_fin_model->nueva_categoriafin(
                $descripcion_categoria,
                $preciocredito_categoria
            );
            redirect(base_url("categorias"), "refresh");
        }

        else
        {

        }
    }

    
    public function editar($id){
        $data = array();
        $this->load->model('cat_fin_model');
        if($id){
            $categoria = $this->cat_fin_model->obtener_por_id($id);
            $data['id_categoria'] =  $categoria->id_categoria;
            $data['descripcion_categoria'] =  $categoria->descripcion_categoria;
            $data['preciocredito_categoria'] =  $categoria->preciocredito_categoria;
        }else{
            $data['id_categoria'] = null;
            $data['descripcion_categoria'] =  null;
            $data['preciocredito_categoria'] =  null; 
        }

       $this->load->view('panel/secretaria/editarCategoria', $data);
       //$this->asignarDatosVista('estudiantes', $data);
       //$this->mostrarVista('panel/secretaria/editarEstudiante', $data);
    }


    public function ver($id_categoria){
        $data = array();
        $this->load->model('cat_fin_model');
        $categoria = $this->cat_fin_model->obtener_por_id($id_categoria);
        $data['categoria'] = $categoria;
        $this->asignarDatosVista('categoria', $categoria);
        $this->mostrarVista('panel/asesor/verCategoria');

    }

    public function eliminar($id_categoria){
        $this->load->model('cat_fin_model');
        $this->clientes_model->eliminar($id_categoria);
        redirect(base_url("categorias"), "refresh");
    }


    public function guardar_post($id_categoria){
        if($this->input->post()){
            $id_categoria = $this->input->post('id_categoria');            
            $descripcion_categoria = $this->input->post('descripcion_categoria');
            $preciocredito_categoria = $this->input->post('preciocredito_categoria');

            $this->load->model('cat_fin_model');
            $this->cat_fin_model->actualizar($id_categoria,
                                                    $descripcion_categoria,
                                                    $preciocredito_categoria);

        }
        else{
            $this->insertar_categoria();
            }
        redirect(base_url("categorias"), "refresh");
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
        $categoriasfin = $this->cat_fin_model->obtener_todos();
        $this->asignarDatosVista('categoriasfin', $categoriasfin);
        $this->mostrarVista('citas/listaCategoriasfin');
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